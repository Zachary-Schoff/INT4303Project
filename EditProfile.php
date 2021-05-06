<?php
include 'Connection.php';
session_start();

$bio = $_GET['bio'];
$username = $_GET['username'];
$userid = $_SESSION['user'];
$_SESSION["nick"] = $nickname;
$_SESSION["pic"] = $picture;
$_SESSION["bio"] = $bio;
$_SESSION["fname"] = $fname;
$_SESSION["lname"] = $lname;
$_SESSION["dob"] = $dob;
$sqlUpdate = "UPDATE user SET bio = '$bio', nickname = '$username' WHERE userid = '$userid'";

$result = $conn->query($sqlUpdate);
if($result){
	echo "
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
			<h1 class = 'header'>My Profile</h1>
			<h4> Profile Updated</h4>
			<form><input type='submit' value='Followed'></form></br>
			<a class='btn btn-secondary' href='EditProfile.php'>Edit Profile</a>
			<img src = '".$picture."' height='200' width='200' style = 'float: left; background-color: #31639C'>
			<table style = 'float: middle, width: auto'>
				<tr><td>
					<p>Nickname: ".$nickname."</p></br>
				</td></tr>
				<tr><td>
					<p>Name: ".$fname . ' ' . $lname."</p>
				</td></tr>
				<tr><td>
					<p>Bio: ".$bio."</p></br>
				</td></tr>
				<tr><td>
					<p>Birthday: ".$dob."</p></br>
				</td></tr>
				<tr><td>
					<h1>Following</h1></br>
				</td></tr>
				<tr><td>
					<p>Nickname: ".$fnickname."</p></br>
				</td></tr>
				<tr><td>
					<p>Real Name: ".$ffname . ' ' . $flname."</p></br>
				</td></tr>
			</table>
		</body>
		</html>";
	}
else{
	echo "
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
			<h1 class = 'header'>My Profile</h1>
			<h4>Something Went Wrong, Profile NOT Updated</h4>
			<form><input type='submit' value='Followed'></form></br>
			<a class='btn btn-secondary' href='EditProfile.php'>Edit Profile</a>
			<img src = '".$picture."' height='200' width='200' style = 'float: left; background-color: #31639C'>
			<table style = 'float: middle, width: auto'>
				<tr><td>
					<p>Nickname: ".$nickname."</p></br>
				</td></tr>
				<tr><td>
					<p>Name: ".$fname . ' ' . $lname."</p>
				</td></tr>
				<tr><td>
					<p>Bio: ".$bio."</p></br>
				</td></tr>
				<tr><td>
					<p>Birthday: ".$dob."</p></br>
				</td></tr>
				<tr><td>
					<h1>Following</h1></br>
				</td></tr>
				<tr><td>
					<p>Nickname: ".$fnickname."</p></br>
				</td></tr>
				<tr><td>
					<p>Real Name: ".$ffname . ' ' . $flname."</p></br>
				</td></tr>
			</table>
		</body>
		</html>";
	}
?>