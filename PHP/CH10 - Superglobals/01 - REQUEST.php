<?php
/*
  FILE: 01 - REQUEST.php
  TOPIC: CH10 - Superglobals

  GOAL:
  - Learn what $_REQUEST is.
  - Learn how $_REQUEST can read data from request sources.
  - Understand why $_REQUEST should be used carefully.

  IMPORTANT:
  - $_REQUEST may contain data from $_GET, $_POST, and $_COOKIE depending on PHP configuration.
  - For clear backend code, $_GET and $_POST are usually better because they show where the data comes from.
*/

$name = $_REQUEST["name"] ?? "";
$chapter = $_REQUEST["chapter"] ?? "No chapter value in URL";

$safeName = htmlspecialchars($name);
$safeChapter = htmlspecialchars($chapter);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 01 - REQUEST.php

      This file teaches $_REQUEST.
      Do not write raw PHP tags inside HTML comments unless they are escaped.

      Example of escaped PHP tag:
      &lt;?php echo "Hello World"; ?&gt;
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH10 - REQUEST</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>
    <div class="container">
        <h1>CH10 - $_REQUEST</h1>

        <div class="box">
            <h2>What is $_REQUEST?</h2>
            <p><code>$_REQUEST</code> is a PHP superglobal array. It can contain request data from sources such as <code>$_GET</code>, <code>$_POST</code>, and sometimes <code>$_COOKIE</code>.</p>
            <p>For clearer backend code, it is usually better to use <code>$_GET</code> or <code>$_POST</code> directly.</p>
        </div>

        <div class="box">
            <h2>Try the Form</h2>
            <form method="post" action="?chapter=CH10">
                <label for="name">Enter your name:</label>
                <input type="text" id="name" name="name" value="<?= $safeName ?>">
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="box output">
            <h2>Output from $_REQUEST</h2>
            <p><strong>Name from request:</strong> <?= $safeName === "" ? "No name submitted yet." : $safeName ?></p>
            <p><strong>Chapter from request:</strong> <?= $safeChapter ?></p>
        </div>

        <div class="box warning">
            <h2>Important Reminder</h2>
            <p><code>$_REQUEST["name"]</code> does not clearly show whether the value comes from GET, POST, or COOKIE.</p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="../CH09 - Forms and User Input/09 - Basic Form Validation.php">&lsaquo; Previous: 09 - Basic Form Validation.php</a>
            <a class="next" href="02 - GET.php">Next: 02 - GET.php &rsaquo;</a>
        </nav>

    </div>
</body>
</html>
