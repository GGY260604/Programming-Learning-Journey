<?php
/*
  FILE: 04 - Sanitize Input.php
  TOPIC: CH25 - Security Basics for Backend PHP

  GOAL:
  - Learn what input sanitization means.
  - Learn some simple ways to clean user input.
  - Understand that sanitization is not the same as validation.

  SANITIZATION:
  - Sanitization means cleaning or transforming input.
  - Example: removing spaces, removing HTML tags, or keeping only numbers.
*/

$rawName = $_POST["name"] ?? "   <b>Galen</b> GUI   ";
$rawPhone = $_POST["phone"] ?? "  012-345 6789 abc ";
$rawComment = $_POST["comment"] ?? "<h1>Hello</h1> This is a comment.";

/*
  trim() removes extra spaces at the beginning and end.
*/

$cleanName = trim($rawName);

/*
  strip_tags() removes HTML and PHP tags from a string.
  It can be useful when you do not want users to submit HTML tags.
*/

$cleanName = strip_tags($cleanName);

/*
  preg_replace() below removes anything that is not a digit.
  This is useful when you want to keep only phone number digits.
*/

$cleanPhone = preg_replace("/[^0-9]/", "", $rawPhone);

/*
  For comment text, we may allow normal text but remove HTML tags.
*/

$cleanComment = trim(strip_tags($rawComment));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH25 - Sanitize Input</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH25 - Sanitize Input</h1>

        <p>
            Sanitization cleans input. It can remove unwanted characters or transform input into a safer format.
        </p>

        <div class="box">
            <h2>Try Sanitizing Input</h2>

            <form method="POST">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($rawName) ?>">

                <label for="phone">Phone</label>
                <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($rawPhone) ?>">

                <label for="comment">Comment</label>
                <textarea id="comment" name="comment" rows="4"><?= htmlspecialchars($rawComment) ?></textarea>

                <button type="submit">Sanitize Input</button>
            </form>
        </div>

        <div class="box output">
            <h2>Before and After</h2>

            <table>
                <tr>
                    <th>Field</th>
                    <th>Raw Input</th>
                    <th>Sanitized Input</th>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><pre><?= htmlspecialchars($rawName) ?></pre></td>
                    <td><pre><?= htmlspecialchars($cleanName) ?></pre></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><pre><?= htmlspecialchars($rawPhone) ?></pre></td>
                    <td><pre><?= htmlspecialchars($cleanPhone) ?></pre></td>
                </tr>
                <tr>
                    <td>Comment</td>
                    <td><pre><?= htmlspecialchars($rawComment) ?></pre></td>
                    <td><pre><?= htmlspecialchars($cleanComment) ?></pre></td>
                </tr>
            </table>
        </div>

        <div class="box note">
            <h2>Sanitization vs Validation</h2>

            <p>
                Sanitization cleans input. Validation checks whether input is acceptable.
            </p>

            <p>
                Example: after cleaning a phone number, you should still validate whether
                the phone number has the correct length.
            </p>
        </div>

    </div>

</body>
</html>
