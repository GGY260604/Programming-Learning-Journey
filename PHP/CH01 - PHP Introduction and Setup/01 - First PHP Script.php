<?php
/*
  FILE: 01 - First PHP Script.php
  TOPIC: CH01 - PHP Introduction and Setup

  GOAL:
  - Learn the most basic PHP script.
  - Understand that PHP code runs on the server.
  - Understand that the browser receives the final output, not the PHP source code.

  HOW TO RUN:
  1. Start Apache in XAMPP.
  2. Place the PHP folder inside htdocs.
  3. Open this file using localhost.

  IMPORTANT:
  - PHP code starts with an opening PHP tag.
  - PHP statements usually end with a semicolon.
  - echo is used to output content.
*/


/*
  This variable stores a simple message.

  A PHP variable:
  - starts with the $ symbol
  - can store a value
  - can be printed using echo
*/

$message = "Hello World from PHP!";
$chapter = "CH01 - PHP Introduction and Setup";
$fileName = "01 - First PHP Script.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This is an HTML comment.

      Important:
      If you want to show PHP code inside an HTML comment,
      escape the PHP tags like this:

      &lt;?php echo "Hello World"; ?&gt;

      Do not write the raw PHP tags directly here,
      because this file is processed by the PHP server.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH01 - First PHP Script</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">

        <h1><?php echo $chapter; ?></h1>

        <div class="box note">
            <h2>Current File</h2>
            <p><?php echo $fileName; ?></p>
        </div>

        <div class="box output">
            <h2>PHP Output</h2>

            <!--
              The PHP code below runs on the server.

              The browser will not receive this PHP line:
              &lt;?php echo $message; ?&gt;

              The browser will only receive the final output text.
            -->

            <p><?php echo $message; ?></p>
        </div>

        <div class="box">
            <h2>Important Idea</h2>

            <p>
                PHP is a server-side language. This means PHP code is processed
                before the page is sent to the browser.
            </p>

            <p>
                When you view page source in the browser, you will see the output,
                not the original PHP code.
            </p>
        </div>

        <div class="box">
            <h2>Basic PHP Syntax</h2>

            <pre>&lt;?php
echo "Hello World";
?&gt;</pre>

            <p>
                The example above shows the basic structure of a PHP script.
                The <code>echo</code> statement prints output to the page.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="next" href="02 - PHP Inside HTML.php">Next: 02 - PHP Inside HTML.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
