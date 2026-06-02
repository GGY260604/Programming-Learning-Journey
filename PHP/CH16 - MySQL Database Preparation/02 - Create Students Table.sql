-- FILE: 02 - Create Students Table.sql
-- TOPIC: CH16 - MySQL Database Preparation

-- GOAL:
-- Create a students table for later PHP PDO examples.

-- IMPORTANT:
-- A table stores data in rows and columns.
-- Each row represents one record.
-- Each column represents one attribute of the record.

USE php_note_db;

-- DROP TABLE is optional for learning.
-- It removes the old students table before creating a new one.
-- This makes the example easy to reset while learning.
DROP TABLE IF EXISTS students;

CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    course VARCHAR(100) NOT NULL,
    year_level INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Explanation:
-- student_id:
--   The unique ID for each student.
--   AUTO_INCREMENT means MySQL automatically generates the next number.

-- student_name:
--   The name of the student.
--   NOT NULL means this column cannot be empty.

-- email:
--   The email address of the student.
--   UNIQUE means two students cannot use the same email.

-- course:
--   The course name of the student.

-- year_level:
--   The current year of study.

-- created_at:
--   The date and time when the record is inserted.
--   DEFAULT CURRENT_TIMESTAMP means MySQL automatically fills the current date and time.
