<?php
include 'connect3.php'; // Include your DB connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Invoice_ID'])) {
    $id = $_POST['Invoice_ID'];

    $sql = "DELETE FROM invoices WHERE Invoice_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
