<?php
include 'Connection.php';

session_start();

$userid = $_SESSION['user'];
$message = $_POST['message'];
$recipient = $_POST['recipient'];

$sqlget = "INSERT INTO messages (senderid, receiverid, message) VALUES ('$userid', '$recipient', '$message') LEFT JOIN user ON '$recipient' = nickname";

$result = $conn->query($sqlget);

if ($result) {
	echo ("
		<!doctype html>
		<html>
		<head>
		<meta charset='utf-8'>
		<title>Untitled Document</title>
			<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
			<link href = 'Style.css' rel = 'stylesheet'>
		</head>
		<body>
			<h1 class = 'header'> LTU Resource</h1>
			<div class='topnav'>
				<a class='dash' href='Dashboard.php'>Dashboard</a>
				<a class='dash' href='Profile.html'>Profile</a>
				<a class='dash' href='Login.html'>Login</a>
				<a class='dash' href='message.php'>Messages</a>
				<a>
					<form class='dash' action = 'Search.php'>
						<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 100%; text-align: right; color: black;'>
						<input class='btn btn-outline-success' type='submit'>
					</form>
				</a>
			</div>
			<h3>Message Sent</h3>
			</form>
		</body>
		</html>");
}
else{
	echo ("
		<!doctype html>
		<html>
		<head>
		<meta charset='utf-8'>
		<title>Untitled Document</title>
			<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
			<link href = 'Style.css' rel = 'stylesheet'>
		</head>
		<body>
			<h1 class = 'header'> LTU Resource</h1>
			<div class='topnav'>
				<a class='dash' href='Dashboard.php'>Dashboard</a>
				<a class='dash' href='Profile.html'>Profile</a>
				<a class='dash' href='Login.html'>Login</a>
				<a class='dash' href='message.php'>Messages</a>
				<a>
					<form class='dash' action = 'Search.php'>
						<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 100%; text-align: right; color: black;'>
						<input class='btn btn-outline-success' type='submit'>
					</form>
				</a>
			</div>
			<h3>Message Not Sent. Something Went Wrong</h3>
			</form>
		</body>
		</html>");
}