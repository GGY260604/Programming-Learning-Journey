<?php
/*
  FILE: 02 - Read JSON Input.php
  TOPIC: CH26 - PHP and JSON API

  GOAL:
  - Learn how to read JSON data sent to PHP.
  - Learn how to use php://input.
  - Learn how to convert JSON into a PHP associative array.

  IMPORTANT:
  - A normal HTML form usually sends form data, not JSON.
  - API clients commonly send JSON in the request body.
  - To test this file properly, use Postman, Insomnia, Thunder Client, curl, or JavaScript fetch().
*/

header("Content-Type: application/json; charset=utf-8");

/*
  This file is mainly designed for POST requests.

  If the user opens this file directly in the browser, the method is GET.
  In that case, we return instructions instead of processing data.
*/

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode([
        "status" => "info",
        "message" => "Send a POST request with JSON body to test this file.",
        "sample_json_body" => [
            "student_name" => "Galen",
            "email" => "galen@example.com",
            "course" => "Software Engineering",
            "year_level" => 2
        ],
        "sample_curl" => "curl -X POST -H \"Content-Type: application/json\" -d '{\"student_name\":\"Galen\",\"email\":\"galen@example.com\",\"course\":\"Software Engineering\",\"year_level\":2}' http://localhost/PHP/CH26%20-%20PHP%20and%20JSON%20API/02%20-%20Read%20JSON%20Input.php"
    ], JSON_PRETTY_PRINT);

    exit;
}

/*
  php://input reads the raw request body.

  This is different from $_POST.

  $_POST:
  - Usually works with normal form submission.

  php://input:
  - Useful when the client sends raw JSON.
*/

$rawJson = file_get_contents("php://input");

if ($rawJson === "" || $rawJson === false) {
    http_response_code(400);

    echo json_encode([
        "status" => "error",
        "message" => "No JSON body was received."
    ], JSON_PRETTY_PRINT);

    exit;
}

/*
  json_decode($rawJson, true)
  means:
  - Convert JSON text into a PHP associative array.

  The second argument true is important.
  Without true, PHP returns an object instead of an associative array.
*/

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
  At this point, the JSON is valid.
  We can read values from the $data associative array.
*/

$response = [
    "status" => "success",
    "message" => "JSON input was received and decoded successfully.",
    "received_data" => $data,
    "example_access" => [
        "student_name" => $data["student_name"] ?? null,
        "email" => $data["email"] ?? null,
        "course" => $data["course"] ?? null,
        "year_level" => $data["year_level"] ?? null
    ]
];

echo json_encode($response, JSON_PRETTY_PRINT);
