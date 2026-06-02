<?php
/*
  FILE: 06 - Simple REST Style Routes.php
  TOPIC: CH26 - PHP and JSON API

  GOAL:
  - Learn the basic idea of REST-style API routing.
  - Learn how to check request method using $_SERVER["REQUEST_METHOD"].
  - Learn how one PHP file can handle multiple API actions.

  REQUIREMENT:
  - Run the CH16 SQL files first.
  - This file expects the php_note_db database and students table to exist.

  IMPORTANT:
  - This is a beginner-friendly routing demo.
  - Real projects usually use a router or framework.
*/

header("Content-Type: application/json; charset=utf-8");

require __DIR__ . "/includes/db.php";

function sendJsonResponse(int $statusCode, array $payload): void
{
    http_response_code($statusCode);
    echo json_encode($payload, JSON_PRETTY_PRINT);
    exit;
}

function readJsonBody(): array
{
    $rawJson = file_get_contents("php://input");
    $data = json_decode($rawJson, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        sendJsonResponse(400, [
            "status" => "error",
            "message" => "Invalid JSON format.",
            "json_error" => json_last_error_msg()
        ]);
    }

    if (!is_array($data)) {
        sendJsonResponse(400, [
            "status" => "error",
            "message" => "JSON body must be an object."
        ]);
    }

    return $data;
}

/*
  A REST-style API usually uses:
  - URL to represent resource
  - HTTP method to represent action

  This simple file uses query strings to simulate routes.

  Examples:
  GET  06 - Simple REST Style Routes.php?resource=students
  GET  06 - Simple REST Style Routes.php?resource=students&id=1
  POST 06 - Simple REST Style Routes.php?resource=students
*/

$method = $_SERVER["REQUEST_METHOD"];
$resource = $_GET["resource"] ?? "help";
$id = $_GET["id"] ?? null;

if ($resource === "help") {
    sendJsonResponse(200, [
        "status" => "success",
        "message" => "Simple REST-style routing demo.",
        "routes" => [
            "GET ?resource=students" => "Return all students.",
            "GET ?resource=students&id=1" => "Return one student by ID.",
            "POST ?resource=students" => "Insert a student using JSON body."
        ],
        "sample_post_json" => [
            "student_name" => "Galen",
            "email" => "galen.rest@example.com",
            "course" => "Software Engineering",
            "year_level" => 2
        ]
    ]);
}

if ($resource !== "students") {
    sendJsonResponse(404, [
        "status" => "error",
        "message" => "Resource not found. Only resource=students is available in this demo."
    ]);
}

try {
    if ($method === "GET" && $id !== null) {
        if (!ctype_digit($id)) {
            sendJsonResponse(400, [
                "status" => "error",
                "message" => "The id must be a positive integer."
            ]);
        }

        $sql = "SELECT student_id, student_name, email, course, year_level, created_at
                FROM students
                WHERE student_id = :id";

        $statement = $pdo->prepare($sql);
        $statement->execute(["id" => $id]);

        $student = $statement->fetch();

        if (!$student) {
            sendJsonResponse(404, [
                "status" => "error",
                "message" => "Student not found."
            ]);
        }

        sendJsonResponse(200, [
            "status" => "success",
            "message" => "One student was returned.",
            "data" => $student
        ]);
    }

    if ($method === "GET") {
        $sql = "SELECT student_id, student_name, email, course, year_level, created_at
                FROM students
                ORDER BY student_id ASC
                LIMIT 20";

        $statement = $pdo->query($sql);
        $students = $statement->fetchAll();

        sendJsonResponse(200, [
            "status" => "success",
            "message" => "Student list was returned.",
            "count" => count($students),
            "data" => $students
        ]);
    }

    if ($method === "POST") {
        $data = readJsonBody();

        $studentName = trim($data["student_name"] ?? "");
        $email = trim($data["email"] ?? "");
        $course = trim($data["course"] ?? "");
        $yearLevel = $data["year_level"] ?? null;

        $errors = [];

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
            sendJsonResponse(422, [
                "status" => "error",
                "message" => "Validation failed.",
                "errors" => $errors
            ]);
        }

        $sql = "INSERT INTO students (student_name, email, course, year_level)
                VALUES (:student_name, :email, :course, :year_level)";

        $statement = $pdo->prepare($sql);

        $statement->execute([
            "student_name" => $studentName,
            "email" => $email,
            "course" => $course,
            "year_level" => $yearLevel
        ]);

        sendJsonResponse(201, [
            "status" => "success",
            "message" => "Student was created through the REST-style route.",
            "data" => [
                "student_id" => (int) $pdo->lastInsertId(),
                "student_name" => $studentName,
                "email" => $email,
                "course" => $course,
                "year_level" => $yearLevel
            ]
        ]);
    }

    sendJsonResponse(405, [
        "status" => "error",
        "message" => "Method not allowed for this resource.",
        "allowed_methods" => ["GET", "POST"]
    ]);

} catch (PDOException $error) {
    sendJsonResponse(500, [
        "status" => "error",
        "message" => "Database operation failed.",
        "hint" => "Make sure the students table exists and the database connection is correct.",
        "debug_message" => $error->getMessage()
    ]);
}
