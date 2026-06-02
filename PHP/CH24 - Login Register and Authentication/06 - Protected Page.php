<?php
/*
  FILE: 06 - Protected Page.php
  TOPIC: CH24 - Protected Page with Session

  GOAL:
  - Allow only logged-in users to access this page.
  - Redirect guests back to the login page.

  IMPORTANT:
  - session_start() must be called before using $_SESSION.
  - A protected page checks whether login session data exists.
*/

session_start();

/*
  If the user has not logged in, the session value will not exist.

  We redirect the user to the login page and stop the script using exit.
*/
if (!isset($_SESSION["is_logged_in"]) || $_SESSION["is_logged_in"] !== true) {
    header("Location: 04 - Login Form.php?error=Please log in first");
    exit;
}

$username = $_SESSION["username"] ?? "Unknown User";
$email = $_SESSION["email"] ?? "Unknown Email";
$userId = $_SESSION["user_id"] ?? "Unknown ID";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH24 - Protected Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">

        <h1>CH24 - Protected Page</h1>

        <div class="box success">
            <h2>Access Granted</h2>

            <p>
                You can see this page because you have successfully logged in.
            </p>
        </div>

        <div class="box">
            <h2>Session Data</h2>

            <p><strong>User ID:</strong> <?= htmlspecialchars((string) $userId) ?></p>
            <p><strong>Username:</strong> <?= htmlspecialchars($username) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        </div>

        <div class="box info">
            <h2>How This Page Is Protected</h2>

            <p>
                At the top of this file, PHP checks whether this session value exists:
            </p>

            <pre>$_SESSION["is_logged_in"]</pre>

            <p>
                If the value does not exist or is not true, the user is redirected back to the login form.
            </p>
        </div>

        <p>
            <a class="button danger" href="07 - Logout.php">Logout</a>
        </p>

    </div>

</body>
</html>
