<?php
/*
  FILE: includes/db.php
  TOPIC: CH22 - Student CRUD Database Connection

  GOAL:
  - Store reusable PDO connection code in one file.
  - Allow all Student CRUD pages to reuse the same database connection.
  - Automatically create the students table if it does not exist.

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
    /*
      The fourth argument is an options array.

      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      - Makes PDO throw errors as exceptions.

      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
      - Makes fetch() and fetchAll() return associative arrays by default.
    */

    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);

    /*
      This creates the students table automatically if it does not exist.
      This makes the example easier to run for learning.
    */

    $createTableSql = "
        CREATE TABLE IF NOT EXISTS students (
            student_id INT AUTO_INCREMENT PRIMARY KEY,
            student_name VARCHAR(100) NOT NULL,
            email VARCHAR(150) NOT NULL,
            course VARCHAR(100) NOT NULL,
            year_level INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";

    $pdo->exec($createTableSql);

} catch (PDOException $error) {
    /*
      In a real production system, detailed error messages should usually be
      logged instead of displayed to normal users.
    */

    die("Database connection failed: " . htmlspecialchars($error->getMessage(), ENT_QUOTES, "UTF-8"));
}
