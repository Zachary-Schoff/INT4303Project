<?php
include 'Connection.php';

session_start();

if (isset($_SESSION["user"]) && !empty($_SESSION["user"])){
	echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title>Untitled Document</title>
		<link href = 'Style.css' rel = 'stylesheet'>
	</head>

	<body>
		<h1>LTU Resource</h1>
		<div class='topnav'>
			<a class='dash' href='Dashboard.php'>Dashboard</a>
			<a class='dash' href='News.php'>News</a>
			<a class='dash' href='Search.php'>Search</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Logout.php'>Logout</a>
				<a style = 'width'>
			<form class='dash' action = 'Search.php'>
				<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 70%; float: left'>
				<input class='btn btn-outline-success' type='submit' style='float: right'>
			</form>
			</a>
		</div>
	<form method='post' action='CreateUser.php' enctype='multipart/form-data'>
		<label>Username</label><br>
		<input type='text' id='username' name='username'><br>
		<label>Profile picture</label><br>
		<input type='file' id='fileToUpload' name='fileToUpload'><br>
		<label>Password</label><br>
		<input type='text' id='password' name='password'><br>
		<label>First Name</label><br>
		<input type='text' id='fname' name='fname'><br>
		<label>Last Name</label><br>
		<input type='text' id='lname' name='lname'><br>
		<label>Bio</label><br>
		<textarea id='bio' name='bio' rows='4' cols='32'></textarea><br>
		<label>Email</label><br>
		<input type='text' id='email' name='email'><br>
		<label>Date of Birth</label><br>
		<input type='date' id='dob' name='dob'><br>
		<input type='submit' name='submit' value='Submit'>
	</form>
</body>
</html>;
	}
else{
	echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title>Untitled Document</title>
		<link href = 'Style.css' rel = 'stylesheet'>
	</head>

	<body>
		<h1>LTU Resource</h1>
		<div class='topnav'>
			<a class='dash' href='Dashboard.php'>Dashboard</a>
			<a class='dash' href='News.php'>News</a>
			<a class='dash' href='Search.php'>Search</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Login.php'>Login</a>
		</div>
		<form method='post' action='CreateUserAction.php' enctype='multipart/form-data'>
			<label>Username</label><br>
			<input type='text' id='username' name='username'><br>
			<label>Profile picture</label><br>
			<input type='file' id='fileToUpload' name='fileToUpload'><br>
			<label>Password</label><br>
			<input type='text' id='password' name='password'><br>
			<label>First Name</label><br>
			<input type='text' id='fname' name='fname'><br>
			<label>Last Name</label><br>
			<input type='text' id='lname' name='lname'><br>
			<label>Bio</label><br>
			<textarea id='bio' name='bio' rows='4' cols='32'></textarea><br>
			<label>Email</label><br>
			<input type='text' id='email' name='email'><br>
			<label>Date of Birth</label><br>
			<input type='date' id='dob' name='dob'><br>
			<input type='submit' name='submit' value='Submit'>
		</form>
	</body>
	</html>";
	}
?>