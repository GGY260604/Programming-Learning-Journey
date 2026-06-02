<?php
/*
  FILE: 04 - Custom Error Message.php
  TOPIC: CH15 - Error Handling and Debugging

  GOAL:
  - Learn how to create custom user-friendly error messages.
  - Learn how to store multiple validation errors in an array.
  - Learn how to display errors near the form.

  IMPORTANT:
  - Users should not always see raw technical errors.
  - Friendly messages help users understand what they need to fix.
  - Backend validation is still required even if HTML form validation exists.
*/

$name = "";
$email = "";
$age = "";
$errors = [];
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $age = trim($_POST["age"] ?? "");

    /*
      Each invalid condition adds one custom error message into the $errors array.
    */
    if ($name === "") {
        $errors[] = "Name is required.";
    }

    if ($email === "") {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email format is not valid.";
    }

    if ($age === "") {
        $errors[] = "Age is required.";
    } elseif (!ctype_digit($age)) {
        $errors[] = "Age must be a whole number.";
    } elseif ((int) $age < 1 || (int) $age > 120) {
        $errors[] = "Age must be between 1 and 120.";
    }

    if (empty($errors)) {
        $successMessage = "All input values are valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file teaches custom error messages.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH15 - Custom Error Message</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH15 - Custom Error Message</h1>

        <p>
            This example validates form input and displays friendly error messages.
        </p>

        <form action="" method="post" class="box">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>">

            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>">

            <label for="age">Age:</label>
            <input type="text" id="age" name="age" value="<?= htmlspecialchars($age) ?>">

            <button type="submit">Submit</button>
        </form>

        <?php if (!empty($errors)) { ?>
            <div class="box error">
                <h2>Please Fix These Errors</h2>

                <ul class="error-list">
                    <?php foreach ($errors as $error) { ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <?php if ($successMessage !== "") { ?>
            <div class="box success">
                <h2>Success</h2>
                <p><?= htmlspecialchars($successMessage) ?></p>
            </div>
        <?php } ?>

        <div class="box">
            <h2>Important Code</h2>

            <pre>$errors = [];

if ($name === "") {
    $errors[] = "Name is required.";
}

if (empty($errors)) {
    $successMessage = "All input values are valid.";
}</pre>

            <p>
                The array <code>$errors</code> is used to collect all validation problems.
                If the array is empty, the form is valid.
            </p>
        </div>

        <div class="box warning">
            <h2>Security Reminder</h2>

            <p>
                Even when displaying error messages, output should still use
                <code>htmlspecialchars()</code> because some values may come from user input.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="03 - Throw Exception.php">&lsaquo; Previous: 03 - Throw Exception.php</a>
            <a class="next" href="05 - Debug with var_dump.php">Next: 05 - Debug with var_dump.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
