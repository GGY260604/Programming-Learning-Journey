<?php
/*
  FILE: includes/db.php
  TOPIC: CH22 - Product CRUD Database Connection

  GOAL:
  - Store reusable PDO connection code in one file.
  - Allow all Product CRUD pages to reuse the same database connection.
  - Automatically create the products table if it does not exist.

  IMPORTANT:
  - The database named php_note_db must already exist.
  - This file creates the table, not the database.
  - Other pages can use $pdo after requiring this file.
*/

$host = "localhost";
$dbName = "php_note_db";
$username = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    $createTableSql = "
        CREATE TABLE IF NOT EXISTS products (
            product_id INT AUTO_INCREMENT PRIMARY KEY,
            product_name VARCHAR(120) NOT NULL,
            category VARCHAR(80) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            stock_qty INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

    $pdo->exec($createTableSql);

} catch (PDOException $error) {
    die("Database connection failed: " . htmlspecialchars($error->getMessage(), ENT_QUOTES, "UTF-8"));
}
