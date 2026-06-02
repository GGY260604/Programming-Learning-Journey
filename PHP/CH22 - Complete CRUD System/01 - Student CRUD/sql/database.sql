-- FILE: database.sql
-- TOPIC: CH22 - Student CRUD Database Setup

CREATE DATABASE IF NOT EXISTS php_note_db;
USE php_note_db;

CREATE TABLE IF NOT EXISTS students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    course VARCHAR(100) NOT NULL,
    year_level INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO students (student_name, email, course, year_level)
VALUES
('Ali Tan', 'ali@example.com', 'Software Engineering', 1),
('Siti Lim', 'siti@example.com', 'Data Engineering', 2),
('Galen Wong', 'galen@example.com', 'Software Engineering', 3);
