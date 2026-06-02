<?php
/*
  FILE: 07 - Ternary Operator.php
  TOPIC: CH03 - Operators and Expressions

  GOAL:
  - Learn how to write simple conditions in one line.
  - Learn how the ternary operator works.
  - Learn the null coalescing operator as a useful PHP shortcut.

  OPERATORS COVERED:
  ? :   Ternary operator
  ??    Null coalescing operator
*/

$score = 75;
$age = 17;
$paymentStatus = "paid";

/*
  Ternary operator format:

  condition ? value_if_true : value_if_false;

  This is a shorter way to write simple if-else logic.
*/

$examResult = $score >= 50 ? "Pass" : "Fail";
$ageCategory = $age >= 18 ? "Adult" : "Minor";
$accessMessage = $paymentStatus === "paid" ? "Access granted" : "Payment required";

/*
  Null coalescing operator ??

  It checks whether a value exists and is not null.
  If the value does not exist, PHP uses the fallback value.

  This example reads from the URL query string.

  Try opening this file with:
  07%20-%20Ternary%20Operator.php?username=Galen
*/

$username = $_GET["username"] ?? "Guest";

$examples = [
    [
        "description" => "Exam result",
        "condition" => "\$score >= 50",
        "code" => "\$examResult = \$score >= 50 ? \"Pass\" : \"Fail\";",
        "result" => $examResult
    ],
    [
        "description" => "Age category",
        "condition" => "\$age >= 18",
        "code" => "\$ageCategory = \$age >= 18 ? \"Adult\" : \"Minor\";",
        "result" => $ageCategory
    ],
    [
        "description" => "Payment access",
        "condition" => "\$paymentStatus === \"paid\"",
        "code" => "\$accessMessage = \$paymentStatus === \"paid\" ? \"Access granted\" : \"Payment required\";",
        "result" => $accessMessage
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 07 - Ternary Operator.php
      TOPIC: CH03 - Operators and Expressions

      Escaped PHP tag example:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH03 - Ternary Operator</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>CH03 - Ternary Operator</h1>

            <p class="subtitle">
                The ternary operator is a shorter way to write simple if-else logic.
            </p>

            <div class="box example-box">
                <h2>Values Used</h2>

                <div class="output-line"><code>$score</code> = <?php echo $score; ?></div>
                <div class="output-line"><code>$age</code> = <?php echo $age; ?></div>
                <div class="output-line"><code>$paymentStatus</code> = <?php echo $paymentStatus; ?></div>
            </div>

            <div class="box result-box">
                <h2>Ternary Examples</h2>

                <table>
                    <tr>
                        <th>Description</th>
                        <th>Condition</th>
                        <th>Code</th>
                        <th>Result</th>
                    </tr>

                    <?php foreach ($examples as $example) { ?>
                        <tr>
                            <td><?php echo $example["description"]; ?></td>
                            <td><code><?php echo htmlspecialchars($example["condition"]); ?></code></td>
                            <td><code><?php echo htmlspecialchars($example["code"]); ?></code></td>
                            <td><?php echo $example["result"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box note-box">
                <h2>Null Coalescing Operator</h2>

                <p>
                    Current username:
                    <strong><?php echo htmlspecialchars($username); ?></strong>
                </p>

                <pre>$username = $_GET["username"] ?? "Guest";</pre>

                <p>
                    This means: use <code>$_GET["username"]</code> if it exists.
                    Otherwise, use <code>"Guest"</code>.
                </p>

                <p>
                    Try adding <code>?username=Galen</code> at the end of the URL.
                </p>
            </div>

            <div class="box warning-box">
                <h2>When to Use Ternary</h2>

                <p>
                    Use ternary for simple conditions only.
                    If the condition becomes too long, normal <code>if else</code> is easier to read.
                </p>
            </div>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="06 - Increment and Decrement.php">&lsaquo; Previous: 06 - Increment and Decrement.php</a>
                <a class="next" href="../CH04 - Strings and Output Formatting/01 - String Concatenation.php">Next: 01 - String Concatenation.php &rsaquo;</a>
            </nav>


        </div>
    </div>

</body>
</html>
