<?php
include 'Connection.php';

$email = $_REQUEST["Email"];
$password = $_REQUEST["password"];

$sql = " SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1;";

if ($result = $conn->query($sql)){
	while($row = $result->fetch_row()){
		print_r($row);
		$uid = $row[0];
		$nickname = $row[1];
		$picture = $row[4];
		$bio = $row[5];
		$fname = $row[6];
		$lname = $row[7];
		$dob = $row[8];
	}
}
else{
	echo "That account does not exist. Please make sure your email and password are correct.";
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
	<h1>My Profile</h1>
	<img src="image/$picture" alt = "Profile Picture">
</body>
</html>