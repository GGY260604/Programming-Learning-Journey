<?php
/*
  FILE: 03 - For Loop.php
  TOPIC: CH06 - Loops

  GOAL:
  - Learn how to use a for loop in PHP.
  - Understand initialization, condition, and update.
  - Use a for loop when the number of repetitions is known.

  IMPORTANT:
  A for loop is commonly used when we know how many times we want to repeat something.
*/

/*
  For loop structure:

  for (start value; condition; update) {
      repeated code
  }

  Example:
  for ($i = 1; $i <= 5; $i++)
*/

$numbers = [];

for ($i = 1; $i <= 5; $i++) {
    $numbers[] = $i;
}

/*
  Example 2:
  Generate a multiplication table for number 3.
*/

$baseNumber = 3;
$multiplicationRows = [];

for ($i = 1; $i <= 10; $i++) {
    $multiplicationRows[] = [
        "base" => $baseNumber,
        "multiplier" => $i,
        "answer" => $baseNumber * $i
    ];
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
    <title>CH06 - For Loop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH06 - For Loop</h1>

        <div class="box example">
            <h2>For Loop Structure</h2>

            <pre>for (start value; condition; update) {
    // repeated code
}</pre>

            <p>
                The <code>for</code> loop is useful when the number of repetitions is already known.
            </p>
        </div>

        <div class="box output">
            <h2>Example 1: Numbers from 1 to 5</h2>

            <?php for ($i = 0; $i < count($numbers); $i++) { ?>
                <span class="badge"><?php echo $numbers[$i]; ?></span>
            <?php } ?>
        </div>

        <div class="box output">
            <h2>Example 2: Multiplication Table of <?php echo $baseNumber; ?></h2>

            <table>
                <tr>
                    <th>Expression</th>
                    <th>Answer</th>
                </tr>

                <?php for ($i = 0; $i < count($multiplicationRows); $i++) { ?>
                    <tr>
                        <td>
                            <?php
                                echo $multiplicationRows[$i]["base"];
                                echo " x ";
                                echo $multiplicationRows[$i]["multiplier"];
                            ?>
                        </td>
                        <td>
                            <?php echo $multiplicationRows[$i]["answer"]; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box warning">
            <h2>When to Use For Loop?</h2>

            <p>
                Use a <code>for</code> loop when you already know the start value,
                the end condition, and how the value should change after each loop cycle.
            </p>
        </div>

    </div>

</body>
</html>
