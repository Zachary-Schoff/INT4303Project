<?php
include 'Connection.php';

session_start();

$target_dir = "image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$imagename = $_FILES["fileToUpload"]["name"];

if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
  $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}

$fname = $_REQUEST['fname'];
$lname = $_REQUEST['lname'];
$email = $_REQUEST['email'];
$dob = $_REQUEST['dob'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$bio = $_REQUEST['bio'];

$sql = " CALL createuser('$fname', '$lname', '$email', '$dob', '$username', '$password', '$bio', '$imagename');";

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
			<h1 class = 'header'>LTU Interlink</h1>
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
			<form method='post' action='CreateUser.php' enctype='multipart/form-data'>
				<label>Username</label><br>
				<input type='text' id='username' name='username'><br>
				<label>Profile picture</label><br>
				<input type='file' id='fileToUpload' name='fileToUpload'><br>
				<label>Password</label><br>
				<input type='text' id='password' name='password'><br>
				<label>First Name</label><br>
				<input type='text' id='fname' name='fname'><br>
				<label>Last Name</label><br>
				<input type='text' id='lname' name='lname'><br>
				<label>Bio</label><br>
				<textarea id='bio' name='bio' rows='4' cols='32'></textarea><br>
				<label>Email</label><br>
				<input type='text' id='email' name='email'><br>
				<label>Date of Birth</label><br>
				<input type='date' id='dob' name='dob'><br>
				<input type='submit' name='submit' value='Submit'>
			</form>
		</body>
		</html>";
		}
	else{
		echo "<!doctype html>
		<html>
		<head>
		<meta charset='utf-8'>
		<title>Untitled Document</title>
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
			<form method='post' action='CreateUser.php' enctype='multipart/form-data'>
				<label>Username</label><br>
				<input type='text' id='username' name='username'><br>
				<label>Profile picture</label><br>
				<input type='file' id='fileToUpload' name='fileToUpload'><br>
				<label>Password</label><br>
				<input type='text' id='password' name='password'><br>
				<label>First Name</label><br>
				<input type='text' id='fname' name='fname'><br>
				<label>Last Name</label><br>
				<input type='text' id='lname' name='lname'><br>
				<label>Bio</label><br>
				<textarea id='bio' name='bio' rows='4' cols='32'></textarea><br>
				<label>Email</label><br>
				<input type='text' id='email' name='email'><br>
				<label>Date of Birth</label><br>
				<input type='date' id='dob' name='dob'><br>
				<input type='submit' name='submit' value='Submit'>
			</form>
		</body>
		</html>";
		}	
} else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>