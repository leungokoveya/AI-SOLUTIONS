<?php
require 'include/config.php'; // database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);
    $interest = $_POST['interest_type'];

    // Basic validation
    if ($name && $email && $subject && $message && $interest) {
        $stmt = $conn->prepare("INSERT INTO inquiries (name, email, subject, message, interest_type) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $subject, $message, $interest);

        if ($stmt->execute()) {
            header("Location: index.php?status=success#inquiry");
        } else {
            header("Location: index.php?status=error#inquiry");
        }
    } else {
        header("Location: index.php?status=error#inquiry");
    }
    exit();
}
?>

