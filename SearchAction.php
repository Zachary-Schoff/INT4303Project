<?php
include 'Connection.php';

session_start();

$search = $_REQUEST['input'];
$sql = " SELECT post.message, post.dateposted, user.nickname FROM post LEFT JOIN user ON post.userid = user.userid WHERE message LIKE '%$search%';";
$sql2 = " SELECT * FROM user WHERE nickname LIKE '%$search%';";
$sql3 = " SELECT * FROM usergroup WHERE gname LIKE '%$search%';";

$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

if (isset($_SESSION["user"]) && !empty($_SESSION["user"])){
	echo "<!doctype html>
	<html>
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
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Logout.php'>Logout</a>
			<a style = 'width'>
				<form class='dash' action = 'SearchAction.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 70%; float: left'>
					<input class='btn btn-outline-success' type='submit' style='float: right'>
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
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Login.php'>Login</a>
			<a style = 'width'>
				<form class='dash' action = 'SearchAction.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 70%; float: left'>
					<input class='btn btn-outline-success' type='submit' style='float: right'>
				</form>
			</a>
		</div>
	</body>
	</html>";
	}
echo "<h3>Posts</h3>";
echo "<table class='table table-dark table-striped'>";
echo "<tr><th>Message</th><th>Date Posted</th><th>By</th></tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row['message'];
	echo "</td><td>";
	echo $row['dateposted'];
	echo "</td><td>";
	echo $row['nickname'];
	echo "</td></tr>";
}
echo "</table><br>";
echo "<h3>Users</h3>";
echo "<table class='table table-dark table-striped'>";
echo "<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Bio</th><th>Birth date</th></tr>";
while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row['nickname'];
	echo "</td><td>";
	echo $row['fname'];
	echo "</td><td>";
	echo $row['lname'];
	echo "</td><td>";
	echo $row['bio'];
	echo "</td><td>";
	echo $row['dob'];
	echo "</td></tr>";
}
echo "</table><br>";
echo "<h3>Groups</h3>";
echo "<table class='table table-dark table-striped'>";
echo "<tr><th>Group Name</th><th>Group Description</th></tr>";
while ($row = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row['gname'];
	echo "</td><td>";
	echo $row['gdescription'];
	echo "</td><tr>";
}
echo "</table>";
/*
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
    echo "message" . $row["message"]. " - dateposted: " . $row["dateposted"]. " <br>";
  }
} else {
  echo "Posts- 0 results" . "<br>";
}
if ($result2->num_rows > 0) {
  while($row = $result2->fetch_assoc()) {
    echo "User: " . $row["nickname"]. "<br>";
  }
} else {
  echo "Users: ". "0 results" . "<br>";
}
if ($result3->num_rows > 0) {
  while($row = $result3->fetch_assoc()) {
    echo "Group: " . $row["gname"]. "<br>";
  }
} else {
  echo "Groups: ". "0 results" . "<br>";
}
*/
$conn->close();
?>