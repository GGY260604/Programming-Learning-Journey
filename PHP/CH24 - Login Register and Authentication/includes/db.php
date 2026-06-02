<?php
/*
  FILE: includes/db.php
  TOPIC: Reusable PDO Database Connection

  GOAL:
  - Keep the database connection code in one reusable file.
  - Allow other PHP files to include this file when they need MySQL.

  IMPORTANT:
  - This file does not display HTML.
  - It only creates the $pdo variable.
  - Other files can use $pdo to run SQL commands.
*/

$host = "localhost";
$dbName = "php_note_db";
$username = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);

    /*
      PDO::ERRMODE_EXCEPTION means PDO will throw an exception when
      a database error happens.
    */
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*
      PDO::FETCH_ASSOC means fetch() and fetchAll() will return associative arrays.

      Example:
      $user["email"] instead of $user[0]
    */
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $error) {
    /*
      For beginner learning, we show the error message.
      In a real public system, avoid showing detailed database errors to users.
    */
    die("Database connection failed: " . htmlspecialchars($error->getMessage()));
}
?>
