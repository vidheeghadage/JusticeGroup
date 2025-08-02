<?php
session_start();
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "v2v");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $Username = trim($_POST['Username']);
    $Password = trim($_POST['Password']);

    $stmt = $conn->prepare("SELECT Password FROM login WHERE Username = ?");
    $stmt->bind_param("s", $Username);
    $stmt->execute();
    $stmt->store_result();

    // Check if username exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($Password, $hashed_password)) {
            $_SESSION['Username'] = $Username;
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Invalid username.";
    }

    $stmt->close();
    $conn->close();
}
?>