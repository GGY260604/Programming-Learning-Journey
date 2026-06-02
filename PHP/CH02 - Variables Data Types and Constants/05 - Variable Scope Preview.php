<?php
/*
  FILE: 05 - Variable Scope Preview.php
  TOPIC: CH02 - Variables Data Types and Constants

  GOAL:
  - Preview the idea of variable scope.
  - Understand local variables.
  - Understand global variables.
  - Understand static variables.

  HOW TO RUN:
  1. Start Apache in XAMPP.
  2. Place the PHP folder inside htdocs.
  3. Open this file using localhost.

  IMPORTANT:
  - Scope means where a variable can be used.
  - A variable created outside a function is not automatically available inside the function.
  - A variable created inside a function usually cannot be used outside that function.
*/


/*
  Global variable:
  - Created outside the function.
  - Can be used in the main script area.
*/

$siteName = "PHP Learning Site";


/*
  This function has a local variable.

  $message is created inside the function.
  Therefore, it is a local variable.
*/

function getLocalMessage() {
    $message = "This message is created inside a function.";
    return $message;
}


/*
  This function uses the global keyword.

  Normally, $siteName outside the function cannot be used directly inside the function.
  The global keyword allows the function to access the global variable.
*/

function getGlobalMessage() {
    global $siteName;
    return "The global site name is: " . $siteName;
}


/*
  This function uses a static variable.

  Normal local variables are recreated every time the function runs.
  Static variables keep their value between function calls.
*/

function countVisit() {
    static $count = 0;
    $count++;
    return $count;
}


/*
  Call the functions and store their returned values.
*/

$localMessage = getLocalMessage();
$globalMessage = getGlobalMessage();

$firstCount = countVisit();
$secondCount = countVisit();
$thirdCount = countVisit();

$chapter = "CH02 - Variables Data Types and Constants";
$fileName = "05 - Variable Scope Preview.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      Escaped PHP code example:
      &lt;?php echo getLocalMessage(); ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH02 - Variable Scope Preview</title>
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
            <h2>Scope Output</h2>

            <p><strong>Global variable in main script:</strong> <?php echo $siteName; ?></p>
            <p><strong>Local variable returned from function:</strong> <?php echo $localMessage; ?></p>
            <p><strong>Global variable accessed inside function:</strong> <?php echo $globalMessage; ?></p>
        </div>

        <div class="box">
            <h2>Static Variable Output</h2>

            <p>First function call: <?php echo $firstCount; ?></p>
            <p>Second function call: <?php echo $secondCount; ?></p>
            <p>Third function call: <?php echo $thirdCount; ?></p>

            <p>
                The number increases because <code>static $count</code> remembers
                its previous value between function calls.
            </p>
        </div>

        <div class="box">
            <h2>Scope Summary</h2>

            <table>
                <tr>
                    <th>Scope Type</th>
                    <th>Meaning</th>
                    <th>Example</th>
                </tr>
                <tr>
                    <td>Global</td>
                    <td>Variable created outside a function.</td>
                    <td><code>$siteName</code></td>
                </tr>
                <tr>
                    <td>Local</td>
                    <td>Variable created inside a function.</td>
                    <td><code>$message</code></td>
                </tr>
                <tr>
                    <td>Static</td>
                    <td>Local variable that remembers its value between function calls.</td>
                    <td><code>static $count</code></td>
                </tr>
            </table>
        </div>

        <div class="box warning">
            <h2>Beginner Reminder</h2>

            <p>
                For beginners, avoid using too many global variables. In larger backend systems,
                too many global variables can make the program harder to maintain.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="04 - Constants.php">&lsaquo; Previous: 04 - Constants.php</a>
            <a class="next" href="06 - Type Checking.php">Next: 06 - Type Checking.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
