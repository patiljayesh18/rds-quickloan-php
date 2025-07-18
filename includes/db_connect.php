<?php
$servername = "loanprospects.cc3g2myo0dxl.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "Admin123";
$dbname = "quickloan_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>