<?php
/*
  FILE: 01 - Include File.php
  TOPIC: CH11 - Include Require and File Organization

  GOAL:
  - Learn how to use include.
  - Learn how an included file can provide variables to the main file.
  - Understand that include gives a warning but the script can continue if the file is missing.

  IMPORTANT:
  - include is commonly used for optional reusable parts.
  - If the file is required for the page to work, require is usually better.
*/

/*
  __DIR__ means the directory path of this current file.

  This is safer than writing only:
  include "includes/site-message.php";

  because __DIR__ helps PHP find the file based on the current file location.
*/

include __DIR__ . "/includes/site-message.php";

/*
  After the file is included, variables from that file become available here.

  $siteMessage and $lessonName are created inside:
  includes/site-message.php
*/

$safeSiteMessage = htmlspecialchars($siteMessage ?? "The included message was not found.");
$safeLessonName = htmlspecialchars($lessonName ?? "No lesson name found.");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 01 - Include File.php

      This file teaches include.
      Do not write raw PHP tags inside HTML comments unless they are escaped.

      Example of escaped PHP tag:
      &lt;?php include "includes/site-message.php"; ?&gt;
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH11 - Include File</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>CH11 - Include File</h1>

        <div class="box">
            <h2>What is include?</h2>
            <p><code>include</code> is used to load another PHP file into the current PHP file.</p>
            <p>This helps us reuse code instead of copying the same code again and again.</p>
        </div>

        <div class="box output">
            <h2>Output from Included File</h2>
            <p><strong>Lesson:</strong> <?= $safeLessonName ?></p>
            <p><strong>Message:</strong> <?= $safeSiteMessage ?></p>
        </div>

        <div class="box">
            <h2>Main Code</h2>
            <pre>include __DIR__ . "/includes/site-message.php";</pre>
            <p>
                This line loads the external file. Then this page can use variables from that included file.
            </p>
        </div>

        <div class="box warning">
            <h2>Important Reminder</h2>
            <p>If the included file is missing, PHP will show a warning, but the script may continue running.</p>
        </div>
    </div>
</body>
</html>
