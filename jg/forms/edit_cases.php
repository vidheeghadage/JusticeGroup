<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "justice group";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$case_id = $_POST['Case_ID'];
$client_id = $_POST['Client_ID'];
$case_title = $_POST['Case_Title'];
$case_type = $_POST['Case_Type'];
$attorney = $_POST['Attorney'];
$status = $_POST['Status'];
$description = $_POST['Description'];

$sql = "UPDATE cases SET 
    Client_ID = ?, 
    Case_Title = ?, 
    Case_Type = ?, 
    Attorney = ?, 
    Status = ?, 
    Description = ? 
    WHERE Case_ID = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $client_id, $case_title, $case_type, $attorney, $status, $description, $case_id);

if ($stmt->execute()) {
    echo "Case updated successfully!";
} else {
    echo "Error updating case: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
