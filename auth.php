<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is already logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Redirect user if already logged in (with role check)
function redirectIfLoggedIn() {
    if (isLoggedIn()) {
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            header('Location: admin.php'); // Change to your admin dashboard file
        } else {
            header('Location: index.php'); // Regular user homepage
        }
        exit();
    }
}

// Validate login credentials
function loginUser($email, $password) {
    global $conn;

    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $name, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Store user details in session
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role === 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: index.php");
            }
            exit();
        }
    }

    return false;
}
