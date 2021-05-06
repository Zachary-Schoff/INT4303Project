<?php
include 'Connection.php';

session_start();

$search = $_REQUEST['input'];
$sqlget = "SELECT post.message, post.dateposted, user.nickname FROM post LEFT JOIN user ON post.userid = user.userid WHERE message LIKE '%$search%'";
$sqlsnag = "SELECT nickname FROM user WHERE nickname LIKE '%$search%'";

$result = $conn->query($sqlget);
$result2 = $conn->query($sqlsnag);

if (isset($_SESSION["user"]) && !empty($_SESSION["user"])){
	echo "<!doctype html>
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
			<a class='das' href='News.php'>News</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Message.php'>Message</a>
			<a class='dash' href='Logout.php'>Logout</a>
			<a>
				<form class='dash' action = 'SearchAction.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 100%; text-align: right; color: black;'>
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
			<a class='dash' href='Message.php'>Message</a>
			<a class='dash' href='Login.php'>Login</a>
			<a>
				<form class='dash' action = 'SearchAction.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 100%; text-align: right; color: black;'>
					<input class='btn btn-outline-success' type='submit'>
				</form>
			</a>
		</div>
	</body>
	</html>";
	}

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "message" . $row["message"]. " - dateposted: " . $row["dateposted"]. " <br>";
  }
} else {
  echo "Posts- 0 results" . "<br>";
}
if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {
    echo "Users- " . $row["nickname"]. "<br>";
  }
} else {
  echo "Profiles- ". "0 results";
}
$conn->query($sqlget);

$conn->close();
?>