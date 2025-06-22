<?php
$host = "localhost";
$dbname = "smart_guestbook";
$user = "root";
$pass = "";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
