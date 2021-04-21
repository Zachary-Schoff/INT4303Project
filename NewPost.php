<?php
include 'Connection.php';
//require "Login.php";
session_start();

$message = $_POST['message'];
$userid = $_SESSION['user'];

$sql = "INSERT INTO post (message, userid) VALUES ('$message', $userid);";

$result = $conn->query($sql);

//if ($result->num_rows > 0) {
if (/*!empty(*/$result/*) || $result->num_rows >= 0*/) {
  // output data of each row
  //while($row = $result->fetch_assoc()) {
    echo "Post was uploaded.";
	echo $_SESSION["nick"]. $result;
  //}
} else {
  echo "Something went wrong.";
  echo $_SESSION["nick"];
}
$conn->close();

?>