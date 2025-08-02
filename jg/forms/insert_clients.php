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
    $Client_ID  = isset($_POST['Client_ID']) ? $conn->real_escape_string($_POST['Client_ID']) : '';
    $Firstname  = isset($_POST['Firstname']) ? $conn->real_escape_string($_POST['Firstname']) : '';
    $Lastname   = isset($_POST['Lastname']) ? $conn->real_escape_string($_POST['Lastname']) : '';
    $Email      = isset($_POST['Email']) ? $conn->real_escape_string($_POST['Email']) : '';
    $Phone_no   = isset($_POST['Phone_no']) ? $conn->real_escape_string($_POST['Phone_no']) : '';
    $Address    = isset($_POST['Address']) ? $conn->real_escape_string($_POST['Address']) : '';
    $Case_Type  = isset($_POST['Case_Type']) ? $conn->real_escape_string($_POST['Case_Type']) : '';

    // SQL insert query
    $sql = "INSERT INTO clients (Client_ID, Firstname, Lastname, Email, Phone_no, Address, Case_Type)
            VALUES ('$Client_ID', '$Firstname', '$Lastname', '$Email', '$Phone_no', '$Address', '$Case_Type')";

    if ($conn->query($sql) === TRUE) {
        echo "New client enquiry submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No data submitted.";
}

$conn->close();
?>
