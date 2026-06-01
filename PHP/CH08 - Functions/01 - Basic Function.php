<?php
/*
  FILE: 01 - Basic Function.php
  TOPIC: CH08 - Functions

  GOAL:
  - Learn how to create a basic function.
  - Learn how to call a function.
  - Understand that a function only runs when it is called.

  IMPORTANT:
  - A function is a reusable block of code.
  - The function keyword is used to create a function.
  - The code inside a function does not run automatically.
*/


/*
  Create a basic function.

  Syntax:
  function functionName() {
      code to run
  }

  The function below returns an HTML message.
*/

function showWelcomeMessage() {
    echo "<p>Welcome to PHP functions.</p>";
}


/*
  This variable is used to count how many times we call the function.
*/

$totalCalls = 3;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 01 - Basic Function.php

      This file shows how to create and call a simple PHP function.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH08 - Basic Function</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH08 - Basic Function</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                A function is a reusable block of code.
                We create it once, then call it whenever we want to run the code.
            </p>

            <p>
                A function is useful when the same logic needs to be used many times.
            </p>
        </div>

        <div class="box output">
            <h2>Function Output</h2>

            <?php
                /*
                  Call the function.

                  Every time we write showWelcomeMessage(),
                  PHP runs the code inside the function.
                */

                showWelcomeMessage();
                showWelcomeMessage();
                showWelcomeMessage();
            ?>

            <p><strong>Total function calls:</strong> <?php echo $totalCalls; ?></p>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>function showWelcomeMessage() {
    echo "Welcome to PHP functions.";
}

showWelcomeMessage();</pre>
        </div>

    </div>

</body>
</html>
