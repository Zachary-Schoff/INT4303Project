<?php
include 'Connection.php';

session_start();

$uid = $_SESSION["user"];;
$nickname = $_SESSION["nick"];
$picture = $_SESSION["pic"];
$bio = $_SESSION["bio"];
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$dob = $_SESSION["dob"];

$sql = "INSERT INTO following VALUES (9, $uid);";

if($conn-> query($sql) === TRUE){
	echo (
			"<html>
				<head>
					<meta charset='utf-8'>
					<title>Untitled Document</title>
					<link href = 'Style.css' rel = 'stylesheet'>
				</head>
				<body>
					<h1>My Profile</h1><form><input type='submit' value='Followed'></form></br>
					<img src = '".$picture."' height='200' width='200'/></br>
					<p>Nickname: ".$nickname."</p></br>
					<p>First Name: ".$fname."</p></br>
					<p>Last Name: ".$lname."</p></br>
					<p>Bio: ".$bio."</p></br>
					<p>Birthday: ".$dob."</p></br>
				</body>
			</html>"
	);
} else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}

?>