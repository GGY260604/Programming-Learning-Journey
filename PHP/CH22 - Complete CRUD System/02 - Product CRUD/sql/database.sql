-- FILE: database.sql
-- TOPIC: CH22 - Product CRUD Database Setup

CREATE DATABASE IF NOT EXISTS php_note_db;
USE php_note_db;

CREATE TABLE IF NOT EXISTS products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(120) NOT NULL,
    category VARCHAR(80) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    stock_qty INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO products (product_name, category, price, stock_qty)
VALUES
('Chicken Burger', 'Food', 8.90, 20),
('Iced Lemon Tea', 'Drink', 3.50, 35),
('French Fries', 'Side Order', 4.90, 25);
