<?php
/*
  FILE: 01 - While Loop.php
  TOPIC: CH06 - Loops

  GOAL:
  - Learn how to use a while loop in PHP.
  - Understand that a while loop repeats while a condition is true.
  - Learn why the loop variable must be updated.

  IMPORTANT:
  A while loop checks the condition before running the loop body.
  If the condition is false at the beginning, the loop body will not run.
*/

/*
  In this example, we want to display numbers from 1 to 5.

  Step 1: Create a starting value.
  Step 2: Check whether the value is less than or equal to 5.
  Step 3: Display the value.
  Step 4: Increase the value so the loop can eventually stop.
*/

$number = 1;
$numbers = [];

while ($number <= 5) {
    /*
      This value is saved into an array first.
      Later, the HTML section will display the array.
    */

    $numbers[] = $number;

    /*
      This is the update statement.
      Without this line, $number will always stay the same,
      and the loop may become an infinite loop.
    */

    $number++;
}

/*
  Another while loop example.
  This simulates reading a list of tasks one by one.
*/

$tasks = ["Open XAMPP", "Start Apache", "Open browser", "Run PHP file"];
$index = 0;
$taskOutput = [];

while ($index < count($tasks)) {
    $taskOutput[] = $tasks[$index];
    $index++;
}
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
    <title>CH06 - While Loop</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">

        
        <div class="page-card">
            <h1>CH06 - While Loop</h1>

        <div class="box example">
            <h2>What is a While Loop?</h2>

            <p>
                A <code>while</code> loop repeats a block of code as long as the condition is true.
            </p>

            <pre>while (condition) {
    // repeated code
}</pre>
        </div>

        <div class="box output">
            <h2>Example 1: Display Numbers from 1 to 5</h2>

            <?php foreach ($numbers as $item) { ?>
                <div class="result-item">
                    Number: <?php echo $item; ?>
                </div>
            <?php } ?>
        </div>

        <div class="box output">
            <h2>Example 2: Display Task List</h2>

            <?php foreach ($taskOutput as $position => $task) { ?>
                <div class="result-item">
                    Step <?php echo $position + 1; ?>: <?php echo htmlspecialchars($task); ?>
                </div>
            <?php } ?>
        </div>

        <div class="box warning">
            <h2>Important Reminder</h2>

            <p>
                A <code>while</code> loop can become an infinite loop if the condition never becomes false.
                Always make sure the loop variable is updated properly.
            </p>
        </div>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="../CH05 - Conditional Statements/06 - Match Expression.php">&lsaquo; Previous: 06 - Match Expression.php</a>
                <a class="next" href="02 - Do While Loop.php">Next: 02 - Do While Loop.php &rsaquo;</a>
            </nav>

        </div>
    </div>

</body>
</html>
