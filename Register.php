<?php
session_start();
require 'include/config.php';
require 'include/auth.php';
redirectIfLoggedIn();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $name     = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email    = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];
    $country  = trim(filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING));
    $phone    = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
    $company  = trim(filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING));

    // Validate
    if (empty($name) || empty($email) || empty($password) || empty($country)) {
        $error = 'Please fill all required fields';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email format';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match';
    } elseif (strlen($password) < 8) {
        $error = 'Password must be at least 8 characters';
    } else {
        // Check if user exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $error = 'Email already exists.';
        } else {
            // Insert user
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (name, email, password, country, phone, company) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $name, $email, $hashedPassword, $country, $phone, $company);
            if ($stmt->execute()) {
                $success = 'Registration successful! Redirecting to login...';
                header("Refresh: 2; url=login.php");
            } else {
                $error = 'Registration failed: ' . $stmt->error;
            }
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AI-Solutions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .form-title {
            color: #3d5a80;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <h2 class="form-title">Create Your Account</h2>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>

            <form method="POST" action="register.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name *</label>
                    <input type="text" class="form-control" id="name" name="name" required 
                           value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" class="form-control" id="email" name="email" required
                           value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Password * (min 8 characters)</label>
                    <input type="password" class="form-control" id="password" name="password" required minlength="8">
                </div>
                
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password *</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                
                <div class="mb-3">
                    <label for="country" class="form-label">Country *</label>
                    <select class="form-select" id="country" name="country" required>
                        <option value="">Select Country</option>
                        <option value="US" <?php echo (isset($country) && $country === 'US') ? 'selected' : ''; ?>>United States</option>
                        <option value="UK" <?php echo (isset($country) && $country === 'UK') ? 'selected' : ''; ?>>United Kingdom</option>
                        <option value="CA" <?php echo (isset($country) && $country === 'CA') ? 'selected' : ''; ?>>Canada</option>
                        <option value="AU" <?php echo (isset($country) && $country === 'AU') ? 'selected' : ''; ?>>Australia</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                           value="<?php echo isset($phone) ? htmlspecialchars($phone) : ''; ?>">
                </div>
                
                <div class="mb-3">
                    <label for="company" class="form-label">Company</label>
                    <input type="text" class="form-control" id="company" name="company"
                           value="<?php echo isset($company) ? htmlspecialchars($company) : ''; ?>">
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                
                <div class="mt-3 text-center">
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>