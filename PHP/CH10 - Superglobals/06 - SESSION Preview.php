<?php
/*
  FILE: 06 - SESSION Preview.php
  TOPIC: CH10 - Superglobals

  GOAL:
  - Learn what $_SESSION is.
  - Learn how to store temporary user data on the server side.

  IMPORTANT:
  - session_start() must be called before HTML output.
*/

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? "";

    if ($action === "save") {
        $_SESSION["student_name"] = $_POST["student_name"] ?? "";
        $_SESSION["course"] = $_POST["course"] ?? "";
    }

    if ($action === "clear_name") {
        unset($_SESSION["student_name"]);
    }

    if ($action === "destroy") {
        $_SESSION = [];
        session_destroy(); // Destroying the session will remove all session data and invalidate the session ID.
    }
}

$studentName = $_SESSION["student_name"] ?? "";
$course = $_SESSION["course"] ?? "";

$safeStudentName = htmlspecialchars($studentName);
$safeCourse = htmlspecialchars($course);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- FILE: 06 - SESSION Preview.php | Escaped example: &lt;?php echo $_SESSION["student_name"]; ?&gt; -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH10 - SESSION Preview</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>
    <div class="container">
        <h1>CH10 - $_SESSION Preview</h1>

        <div class="box">
            <h2>What is $_SESSION?</h2>
            <p>
                <code>$_SESSION</code> stores data across multiple page requests. The data is stored on the server side.
                To use sessions, you must call <code>session_start()</code> at the beginning of your script before any HTML output.
                Session data can be used to store temporary user information, such as login status or user preferences. The server
                will then associate this data with a unique session ID, which is typically stored in a cookie on the client's browser.
            </p>
        </div>

        <div class="box">
            <h2>Store Session Data</h2>
            <form method="post" action="">
                <input type="hidden" name="action" value="save">
                <label for="student_name">Student Name:</label>
                <input type="text" id="student_name" name="student_name" value="<?= $safeStudentName ?>">
                <label for="course">Course:</label>
                <input type="text" id="course" name="course" value="<?= $safeCourse ?>">
                <button type="submit">Save to Session</button>
            </form>
        </div>

        <div class="box output">
            <h2>Current Session Data</h2>
            <p><strong>Student Name:</strong> <?= $safeStudentName === "" ? "No name stored." : $safeStudentName ?></p>
            <p><strong>Course:</strong> <?= $safeCourse === "" ? "No course stored." : $safeCourse ?></p>
        </div>

        <div class="box">
            <h2>Session Actions</h2>
            <form method="post" action="">
                <input type="hidden" name="action" value="clear_name">
                <button type="submit">Clear Student Name Only</button>
            </form>
            <form method="post" action="">
                <input type="hidden" name="action" value="destroy">
                <button type="submit">Destroy Session</button>
            </form>
        </div>

        <div class="box warning">
            <h2>Important Reminder</h2>
            <p><code>session_start()</code> must be placed before any HTML output.</p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="05 - FILES Preview.php">&lsaquo; Previous: 05 - FILES Preview.php</a>
            <a class="next" href="07 - COOKIE Preview.php">Next: 07 - COOKIE Preview.php &rsaquo;</a>
        </nav>

    </div>
</body>
</html>
