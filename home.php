<?php
session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" href="assets/dist/style.css">
</head>
<body class="box-border antialiased">
	<div class="container mx-auto ">
    <section class="flex justify-between items-center py-6">
		<div class="page-header">
			<span class="login-signup"><a href="logout.php">Logout</a></span>
		</div>
	</section>	
	

    <div class="page-content">
        <h1 class="sm:text-lg md:text-2xl lg:text-3xl xl:text-4xl">Welcome, <strong class="text-green-600"><?php echo $username;?></strong></h1>
    </div>

    </div>
</body>
</html>
