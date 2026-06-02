<?php
/*
  FILE: 03 - Validate Input.php
  TOPIC: CH25 - Security Basics for Backend PHP

  GOAL:
  - Learn what input validation means.
  - Learn how to check required fields.
  - Learn how to validate email and number input.

  VALIDATION:
  - Validation means checking whether the input is acceptable.
  - Example: name cannot be empty, email must have valid format, age must be a number.
*/

$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$age = $_POST["age"] ?? "";

$errors = [];
$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";

if ($isSubmitted) {
    /*
      trim() removes extra spaces from the beginning and end.
      This prevents input such as "     " from being accepted as real text.
    */

    $name = trim($name);
    $email = trim($email);
    $age = trim($age);

    if ($name === "") {
        $errors[] = "Name is required.";
    }

    if ($email === "") {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email format is invalid.";
    }

    if ($age === "") {
        $errors[] = "Age is required.";
    } elseif (!ctype_digit($age)) {
        $errors[] = "Age must be a whole number.";
    } elseif ((int) $age < 1 || (int) $age > 120) {
        $errors[] = "Age must be between 1 and 120.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH25 - Validate Input</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">

        <h1>CH25 - Validate Input</h1>

        <p>
            Input validation checks whether the user input follows the rules expected by the system.
        </p>

        <div class="box">
            <h2>Registration Form Example</h2>

            <form method="POST">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>">

                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>">

                <label for="age">Age</label>
                <input type="text" id="age" name="age" value="<?= htmlspecialchars($age) ?>">

                <button type="submit">Validate Input</button>
            </form>
        </div>

        <?php if ($isSubmitted && count($errors) > 0) { ?>
            <div class="box error">
                <h2>Validation Errors</h2>

                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <?php if ($isSubmitted && count($errors) === 0) { ?>
            <div class="box success">
                <h2>Valid Input</h2>

                <table>
                    <tr>
                        <th>Field</th>
                        <th>Value</th>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?= htmlspecialchars($name) ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= htmlspecialchars($email) ?></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><?= htmlspecialchars($age) ?></td>
                    </tr>
                </table>
            </div>
        <?php } ?>

        <div class="box output">
            <h2>Common Validation Functions</h2>

            <table>
                <tr>
                    <th>Function</th>
                    <th>Use</th>
                </tr>
                <tr>
                    <td><code>trim()</code></td>
                    <td>Remove extra spaces from the start and end.</td>
                </tr>
                <tr>
                    <td><code>filter_var()</code></td>
                    <td>Validate values such as email.</td>
                </tr>
                <tr>
                    <td><code>ctype_digit()</code></td>
                    <td>Check whether a string contains only digits.</td>
                </tr>
            </table>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="02 - Prevent XSS with htmlspecialchars.php">&lsaquo; Previous: 02 - Prevent XSS with htmlspecialchars.php</a>
            <a class="next" href="04 - Sanitize Input.php">Next: 04 - Sanitize Input.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
