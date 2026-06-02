<?php
/*
  FILE: 04 - API Insert Data.php
  TOPIC: CH26 - PHP and JSON API

  GOAL:
  - Learn how an API receives JSON input.
  - Learn how to validate JSON data.
  - Learn how to insert JSON data into MySQL using PDO prepared statements.

  REQUIREMENT:
  - Run the CH16 SQL files first.
  - This file expects the php_note_db database and students table to exist.
*/

header("Content-Type: application/json; charset=utf-8");

require __DIR__ . "/includes/db.php";

/*
  This API only accepts POST requests.

  GET is used only to show testing instructions.
*/

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);

    echo json_encode([
        "status" => "info",
        "message" => "This endpoint accepts POST requests with JSON body.",
        "sample_json_body" => [
            "student_name" => "Galen",
            "email" => "galen.api@example.com",
            "course" => "Software Engineering",
            "year_level" => 2
        ],
        "sample_curl" => "curl -X POST -H \"Content-Type: application/json\" -d '{\"student_name\":\"Galen\",\"email\":\"galen.api@example.com\",\"course\":\"Software Engineering\",\"year_level\":2}' http://localhost/PHP/CH26%20-%20PHP%20and%20JSON%20API/04%20-%20API%20Insert%20Data.php"
    ], JSON_PRETTY_PRINT);

    exit;
}

$rawJson = file_get_contents("php://input");
$data = json_decode($rawJson, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);

    echo json_encode([
        "status" => "error",
        "message" => "Invalid JSON format.",
        "json_error" => json_last_error_msg()
    ], JSON_PRETTY_PRINT);

    exit;
}

/*
  Get the values from the decoded JSON.

  trim() removes extra spaces at the beginning and end.
*/

$studentName = trim($data["student_name"] ?? "");
$email = trim($data["email"] ?? "");
$course = trim($data["course"] ?? "");
$yearLevel = $data["year_level"] ?? null;

$errors = [];

/*
  Validate the received data before inserting it into the database.
*/

if ($studentName === "") {
    $errors["student_name"] = "Student name is required.";
}

if ($email === "") {
    $errors["email"] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Email format is invalid.";
}

if ($course === "") {
    $errors["course"] = "Course is required.";
}

if (!is_int($yearLevel) && !ctype_digit((string) $yearLevel)) {
    $errors["year_level"] = "Year level must be a number.";
} else {
    $yearLevel = (int) $yearLevel;

    if ($yearLevel < 1 || $yearLevel > 5) {
        $errors["year_level"] = "Year level must be between 1 and 5.";
    }
}

if (!empty($errors)) {
    http_response_code(422);

    echo json_encode([
        "status" => "error",
        "message" => "Validation failed.",
        "errors" => $errors
    ], JSON_PRETTY_PRINT);

    exit;
}

try {
    $sql = "INSERT INTO students (student_name, email, course, year_level)
            VALUES (:student_name, :email, :course, :year_level)";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        "student_name" => $studentName,
        "email" => $email,
        "course" => $course,
        "year_level" => $yearLevel
    ]);

    $newStudentId = $pdo->lastInsertId();

    http_response_code(201);

    echo json_encode([
        "status" => "success",
        "message" => "Student was inserted successfully.",
        "data" => [
            "student_id" => (int) $newStudentId,
            "student_name" => $studentName,
            "email" => $email,
            "course" => $course,
            "year_level" => $yearLevel
        ]
    ], JSON_PRETTY_PRINT);

} catch (PDOException $error) {
    http_response_code(500);

    echo json_encode([
        "status" => "error",
        "message" => "Failed to insert data into database.",
        "hint" => "If the email already exists, try another email address.",
        "debug_message" => $error->getMessage()
    ], JSON_PRETTY_PRINT);
}
