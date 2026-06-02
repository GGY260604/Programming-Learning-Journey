<?php
/*
  FILE: 01 - If Statement.php
  TOPIC: CH05 - Conditional Statements

  GOAL:
  - Learn how to use a basic if statement.
  - Learn that code inside if only runs when the condition is true.
  - Understand how backend PHP can make a decision before displaying HTML.

  IMPORTANT:
  An if statement is used when you only want to run code under a condition.
  If the condition is false, PHP simply skips the code block.
*/

/*
  Example situation:
  A student needs at least 50 marks to pass.
*/

$studentName = "Galen";
$mark = 72;
$passingMark = 50;

/*
  Create a default result first.
  This value will only change if the if condition is true.
*/

$resultMessage = "No result has been assigned yet.";

/*
  The condition below checks whether $mark is greater than or equal to 50.

  If the condition is true:
  - PHP enters the code block.
  - $resultMessage changes to a pass message.

  If the condition is false:
  - PHP skips this block.
*/

if ($mark >= $passingMark) {
    $resultMessage = $studentName . " passed the subject.";
}

/*
  Store the condition as text so it can be displayed in the page.
*/

$conditionText = '$mark >= $passingMark';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 01 - If Statement.php
      TOPIC: CH05 - Conditional Statements

      If you want to show PHP tags inside an HTML comment, escape them like this:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH05 - If Statement</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>CH05 - If Statement</h1>

            <p class="subtitle">
                An <code>if</code> statement runs a block of code only when the condition is true.
            </p>

            <div class="box example-box">
                <h2>Input Values</h2>

                <p><code>$studentName</code> = <?php echo $studentName; ?></p>
                <p><code>$mark</code> = <?php echo $mark; ?></p>
                <p><code>$passingMark</code> = <?php echo $passingMark; ?></p>
            </div>

            <div class="box result-box">
                <h2>Result</h2>

                <p>
                    Condition checked:
                    <code><?php echo htmlspecialchars($conditionText); ?></code>
                </p>

                <p class="output-line">
                    <?php echo $resultMessage; ?>
                </p>
            </div>

            <div class="box note-box">
                <h2>Code Pattern</h2>

                <pre>if ($mark &gt;= $passingMark) {
    $resultMessage = "Student passed.";
}</pre>

                <p>
                    In backend PHP, this kind of condition can be used to check whether
                    a form is valid, whether a user is logged in, or whether a database result exists.
                </p>
            </div>

            <p class="footer-note">
                The basic <code>if</code> statement is the foundation of decision-making in PHP.
            </p>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="../CH04 - Strings and Output Formatting/07 - Short Echo Tag.php">&lsaquo; Previous: 07 - Short Echo Tag.php</a>
                <a class="next" href="02 - If Else Statement.php">Next: 02 - If Else Statement.php &rsaquo;</a>
            </nav>


        </div>
    </div>

</body>
</html>
