<?php
/*
  FILE: 02 - POST Form.php
  TOPIC: CH09 - Forms and User Input

  GOAL:
  - Learn how to submit form data using the POST method.
  - Learn how PHP reads POST data using $_POST.
  - Understand why POST is commonly used for backend actions.

  IMPORTANT:
  - POST data does not appear in the URL.
  - POST is commonly used for login, register, insert, update, and delete actions.
  - POST is not automatically secure, but it is more suitable for data-changing actions.
*/

$username = $_POST["username"] ?? "";
$email = $_POST["email"] ?? "";

/*
  Instead of checking a submit button name, we can also check the request method.

  $_SERVER["REQUEST_METHOD"] tells us how the page was requested.
  It can be GET, POST, PUT, DELETE, and others.
*/

$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This form uses method="post".
      POST data is sent in the request body instead of the URL.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH09 - POST Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <div class="card">
            <h1>CH09 - POST Form</h1>

            <p>
                This file demonstrates how PHP receives form data using
                <code>$_POST</code>.
            </p>

            <form method="post" action="">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        value="<?= htmlspecialchars($username) ?>"
                        placeholder="Example: Galen">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?= htmlspecialchars($email) ?>"
                        placeholder="Example: galen@example.com">
                </div>

                <input type="submit" value="Submit">
            </form>
        </div>

        <?php if ($isSubmitted) { ?>
            <div class="result-box">
                <h2>POST Result</h2>

                <p><strong>Username:</strong> <?= htmlspecialchars($username) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>

                <p>
                    Notice that the submitted data does not appear in the browser URL.
                </p>
            </div>
        <?php } ?>

        <div class="info-box">
            <h2>GET vs POST</h2>

            <table>
                <tr>
                    <th>Method</th>
                    <th>Data Location</th>
                    <th>Common Use</th>
                </tr>
                <tr>
                    <td>GET</td>
                    <td>URL query string</td>
                    <td>Search and filtering</td>
                </tr>
                <tr>
                    <td>POST</td>
                    <td>Request body</td>
                    <td>Insert, update, login, register</td>
                </tr>
            </table>
        </div>

    </div>

</body>
</html>
