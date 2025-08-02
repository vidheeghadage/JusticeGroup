<?php
// edit_attorney.php
include 'connect3.php'; // Include your DB connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['Attorney_ID'];
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $bar = $_POST['Bar_no'];
    $spec = $_POST['Specialization'];
    $phone = $_POST['Phone_no'];
    $email = $_POST['Email'];

    $sql = "UPDATE attorney SET 
                Firstname = ?, 
                Lastname = ?, 
                Bar_no = ?, 
                Specialization = ?, 
                Phone_no = ?, 
                Email = ?
            WHERE Attorney_ID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $firstname, $lastname, $bar, $spec, $phone, $email, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
