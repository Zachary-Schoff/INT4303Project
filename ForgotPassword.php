<?php
include 'Connection.php';

if (isset($_SESSION["user"]) && !empty($_SESSION["user"])){
	echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title>Untitled Document</title>
		<link href = 'Style.css' rel = 'stylesheet'>
		<link href = 'Connection.php' rel = 'connection'>
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
		</div>
		<form>
			<label for='fname'>First Name</label><br>
			<input type='text' id='fname' name='fname'><br>
			<label for='lname'>Last Name</label><br>
			<input type='text' id='lname' name='lname'><br>
			<label for='email'>Email</label><br>
			<input type='text' id='email' name='email'><br>
			<label for='dob'>Date of Birth</label><br>
			<input type='date' id='dob' name='dob'><br>
			<label for='username'>Username</label><br>
			<input type='text' id='username' name='username'><br>
			<label for='password'>Password</label><br>
			<input type='text' id='password' name='password'>
			<input type='submit' value='Submit'>
		</form>
	</body>
	</html>";
	}
else{
	echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title>Untitled Document</title>
		<link href = 'Style.css' rel = 'stylesheet'>
		<link href = 'Connection.php' rel = 'connection'>
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
		<form>
			<label for='fname'>First Name</label><br>
			<input type='text' id='fname' name='fname'><br>
			<label for='lname'>Last Name</label><br>
			<input type='text' id='lname' name='lname'><br>
			<label for='email'>Email</label><br>
			<input type='text' id='email' name='email'><br>
			<label for='dob'>Date of Birth</label><br>
			<input type='date' id='dob' name='dob'><br>
			<label for='username'>Username</label><br>
			<input type='text' id='username' name='username'><br>
			<label for='password'>Password</label><br>
			<input type='text' id='password' name='password'>
			<input type='submit' value='Submit'>
		</form>
	</body>
	</html>";
	}
?>