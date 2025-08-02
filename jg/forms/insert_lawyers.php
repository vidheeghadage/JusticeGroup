<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "justice group";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize POST data
    $License_No     = isset($_POST['License_No']) ? $conn->real_escape_string($_POST['License_No']) : '';
    $Firstname      = isset($_POST['Firstname']) ? $conn->real_escape_string($_POST['Firstname']) : '';
    $Lastname       = isset($_POST['Lastname']) ? $conn->real_escape_string($_POST['Lastname']) : '';
    $Email          = isset($_POST['Email']) ? $conn->real_escape_string($_POST['Email']) : '';
    $Phone_no       = isset($_POST['Phone_no']) ? $conn->real_escape_string($_POST['Phone_no']) : '';
    $Address        = isset($_POST['Address']) ? $conn->real_escape_string($_POST['Address']) : '';
    $Specialization = isset($_POST['Specialization']) ? $conn->real_escape_string($_POST['Specialization']) : '';
    $Experience     = isset($_POST['Experience']) ? $conn->real_escape_string($_POST['Experience']) : '';

    // SQL insert query
    $sql = "INSERT INTO lawyers (License_No, Firstname, Lastname, Email, Phone_no, Address, Specialization, Experience)
            VALUES ('$License_No', '$Firstname', '$Lastname', '$Email', '$Phone_no', '$Address', '$Specialization', '$Experience')";

    if ($conn->query($sql) === TRUE) {
        echo "New lawyer added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No data submitted.";
}

$conn->close();
?>
