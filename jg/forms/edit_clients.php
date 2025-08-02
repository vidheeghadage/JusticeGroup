<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "justice group";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['Client_ID'];
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone_no'];
    $address = $_POST['Address'];
    $case_type = $_POST['Case_Type'];

    $sql = "UPDATE clients SET 
                Firstname = ?, 
                Lastname = ?, 
                Email = ?,
                Phone_no = ?,
                Address = ?, 
                Case_Type = ?
            WHERE Client_ID = ?"; 

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $firstname, $lastname, $email, $phone, $address, $case_type, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
