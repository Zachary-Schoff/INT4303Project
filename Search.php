<?php
include 'Connection.php';

$search = $_REQUEST['input'];
$sqlget = "SELECT message, dateposted FROM post WHERE message LIKE '%$search%'";
$result = $conn->query($sqlget);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "message" . $row["message"]. " - dateposted: " . $row["dateposted"]. " <br>";
  }
} else {
  echo "0 results";
}
$conn->query($sqlget);

$conn->close();
?>