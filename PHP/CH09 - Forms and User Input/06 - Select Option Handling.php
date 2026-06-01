<?php
/*
  FILE: 06 - Select Option Handling.php
  TOPIC: CH09 - Forms and User Input

  GOAL:
  - Learn how PHP handles a dropdown list.
  - Learn how to read the selected option value.
  - Learn how to keep the selected option after submission.

  IMPORTANT:
  - The select element needs a name attribute.
  - Each option needs a value attribute.
*/

$course = $_POST["course"] ?? "";
$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH09 - Select Option Handling</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <div class="card">
            <h1>CH09 - Select Option Handling</h1>

            <p>
                A dropdown list is useful when the user needs to choose one item
                from a fixed list.
            </p>

            <form method="post" action="">
                <div class="form-group">
                    <label for="course">Choose a Course</label>

                    <select id="course" name="course">
                        <option value="">-- Select Course --</option>
                        <option value="php_basic" <?= $course === "php_basic" ? "selected" : "" ?>>PHP Basic</option>
                        <option value="php_database" <?= $course === "php_database" ? "selected" : "" ?>>PHP Database</option>
                        <option value="php_security" <?= $course === "php_security" ? "selected" : "" ?>>PHP Security</option>
                    </select>
                </div>

                <input type="submit" value="Submit">
            </form>
        </div>

        <?php if ($isSubmitted) { ?>
            <div class="result-box">
                <h2>Selected Course</h2>

                <?php if ($course !== "") { ?>
                    <p>Your selected course value is: <strong><?= htmlspecialchars($course) ?></strong></p>
                <?php } else { ?>
                    <p>No course was selected.</p>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="info-box">
            <h2>Important Concept</h2>

            <p>
                PHP receives the option value, not necessarily the visible text.
            </p>

            <pre>&lt;option value="php_basic"&gt;PHP Basic&lt;/option&gt;</pre>

            <p>
                If the user selects this option, PHP receives <code>php_basic</code>.
            </p>
        </div>

    </div>

</body>
</html>
