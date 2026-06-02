<?php
/*
  FILE: 05 - API Error Response.php
  TOPIC: CH26 - PHP and JSON API

  GOAL:
  - Learn how to return JSON error responses.
  - Learn how to use HTTP status codes in PHP.
  - Learn how to keep API response format consistent.

  IMPORTANT:
  - APIs should not only return success responses.
  - APIs should also return clear error responses when something goes wrong.
*/

header("Content-Type: application/json; charset=utf-8");

/*
  This helper function sends a JSON response and stops the script.

  Functions like this help us avoid repeating the same response code many times.
*/

function sendJsonResponse(int $statusCode, array $payload): void
{
    http_response_code($statusCode);
    echo json_encode($payload, JSON_PRETTY_PRINT);
    exit;
}

/*
  The type query string is used to simulate different API errors.

  Try opening:
  05 - API Error Response.php?type=validation
  05 - API Error Response.php?type=not-found
  05 - API Error Response.php?type=method
  05 - API Error Response.php?type=server
*/

$type = $_GET["type"] ?? "help";

if ($type === "validation") {
    sendJsonResponse(422, [
        "status" => "error",
        "message" => "Validation failed.",
        "errors" => [
            "email" => "Email format is invalid.",
            "year_level" => "Year level must be between 1 and 5."
        ]
    ]);
}

if ($type === "not-found") {
    sendJsonResponse(404, [
        "status" => "error",
        "message" => "The requested resource was not found."
    ]);
}

if ($type === "method") {
    sendJsonResponse(405, [
        "status" => "error",
        "message" => "This endpoint does not allow the current request method.",
        "allowed_methods" => ["GET", "POST"]
    ]);
}

if ($type === "server") {
    sendJsonResponse(500, [
        "status" => "error",
        "message" => "Something went wrong on the server.",
        "note" => "In a real production API, avoid showing detailed internal error messages to users."
    ]);
}

/*
  Default response when no valid type is given.
*/

sendJsonResponse(200, [
    "status" => "success",
    "message" => "Choose an error type to simulate.",
    "available_examples" => [
        "?type=validation" => "Returns 422 validation error.",
        "?type=not-found" => "Returns 404 not found error.",
        "?type=method" => "Returns 405 method not allowed error.",
        "?type=server" => "Returns 500 server error."
    ],
    "common_status_codes" => [
        "200" => "OK / success",
        "201" => "Created successfully",
        "400" => "Bad request",
        "404" => "Not found",
        "405" => "Method not allowed",
        "422" => "Validation failed",
        "500" => "Server error"
    ]
]);
