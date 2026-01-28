<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
$servername = "sql111.ezyro.com";
$username   = "ezyro_40246659";
$password   = "d1s7r9jg"; // use the new password you just created
$dbname     = "ezyro_40246659_blood_db";

// Connect to MySQL
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get POST data
$name        = $_POST['fullname'] ?? '';
$number      = $_POST['mobileno'] ?? '';
$email       = $_POST['emailid'] ?? '';
$age         = $_POST['age'] ?? '';
$gender      = $_POST['gender'] ?? '';
$blood_group = $_POST['blood'] ?? '';
$address     = $_POST['address'] ?? '';

if (empty($name) || empty($number) || empty($age) || empty($gender) || empty($blood_group) || empty($address)) {
    echo "<script>alert('Please fill all required fields.'); window.history.back();</script>";
    exit;
}

// Insert data
$sql = "INSERT INTO donor_details 
(donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address)
VALUES ('$name', '$number', '$email', '$age', '$gender', '$blood_group', '$address')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Thank you! Donor details added successfully.'); window.location.href='donate_blood.php';</script>";
} else {
    echo 'Error: ' . mysqli_error($conn);
}

mysqli_close($conn);
?>
