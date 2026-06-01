<?php
/*
  FILE: 01 - Arithmetic Operators.php
  TOPIC: CH03 - Operators and Expressions

  GOAL:
  - Learn how arithmetic operators work in PHP.
  - Learn how PHP calculates numbers.
  - Learn the difference between division, modulus, and exponentiation.

  OPERATORS COVERED:
  +   Addition
  -   Subtraction
  *   Multiplication
  /   Division
  %   Modulus / remainder
  **  Exponentiation / power
*/

/*
  These two variables will be used in the examples below.

  In PHP, numbers do not need quotation marks.
  If you put quotation marks, the value becomes a string.
*/

$a = 15;
$b = 4;

/*
  Each expression below produces a result.

  Example:
  $a + $b is an expression.
  It means 15 + 4.
*/

$addition = $a + $b;
$subtraction = $a - $b;
$multiplication = $a * $b;
$division = $a / $b;
$modulus = $a % $b;
$exponentiation = $a ** $b;

/*
  Store the results inside an array so that we can display them using a loop.
  This makes the HTML table easier to build.
*/

$examples = [
    ["operator" => "+", "name" => "Addition", "expression" => "$a + $b", "result" => $addition],
    ["operator" => "-", "name" => "Subtraction", "expression" => "$a - $b", "result" => $subtraction],
    ["operator" => "*", "name" => "Multiplication", "expression" => "$a * $b", "result" => $multiplication],
    ["operator" => "/", "name" => "Division", "expression" => "$a / $b", "result" => $division],
    ["operator" => "%", "name" => "Modulus", "expression" => "$a % $b", "result" => $modulus],
    ["operator" => "**", "name" => "Exponentiation", "expression" => "$a ** $b", "result" => $exponentiation]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 01 - Arithmetic Operators.php
      TOPIC: CH03 - Operators and Expressions

      This is an HTML comment.
      If you want to show PHP tags inside an HTML comment, escape them like this:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH03 - Arithmetic Operators</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>Arithmetic Operators</h1>

            <p class="subtitle">
                Arithmetic operators are used to perform mathematical calculations.
            </p>

            <div class="box example-box">
                <h2>Original Values</h2>

                <p><code>$a</code> = <?php echo $a; ?></p>
                <p><code>$b</code> = <?php echo $b; ?></p>
            </div>

            <div class="box result-box">
                <h2>Calculation Results</h2>

                <table>
                    <tr>
                        <th>Operator</th>
                        <th>Name</th>
                        <th>Expression</th>
                        <th>Result</th>
                    </tr>

                    <?php foreach ($examples as $example) { ?>
                        <tr>
                            <td><code><?php echo $example["operator"]; ?></code></td>
                            <td><?php echo $example["name"]; ?></td>
                            <td><code><?php echo $example["expression"]; ?></code></td>
                            <td><?php echo $example["result"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box note-box">
                <h2>Important Notes</h2>

                <p>
                    The modulus operator <code>%</code> returns the remainder after division.
                    For example, <code>15 % 4</code> gives <code>3</code> because 15 divided by 4 leaves a remainder of 3.
                </p>

                <p>
                    The exponentiation operator <code>**</code> means power.
                    For example, <code>15 ** 4</code> means 15 to the power of 4.
                </p>
            </div>

            <p class="footer-note">
                Operators are very useful when calculating totals, prices, discounts, quantities, and database values later.
            </p>

        </div>
    </div>

</body>
</html>
