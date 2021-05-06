<?php
include 'Connection.php';

session_start();

if (isset($_SESSION["user"]) && !empty($_SESSION["user"])){
	echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title>Untitled Document</title>
		<link href = 'Dashboard.php'>
		<link href = 'Dashboard.php' rel = 'connection'>
		<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
		<link href = 'Style.css' rel = 'stylesheet'>
	</head>

	<body>
		<h1 class = 'header'> LTU Resource</h1>
		<div class='topnav'>
			<a class='dash' href='Dashboard.php'>Dashboard</a>
			<a class='das' href='News.php'>News</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Logout.php'>Logout</a>
			<a>
				<form class='dash' action = 'SearchAction.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 100%; text-align: right'>
					<input class='btn btn-outline-success' type='submit'>
				</form>
			</a>
		</div>
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
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Login.php'>Login</a>
			<a>
				<form class='dash' action = 'SearchAction.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 100%; text-align: right'>
					<input class='btn btn-outline-success' type='submit'>
				</form>
			</a>
		</div>
		<form method='post' action='LoginAction.php'>
			<label for='username'>Email</label><br>
			<input type='text' id='Email' name='Email'><br>
			<label for='password'>Password</label><br>
			<input type='text' id='password' name='password'>
			<input type='submit' value='Login'>
		</form>

		<a href='CreateUser.php'>Create Account</a>
	</body>
	</html>";
	}
?>