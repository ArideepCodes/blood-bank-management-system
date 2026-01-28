<?php
// Fetch form data
$name = $_POST['fullname'];
$number = $_POST['mobileno'];
$email = $_POST['emailid'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood'];
$address = $_POST['address'];

// Your live hosting credentials
$servername = "sql111.ezyro.com";
$username = "ezyro_40246659";
$password = "d1s7r9jg"; // Replace this with your actual vPanel password
$dbname = "ezyro_40246659_blood_db";

// Connect to live MySQL database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert donor data
$sql = "INSERT INTO donor_details (donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address)
        VALUES ('$name', '$number', '$email', '$age', '$gender', '$blood_group', '$address')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Donor added successfully!'); window.location.href='donor_list.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
