<?php
include 'Connection.php';

$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$dob = $_REQUEST['dob'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$bio = $_REQUEST['bio'];

$imagedir = "images/";
$imagefile = $imagedir . basename($_FILES["pfp"]["name"]);
$imageFileType = strtolower(pathinfo($imagefile, PATHINFO_EXTENSION));

if(isset($_POST["submit"])){
	$check = getimagesize($_FILES["pfp"]["tmp_name"]);
	if($check !== false) {
		
	} else {
		echo "File selected is not an image: " . $check["mime"] . ".";
	}
}

$sql = " CALL createuser('$fname', '$lname', '$email', '$dob', '$username', '$password', '$bio', '$email.$imageFileType');";

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
		<a class="dash" href="Dashboard.html">Dashboard</a>
		<a class="dash" href="News.html">News</a>
		<a class="dash" href="Search.html">Search</a>
		<a class="dash" href="Profile.html">Profile</a>
		<a class="dash" href="About.html">About</a>
		<a class="dash" href="Login.html">Login</a>
	</div>
	<form method="post" action="CreateUser.php" enctype="multipart/form-data">
		<label>Username</label><br>
		<input type="text" id="username" name="username"><br>
		<label>Profile picture</label><br>
		<input type="file" id="pfp" name="pfp"><br>
		<label>Password</label><br>
		<input type="text" id="password" name="password"><br>
		<label>First Name</label><br>
		<input type="text" id="fname" name="fname"><br>
		<label>Last Name</label><br>
		<input type="text" id="lname" name="lname"><br>
		<label>Bio</label><br>
		<textarea id="bio" name="bio" rows="4" cols="32"></textarea><br>
		<label>Email</label><br>
		<input type="text" id="email" name="email"><br>
		<label>Date of Birth</label><br>
		<input type="date" id="dob" name="dob"><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
