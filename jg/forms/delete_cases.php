<?php
include 'connect3.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['Case_ID'];

    $sql = "DELETE FROM cases WHERE Case_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);

    if ($stmt->execute()) {
        echo "Case deleted successfully!";
    } else {
        echo "Error deleting case: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
