<?php
include 'Connection.php';

session_start();
session_destroy();

$sqlget = "SELECT post.message, post.dateposted, user.nickname FROM post LEFT JOIN user ON post.userid = user.userid;";
$sqldata = mysqli_query($conn,$sqlget) or die("Error getting data");

if (isset($_SESSION["user"]) && !empty($_SESSION["user"])){
	echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title>Untitled Document</title>
		<link href = 'Dashboard.php'>
		<link href = 'Dashboard.php' rel = 'connection'>
		<link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
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
			<a style = 'width'>
				<form class='dash' action = 'Search.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 70%; float: left'>
					<input class='btn btn-outline-success' type='submit' style='float: right'>
				</form>
			</a>
		</div>
		<h3 class='title'>Dashboard</h3>
		<a href='NewPost.html' style = 'color: white'>Add Post</a>
	</body>
	</html>";
	}
else{
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
			<a class='dash' href='Profile.php'>Profile</a>
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Login.php'>Login</a>
			<a>
				<form class='dash' action = 'SearchAction.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 100%; text-align: right'>
					<input class='btn btn-outline-success' type='submit'>
				</form>
			</a>
		</div>
		<h3 class='title'>Dashboard</h3>
		<a href='NewPost.php' style = 'color: red'>Add Post</a>
	</body>
	</html>";
	}

echo "<table class='table table-dark table-striped'>";
echo "<tr><th>Nickname</th><th>Message</th><th>Date Posted</th></tr>";

while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row['nickname'];
	echo "</td><td>";
	echo $row['message'];
	echo "</td><td>";
	echo $row['dateposted'];
	echo "</td></tr>";
}
echo "</table>";

$conn->close();
?>