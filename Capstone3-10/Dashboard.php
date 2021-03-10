<?php
include 'Connection.php';

$sqlget = "SELECT * FROM posts";
$sqldata = mysqli_query($conn,$sqlget) or die("Error getting data");

echo "<table>";
echo "<tr><th>userid</th><th>message</th></tr>";

while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row ['userid'];
	echo "</td><td>";
	echo $row['message'];
	echo "</td></tr>";
}

echo "</table>";
$conn->close();
?>