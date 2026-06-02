<?php
/*
  FILE: 05 - Read Cookie.php
  TOPIC: CH12 - Sessions Cookies and Basic Login Concept

  GOAL:
  - Learn how to read cookies using $_COOKIE.
  - Understand that $_COOKIE is an associative array.
*/

/*
  $_COOKIE["student_name"] reads the cookie named student_name.

  We use ?? to avoid an error when the cookie does not exist.
*/
$studentName = $_COOKIE["student_name"] ?? "Cookie not found";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
    <title>CH12 - Read Cookie</title>
</head>
<body>

    <div class="container">
        <h1>CH12 - Read Cookie</h1>

        <p>
            This file reads a cookie from the browser using <code>$_COOKIE</code>.
        </p>

        <div class="box output">
            <h2>Cookie Value</h2>

            <p><strong>student_name:</strong> <?= htmlspecialchars($studentName) ?></p>

            <a class="button" href="04%20-%20Create%20Cookie.php?create=1">Create Cookie</a>
            <a class="button secondary" href="06%20-%20Delete%20Cookie.php?delete=1">Delete Cookie</a>
        </div>

        <div class="box">
            <h2>Main Code</h2>

            <pre>$studentName = $_COOKIE["student_name"] ?? "Cookie not found";</pre>

            <p>
                <code>$_COOKIE</code> is an associative array where the key is the cookie name.
            </p>
        </div>

        <div class="box warning">
            <h2>Security Reminder</h2>

            <p>
                Cookie values come from the browser, so you should not blindly trust them.
                When displaying cookie values in HTML, use <code>htmlspecialchars()</code>.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="04 - Create Cookie.php">&lsaquo; Previous: 04 - Create Cookie.php</a>
            <a class="next" href="06 - Delete Cookie.php">Next: 06 - Delete Cookie.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
