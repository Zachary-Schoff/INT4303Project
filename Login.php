<?php
include 'Connection.php';

$email = $_REQUEST["Email"];
$password = $_REQUEST["password"];

$sql = " SELECT * FROM user WHERE email = '$email' AND password = '$password';";

$result = $conn->query($sql);

if($result->num_rows = 0){
	echo "Login failed";
} else {
	echo "Login successful";
}
?>