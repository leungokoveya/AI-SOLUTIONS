<?php
session_start();
require 'include/config.php'; // DB connection

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'include/PHPMailer/src/Exception.php';
require 'include/PHPMailer/src/PHPMailer.php';
require 'include/PHPMailer/src/SMTP.php';

// Restrict access to admins only
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

// Fetch report counts
$totalUsers = $conn->query("SELECT COUNT(*) AS total FROM users")->fetch_assoc()['total'];
$totalInquiries = $conn->query("SELECT COUNT(*) AS total FROM inquiries")->fetch_assoc()['total'];
$totalDemos = $conn->query("SELECT COUNT(*) AS total FROM demos")->fetch_assoc()['total'];

// Handle email sending
$emailStatus = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_email'])) {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'leungokoveya@gmail.com'; // Change this
        $mail->Password = '12345678';    // Change this
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('leungokoveya@gmail.com', 'AI-Solutions');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = nl2br(htmlspecialchars($message));

        $mail->send();
        $emailStatus = "<p class='text-green-600'>Email sent successfully!</p>";
    } catch (Exception $e) {
        $emailStatus = "<p class='text-red-600'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
    }
}

// Search/filter
$search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';
$typeFilter = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? '';

$query = "SELECT  * FROM inquiries WHERE 1=1";
$params = [];
$types = "";

if (!empty($search)) {
    $query .= " AND (i.subject LIKE ? OR u.email LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $types .= "ss";
}
if (!empty($typeFilter)) {
    $query .= " AND i.interest_type = ?";
    $params[] = $typeFilter;
    $types .= "s";
}

$stmt = $conn->prepare($query);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$inquiries = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-700 p-4 text-white flex justify-between">
        <div class="text-xl font-bold">Admin Dashboard</div>
        <div>
            <a href="admin.php" class="mr-4">Dashboard</a>
            <a href="logout.php" class="bg-red-600 px-3 py-1 rounded">Logout</a>
        </div>
    </nav>

    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-4">Reports</h2>
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-white p-4 shadow rounded text-center">Total Users: <?= $totalUsers ?></div>
            <div class="bg-white p-4 shadow rounded text-center">Inquiries: <?= $totalInquiries ?></div>
            <div class="bg-white p-4 shadow rounded text-center">Demo Bookings: <?= $totalDemos ?></div>
        </div>

        <h2 class="text-xl font-semibold mb-2">Search Inquiries</h2>
        <form method="GET" class="mb-4 flex flex-wrap gap-2">
            <input type="text" name="search" placeholder="Search by subject or email" 
                   class="border p-2 rounded w-64" value="<?= htmlspecialchars($search) ?>">

            <select name="type" class="border p-2 rounded">
                <option value="">All Types</option>
                <option value="virtual-assistant" <?= $typeFilter === 'virtual-assistant' ? 'selected' : '' ?>>Virtual Assistant</option>
                <option value="prototyping" <?= $typeFilter === 'prototyping' ? 'selected' : '' ?>>Prototyping</option>
                <option value="both" <?= $typeFilter === 'both' ? 'selected' : '' ?>>Both</option>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>

            <?php if ($inquiries->num_rows > 0): ?>
                <a href="export_csv.php?type=<?= urlencode($typeFilter) ?>"
                   class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 ml-2">
                   Download CSV
                </a>
            <?php endif; ?>
        </form>

        <table class="min-w-full bg-white shadow rounded mb-6">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">User</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Subject</th>
                    <th class="py-2 px-4 border-b">Message</th>
                    <th class="py-2 px-4 border-b">Interest</th>
                    <th class="py-2 px-4 border-b">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $inquiries->fetch_assoc()): ?>
                    <tr>
                        <td class="border px-4 py-2"><?= htmlspecialchars($row['name']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($row['email']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($row['subject']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($row['message']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($row['interest_type']) ?></td>
                        <td class="border px-4 py-2"><?= $row['created_at'] ?></td>
                    </tr>
                <?php endwhile; ?>
                <?php if ($inquiries->num_rows === 0): ?>
                    <tr>
                        <td colspan="6" class="text-center py-4">No inquiries found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <h2 class="text-xl font-semibold mb-2">Send Email</h2>
        <?= $emailStatus ?>
        <form method="POST" class="bg-white p-4 rounded shadow">
            <label>Email To:</label><br>
            <input type="email" name="to" class="border p-2 rounded w-full" required><br>
            <label>Subject:</label><br>
            <input type="text" name="subject" class="border p-2 rounded w-full" required><br>
            <label>Message:</label><br>
            <textarea name="message" class="border p-2 rounded w-full" required></textarea><br>
            <button type="submit" name="send_email" class="mt-2 bg-blue-600 text-white px-4 py-2 rounded">Send Email</button>
        </form>
    </div>
</body>
</html>
