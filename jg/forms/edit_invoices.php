<?php
// edit_attorney.php
include 'connect3.php'; // Include your DB connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $invoice_id = $_POST['Invoice_ID'];
    $client_id = $_POST['Client_ID'];
    $date_issued = $_POST['DateIssued'];
    $due_date = $_POST['DueDate'];
    $total_amount = $_POST['TotalAmount'];
    $status = $_POST['Status'];

    $sql = "UPDATE invoices SET 
                Client_ID = ?, 
                DateIssued = ?, 
                DueDate = ?, 
                TotalAmount = ?, 
                Status = ?
            WHERE Invoice_ID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $client_id, $date_issued, $due_date, $total_amount, $status, $invoice_id);

    if ($stmt->execute()) {
        echo "Record updated successfully!";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
