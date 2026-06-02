<?php
/*
  FILE: 02 - Do While Loop.php
  TOPIC: CH06 - Loops

  GOAL:
  - Learn how to use a do while loop in PHP.
  - Understand the difference between while and do while.
  - See that do while runs at least one time.

  IMPORTANT:
  A do while loop checks the condition after running the loop body.
  This means the code inside the loop will always run at least once.
*/

/*
  Example 1:
  This loop displays numbers from 1 to 5.
*/

$number = 1;
$numbers = [];

do {
    $numbers[] = $number;
    $number++;
} while ($number <= 5);

/*
  Example 2:
  This shows the special behavior of do while.

  The condition is false because $loginAttempt is already 4.
  However, the loop body still runs once before checking the condition.
*/

$loginAttempt = 4;
$attemptMessages = [];

do {
    $attemptMessages[] = "Login attempt number " . $loginAttempt;
    $loginAttempt++;
} while ($loginAttempt <= 3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file is a PHP file that outputs HTML.

      Important:
      If we want to show PHP syntax inside an HTML comment,
      we should escape the PHP opening tag.

      Safe example inside HTML comment:
      &lt;?php echo "Hello World"; ?&gt;

      Do not write the real PHP opening tag inside an HTML comment
      when you only want to display it as text.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH06 - Do While Loop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">

        
        <div class="page-card">
            <h1>CH06 - Do While Loop</h1>

        <div class="box example">
            <h2>What is a Do While Loop?</h2>

            <p>
                A <code>do while</code> loop runs the loop body first, then checks the condition.
            </p>

            <pre>do {
    // repeated code
} while (condition);</pre>
        </div>

        <div class="box output">
            <h2>Example 1: Display Numbers from 1 to 5</h2>

            <?php foreach ($numbers as $item) { ?>
                <span class="badge"><?php echo $item; ?></span>
            <?php } ?>
        </div>

        <div class="box output">
            <h2>Example 2: Runs At Least Once</h2>

            <?php foreach ($attemptMessages as $message) { ?>
                <div class="result-item">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php } ?>

            <p>
                The condition is false, but the loop still runs once because the condition is checked after the body.
            </p>
        </div>

        <div class="box warning">
            <h2>While vs Do While</h2>

            <table>
                <tr>
                    <th>Loop Type</th>
                    <th>Condition Checked</th>
                    <th>Minimum Runs</th>
                </tr>
                <tr>
                    <td><code>while</code></td>
                    <td>Before the loop body</td>
                    <td>Zero times</td>
                </tr>
                <tr>
                    <td><code>do while</code></td>
                    <td>After the loop body</td>
                    <td>One time</td>
                </tr>
            </table>
        </div>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="01 - While Loop.php">&lsaquo; Previous: 01 - While Loop.php</a>
                <a class="next" href="03 - For Loop.php">Next: 03 - For Loop.php &rsaquo;</a>
            </nav>

        </div>
    </div>

</body>
</html>
