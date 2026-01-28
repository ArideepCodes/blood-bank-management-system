<?php
$servername = "sql111.ezyro.com";        // MySQL Host Name
$username   = "ezyro_40246659";          // MySQL User Name
$password   = "CHANGE_ME";               // DB password removed for GitHub
$dbname     = "ezyro_40246659_blood_db"; // MySQL DB Name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
