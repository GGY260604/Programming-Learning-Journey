<?php
/*
  FILE: 06 - Variable Scope.php
  TOPIC: CH08 - Functions

  GOAL:
  - Understand local variables.
  - Understand global variables.
  - Understand static variables.

  IMPORTANT:
  - A variable created inside a function is usually local to that function.
  - A variable created outside a function is not automatically available inside the function.
  - static variables remember their value between function calls.
*/


/*
  Global variable.

  This variable is created outside any function.
*/

$systemName = "PHP Backend Note";


/*
  Local variable example.

  $message is created inside the function,
  so it can only be used inside this function.
*/

function getLocalMessage() {
    $message = "This message is stored in a local variable.";

    return $message;
}


/*
  Access global variable using the global keyword.

  Usually, too many global variables can make code harder to maintain.
  For beginner learning, this example shows how it works.
*/

function getSystemName() {
    global $systemName;

    return $systemName;
}


/*
  Static variable example.

  A normal local variable disappears after the function ends.
  A static variable keeps its value between function calls.
*/

function countPageView() {
    static $counter = 0;

    $counter++;

    return $counter;
}

$localMessage = getLocalMessage();
$currentSystemName = getSystemName();

$pageViewOne = countPageView();
$pageViewTwo = countPageView();
$pageViewThree = countPageView();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 06 - Variable Scope.php

      This file shows how variable scope works in PHP functions.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH08 - Variable Scope</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">

        <h1>CH08 - Variable Scope</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                Variable scope means where a variable can be accessed.
                In PHP functions, variables inside a function are usually separate from variables outside the function.
            </p>
        </div>

        <div class="box output">
            <h2>Local Variable</h2>

            <p><?php echo $localMessage; ?></p>
        </div>

        <div class="box output">
            <h2>Global Variable</h2>

            <p><strong>System name:</strong> <?php echo $currentSystemName; ?></p>
        </div>

        <div class="box output">
            <h2>Static Variable</h2>

            <p><strong>First call:</strong> <?php echo $pageViewOne; ?></p>
            <p><strong>Second call:</strong> <?php echo $pageViewTwo; ?></p>
            <p><strong>Third call:</strong> <?php echo $pageViewThree; ?></p>
        </div>

        <div class="box warning">
            <h2>Backend Note</h2>

            <p>
                In real backend projects, avoid depending too much on global variables.
                It is usually better to pass values into functions using parameters.
            </p>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>function countPageView() {
    static $counter = 0;
    $counter++;
    return $counter;
}</pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="05 - Type Declaration.php">&lsaquo; Previous: 05 - Type Declaration.php</a>
            <a class="next" href="07 - Reusable Helper Function.php">Next: 07 - Reusable Helper Function.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
