<?php

$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbName = "qrabiloo";

$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbName);

// Check if connection failed
if (!$conn) {
    die("Connection Failed: ".mysqli_connect_error());
}
?>