<?php
include 'Connection.php';

session_start();

if (isset($_SESSION["user"]) && !empty($_SESSION["user"])){
	echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title>LTU Interlink</title>
		<link href = 'Dashboard.php'>
		<link href = 'Dashboard.php' rel = 'connection'>
		<link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
		<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
		<link href = 'Style.css' rel = 'stylesheet'>
	</head>

	<body>
		<h1 class = 'header'>LTU Interlink</h1>
		<div class='topnav'>
			<a class='dash' href='Dashboard.php'>Dashboard</a>
			<a class='dash' href='CreateGroup.php'>Groups</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Logout.php'>Logout</a>
			<a style = 'width'>
				<form class='dash' action = 'SearchAction.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 70%; float: left'>
					<input class='btn btn-outline-success' type='submit' style='float: right'>
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
	<title>LTU Interlink</title>
		<link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
		<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
		<link href = 'Style.css' rel = 'stylesheet'>
	</head>

	<body>
		<h1 class='header'>LTU Interlink</h1>
		<div class='topnav'>
			<a class='dash' href='Dashboard.php'>Dashboard</a>
			<a class='dash' href='CreateGroup.php'>Groups</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Login.php'>Login</a>
			<a style = 'width'>
				<form class='dash' action = 'SearchAction.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 70%; float: left'>
					<input class='btn btn-outline-success' type='submit' style='float: right'>
				</form>
			</a>
		</div>
			<form method='post' action='LoginAction.php'>
			<label for='username'>Email</label><br>
			<input type='text' id='Email' name='Email'><br>
			<label for='password'>Password</label><br>
			<input type='password' id='password' name='password'>
			<input type='submit' value='Login'><br>
		</form>
		<form method='post' action='ForgotPassword.php'>
			<input type='submit' value='Forgot Password?'>
		</form>
		<br>
		<form method='post' action='CreateUser.php'>
			<label>Don't have an account? Make one here</label>
			<input type='submit' value='Create Account'>
		</form>
	</body>
	</html>";
	}
?>