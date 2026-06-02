<?php
/*
  FILE: includes/db.php
  TOPIC: CH17 - PDO MySQL Connection

  GOAL:
  - Store reusable database connection code in one file.
  - Allow other PHP files to include this file using require_once.
  - Avoid repeating the same connection code again and again.

  IMPORTANT:
  - This file is not meant to be opened directly in the browser.
  - Other PHP files should include this file.
  - Later CRUD chapters will reuse this same idea.
*/

/*
  Database configuration values.

  For default XAMPP MySQL:
  - host is usually localhost
  - username is usually root
  - password is usually empty
*/
const DB_HOST = "localhost";
const DB_NAME = "php_note_db";
const DB_USER = "root";
const DB_PASS = "";

/*
  This function creates and returns a PDO connection object.

  Why use a function?
  - It makes the connection reusable.
  - It keeps database connection logic in one place.
  - Other files can simply call getDatabaseConnection().
*/
function getDatabaseConnection(): PDO
{
    /*
      DSN means Data Source Name.

      The DSN tells PDO:
      - use the MySQL driver
      - connect to localhost
      - use the php_note_db database
      - use the utf8mb4 character set
    */
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";

    /*
      These options configure the PDO connection.
    */
    $options = [
        /*
          Make PDO throw exceptions when an error happens.
          This allows try-catch to catch database problems.
        */
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

        /*
          Make SELECT results return associative arrays by default.
          Example: $student["student_name"]
        */
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

        /*
          Use real prepared statements when possible.
        */
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    /*
      Create and return the PDO object.

      If the connection fails, PDO will throw a PDOException.
      The file that calls this function can catch that exception.
    */
    return new PDO($dsn, DB_USER, DB_PASS, $options);
}
