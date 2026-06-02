<?php
/*
  FILE: 02 - Register Form.php
  TOPIC: CH24 - Register Form

  GOAL:
  - Create a registration form.
  - Send username, email, and password to another PHP file for processing.

  IMPORTANT:
  - This file only displays the form.
  - The actual database insert is handled by 03 - Store User with Password Hash.php.
  - The method is POST because registration data should not appear in the URL.
*/

$message = $_GET["message"] ?? "";
$error = $_GET["error"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH24 - Register Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH24 - Register Form</h1>

        <p>
            This page displays a simple registration form.
            The form sends data to another PHP file using the POST method.
        </p>

        <?php if ($message !== "") { ?>
            <div class="box success">
                <strong>Success:</strong>
                <?= htmlspecialchars($message) ?>
            </div>
        <?php } ?>

        <?php if ($error !== "") { ?>
            <div class="box error">
                <strong>Error:</strong>
                <?= htmlspecialchars($error) ?>
            </div>
        <?php } ?>

        <div class="box">
            <h2>Registration Form</h2>

            <!--
              action:
              - The PHP file that will receive and process the form data.

              method="POST":
              - Sends data inside the HTTP request body.
              - Better for sensitive data than GET because it does not show data in the URL.
            -->
            <form action="03 - Store User with Password Hash.php" method="POST">

                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Example: Galen"
                    required
                >

                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Example: galen@example.com"
                    required
                >

                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter a password"
                    required
                >

                <button type="submit">Register</button>
            </form>
        </div>

        <div class="box info">
            <h2>Learning Notes</h2>

            <ul>
                <li>The password input hides what the user types.</li>
                <li>The password is still plain text when submitted to PHP.</li>
                <li>Therefore, the next PHP file must hash the password before saving it.</li>
                <li>Never store plain text passwords in the database.</li>
            </ul>
        </div>

        <p>
            <a class="button secondary" href="04 - Login Form.php">Go to Login Form</a>
        </p>

    </div>

</body>
</html>
