<?php
/*
  FILE: 09 - Basic Form Validation.php
  TOPIC: CH09 - Forms and User Input

  GOAL:
  - Learn basic server-side form validation.
  - Learn how to store error messages.
  - Learn how to display validation errors beside the form result.

  IMPORTANT:
  - Browser validation is useful, but backend validation is still required.
  - Users can bypass browser validation.
  - PHP should always validate important input before using it.
*/

$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$password = $_POST["password"] ?? "";

$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";
$errors = [];

if ($isSubmitted) {
    /*
      trim() removes extra spaces from the beginning and end.
      This helps avoid accepting values that are only spaces.
    */

    $name = trim($name);
    $email = trim($email);
    $password = trim($password);

    if ($name === "") {
        $errors[] = "Name is required.";
    }

    if ($email === "") {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        /*
          filter_var() with FILTER_VALIDATE_EMAIL checks whether the email
          has a valid email format.
        */

        $errors[] = "Email format is invalid.";
    }

    if ($password === "") {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }
}

$hasError = count($errors) > 0;
$isValid = $isSubmitted && !$hasError;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH09 - Basic Form Validation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <div class="card">
            <h1>CH09 - Basic Form Validation</h1>

            <p>
                This file demonstrates how PHP validates user input before processing it.
            </p>

            <form method="post" action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="<?= htmlspecialchars($name) ?>"
                        placeholder="Enter your name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="text"
                        id="email"
                        name="email"
                        value="<?= htmlspecialchars($email) ?>"
                        placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="text"
                        id="password"
                        name="password"
                        value="<?= htmlspecialchars($password) ?>"
                        placeholder="At least 6 characters">

                    <p class="small-note">
                        This file uses type="text" only so you can clearly see the learning result.
                        In real login or register forms, use type="password".
                    </p>
                </div>

                <input type="submit" value="Submit">
            </form>
        </div>

        <?php if ($hasError) { ?>
            <div class="error-box">
                <h2>Validation Errors</h2>

                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <?php if ($isValid) { ?>
            <div class="result-box">
                <h2>Validation Passed</h2>

                <p>The form data is valid and can be processed.</p>
                <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>

                <p class="small-note">
                    The password is not displayed here because sensitive data should not
                    normally be shown back to the user.
                </p>
            </div>
        <?php } ?>

        <div class="info-box">
            <h2>Important Concept</h2>

            <p>
                A common backend validation pattern is:
            </p>

            <pre>if ($input === "") {
    $errors[] = "This field is required.";
}</pre>

            <p>
                Later, when we connect forms to MySQL, validation should happen before
                inserting or updating data in the database.
            </p>
        </div>

    </div>

</body>
</html>
