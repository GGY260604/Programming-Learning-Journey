<?php
/*
  FILE: 01 - Variables.php
  TOPIC: CH02 - Variables Data Types and Constants

  GOAL:
  - Learn how to create variables in PHP.
  - Learn how to assign values to variables.
  - Learn how to output variables using echo.
  - Understand that PHP variable names are case-sensitive.

  HOW TO RUN:
  1. Start Apache in XAMPP.
  2. Place the PHP folder inside htdocs.
  3. Open this file using localhost.

  IMPORTANT:
  - A PHP variable starts with the $ symbol.
  - A variable can store a value.
  - A variable can be changed later.
  - PHP variable names are case-sensitive.
*/


/*
  Create simple variables.

  $studentName stores text.
  $course stores text.
  $year stores a number.
*/

$studentName = "Galen";
$course = "PHP Backend Tutorial";
$year = 2026;


/*
  A variable value can be changed.

  The first value of $status is "Beginner".
  Then we assign a new value: "Learning PHP".
*/

$status = "Beginner";
$status = "Learning PHP";


/*
  PHP variable names are case-sensitive.

  $name and $Name are two different variables.
*/

$name = "lowercase variable name";
$Name = "uppercase variable name";


/*
  This variable combines text and other variables.

  The dot . is the string concatenation operator in PHP.
*/

$sentence = "My name is " . $studentName . " and I am learning " . $course . ".";

$chapter = "CH02 - Variables Data Types and Constants";
$fileName = "01 - Variables.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This is an HTML comment.

      If you want to show PHP code inside an HTML comment,
      escape the PHP tags like this:

      &lt;?php echo $studentName; ?&gt;

      Do not write raw PHP tags directly inside HTML comments,
      because the PHP server will still process them.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH02 - Variables</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1><?php echo $chapter; ?></h1>

        <div class="box note">
            <h2>Current File</h2>
            <p><?php echo $fileName; ?></p>
        </div>

        <div class="box output">
            <h2>PHP Variable Output</h2>

            <p><strong>Student Name:</strong> <?php echo $studentName; ?></p>
            <p><strong>Course:</strong> <?php echo $course; ?></p>
            <p><strong>Year:</strong> <?php echo $year; ?></p>
            <p><strong>Status:</strong> <?php echo $status; ?></p>
            <p><strong>Sentence:</strong> <?php echo $sentence; ?></p>
        </div>

        <div class="box">
            <h2>Case-Sensitive Variable Names</h2>

            <p><code>$name</code>: <?php echo $name; ?></p>
            <p><code>$Name</code>: <?php echo $Name; ?></p>

            <p>
                In PHP, <code>$name</code> and <code>$Name</code> are not the same variable.
                Because of this, you should use consistent variable naming.
            </p>
        </div>

        <div class="box">
            <h2>Basic Variable Syntax</h2>

            <pre>&lt;?php
$studentName = "Galen";
echo $studentName;
?&gt;</pre>

            <p>
                The variable stores the value first. Then <code>echo</code> displays
                the value in the browser.
            </p>
        </div>

        <div class="box warning">
            <h2>Common Mistakes</h2>

            <ul>
                <li>Forgetting the <code>$</code> symbol before a variable name.</li>
                <li>Forgetting the semicolon <code>;</code> at the end of a statement.</li>
                <li>Using different letter cases accidentally, such as <code>$name</code> and <code>$Name</code>.</li>
            </ul>
        </div>

    </div>

</body>
</html>
