<?php
/*
  FILE: 07 - Simple Session Login Demo.php
  TOPIC: CH12 - Sessions Cookies and Basic Login Concept

  GOAL:
  - Build a simple login demo using sessions.
  - Understand how a login state can be stored in $_SESSION.
  - Learn the basic idea of protected content.

  IMPORTANT:
  - This is only a learning demo.
  - The username and password are hard-coded in this file.
  - A real system should store users in a database and hash passwords.
*/

session_start();

/*
  Hard-coded login data for this demo.

  Later, in the MySQL authentication chapter, these data will come from database.
*/
$correctUsername = "admin";
$correctPassword = "12345";

$message = "";
$error = "";

/*
  Logout logic.

  When the URL contains ?action=logout, remove the login session values.
*/
if (isset($_GET["action"]) && $_GET["action"] === "logout") {
    unset($_SESSION["is_logged_in"]);
    unset($_SESSION["username"]);
    $message = "You have logged out successfully.";
}

/*
  Login logic.

  This block runs only when the form is submitted with method="post".
*/
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    /*
      Check whether the submitted username and password are correct.
    */
    if ($username === $correctUsername && $password === $correctPassword) {
        $_SESSION["is_logged_in"] = true;
        $_SESSION["username"] = $username;
        $message = "Login successful.";
    } else {
        $error = "Invalid username or password.";
    }
}

/*
  Check current login status.
*/
$isLoggedIn = $_SESSION["is_logged_in"] ?? false;
$currentUsername = $_SESSION["username"] ?? "Guest";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
    <title>CH12 - Simple Session Login Demo</title>
</head>
<body>

    <div class="container">
        <h1>CH12 - Simple Session Login Demo</h1>

        <p>
            This file demonstrates a basic login concept using <code>$_SESSION</code>.
        </p>

        <?php if ($message !== "") { ?>
            <div class="box success">
                <p><?= htmlspecialchars($message) ?></p>
            </div>
        <?php } ?>

        <?php if ($error !== "") { ?>
            <div class="box error">
                <p><?= htmlspecialchars($error) ?></p>
            </div>
        <?php } ?>

        <div class="box output">
            <h2>Current Status</h2>

            <?php if ($isLoggedIn) { ?>

                <p><strong>Status:</strong> Logged in</p>
                <p><strong>Username:</strong> <?= htmlspecialchars($currentUsername) ?></p>

                <div class="box success">
                    <h3>Protected Content</h3>
                    <p>
                        You can see this section because the session says you are logged in.
                    </p>
                </div>

                <a class="button secondary" href="?action=logout">Logout</a>

            <?php } else { ?>

                <p><strong>Status:</strong> Not logged in</p>

                <form method="post" action="">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Try admin">

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Try 12345">

                    <button type="submit">Login</button>
                </form>

            <?php } ?>
        </div>

        <div class="box">
            <h2>Main Login Idea</h2>

            <pre>$_SESSION["is_logged_in"] = true;
$_SESSION["username"] = $username;</pre>

            <p>
                After successful login, we store login-related data in the session.
                Other pages can check this session data to decide whether the user
                is allowed to access protected content.
            </p>
        </div>

        <div class="box warning">
            <h2>Security Reminder</h2>

            <p>
                This example is intentionally simple. In real backend systems,
                passwords should not be hard-coded. Passwords should be stored in
                the database using <code>password_hash()</code> and verified using
                <code>password_verify()</code>.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="06 - Delete Cookie.php">&lsaquo; Previous: 06 - Delete Cookie.php</a>
            <a class="next" href="../CH13 - File Handling/01 - Read Text File.php">Next: 01 - Read Text File.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
