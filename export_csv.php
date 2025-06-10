<?php
session_start();
require 'include/config.php'; // DB connection

// Restrict access to admins only
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Set headers to force download
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=inquiries_export.csv');

// Open output stream
$output = fopen('php://output', 'w');

// Output CSV headers
fputcsv($output, ['ID', 'Name', 'Email', 'Subject', 'Message', 'Interest Type', 'Created At']);

// Base query
$query = "SELECT * FROM inquiries WHERE 1=1";

// Apply type filter if provided
$typeFilter = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$params = [];
$types = "";

if (!empty($typeFilter)) {
    $query .= " AND interest_type = ?";
    $params[] = $typeFilter;
    $types .= "s";
}

$stmt = $conn->prepare($query);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();

$result = $stmt->get_result();

// Write each row to CSV
while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['id'],
        $row['name'],
        $row['email'],
        $row['subject'],
        $row['message'],
        $row['interest_type'],
        $row['created_at']
    ]);
}

fclose($output);
exit();
?>
