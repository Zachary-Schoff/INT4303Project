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
			<a class='dash' href='Dashboard.html'>Dashboard</a>
			<a class='dash' href='News.html'>News</a>
			<a class='dash' href='Search.html'>Search</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Logout.php'>Logout</a>
		</div>
		<h3>This website was created in order to help the Lawrence Tech Community have as many resources as needed to succeed</h3>

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
			<a class='dash' href='Dashboard.html'>Dashboard</a>
			<a class='dash' href='News.html'>News</a>
			<a class='dash' href='Search.html'>Search</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.html'>About</a>
			<a class='dash' href='Login.html'>Login</a>
		</div>
		<h3>This website was created in order to help the Lawrence Tech Community have as many resources as needed to succeed</h3>

	</body>
	</html>";
}