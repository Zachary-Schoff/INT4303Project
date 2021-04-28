<?php
include 'Connection.php';

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
		</div>
		<h3>This page will be for recent news or important information regarding the school</h3>
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
		<h3>This page will be for recent news or important information regarding the school</h3>
	</body>
	</html>";
	}
?>