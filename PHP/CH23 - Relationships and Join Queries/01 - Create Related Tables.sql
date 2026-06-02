-- FILE: 01 - Create Related Tables.sql
-- TOPIC: CH23 - Relationships and Join Queries

-- GOAL:
-- This file prepares sample tables for learning relationships and JOIN queries.

-- HOW TO USE:
-- 1. Open phpMyAdmin.
-- 2. Select or create the database named php_note_db.
-- 3. Paste and run this SQL code.

CREATE DATABASE IF NOT EXISTS php_note_db;
USE php_note_db;

-- Drop child tables first because child tables depend on parent tables.
DROP TABLE IF EXISTS ch23_order_items;
DROP TABLE IF EXISTS ch23_orders;
DROP TABLE IF EXISTS ch23_students;
DROP TABLE IF EXISTS ch23_customers;
DROP TABLE IF EXISTS ch23_courses;

-- Parent table: one course can have many students.
CREATE TABLE ch23_courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    faculty VARCHAR(100) NOT NULL
);

-- Child table: each student can belong to one course.
CREATE TABLE ch23_students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    course_id INT NULL,
    FOREIGN KEY (course_id) REFERENCES ch23_courses(course_id)
        ON UPDATE CASCADE
        ON DELETE SET NULL
);

-- Parent table: one customer can have many orders.
CREATE TABLE ch23_customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Child table: each order belongs to one customer.
CREATE TABLE ch23_orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    order_date DATE NOT NULL,
    total_amount DECIMAL(10, 2) NOT NULL,
    order_status VARCHAR(30) NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES ch23_customers(customer_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

-- Grandchild table: one order can have many order items.
CREATE TABLE ch23_order_items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    unit_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES ch23_orders(order_id)
        ON UPDATE CASCADE
        ON DELETE CASCADE
);

INSERT INTO ch23_courses (course_name, faculty) VALUES
('Software Engineering', 'Faculty of Computing'),
('Data Engineering', 'Faculty of Computing'),
('Network and Security', 'Faculty of Computing'),
('Business Administration', 'Faculty of Management');

INSERT INTO ch23_students (student_name, email, course_id) VALUES
('Galen', 'galen@example.com', 1),
('Cleo', 'cleo@example.com', 1),
('Aina', 'aina@example.com', 2),
('Daniel', 'daniel@example.com', 3),
('Mei Ling', 'meiling@example.com', NULL);

INSERT INTO ch23_customers (customer_name, email) VALUES
('Ali Ahmad', 'ali@example.com'),
('Siti Aminah', 'siti@example.com'),
('John Tan', 'john@example.com'),
('Nora Lee', 'nora@example.com');

INSERT INTO ch23_orders (customer_id, order_date, total_amount, order_status) VALUES
(1, '2026-05-01', 25.50, 'Paid'),
(1, '2026-05-08', 42.00, 'Pending'),
(2, '2026-05-10', 18.90, 'Paid'),
(3, '2026-05-11', 65.40, 'Paid');

INSERT INTO ch23_order_items (order_id, product_name, quantity, unit_price) VALUES
(1, 'Chicken Burger', 1, 12.50),
(1, 'Iced Lemon Tea', 1, 4.00),
(1, 'Fries', 1, 9.00),
(2, 'Pizza Set', 2, 21.00),
(3, 'Nasi Lemak', 1, 8.90),
(3, 'Milo Ice', 2, 5.00),
(4, 'Combo Meal', 3, 21.80);

SELECT * FROM ch23_courses;
SELECT * FROM ch23_students;
SELECT * FROM ch23_customers;
SELECT * FROM ch23_orders;
SELECT * FROM ch23_order_items;
