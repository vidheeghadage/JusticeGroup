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
    $Invoice_ID  = isset($_POST['Invoice_ID']) ? $conn->real_escape_string($_POST['Invoice_ID']) : '';
    $Client_ID   = isset($_POST['Client_ID']) ? $conn->real_escape_string($_POST['Client_ID']) : '';
    $DateIssued  = isset($_POST['DateIssued']) ? $conn->real_escape_string($_POST['DateIssued']) : '';
    $DueDate     = isset($_POST['DueDate']) ? $conn->real_escape_string($_POST['DueDate']) : '';
    $TotalAmount = isset($_POST['TotalAmount']) ? $conn->real_escape_string($_POST['TotalAmount']) : '';
    $Status      = isset($_POST['Status']) ? $conn->real_escape_string($_POST['Status']) : '';

    // SQL insert query
    $sql = "INSERT INTO invoices (Invoice_ID, Client_ID, DateIssued, DueDate, TotalAmount, Status)
            VALUES ('$Invoice_ID', '$Client_ID', '$DateIssued', '$DueDate', '$TotalAmount', '$Status')";

    if ($conn->query($sql) === TRUE) {
        echo "New invoice added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No data submitted.";
}

$conn->close();
?>
