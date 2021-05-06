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
					<title>LTU Interlink</title>
					<link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
					<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
					<link href = 'Style.css' rel = 'stylesheet'>
				</head>
				<body>
					<h1 class = 'header'>LTU Interlink</h1>
					<div class='topnav'>
						<a class='dash' href='Dashboard.php'>Dashboard</a>
						<a class='dash' href='CreateGroup.php'>Groups</a>
						<a class='dash' href='Profile.html'>Profile</a>
						<a class='dash' href='Login.php'>Login</a>
						<a style = 'width'>
							<form class='dash' action = 'SearchAction.php'>
								<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 70%; float: left'>
								<input class='btn btn-outline-success' type='submit' style='float: right'>
							</form>
						</a>
					</div>
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