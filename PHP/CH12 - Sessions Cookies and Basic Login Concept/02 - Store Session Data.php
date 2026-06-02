<?php
/*
  FILE: 02 - Store Session Data.php
  TOPIC: CH12 - Sessions Cookies and Basic Login Concept

  GOAL:
  - Learn how to store data inside $_SESSION.
  - Learn how to read session data.
  - Understand that session data remains available after page refresh.

  IMPORTANT:
  - $_SESSION is an associative array.
  - We can create our own keys such as $_SESSION["username"].
*/

session_start();

/*
  If the user clicks the "Store Session Data" button, the URL will contain:
  ?action=store

  We use $_GET["action"] to check what the user wants to do.
*/
if (isset($_GET["action"]) && $_GET["action"] === "store") {
    $_SESSION["username"] = "Galen";
    $_SESSION["role"] = "Student";
    $_SESSION["chapter"] = "CH12";
}

/*
  If the user clicks the "Clear Session Data" button, we remove selected session values.
*/
if (isset($_GET["action"]) && $_GET["action"] === "clear") {
    unset($_SESSION["username"]);
    unset($_SESSION["role"]);
    unset($_SESSION["chapter"]);
}

/*
  Use null coalescing operator ?? to provide default values.

  It means:
  - Use $_SESSION["username"] if it exists.
  - Otherwise, use "Not stored yet".
*/
$username = $_SESSION["username"] ?? "Not stored yet";
$role = $_SESSION["role"] ?? "Not stored yet";
$chapter = $_SESSION["chapter"] ?? "Not stored yet";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
    <title>CH12 - Store Session Data</title>
</head>
<body>

    <div class="container">
        <h1>CH12 - Store Session Data</h1>

        <p>
            This file shows how to save values in <code>$_SESSION</code>.
        </p>

        <div class="box output">
            <h2>Current Session Values</h2>

            <table>
                <tr>
                    <th>Session Key</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>username</td>
                    <td><?= htmlspecialchars($username) ?></td>
                </tr>
                <tr>
                    <td>role</td>
                    <td><?= htmlspecialchars($role) ?></td>
                </tr>
                <tr>
                    <td>chapter</td>
                    <td><?= htmlspecialchars($chapter) ?></td>
                </tr>
            </table>

            <a class="button" href="?action=store">Store Session Data</a>
            <a class="button secondary" href="?action=clear">Clear Session Data</a>
        </div>

        <div class="box">
            <h2>Main Code</h2>

            <pre>$_SESSION["username"] = "Galen";</pre>

            <p>
                This stores a value in the session. After storing it, refresh the page.
                The value will still be available because it is stored in the session.
            </p>
        </div>

        <div class="box warning">
            <h2>Backend Concept</h2>

            <p>
                Login systems commonly use sessions to remember that a user is already logged in.
                For example, after login, we may store <code>$_SESSION["user_id"]</code>.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="01 - Start Session.php">&lsaquo; Previous: 01 - Start Session.php</a>
            <a class="next" href="03 - Destroy Session.php">Next: 03 - Destroy Session.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
