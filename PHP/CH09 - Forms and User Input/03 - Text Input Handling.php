<?php
/*
  FILE: 03 - Text Input Handling.php
  TOPIC: CH09 - Forms and User Input

  GOAL:
  - Learn how PHP handles common text-based inputs.
  - Learn how to read text, email, and number fields.
  - Learn why input values are still received as strings first.

  IMPORTANT:
  - HTML input types help the browser guide the user.
  - PHP still receives submitted values through $_POST or $_GET.
  - Always validate important data on the server side.
*/

$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$age = $_POST["age"] ?? "";

$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";

/*
  Even if input type="number" is used, PHP receives the value from the form
  as text first.

  We can convert it to an integer if needed.
*/

$ageAsInteger = $age !== "" ? (int) $age : 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH09 - Text Input Handling</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <div class="page-card">
            <div class="card">
            <h1>CH09 - Text Input Handling</h1>

            <p>
                This file demonstrates how PHP reads text-based form inputs.
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
                        type="email"
                        id="email"
                        name="email"
                        value="<?= htmlspecialchars($email) ?>"
                        placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <label for="age">Age</label>
                    <input
                        type="number"
                        id="age"
                        name="age"
                        value="<?= htmlspecialchars($age) ?>"
                        placeholder="Enter your age">
                </div>

                <input type="submit" value="Submit">
            </form>
        </div>

        <?php if ($isSubmitted) { ?>
            <div class="result-box">
                <h2>Submitted Data</h2>

                <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
                <p><strong>Age Text Value:</strong> <?= htmlspecialchars($age) ?></p>
                <p><strong>Age After Integer Conversion:</strong> <?= $ageAsInteger ?></p>
            </div>
        <?php } ?>

        <div class="info-box">
            <h2>Important Concept</h2>

            <p>
                The <code>name</code> attribute controls the key used in PHP.
            </p>

            <pre>&lt;input type="text" name="name"&gt;

$name = $_POST["name"] ?? "";</pre>
        </div>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="02 - POST Form.php">&lsaquo; Previous: 02 - POST Form.php</a>
                <a class="next" href="04 - Radio Button Handling.php">Next: 04 - Radio Button Handling.php &rsaquo;</a>
            </nav>

        </div>
    </div>

</body>
</html>
