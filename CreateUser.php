<?php
include 'Connection.php';

$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$dob = $_REQUEST['dob'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$sql = " CALL createuser('$fname', '$lname', '$email', '$dob', '$username', '$password');";

if($conn-> query($sql) === TRUE){
	
} else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
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
		<a class="dash" href="C:\Users\nkubik\Desktop\Capstone\Dashboard.html">Dashboard</a>
		<a class="dash" href="C:\Users\nkubik\Desktop\Capstone\News.html">News</a>
		<a class="dash" href="C:\Users\nkubik\Desktop\Capstone\Search.html">Search</a>
		<a class="dash" href="C:\Users\nkubik\Desktop\Capstone\Profile.html">Profile</a>
		<a class="dash" href="C:\Users\nkubik\Desktop\Capstone\About.html">About</a>
		<a class="dash" href="C:\Users\nkubik\Desktop\Capstone\Login.html">Login</a>
	</div>
	<form method="post" action="CreateUser.php">
		<label for="fname">First Name</label><br>
		<input type="text" id="fname" name="fname"><br>
		<label for="lname">Last Name</label><br>
		<input type="text" id="lname" name="lname"><br>
		<label for="email">Email</label><br>
		<input type="text" id="email" name="email"><br>
		<label for="dob">Date of Birth</label><br>
		<input type="date" id="dob" name="dob"><br>
		<label for="username">Username</label><br>
		<input type="text" id="username" name="username"><br>
		<label for="password">Password</label><br>
		<input type="text" id="password" name="password">
		<input type="submit" value="Submit">
	</form>
	<p>Account created successfully!</p>
</body>
</html>