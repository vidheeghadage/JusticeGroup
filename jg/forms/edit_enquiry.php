<?php
require('connect3.php');

if (isset($_POST['Name'])) {
    $stmt = $conn->prepare("UPDATE enquiries SET Phone=?, Email=?, DOE=?, Reference=? WHERE Name=?");
    $stmt->bind_param("sssss", $_POST['Phone'], $_POST['Email'], $_POST['DOE'], $_POST['Reference'], $_POST['Name']);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
