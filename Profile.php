<?php
include 'Connection.php';
include 'Style.css';

$sqlget = "SELECT * FROM user";
$sqldata = mysqli_query($conn,$sqlget) or die("Error getting data");

$sqlget = "SELECT * FROM post";
$sqldata = mysqli_query($conn,$sqlget) or die("Error getting data");

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
			<a class='das' href='News.html'>News</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.html'>About</a>
			<a class='dash' href='Login.html'>Login</a>
			<a>
				<form class='dash' action = 'Search.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 100%; text-align: right'>
					<input class='btn btn-outline-success' type='submit'>
				</form>
			</a>
		</div>
	</body>
	</html>";

echo "<table>";
echo "<tr><th></th><th>message</th></tr>";
while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row ['userid'] ['dateposted'];
	echo "</td><td>";
	echo $row['message'];
	echo "</td></tr>";
}

echo "<table>";
echo "<tr><th>userid</th><th>message</th></tr>";

while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row ['userid'];
	echo "</td><td>";
	echo $row['message'];
	echo "</td><td>";
	echo $row['dateposted'];
	echo "</td></tr>";
}

echo "</table>";
$conn->close();
?>