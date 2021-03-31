<?php
include 'Connection.php';

$email = $_REQUEST["Email"];
$password = $_REQUEST["password"];

$sql = " SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1;";

if ($result = $conn->query($sql)){
	while($row = $result->fetch_row()){
		// print_r($row);
		$uid = $row[0];
		$nickname = $row[1];
		$picture = "image/".$row[4];
		$bio = $row[5];
		$fname = $row[6];
		$lname = $row[7];
		$dob = $row[8];
		
		
		
		echo(
			"<html>
				<head>
					<meta charset='utf-8'>
					<title>Untitled Document</title>
					<link href = 'Style.css' rel = 'stylesheet'>
				</head>
				<body>
					<h1>My Profile</h1></br>
					<img src = '".$picture."' height='200' width='200'/></br>
					<p>Nickname: ".$nickname."</p></br>
					<p>First Name: ".$fname."</p></br>
					<p>Last Name: ".$lname."</p></br>
					<p>Bio: ".$bio."</p></br>
					<p>Birthday: ".$dob."</p></br>
				</body>
			</html>"
		);
	}
}
else{
	echo "That account does not exist. Please make sure your email and password are correct.";
}
?>