<?php
include 'Connection.php';

session_start();

$gname = $_REQUEST['groupname'];
$description = $_REQUEST['groupdesc'];

$imagedir = "images/";
$imagefile = $imagedir . basename($_FILES["grouppic"]["name"]);
$imageFileType = strtolower(pathinfo($imagefile, PATHINFO_EXTENSION));

if(isset($_POST["submit"])){
	$check = getimagesize($_FILES["grouppic"]["tmp_name"]);
	if($check !== false) {
		
	} else {
		echo "File selected is not an image: " . $check["mime"] . ".";
	}
}

$sql = " CALL creategroup('$gname', '$description', '$gname.$imageFileType');";

if($conn-> query($sql) === TRUE){
	
} else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}

if (isset($_SESSION["user"]) && !empty($_SESSION["user"])){
	echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title>Create an LTU Group</title>
		<link href = 'Style.css' rel = 'stylesheet'>
	</head>

	<body>
		<h1>LTU Resource</h1>
		<div class='topnav'>
			<a class='dash' href='Dashboard.php'>Dashboard</a>
			<a class='dash' href='News.php'>News</a>
			<a class='dash' href='Search.php'>Search</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Message.php'>Message</a>
			<a class='dash' href='Logout.php'>Logout</a>
		</div>
		<form method='post' action='CreateGroupAction.php' enctype='multipart/form-data'>
			<label>Group Name</label><br>
			<input type='text' id='groupname' name='groupname'><br>
			<label>Group Picture</label><br>
			<input type='file' id='grouppic' name='grouppic'><br>
			<label>Group Description</label><br>
			<textarea id='groupdesc' name='groupdesc' rows='4' cols='32'></textarea><br>
			<input type='submit' value='Submit'>
		</form>
	</body>
	</html>";
	}
else{
	echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title>Create an LTU Group</title>
		<link href = 'Style.css' rel = 'stylesheet'>
	</head>

	<body>
		<h1>LTU Resource</h1>
		<div class='topnav'>
			<a class='dash' href='Dashboard.php'>Dashboard</a>
			<a class='dash' href='News.php'>News</a>
			<a class='dash' href='Search.php'>Search</a>
			<a class='dash' href='Profile.html'>Profile</a>
			<a class='dash' href='About.php'>About</a>
			<a class='dash' href='Message.php'>Message</a>
			<a class='dash' href='Login.php'>Login</a>
		</div>
		<form method='post' action='CreateGroupAction.php' enctype='multipart/form-data'>
			<label>Group Name</label><br>
			<input type='text' id='groupname' name='groupname'><br>
			<label>Group Picture</label><br>
			<input type='file' id='grouppic' name='grouppic'><br>
			<label>Group Description</label><br>
			<textarea id='groupdesc' name='groupdesc' rows='4' cols='32'></textarea><br>
			<input type='submit' value='Submit'>
		</form>
	</body>
	</html>";
	}
$conn->close();
?>