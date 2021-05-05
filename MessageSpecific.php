<?php
include 'Connection.php';
include 'Message.php';

session_start();

$userid = $_SESSION['user'];
$nickname = $_SESSION['nickname'];

$sqlsnag = "SELECT user.nickname, message.dateposted, message.message FROM messages LEFT JOIN user ON messages.senderid = user.userid WHERE receiverid LIKE '$sqlget'";

$sqlsnatch = "SELECT user.nickname FROM user LEFT JOIN messages ON messages.receiverid = user.userid";

$result = $conn->query($sqlsnag, $sqlsnatch);

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
			<a class='dash' href='message.php'>Messages</a>
			<a>
				<form class='dash' action = 'Search.php'>
					<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 100%; text-align: right; color: black;'>
					<input class='btn btn-outline-success' type='submit'>
				</form>
			</a>
		</div>
	</body>
	</html>");
echo "<h1 style = 'padding-bottom: 0'>Messages For: " . $nickname . "</h1>";
echo ("<table class='table table-dark table-striped' style = 'padding-top: 0'>
		<tr><th>To</th><th>From</th><th>Message</th><th>Date Sent</th></tr>");
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["nickname"] . "</td><td>" . $row["nickname"] . "</td><td>" . $row['message'] . "</td><td>" . $row['dateposted'] . "</td></tr>";
  }
} else {
  echo "0 results";
}
echo "</table>";

$conn->query($sqlget);

$conn->close();
?>