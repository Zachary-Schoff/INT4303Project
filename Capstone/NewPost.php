<?php
include 'Connection.php';

$userid = $_POST['nickname'];
$message = $_POST['post'];

$sql = "INSERT INTO post(message, file, userid)
VALUES ($message, $userid)";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Post was uploaded.";
  }
} else {
  echo "Something went wrong.";
}
$conn->close();
?>