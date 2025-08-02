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
    $Case_ID     = isset($_POST['Case_ID']) ? $conn->real_escape_string($_POST['Case_ID']) : '';
    $Client_ID   = isset($_POST['Client_ID']) ? $conn->real_escape_string($_POST['Client_ID']) : '';
    $Case_Title  = isset($_POST['Case_Title']) ? $conn->real_escape_string($_POST['Case_Title']) : '';
    $Case_Type   = isset($_POST['Case_Type']) ? $conn->real_escape_string($_POST['Case_Type']) : '';
    $Attorney    = isset($_POST['Attorney']) ? $conn->real_escape_string($_POST['Attorney']) : '';
    $Status      = isset($_POST['Status']) ? $conn->real_escape_string($_POST['Status']) : '';
    $Description = isset($_POST['Description']) ? $conn->real_escape_string($_POST['Description']) : '';

    // SQL insert query
    $sql = "INSERT INTO cases (Case_ID, Client_ID, Case_Title, Case_Type, Attorney, Status, Description)
            VALUES ('$Case_ID', '$Client_ID', '$Case_Title', '$Case_Type', '$Attorney', '$Status', '$Description')";

    if ($conn->query($sql) === TRUE) {
        echo "New case record added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No data submitted.";
}

$conn->close();
?>
