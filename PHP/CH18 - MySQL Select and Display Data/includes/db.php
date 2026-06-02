<?php
/*
  FILE: includes/db.php
  TOPIC: CH18 - MySQL Select and Display Data

  GOAL:
  - Store reusable PDO connection logic.
  - Allow all files in this chapter to connect to the same database.
  - Avoid repeating the same database connection code in every file.

  IMPORTANT:
  - This file is not designed to be opened directly in the browser.
  - Other PHP files should load it using require_once.
*/

function getPDOConnection(): PDO
{
    /*
      These values match the default XAMPP MySQL setup.

      If your MySQL account is different, update these values.
    */
    $host = "localhost";
    $dbName = "php_note_db";
    $username = "root";
    $password = "";

    /*
      The DSN tells PDO which database driver, host, database name,
      and character set to use.
    */
    $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

    /*
      Create the PDO object.
    */
    $pdo = new PDO($dsn, $username, $password);

    /*
      Make PDO throw exceptions when an SQL or connection error happens.
    */
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    /*
      Return rows as associative arrays by default.

      Example:
      $student["student_name"]
    */
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $pdo;
}
