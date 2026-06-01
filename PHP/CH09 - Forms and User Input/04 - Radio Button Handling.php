<?php
/*
  FILE: 04 - Radio Button Handling.php
  TOPIC: CH09 - Forms and User Input

  GOAL:
  - Learn how PHP handles radio buttons.
  - Understand that radio buttons allow only one selected value from a group.
  - Learn how to keep the selected radio button after form submission.

  IMPORTANT:
  - Radio buttons in the same group must use the same name attribute.
  - Each radio button should have a different value attribute.
*/

$level = $_POST["level"] ?? "";
$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH09 - Radio Button Handling</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <div class="card">
            <h1>CH09 - Radio Button Handling</h1>

            <p>
                Radio buttons are used when the user should choose only one option.
            </p>

            <form method="post" action="">
                <div class="form-group">
                    <label>Choose Your PHP Level</label>

                    <label class="inline-label">
                        <input
                            type="radio"
                            name="level"
                            value="beginner"
                            <?= $level === "beginner" ? "checked" : "" ?>>
                        Beginner
                    </label>

                    <label class="inline-label">
                        <input
                            type="radio"
                            name="level"
                            value="intermediate"
                            <?= $level === "intermediate" ? "checked" : "" ?>>
                        Intermediate
                    </label>

                    <label class="inline-label">
                        <input
                            type="radio"
                            name="level"
                            value="advanced"
                            <?= $level === "advanced" ? "checked" : "" ?>>
                        Advanced
                    </label>
                </div>

                <input type="submit" value="Submit">
            </form>
        </div>

        <?php if ($isSubmitted) { ?>
            <div class="result-box">
                <h2>Selected Value</h2>

                <?php if ($level !== "") { ?>
                    <p>You selected: <strong><?= htmlspecialchars($level) ?></strong></p>
                <?php } else { ?>
                    <p>No level was selected.</p>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="info-box">
            <h2>Important Concept</h2>

            <p>
                These radio buttons share the same name:
            </p>

            <pre>name="level"</pre>

            <p>
                Because they share the same name, only one value will be sent to PHP.
            </p>
        </div>

    </div>

</body>
</html>
