<?php
$hostname = "localhost";
$username = "root";
$password = "ua2nqvgc";
$database = "painel_gtc";

$conn = mysqli_connect($hostname, $username, $password ,$database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
