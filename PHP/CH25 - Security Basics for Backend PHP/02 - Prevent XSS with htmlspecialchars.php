<?php
/*
  FILE: 02 - Prevent XSS with htmlspecialchars.php
  TOPIC: CH25 - Security Basics for Backend PHP

  GOAL:
  - Learn what XSS means.
  - Learn why user input should be escaped before displaying it in HTML.
  - Learn how htmlspecialchars() helps protect HTML output.

  XSS MEANING:
  - XSS stands for Cross-Site Scripting.
  - It happens when dangerous HTML or JavaScript is displayed as real page code.
*/

$userMessage = $_POST["message"] ?? "<strong>Hello</strong> <script>alert('Bad script')</script>";

/*
  Safe output:
  htmlspecialchars() converts special HTML characters into harmless text.

  Example:
  < becomes &lt;
  > becomes &gt;
*/

$safeMessage = htmlspecialchars($userMessage, ENT_QUOTES, "UTF-8");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH25 - Prevent XSS with htmlspecialchars</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">

        <h1>CH25 - Prevent XSS with htmlspecialchars()</h1>

        <p>
            When displaying user input in HTML, always escape it first.
        </p>

        <div class="box">
            <h2>Input Example</h2>

            <form method="POST">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5"><?= htmlspecialchars($userMessage) ?></textarea>

                <button type="submit">Display Message Safely</button>
            </form>
        </div>

        <div class="box warning">
            <h2>Original User Input</h2>

            <p>
                This is the raw text submitted by the user.
                It is shown inside a code block safely.
            </p>

            <pre><?= htmlspecialchars($userMessage) ?></pre>
        </div>

        <div class="box success">
            <h2>Safe Output</h2>

            <p>
                The message below is displayed using <code>htmlspecialchars()</code>.
            </p>

            <p><?= $safeMessage ?></p>
        </div>

        <div class="box output">
            <h2>Important Code</h2>

            <pre><?= htmlspecialchars('$safeMessage = htmlspecialchars($userMessage, ENT_QUOTES, "UTF-8");') ?></pre>
        </div>

        <div class="box note">
            <h2>Main Lesson</h2>

            <p>
                <code><?= htmlspecialchars('<?= $value ?>') ?></code> is fast for output,
                but it does not automatically protect the value.
            </p>

            <p>
                Safer output usually looks like this:
            </p>

            <pre><?= htmlspecialchars('<?= htmlspecialchars($value) ?>') ?></pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="01 - Prevent SQL Injection.php">&lsaquo; Previous: 01 - Prevent SQL Injection.php</a>
            <a class="next" href="03 - Validate Input.php">Next: 03 - Validate Input.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
