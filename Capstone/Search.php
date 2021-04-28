<?php
include 'Connection.php';

$search = $_REQUEST['input'];
$sqlget = "SELECT post.message, post.dateposted, user.nickname FROM post LEFT JOIN user ON post.userid = user.userid WHERE message LIKE '%$search%'";
$sqlsnag = "SELECT nickname, fname, lname FROM user WHERE nickname LIKE '%$search%'";

$result = $conn->query($sqlget);
$result2 = $conn->query($sqlsnag);

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
			<a style = 'width'>
				<form class='dash' action = 'Search.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 70%; float: left'>
					<input class='btn btn-outline-success' type='submit' style='float: right'>
				</form>
			</a>
		</div>
	</body>
	</html>");
echo "<h1 style = 'padding-bottom: 0'>Search Results For " . $search. "</h1>";
echo ("<table class='table table-dark table-striped' style = 'padding-top: 0'>
		<tr><th>Message</th><th>Date Posted</th><th>Posted By</th></tr>");
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["message"]. "</td><td>" . $row["dateposted"]. "</td><td>" . $row["nickname"]. "</td></tr>";
  }
} else {
  echo "0 results";
}
echo "</table>";
echo "<h1>Users</h1>";
echo "<table class='table table-dark table-striped'>";
echo "<tr><th>Nickname</th><th>Name</th></tr>";
if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {
    echo "<tr><td>" . $row["nickname"]. "</td><td>" . $row["fname"]. $row["lname"]. "</td></tr>";
  }
} else {
  echo "0 results";
}
$conn->query($sqlget);

$conn->close();
?>