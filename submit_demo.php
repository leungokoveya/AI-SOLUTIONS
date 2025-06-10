<?php

// Connect to the MySQL database
$conn = new mysqli("localhost", "root", "", "ai-sol");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and validate form inputs
$fullName = $conn->real_escape_string($_POST['fullName'] ?? '');
$email = $conn->real_escape_string($_POST['email'] ?? '');
$phone = $conn->real_escape_string($_POST['phone'] ?? '');
$company = $conn->real_escape_string($_POST['company'] ?? '');
$country = $conn->real_escape_string($_POST['country'] ?? '');
$interest = isset($_POST['interest']) ? implode(', ', (array)$_POST['interest']) : '';
$message = $conn->real_escape_string($_POST['message'] ?? '');
$joinEvents = isset($_POST['joinEvents']) ? 1 : 0;

// Insert into the database
$sql = "INSERT INTO demos (fullName, email, phone, company, country, interest, message, joinEvents) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssi", $fullName, $email, $phone, $company, $country, $interest, $message, $joinEvents);

if ($stmt->execute()) {
    echo "<h2>Thank you for booking a demo, $fullName!</h2>";
    echo "<p>We'll be in touch at <strong>$email</strong>.</p>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
