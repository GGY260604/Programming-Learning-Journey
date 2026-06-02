<?php
/*
  FILE: 01 - String Concatenation.php
  TOPIC: CH04 - Strings and Output Formatting

  GOAL:
  - Learn how to join strings in PHP.
  - Learn how to join strings with variables.
  - Learn the difference between . and .=

  IMPORTANT:
  In PHP, the dot symbol . is used for string concatenation.
  This is different from JavaScript, where + is commonly used for joining strings.
*/

/*
  These variables will be joined together to form longer strings.
*/

$firstName = "Galen";
$course = "PHP Backend";
$level = "Beginner";

/*
  Example 1:
  Use . to join string parts.
*/

$sentenceOne = "My name is " . $firstName . ".";

/*
  Example 2:
  You can join many string parts in one expression.
*/

$sentenceTwo = $firstName . " is learning " . $course . " at " . $level . " level.";

/*
  Example 3:
  The .= operator means append to the existing string.
  It adds new content to the end of the current string.
*/

$profile = "Student Profile:";
$profile .= " Name = " . $firstName . ";";
$profile .= " Course = " . $course . ";";
$profile .= " Level = " . $level . ";";

/*
  Store examples in an array so they can be displayed in a table.
*/

$examples = [
    ["description" => "Join text with variable", "code" => '"My name is " . $firstName . "."', "result" => $sentenceOne],
    ["description" => "Join multiple parts", "code" => '$firstName . " is learning " . $course', "result" => $sentenceTwo],
    ["description" => "Append using .=", "code" => '$profile .= " Course = " . $course', "result" => $profile]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 01 - String Concatenation.php
      TOPIC: CH04 - Strings and Output Formatting

      If you want to show PHP tags inside an HTML comment, escape them like this:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH04 - String Concatenation</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>CH04 - String Concatenation</h1>

            <p class="subtitle">
                Concatenation means joining two or more strings together.
            </p>

            <div class="box example-box">
                <h2>Original Values</h2>

                <p><code>$firstName</code> = <?php echo $firstName; ?></p>
                <p><code>$course</code> = <?php echo $course; ?></p>
                <p><code>$level</code> = <?php echo $level; ?></p>
            </div>

            <div class="box result-box">
                <h2>Concatenation Results</h2>

                <table>
                    <tr>
                        <th>Description</th>
                        <th>Code Pattern</th>
                        <th>Result</th>
                    </tr>

                    <?php foreach ($examples as $example) { ?>
                        <tr>
                            <td><?php echo $example["description"]; ?></td>
                            <td><code><?php echo htmlspecialchars($example["code"]); ?></code></td>
                            <td><?php echo $example["result"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box note-box">
                <h2>Important Notes</h2>

                <p>
                    In PHP, <code>.</code> joins strings.
                    Example: <code>"Hello " . "World"</code> gives <code>Hello World</code>.
                </p>

                <p>
                    The operator <code>.=</code> appends text to an existing variable.
                    It is useful when building long messages step by step.
                </p>
            </div>

            <p class="footer-note">
                Concatenation is commonly used when creating messages, receipts, SQL strings, and dynamic HTML output.
            </p>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="../CH03 - Operators and Expressions/07 - Ternary Operator.php">&lsaquo; Previous: 07 - Ternary Operator.php</a>
                <a class="next" href="02 - Double Quote vs Single Quote.php">Next: 02 - Double Quote vs Single Quote.php &rsaquo;</a>
            </nav>


        </div>
    </div>

</body>
</html>
