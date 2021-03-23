<?php
include 'Connection.php';

$email = $_REQUEST["Email"];
$password = $_REQUEST["password"];

$sql = " SELECT * FROM user WHERE email = '$email' AND password = '$password';";

$uidsql = " SELECT userid FROM user WHERE email = '$email' AND password = '$password';";

$uid = $conn->query($uidsql);

$result = $conn->query($sql);

if($result->num_rows == 0){
	echo "Login failed";
} else {
	echo "Logged in";
	
	session_start();
	$_SESSION["userid"] = $uid;
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link href = "Style.css" rel = "stylesheet">
</head>

<body>
	<h1>LTU Resource</h1>
	<div class="topnav">
		<a class="dash" href="Dashboard.html">Dashboard</a>
		<a class="dash" href="News.html">News</a>
		<a class="dash" href="Search.html">Search</a>
		<a class="dash" href="Profile.html">Profile</a>
		<a class="dash" href="About.html">About</a>
		<a class="dash" href="Login.html">Login</a>
	</div>
	<form method="post" action="Login.php">
		<label for="username">Email</label><br>
		<input type="text" id="Email" name="Email"><br>
		<label for="password">Password</label><br>
		<input type="text" id="password" name="password">
		<input type="submit" value="Login">
	</form>
	
	<a href="CreateUser.html">Create Account</a>
</body>
</html>