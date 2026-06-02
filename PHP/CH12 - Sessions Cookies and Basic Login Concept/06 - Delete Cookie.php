<?php
/*
  FILE: 06 - Delete Cookie.php
  TOPIC: CH12 - Sessions Cookies and Basic Login Concept

  GOAL:
  - Learn how to delete a cookie.
  - Understand that deleting a cookie means setting it to an expired time.
*/

$message = "No delete action has been performed yet.";

if (isset($_GET["delete"]) && $_GET["delete"] === "1") {
    /*
      To delete a cookie, use the same cookie name and path,
      but set the expiry time to the past.

      time() - 3600 means 1 hour ago.
    */
    setcookie("student_name", "", time() - 3600, "/");

    $message = "Cookie delete command has been sent to the browser.";
}

$currentCookieValue = $_COOKIE["student_name"] ?? "Cookie not found";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
    <title>CH12 - Delete Cookie</title>
</head>
<body>

    <div class="container">
        <h1>CH12 - Delete Cookie</h1>

        <p>
            This file shows how to delete a cookie by setting its expiry time to the past.
        </p>

        <div class="box output">
            <h2>Delete Result</h2>

            <p><?= htmlspecialchars($message) ?></p>
            <p><strong>Cookie value before browser refresh:</strong> <?= htmlspecialchars($currentCookieValue) ?></p>

            <a class="button" href="?delete=1">Delete Cookie</a>
            <a class="button secondary" href="05%20-%20Read%20Cookie.php">Go to Read Cookie Page</a>
        </div>

        <div class="box warning">
            <h2>Important Behavior</h2>

            <p>
                Like creating a cookie, deleting a cookie usually becomes clear after the next request.
                After clicking delete, open the read cookie page again to check the result.
            </p>
        </div>

        <div class="box">
            <h2>Main Code</h2>

            <pre>setcookie("student_name", "", time() - 3600, "/");</pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="05 - Read Cookie.php">&lsaquo; Previous: 05 - Read Cookie.php</a>
            <a class="next" href="07 - Simple Session Login Demo.php">Next: 07 - Simple Session Login Demo.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
