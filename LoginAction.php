<?php
include 'Connection.php';

$email = $_REQUEST["Email"];
$password = $_REQUEST["password"];

$sql = " SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1;";

if ($result = $conn->query($sql)){
	while($row = $result->fetch_row()){
		// print_r($row);
		// echo("</br>");
		$uid = $row[0];
		$nickname = $row[1];
		$picture = "image/".$row[4];
		$bio = $row[5];
		$fname = $row[6];
		$lname = $row[7];
		$dob = $row[8];
		
		session_start();
		$_SESSION['user'] = $uid;
		$_SESSION['nick'] = $nickname;
		$_SESSION['pic'] = $picture;
		$_SESSION['bio'] = $bio;
		$_SESSION['fname'] = $fname;
		$_SESSION['lname'] = $lname;
		$_SESSION['dob'] = $dob;
		
		$followsql = "SELECT user.userid, following.followid, following.followerid FROM user JOIN following ON user.userid=following.followerid WHERE user.userid = $uid;";
		
		$fresult = $conn->query($followsql);
		
		if ($fresult->num_rows > 0){
			while($frow = $fresult->fetch_row()){
				$pullfollow = "SELECT * FROM user WHERE userid = $frow[1];";
				if ($lresult = $conn->query($pullfollow)){
					while($lrow = $lresult->fetch_row()){
						$fuid = $lrow[0];
						$fnickname = $lrow[1];
						$fpicture = "image/".$lrow[4];
						$fbio = $lrow[5];
						$ffname = $lrow[6];
						$flname = $lrow[7];
						$fdob = $lrow[8];
						
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
										<a class='dash' href='About.php'>About</a>
										<a class='dash' href='Logout.php'>Logout</a>
										<a style = 'width'>
											<form class='dash' action = 'SearchAction.php'>
												<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 70%; float: left'>
												<input class='btn btn-outline-success' type='submit' style='float: right'>
											</form>
										</a>
									</div>
									<h1>My Profile</h1><form><input type='submit' value='Followed'></form></br>
									<table>
										<tr><td>
											<img src = '".$picture."' height='200' width='200'/></br>
										</td><td>
											<p>Nickname: ".$nickname."</p></br>
										</td></tr>
										<tr><td>
											<p>First Name: ".$fname."</p></br>
										</td><td>
											<p>Last Name: ".$lname."</p></br>
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
											<p>First Name: ".$ffname."</p></br>
										</td><td>
											<p>Last Name: ".$flname."</p></br>
										</td></tr>
									</table>
									<br>
									<form method='post' action='Delete.php'>
										<input type='submit' value='Delete profile'>
									</form>
									</body>
							</html>"
						);
					}
				}
				else{
					echo("Something went wrong while attempting to pull follower info.");
				}
			}
		}
		else{
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
								<a class='dash' href='About.php'>About</a>
								<a class='dash' href='Logout.php'>Logout</a>
								<a style = 'width'>
									<form class='dash' action = 'SearchAction.php'>
										<input class='form-control me-2'  id = 'input' name = 'input' type='text' placeholder='Search' aria-label='Search' style = 'width: 70%; float: left'>
										<input class='btn btn-outline-success' type='submit' style='float: right'>
									</form>
								</a>
							</div>
						<h1>My Profile</h1><form method='post' action='Follow.php'><input type='submit' value='Follow'></form></br>
						<table>
							<tr><td>
								<img src = '".$picture."' height='200' width='200'/></br>
							</td></tr>
							<tr><td>
								<p>Nickname: ".$nickname."</p></br>
							</td></tr>
							<tr><td>
								<p>First Name: ".$fname."</p></br>
							</td><td>
								<p>Last Name: ".$lname."</p></br>
							</td></tr>
							<tr><td>
								<p>Bio: ".$bio."</p></br>
							</td></tr>
							<tr><td>
								<p>Birthday: ".$dob."</p></br>
							</td></tr>
						</table>
						<br>
						<form method='post' action='Delete.php'>
							<input type='submit' value='Delete profile'>
						</form>
					</body>
				</html>"
			);
		}
	}
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
		
		<p>That account does not exist. Please make sure your email and password are correct.</p>
		
		<form method='post' action='LoginAction.php'>
			<label for='username'>Email</label><br>
			<input type='text' id='Email' name='Email'><br>
			<label for='password'>Password</label><br>
			<input type='text' id='password' name='password'>
			<input type='submit' value='Login'>
		</form>
		<br>
		<form method='post' action='CreateUser.php'>
			<label>Don't have an account? Make one here</label>
			<input type='submit' value='Create Account'>
		</form>
	</body>
	</html>";
}
?>