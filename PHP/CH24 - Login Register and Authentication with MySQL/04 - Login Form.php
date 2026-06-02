<?php
/*
  FILE: 04 - Login Form.php
  TOPIC: CH24 - Login Form

  GOAL:
  - Create a login form.
  - Submit email and password to a backend verification file.

  IMPORTANT:
  - Login usually checks identity using email and password.
  - The password entered by the user will be compared with the hashed password in database.
*/

session_start();

$message = $_GET["message"] ?? "";
$error = $_GET["error"] ?? "";

/*
  If the user is already logged in, we can show a shortcut message.
*/
$isLoggedIn = isset($_SESSION["user_id"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH24 - Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH24 - Login Form</h1>

        <p>
            This page displays a login form.
            The submitted email and password will be checked in MySQL.
        </p>

        <?php if ($message !== "") { ?>
            <div class="box success">
                <strong>Message:</strong>
                <?= htmlspecialchars($message) ?>
            </div>
        <?php } ?>

        <?php if ($error !== "") { ?>
            <div class="box error">
                <strong>Error:</strong>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php } ?>

        <?php if ($isLoggedIn) { ?>
            <div class="box info">
                You are already logged in as
                <strong><?= htmlspecialchars($_SESSION["username"] ?? "Unknown User") ?></strong>.
                You can open the protected page directly.
            </div>
        <?php } ?>

        <div class="box">
            <h2>Login Form</h2>

            <form action="05 - Verify Password.php" method="POST">

                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your registered email"
                    required
                >

                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    required
                >

                <button type="submit">Login</button>
            </form>
        </div>

        <div class="box info">
            <h2>Learning Notes</h2>

            <ul>
                <li>This form sends login data using POST.</li>
                <li>The next file will find the user by email.</li>
                <li>Then PHP uses <code>password_verify()</code> to check the password.</li>
                <li>If login is successful, PHP stores user data in <code>$_SESSION</code>.</li>
            </ul>
        </div>

        <p>
            <a class="button secondary" href="02 - Register Form.php">Go to Register Form</a>
            <a class="button" href="06 - Protected Page.php">Open Protected Page</a>
        </p>

    </div>

</body>
</html>
