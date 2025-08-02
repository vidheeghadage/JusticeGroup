<?php
include 'connect3.php'; // Include your DB connection file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect and sanitize POST data
    $Name   = isset($_POST['Name']) ? $conn->real_escape_string($_POST['Name']) : '';
    $Phone     = isset($_POST['Phone']) ? $conn->real_escape_string($_POST['Phone']) : '';
    $Email      = isset($_POST['Email']) ? $conn->real_escape_string($_POST['Email']) : '';
    $DOE        = isset($_POST['DOE']) ? $conn->real_escape_string($_POST['DOE']) : '';
    $Reference= isset($_POST['Reference']) ? $conn->real_escape_string($_POST['Reference']) : '';

    // SQL insert query
    $sql = "INSERT INTO enquiries (Name, Phone, Email, DOE, Reference)
            VALUES ('$Name', '$Phone', '$Email', '$DOE', '$Reference')";

    if ($conn->query($sql) === TRUE) {
        echo "New enquiry added successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No data submitted.";
}

$conn->close();
?>
