<?php
/*
  FILE: includes/db.php
  TOPIC: Reusable PDO Database Connection

  GOAL:
  - Store the database connection code in one reusable file.
  - Allow all examples in CH23 to include this file.

  IMPORTANT:
  - Change the username or password if your MySQL configuration is different.
*/

$host = "localhost";
$dbName = "php_note_db";
$username = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $error) {
    die("Database connection failed: " . htmlspecialchars($error->getMessage()));
}
?>
