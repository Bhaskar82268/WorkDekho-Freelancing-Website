<?php
$servername = "sql212.infinityfree.com";  // Replace with your actual InfinityFree DB hostname
$username = "if0_38987397";       // Replace with your InfinityFree DB username
$password = "Bhaskar82268";    // Replace with your DB password
$database = "if0_38987397_workdekho"; // Replace with your DB name

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>