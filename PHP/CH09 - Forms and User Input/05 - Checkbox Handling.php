<?php
/*
  FILE: 05 - Checkbox Handling.php
  TOPIC: CH09 - Forms and User Input

  GOAL:
  - Learn how PHP handles checkboxes.
  - Understand how to receive multiple selected values.
  - Learn why checkbox names often use square brackets [].

  IMPORTANT:
  - Checkboxes allow multiple selections.
  - Use name="hobbies[]" when you want PHP to receive an array.
*/

$hobbies = $_POST["hobbies"] ?? [];

/*
  For safety, make sure $hobbies is an array.
  This prevents errors if the submitted value is not in the expected format.
*/

if (!is_array($hobbies)) {
    $hobbies = [];
}

$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";

function isChecked(array $values, string $target): string
{
    return in_array($target, $values) ? "checked" : "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH09 - Checkbox Handling</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <div class="card">
            <h1>CH09 - Checkbox Handling</h1>

            <p>
                Checkboxes are used when the user can select more than one option.
            </p>

            <form method="post" action="">
                <div class="form-group">
                    <label>Choose Topics You Want to Learn</label>

                    <label class="inline-label">
                        <input
                            type="checkbox"
                            name="hobbies[]"
                            value="php"
                            <?= isChecked($hobbies, "php") ?>>
                        PHP
                    </label>

                    <label class="inline-label">
                        <input
                            type="checkbox"
                            name="hobbies[]"
                            value="mysql"
                            <?= isChecked($hobbies, "mysql") ?>>
                        MySQL
                    </label>

                    <label class="inline-label">
                        <input
                            type="checkbox"
                            name="hobbies[]"
                            value="javascript"
                            <?= isChecked($hobbies, "javascript") ?>>
                        JavaScript
                    </label>

                    <label class="inline-label">
                        <input
                            type="checkbox"
                            name="hobbies[]"
                            value="security"
                            <?= isChecked($hobbies, "security") ?>>
                        Security
                    </label>
                </div>

                <input type="submit" value="Submit">
            </form>
        </div>

        <?php if ($isSubmitted) { ?>
            <div class="result-box">
                <h2>Selected Values</h2>

                <?php if (count($hobbies) > 0) { ?>
                    <ul>
                        <?php foreach ($hobbies as $hobby) { ?>
                            <li><?= htmlspecialchars($hobby) ?></li>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <p>No topic was selected.</p>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="info-box">
            <h2>Important Concept</h2>

            <p>
                For multiple checkbox values, use square brackets in the name:
            </p>

            <pre>name="hobbies[]"</pre>

            <p>
                PHP will receive the selected values as an array:
            </p>

            <pre>$_POST["hobbies"]</pre>
        </div>

    </div>

</body>
</html>
