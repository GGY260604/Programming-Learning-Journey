# CH26 - PHP and JSON API

This chapter teaches how PHP can be used to create simple JSON API endpoints.

A normal PHP page usually returns HTML to the browser. An API endpoint usually returns data, commonly in JSON format, so that JavaScript, mobile apps, or other systems can use the data.

## How to Run

1. Start Apache and MySQL in XAMPP.
2. Put the `PHP` folder inside `htdocs`.
3. Make sure you already created the `php_note_db` database and `students` table from CH16.
4. Open the files using `localhost`.
5. Example path:

```text
http://localhost/PHP/CH26%20-%20PHP%20and%20JSON%20API/01%20-%20Return%20JSON%20Response.php
```

## Files in This Chapter

| File | Main Concept | What You Learn |
|---|---|---|
| 01 - Return JSON Response.php | JSON response | How to return JSON from PHP using `header()` and `json_encode()`. |
| 02 - Read JSON Input.php | JSON request body | How to read raw JSON input using `php://input` and decode it with `json_decode()`. |
| 03 - API Select Data.php | API SELECT data | How to return database records as JSON using PDO. |
| 04 - API Insert Data.php | API INSERT data | How to insert JSON request data into MySQL using prepared statements. |
| 05 - API Error Response.php | API error format | How to return error messages with HTTP status codes and JSON. |
| 06 - Simple REST Style Routes.php | Simple API routing | How to use request method and query parameters to simulate REST-style routes. |

## Important API Concepts

| Concept | Meaning |
|---|---|
| JSON | A lightweight data format commonly used for APIs. |
| `header()` | Sends response information to the browser, such as content type. |
| `json_encode()` | Converts PHP arrays into JSON text. |
| `json_decode()` | Converts JSON text into PHP values. |
| `php://input` | Reads the raw request body sent to PHP. |
| HTTP status code | Tells the client whether the request succeeded or failed. |

## Testing POST JSON Requests

A normal browser address bar sends a GET request, not a POST JSON request.

For files that need POST JSON input, you can test them using tools such as:

```text
Postman
Insomnia
Thunder Client extension in VS Code
curl command
JavaScript fetch()
```

Example JSON body:

```json
{
    "student_name": "Galen",
    "email": "galen@example.com",
    "course": "Software Engineering",
    "year_level": 2
}
```

## Reminder

In an API file, the output is usually JSON only. That means you normally do not mix the final output with a full HTML page.
