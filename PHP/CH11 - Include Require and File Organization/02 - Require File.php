<?php
/*
  FILE: 02 - Require File.php
  TOPIC: CH11 - Include Require and File Organization

  GOAL:
  - Learn how to use require.
  - Learn the difference between include and require.
  - Understand when a file should be required instead of included.

  IMPORTANT:
  - require is used when the loaded file is necessary.
  - If the required file is missing, PHP stops the script.
*/

/*
  This file contains important application information.
  Without this file, this page should not continue.
*/

require __DIR__ . "/includes/site-config.php";

$safeApplicationName = htmlspecialchars($applicationName);
$safeApplicationVersion = htmlspecialchars($applicationVersion);
$safeAuthorName = htmlspecialchars($authorName);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 02 - Require File.php

      Example of escaped PHP tag:
      &lt;?php require "includes/site-config.php"; ?&gt;
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH11 - Require File</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>
    <div class="container">
        <h1>CH11 - Require File</h1>

        <div class="box">
            <h2>What is require?</h2>
            <p><code>require</code> also loads another PHP file into the current PHP file.</p>
            <p>The difference is that <code>require</code> treats the file as necessary.</p>
        </div>

        <div class="box output">
            <h2>Required Configuration Values</h2>
            <p><strong>Application Name:</strong> <?= $safeApplicationName ?></p>
            <p><strong>Version:</strong> <?= $safeApplicationVersion ?></p>
            <p><strong>Author:</strong> <?= $safeAuthorName ?></p>
        </div>

        <div class="box">
            <h2>Main Code</h2>
            <pre>require __DIR__ . "/includes/site-config.php";</pre>
            <p>If this required file cannot be found, PHP will stop the script because the page depends on it.</p>
        </div>

        <div class="box warning">
            <h2>include vs require</h2>
            <p>Use <code>include</code> for optional files.</p>
            <p>Use <code>require</code> for important files such as configuration files, database connection files, and authentication files.</p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="01 - Include File.php">&lsaquo; Previous: 01 - Include File.php</a>
            <a class="next" href="03 - Include Header and Footer.php">Next: 03 - Include Header and Footer.php &rsaquo;</a>
        </nav>

    </div>
</body>
</html>
