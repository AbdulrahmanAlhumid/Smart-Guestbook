CREATE DATABASE smart_guestbook;

USE smart_guestbook;

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    comment TEXT NOT NULL,
    mood ENUM('happy', 'neutral', 'angry') NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
