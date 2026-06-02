<?php
/*
  FILE: 03 - Destroy Session.php
  TOPIC: CH12 - Sessions Cookies and Basic Login Concept

  GOAL:
  - Learn how to remove session values.
  - Learn the difference between unset() and session_destroy().
  - Understand the basic logout concept.
*/

session_start();

/*
  For demo purpose, create session data if it does not exist.
*/
if (!isset($_SESSION["demo_user"])) {
    $_SESSION["demo_user"] = "Galen";
    $_SESSION["login_status"] = "Logged in for demo";
}

$message = "Session data is currently available.";

/*
  unset($_SESSION["key"])
  - Removes one specific session value.
*/
if (isset($_GET["action"]) && $_GET["action"] === "unset_one") {
    unset($_SESSION["demo_user"]);
    $message = "Only the demo_user session value was removed.";
}

/*
  session_unset()
  - Removes all session variables in the current session.
*/
if (isset($_GET["action"]) && $_GET["action"] === "unset_all") {
    session_unset();
    $message = "All session variables were removed using session_unset().";
}

/*
  session_destroy()
  - Destroys the session data on the server.
  - Commonly used during logout.

  Note:
  After calling session_destroy(), $_SESSION may still show old values during
  the same request unless we also clear the $_SESSION array.
*/
if (isset($_GET["action"]) && $_GET["action"] === "destroy") {
    session_unset();
    session_destroy();
    $message = "The session was destroyed. This is similar to logging out.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
    <title>CH12 - Destroy Session</title>
</head>
<body>

    <div class="container">
        <h1>CH12 - Destroy Session</h1>

        <p>
            This file shows different ways to remove session data.
        </p>

        <div class="box output">
            <h2>Result</h2>

            <p><?= htmlspecialchars($message) ?></p>

            <h3>Current $_SESSION Data</h3>
            <pre><?php print_r($_SESSION); ?></pre>

            <a class="button" href="?action=unset_one">Unset One Value</a>
            <a class="button secondary" href="?action=unset_all">Unset All Values</a>
            <a class="button secondary" href="?action=destroy">Destroy Session</a>
            <a class="button" href="03%20-%20Destroy%20Session.php">Reload Demo</a>
        </div>

        <div class="box">
            <h2>Main Code</h2>

            <pre>unset($_SESSION["demo_user"]);
session_unset();
session_destroy();</pre>

            <p>
                In a login system, logout usually removes the login-related session values
                and then redirects the user back to the login page.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="02 - Store Session Data.php">&lsaquo; Previous: 02 - Store Session Data.php</a>
            <a class="next" href="04 - Create Cookie.php">Next: 04 - Create Cookie.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
