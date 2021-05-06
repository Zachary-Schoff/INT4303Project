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
			<h1 class='header'>LTU Interlink</h1>
			<div class='topnav'>
				<a class='dash' href='Dashboard.php'>Dashboard</a>
				<a class='dash' href='CreateGroup.php'>Groups</a>
				<a class='dash' href='Search.php'>Search</a>
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
			<form method='post' action='CreateGroupAction.php' enctype='multipart/form-data'>
				<label>The form below will allow you to create your own group for whatever you want, if you want to join an existing group, please search for it using the search bar on any page.</label><br><br>
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
	<title>LTU Interlink</title>
		<link href='//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
		<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
		<link href = 'Style.css' rel = 'stylesheet'>
	</head>

	<body>
		<h1 class='header'>LTU Interlink</h1>
		<div class='topnav'>
			<a class='dash' href='Dashboard.php'>Dashboard</a>
			<a class='dash' href='CreateGroup.php'>Groups</a>
			<a class='dash' href='Search.php'>Search</a>
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
		<form method='post' action='CreateGroupAction.php' enctype='multipart/form-data'>
			<label>The form below will allow you to create your own group for whatever you want, if you want to join an existing group, please search for it using the search bar on any page.</label><br><br>
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
} else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>