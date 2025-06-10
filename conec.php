<?php
try {
    $pdo = new PDO("mysql:host=localhost", "root", "");
    echo "Connected successfully to MySQL server!";
    
    // Check if database exists
    $stmt = $pdo->query("SHOW DATABASES LIKE 'aisol'");
    echo $stmt->rowCount() ? "\nDatabase exists!" : "\nDatabase doesn't exist!";
    
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

