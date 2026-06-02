<?php
/*
  FILE: includes/db.php
  TOPIC: CH20 - MySQL Update Data

  GOAL:
  - Provide one reusable PDO connection function for this chapter.
  - Avoid repeating the database connection code in every update example.

  IMPORTANT:
  - This file only contains backend connection logic.
  - It should be included by other PHP files using require_once.
*/

function getPDOConnection(): PDO
{
    /*
      These settings are for a common XAMPP setup.

      If your MySQL username or password is different,
      update the values below.
    */

    $host = "localhost";
    $dbName = "php_note_db";
    $username = "root";
    $password = "";

    /*
      DSN means Data Source Name.
      It tells PDO how to connect to the database.
    */

    $dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

    /*
      PDO options:
      - ERRMODE_EXCEPTION makes database errors easier to catch.
      - FETCH_ASSOC returns rows as associative arrays.
      - EMULATE_PREPARES false asks MySQL to use real prepared statements.
    */

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    return new PDO($dsn, $username, $password, $options);
}
