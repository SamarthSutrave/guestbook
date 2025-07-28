<?php
$host = "localhost";
$user = "root"; // default XAMPP user
$pass = "";     // default empty password
$dbname = "guestbook_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
