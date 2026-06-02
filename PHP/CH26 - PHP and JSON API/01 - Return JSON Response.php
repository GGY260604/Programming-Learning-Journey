<?php
/*
  FILE: 01 - Return JSON Response.php
  TOPIC: CH26 - PHP and JSON API

  GOAL:
  - Learn how to return JSON from PHP.
  - Learn why an API usually does not return a full HTML page.
  - Learn how PHP arrays become JSON objects and JSON arrays.

  IMPORTANT:
  - This file outputs JSON directly.
  - Because the output is JSON, this file does not use normal HTML layout.
  - Open this file in the browser and you will see JSON text.
*/

/*
  header() sends extra information about the response.

  Content-Type: application/json
  means:
  - Tell the browser or client that the response is JSON.

  charset=utf-8
  means:
  - The response supports many characters properly.
*/

header("Content-Type: application/json; charset=utf-8");

/*
  In PHP, an associative array can be converted into a JSON object.

  Example PHP associative array:
  [
      "name" => "Galen",
      "course" => "Software Engineering"
  ]

  Similar JSON object:
  {
      "name": "Galen",
      "course": "Software Engineering"
  }
*/

$student = [
    "student_id" => 1,
    "student_name" => "Galen",
    "email" => "galen@example.com",
    "course" => "Software Engineering",
    "year_level" => 2
];

/*
  A JSON API response usually has a clear structure.

  Common fields:
  - status: success or error
  - message: short explanation
  - data: actual result
*/

$response = [
    "status" => "success",
    "message" => "This is a JSON response from PHP.",
    "data" => $student,
    "notes" => [
        "json_encode converts PHP arrays into JSON text.",
        "JSON_PRETTY_PRINT makes the JSON easier to read while learning.",
        "In real APIs, the client usually reads this JSON using JavaScript fetch, mobile apps, or other backend systems."
    ]
];

/*
  json_encode() converts PHP data into JSON text.

  JSON_PRETTY_PRINT:
  - Makes the JSON output nicely indented.
  - Useful for learning and debugging.
*/

echo json_encode($response, JSON_PRETTY_PRINT);
