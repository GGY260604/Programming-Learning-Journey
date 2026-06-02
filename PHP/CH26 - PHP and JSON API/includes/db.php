<?php
/*
  FILE: includes/db.php
  TOPIC: CH26 - PHP and JSON API

  GOAL:
  - Create a reusable PDO connection for API examples.
  - Return JSON error response if the database connection fails.

  IMPORTANT:
  - This file is included by API endpoint files.
  - It should not print normal HTML.
  - API files should return JSON, so database errors are also returned as JSON.
*/

$host = "localhost";
$dbName = "php_note_db";
$username = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $error) {
    http_response_code(500);
    header("Content-Type: application/json; charset=utf-8");

    echo json_encode([
        "status" => "error",
        "message" => "Database connection failed.",
        "hint" => "Check whether MySQL is running and whether the php_note_db database exists.",
        "debug_message" => $error->getMessage()
    ], JSON_PRETTY_PRINT);

    exit;
}
