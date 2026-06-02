<?php
/*
  FILE: 03 - API Select Data.php
  TOPIC: CH26 - PHP and JSON API

  GOAL:
  - Learn how to return MySQL records as JSON.
  - Learn how to use PDO SELECT in an API endpoint.
  - Learn how to optionally select one record by ID.

  REQUIREMENT:
  - Run the CH16 SQL files first.
  - This file expects the php_note_db database and students table to exist.
*/

header("Content-Type: application/json; charset=utf-8");

require __DIR__ . "/includes/db.php";

/*
  The id is optional.

  Example 1:
  03 - API Select Data.php
  - Return many students.

  Example 2:
  03 - API Select Data.php?id=1
  - Return one student.
*/

$id = $_GET["id"] ?? null;

try {
    if ($id !== null) {
        /*
          Validate the ID before using it.

          Even though prepared statements protect SQL structure,
          validation is still useful to make sure input format is correct.
        */

        if (!ctype_digit($id)) {
            http_response_code(400);

            echo json_encode([
                "status" => "error",
                "message" => "The id must be a positive integer."
            ], JSON_PRETTY_PRINT);

            exit;
        }

        $sql = "SELECT student_id, student_name, email, course, year_level, created_at
                FROM students
                WHERE student_id = :id";

        $statement = $pdo->prepare($sql);

        $statement->execute([
            "id" => $id
        ]);

        $student = $statement->fetch();

        if (!$student) {
            http_response_code(404);

            echo json_encode([
                "status" => "error",
                "message" => "Student not found."
            ], JSON_PRETTY_PRINT);

            exit;
        }

        echo json_encode([
            "status" => "success",
            "message" => "One student record was returned.",
            "data" => $student
        ], JSON_PRETTY_PRINT);

        exit;
    }

    /*
      If no id is given, return many students.

      LIMIT 20 is used to prevent the API from returning too much data at once.
    */

    $sql = "SELECT student_id, student_name, email, course, year_level, created_at
            FROM students
            ORDER BY student_id ASC
            LIMIT 20";

    $statement = $pdo->query($sql);
    $students = $statement->fetchAll();

    echo json_encode([
        "status" => "success",
        "message" => "Student records were returned.",
        "count" => count($students),
        "data" => $students
    ], JSON_PRETTY_PRINT);

} catch (PDOException $error) {
    http_response_code(500);

    echo json_encode([
        "status" => "error",
        "message" => "Failed to select data from database.",
        "hint" => "Make sure the students table exists by running CH16 SQL files.",
        "debug_message" => $error->getMessage()
    ], JSON_PRETTY_PRINT);
}
