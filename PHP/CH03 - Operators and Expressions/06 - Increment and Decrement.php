<?php
/*
  FILE: 06 - Increment and Decrement.php
  TOPIC: CH03 - Operators and Expressions

  GOAL:
  - Learn how ++ and -- work in PHP.
  - Learn the difference between pre-increment and post-increment.

  OPERATORS COVERED:
  ++$x   Pre-increment
  $x++   Post-increment
  --$x   Pre-decrement
  $x--   Post-decrement
*/

/*
  Post-increment example:
  The old value is used first, then the variable increases.
*/

$postNumber = 5;
$postResult = $postNumber++;
$postAfter = $postNumber;

/*
  Pre-increment example:
  The variable increases first, then the new value is used.
*/

$preNumber = 5;
$preResult = ++$preNumber;
$preAfter = $preNumber;

/*
  Post-decrement example:
  The old value is used first, then the variable decreases.
*/

$postDecreaseNumber = 5;
$postDecreaseResult = $postDecreaseNumber--;
$postDecreaseAfter = $postDecreaseNumber;

/*
  Pre-decrement example:
  The variable decreases first, then the new value is used.
*/

$preDecreaseNumber = 5;
$preDecreaseResult = --$preDecreaseNumber;
$preDecreaseAfter = $preDecreaseNumber;

$examples = [
    [
        "type" => "Post-increment",
        "code" => "\$result = \$number++;",
        "valueUsed" => $postResult,
        "valueAfter" => $postAfter,
        "meaning" => "Use the old value first, then add 1."
    ],
    [
        "type" => "Pre-increment",
        "code" => "\$result = ++\$number;",
        "valueUsed" => $preResult,
        "valueAfter" => $preAfter,
        "meaning" => "Add 1 first, then use the new value."
    ],
    [
        "type" => "Post-decrement",
        "code" => "\$result = \$number--;",
        "valueUsed" => $postDecreaseResult,
        "valueAfter" => $postDecreaseAfter,
        "meaning" => "Use the old value first, then subtract 1."
    ],
    [
        "type" => "Pre-decrement",
        "code" => "\$result = --\$number;",
        "valueUsed" => $preDecreaseResult,
        "valueAfter" => $preDecreaseAfter,
        "meaning" => "Subtract 1 first, then use the new value."
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 06 - Increment and Decrement.php
      TOPIC: CH03 - Operators and Expressions

      Escaped PHP tag example:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH03 - Increment and Decrement</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>CH03 - Increment and Decrement</h1>

            <p class="subtitle">
                Increment and decrement operators are commonly used in counters and loops.
            </p>

            <div class="box result-box">
                <h2>Result Comparison</h2>

                <table>
                    <tr>
                        <th>Type</th>
                        <th>Code</th>
                        <th>Value Used in Expression</th>
                        <th>Variable Value After</th>
                        <th>Meaning</th>
                    </tr>

                    <?php foreach ($examples as $example) { ?>
                        <tr>
                            <td><?php echo $example["type"]; ?></td>
                            <td><code><?php echo $example["code"]; ?></code></td>
                            <td><?php echo $example["valueUsed"]; ?></td>
                            <td><?php echo $example["valueAfter"]; ?></td>
                            <td><?php echo $example["meaning"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box example-box">
                <h2>Simple Counter Example</h2>

                <?php
                    $counter = 1;

                    echo "<div class='output-line'>Counter: " . $counter++ . "</div>";
                    echo "<div class='output-line'>Counter: " . $counter++ . "</div>";
                    echo "<div class='output-line'>Counter: " . $counter++ . "</div>";
                ?>

                <p>
                    Each time <code>$counter++</code> runs, the number increases by 1.
                </p>
            </div>

            <div class="box note-box">
                <h2>Beginner Advice</h2>

                <p>
                    In many beginner cases, using <code>$number++</code> alone is enough.
                    The difference between pre-increment and post-increment becomes important when the operator is used inside a larger expression.
                </p>
            </div>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="05 - String Operators.php">&lsaquo; Previous: 05 - String Operators.php</a>
                <a class="next" href="07 - Ternary Operator.php">Next: 07 - Ternary Operator.php &rsaquo;</a>
            </nav>


        </div>
    </div>

</body>
</html>
