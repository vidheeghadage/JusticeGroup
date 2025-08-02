<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "justice group";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$license_no = $_POST['License_No'];
$firstname = $_POST['Firstname'];
$lastname = $_POST['Lastname'];
$email = $_POST['Email'];
$phone = $_POST['Phone_no'];
$address = $_POST['Address'];
$specialization = $_POST['Specialization'];
$experience = $_POST['Experience'];

$sql = "UPDATE lawyers SET 
    Firstname = ?, 
    Lastname = ?, 
    Email = ?, 
    Phone_no = ?, 
    Address = ?, 
    Specialization = ?, 
    Experience = ?
WHERE License_No = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $firstname, $lastname, $email, $phone, $address, $specialization, $experience, $license_no);

if ($stmt->execute()) {
    echo "Record updated successfully.";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
