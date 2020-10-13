<?php
use Phppot\Member;

if (! empty($_POST["login-btn"])) {
    require_once __DIR__ . '/Model/Member.php';
    $member = new Member();
    $loginResult = $member->loginMember();
}
?>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="assets/dist/style.css">
<script src="vendor/jquery/jquery-3.3.1.js" type="text/javascript"></script>
</head>
<body class="antialiased box-border">
	<div class="container mx-auto">
		<div class="flex container py-10">
			<div class="login-signup">
				<a href="user-registration.php">Sign up</a>
			</div>
		</div>
		<div class="w-full max-w-xs">
			<form name="login" action="" method="post" onsubmit="return loginValidation()" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
				<h1 class="sm:text-lg md:text-2xl lg:text-3xl xl:text-4xl py-3">Login</h1>
					<?php if(!empty($loginResult)){?>
				<div class="error-msg"><?php echo $loginResult;?></div>
				<?php }?>
					<div class="md:flex md:items-center mb-6">
						<div class="md:w-1/3">
						<label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="username">
							Username<span class="required error" id="username-info"></span>
						</label>
						</div>
						<div class="md:w-2/3">
						<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500" 
								type="text" 
								name="username"
								id="username"
								>
						</div>
					</div>
					<div class="md:flex md:items-center mb-6">
    					<div class="md:w-1/3">
							<label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password">
								Password<span class="required error" id="login-password-info"></span>
							</label>
						</div>
						<div class="md:w-2/3">
							<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-green-500" type="password"
								name="login-password" id="login-password">
						</div>
					</div>
					<div class="md:flex md:items-center">
    					<div class="md:w-1/3"></div>
    						<div class="md:w-2/3">
								<input 
									class="shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" 
									type="submit" 
									name="login-btn"
									id="login-btn" 
									value="Login"
									>
							</div>
  					</div>
				</form>
		</div>

	</div>

	<script>
function loginValidation() {
	var valid = true;
	$("#username").removeClass("error-field");
	$("#password").removeClass("error-field");

	var UserName = $("#username").val();
	var Password = $('#login-password').val();

	$("#username-info").html("").hide();

	if (UserName.trim() == "") {
		$("#username-info").html("required.").css("color", "#ee0000").show();
		$("#username").addClass("error-field");
		valid = false;
	}
	if (Password.trim() == "") {
		$("#login-password-info").html("required.").css("color", "#ee0000").show();
		$("#login-password").addClass("error-field");
		valid = false;
	}
	if (valid == false) {
		$('.error-field').first().focus();
		valid = false;
	}
	return valid;
}
</script>
</body>
</html>
