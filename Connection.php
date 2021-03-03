<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "video_game_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link href = "Style.css" rel = "stylesheet">
</head>

<body>
</body>
</html>