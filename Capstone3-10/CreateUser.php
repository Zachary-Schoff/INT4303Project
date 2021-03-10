<?php
include 'Connection.php';

$sql = "SELECT * FROM user";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["userid"]. " - Name: " . $row["nickname"]. " " . $row["email"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>