<?php
include 'Connection.php';

$email = $_REQUEST["Email"];
$password = $_REQUEST["password"];

$sql = " SELECT * FROM user WHERE email = '$email' AND password = '$password' LIMIT 1;";

if ($result = $conn->query($sql)){
	while($row = $result->fetch_row()){
		print_r($row);
		echo("</br>");
		$uid = $row[0];
		$nickname = $row[1];
		$picture = "image/".$row[4];
		$bio = $row[5];
		$fname = $row[6];
		$lname = $row[7];
		$dob = $row[8];
		
		session_start();
		$_SESSION["user"] = $uid;
		$_SESSION["nick"] = $nickname;
		$_SESSION["pic"] = $picture;
		$_SESSION["bio"] = $bio;
		$_SESSION["fname"] = $fname;
		$_SESSION["lname"] = $lname;
		$_SESSION["dob"] = $dob;
		
		$followsql = "SELECT user.userid, following.followid, following.followerid FROM user JOIN following ON user.userid=following.followerid WHERE user.userid = $uid;";
		
		if ($fresult = $conn->query($followsql)){
			while($frow = $fresult->fetch_row()){
				print_r($frow);
				echo("</br>");
				$pullfollow = "SELECT * FROM user WHERE userid = $frow[1];";
				if ($lresult = $conn->query($pullfollow)){
					while($lrow = $lresult->fetch_row()){
						print_r($lrow);
						echo("</br>");
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
									<title>Untitled Document</title>
									<link href = 'Style.css' rel = 'stylesheet'>
								</head>
								<body>
									<h1>My Profile</h1><form><input type='submit' value='Followed'></form></br>
									<img src = '".$picture."' height='200' width='200'/></br>
									<p>Nickname: ".$nickname."</p></br>
									<p>First Name: ".$fname."</p></br>
									<p>Last Name: ".$lname."</p></br>
									<p>Bio: ".$bio."</p></br>
									<p>Birthday: ".$dob."</p></br>
									<h1>Following</h1></br>
									<img src = '".$fpicture."' height='200' width='200'/></br>
									<p>Nickname: ".$fnickname."</p></br>
									<p>First Name: ".$ffname."</p></br>
									<p>Last Name: ".$flname."</p></br>
									<p>Bio: ".$fbio."</p></br>
									<p>Birthday: ".$fdob."</p></br>
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
						<title>Untitled Document</title>
						<link href = 'Style.css' rel = 'stylesheet'>
					</head>
					<body>
						<h1>My Profile</h1><form method='post' action='Follow.php'><input type='submit' value='Follow'></form></br>
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
}
else{
	echo "That account does not exist. Please make sure your email and password are correct.";
}
?>