<?php
include 'Connection.php';

$sqlget = "SELECT * FROM post ORDER BY dateposted ";
$sqldata = mysqli_query($conn,$sqlget) or die("Error getting data");

echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title>Untitled Document</title>
		<link href = 'Style.css' rel = 'stylesheet'>
		<link href = 'Dashboard.php'>
		<link href = 'Dashboard.php' rel = 'connection'>
	</head>

	<body>
		<h1 class = 'header'> LTU Resource</h1>
		<div class='topnav'>
			<a class='dash' href='Dashboard.html'>Dashboard</a>
			<a class='dash' href='News.html'>News</a>
			<a class='dash' href='Search.html'>Search</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.html'>About</a>
			<a class='dash' href='Login.html'>Login</a>
		</div>
		<h3 class='title'>Dashboard</h3>

		<button class = 'newpost' onClick= 'window.location.href='Login.html';'>Add Post</button>
	</body>
	</html>";

echo "<table>";
echo "<tr><th>dateposted</th><th>message</th></tr>";

while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row ['dateposted'];
	echo "</td><td>";
	echo $row['message'];
	echo "</td></tr>";
}
echo "</table>";

$conn->close();
?>