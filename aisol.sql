CREATE DATABASE aisol CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    company VARCHAR(100),
    country VARCHAR(50) NOT NULL,
role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'super_admin') DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    description TEXT,
    date_time DATETIME NOT NULL,
    location VARCHAR(200),
    max_attendees INT
);

CREATE TABLE event_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    event_id INT NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE,
    UNIQUE KEY (user_id, event_id)
);

CREATE TABLE inquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    interest_type ENUM('virtual-assistant', 'prototyping', 'both') NOT NULL,
    status ENUM('pending', 'responded', 'resolved') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT NOT NULL,
    title VARCHAR(200) NOT NULL,
    type ENUM('customers', 'events', 'inquiries') NOT NULL,
    parameters JSON,
    generated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    download_url VARCHAR(255),
    FOREIGN KEY (admin_id) REFERENCES admins(id)
);

CREATE TABLE emails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT NOT NULL,
    user_id INT NOT NULL,
    subject VARCHAR(200) NOT NULL,
    content TEXT NOT NULL,
    sent_at TIMESTAMP NULL,
    status ENUM('draft', 'sent', 'failed') DEFAULT 'draft',
    FOREIGN KEY (admin_id) REFERENCES admins(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

Create Table demos
(


    id INT AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    company VARCHAR(100),
    country VARCHAR(50) NOT NULL,
    interest VARCHAR(100),
    message TEXT,
    joinEvents BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO inquiries (user_id, subject, message, interest_type, status, created_at)
SELECT 1, 'Demo Booking: ' || interest, message, 'both', 'pending', created_at
FROM demos;
-- Sample admin (password: Admin123)
INSERT INTO admins (username, password_hash, full_name, email) 
VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin User', 'admin@aisolutions.com');

ALTER TABLE inquiries
ADD COLUMN name VARCHAR(100),
ADD COLUMN email VARCHAR(100)NOT NULL UNIQUE;
