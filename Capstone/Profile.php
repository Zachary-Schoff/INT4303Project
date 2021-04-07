<?php
include 'Connection.php';
include 'Style.css';

$sqlget = "SELECT * FROM user";
$sqldata = mysqli_query($conn,$sqlget) or die("Error getting data");

$sqlget = "SELECT * FROM post";
$sqldata = mysqli_query($conn,$sqlget) or die("Error getting data");

echo "<table>";
echo "<tr><th></th><th>message</th></tr>";
while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row ['userid'] ['dateposted'];
	echo "</td><td>";
	echo $row['message'];
	echo "</td></tr>";
}

echo "<table>";
echo "<tr><th>userid</th><th>message</th></tr>";

while ($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row ['userid'];
	echo "</td><td>";
	echo $row['message'];
	echo "</td><td>";
	echo $row['dateposted'];
	echo "</td></tr>";
}

echo "</table>";
$conn->close();
?>