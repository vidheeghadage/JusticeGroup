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
    $Attorney_ID   = isset($_POST['Attorney_ID']) ? $conn->real_escape_string($_POST['Attorney_ID']) : '';
    $Firstname     = isset($_POST['Firstname']) ? $conn->real_escape_string($_POST['Firstname']) : '';
    $Lastname      = isset($_POST['Lastname']) ? $conn->real_escape_string($_POST['Lastname']) : '';
    $Bar_no        = isset($_POST['Bar_no']) ? $conn->real_escape_string($_POST['Bar_no']) : '';
    $Specialization= isset($_POST['Specialization']) ? $conn->real_escape_string($_POST['Specialization']) : '';
    $Phone_no      = isset($_POST['Phone_no']) ? $conn->real_escape_string($_POST['Phone_no']) : '';
    $Email         = isset($_POST['Email']) ? $conn->real_escape_string($_POST['Email']) : '';

    // SQL insert query
    $sql = "INSERT INTO attorney (Attorney_ID, Firstname, Lastname, Bar_no, Specialization, Phone_no, Email)
            VALUES ('$Attorney_ID', '$Firstname', '$Lastname', '$Bar_no', '$Specialization', '$Phone_no', '$Email')";

    if ($conn->query($sql) === TRUE) {
        echo "New attorney added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No data submitted.";
}

$conn->close();
?>
