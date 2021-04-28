<?php
include 'Connection.php';

if (isset($_SESSION["user"]) && !empty($_SESSION["user"])){
	echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title>Untitled Document</title>
		<link href = 'Style.css' rel = 'stylesheet'>
		<link href = 'NewPost.php' rel = 'connection'>
	</head>

	<body>
		<h1 class = 'header'> LTU Resource</h1>
		<div class='topnav'>
			<a class='dash' href='Dashboard.php'>Dashboard</a>
			<a class='dash' href='News.php'>News</a>
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
		<h3 class='title'>Dashboard</h3>

		<form method = 'post' action = 'NewPostAction.php'>
			<label for='message'>Enter Message</label><br>
			<textarea id='textarea' name='message' rows='4' cols='50'>
			</textarea><br>
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
		<link href = 'NewPost.php' rel = 'connection'>
	</head>

	<body>
		<h1 class = 'header'> LTU Resource</h1>
		<div class='topnav'>
			<a class='dash' href='Dashboard.php'>Dashboard</a>
			<a class='dash' href='News.php'>News</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Login.html'>Login</a>
			<a>
				<form class='dash' action = 'SearchAction.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 100%; text-align: right'>
					<input class='btn btn-outline-success' type='submit'>
				</form>
			</a>
		</div>
		<h3 class='title'>Dashboard</h3>

		<form method = 'post' action = 'NewPostAction.php'>
			<label for='message'>Enter Message</label><br>
			<textarea id='textarea' name='message' rows='4' cols='50'>
			</textarea><br>
			<input type='submit' value='Submit'>
		</form>

	</body>
	</html>";
	}
?>