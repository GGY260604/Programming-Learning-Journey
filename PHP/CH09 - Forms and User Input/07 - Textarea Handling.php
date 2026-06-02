<?php
/*
  FILE: 07 - Textarea Handling.php
  TOPIC: CH09 - Forms and User Input

  GOAL:
  - Learn how PHP handles textarea input.
  - Understand how to display long text safely.
  - Learn how nl2br() displays line breaks in HTML.

  IMPORTANT:
  - Textarea is commonly used for comments, descriptions, and messages.
  - User input should be displayed using htmlspecialchars().
  - HTML ignores normal new lines, so nl2br() can be used to show them.
*/

$message = $_POST["message"] ?? "";
$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH09 - Textarea Handling</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <div class="page-card">
            <div class="card">
            <h1>CH09 - Textarea Handling</h1>

            <p>
                A textarea is used for longer text input.
            </p>

            <form method="post" action="">
                <div class="form-group">
                    <label for="message">Message</label>

                    <!--
                      For textarea, the value is placed between the opening
                      and closing textarea tags.
                    -->

                    <textarea
                        id="message"
                        name="message"
                        placeholder="Write your message here..."><?= htmlspecialchars($message) ?></textarea>
                </div>

                <input type="submit" value="Submit">
            </form>
        </div>

        <?php if ($isSubmitted) { ?>
            <div class="result-box">
                <h2>Submitted Message</h2>

                <p>
                    <?= nl2br(htmlspecialchars($message)) ?>
                </p>
            </div>
        <?php } ?>

        <div class="info-box">
            <h2>Important Concept</h2>

            <p>
                <code>htmlspecialchars()</code> protects the output from being treated as HTML.
            </p>

            <p>
                <code>nl2br()</code> converts new lines into HTML line breaks.
            </p>

            <pre>nl2br(htmlspecialchars($message))</pre>
        </div>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="06 - Select Option Handling.php">&lsaquo; Previous: 06 - Select Option Handling.php</a>
                <a class="next" href="08 - Sticky Form Value.php">Next: 08 - Sticky Form Value.php &rsaquo;</a>
            </nav>

        </div>
    </div>

</body>
</html>
