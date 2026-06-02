<?php
/*
  FILE: includes/db.php
  TOPIC: CH19 - MySQL Insert Data

  GOAL:
  - Provide one reusable PDO connection function for this chapter.
  - Avoid repeating the connection code in every file.

  IMPORTANT:
  - This file does not display HTML.
  - It only returns a PDO connection object.
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
      These options make PDO easier and safer to use.
    */

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    return new PDO($dsn, $username, $password, $options);
}
