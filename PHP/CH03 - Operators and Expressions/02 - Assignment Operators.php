<?php
/*
  FILE: 02 - Assignment Operators.php
  TOPIC: CH03 - Operators and Expressions

  GOAL:
  - Learn how assignment operators store and update values.
  - Learn the difference between normal assignment and combined assignment.

  OPERATORS COVERED:
  =    Assign value
  +=   Add and assign
  -=   Subtract and assign
  *=   Multiply and assign
  /=   Divide and assign
  %=   Modulus and assign
  **=  Exponentiation and assign
*/

/*
  The normal assignment operator is =.

  It does not mean equal in mathematics.
  In programming, = means store the value on the right into the variable on the left.
*/

$balance = 100;

/*
  This array will keep each step so we can show how the value changes.
*/

$steps = [];

$steps[] = [
    "operation" => "Initial value",
    "code" => "\$balance = 100;",
    "result" => $balance
];

/*
  += means add the right value to the current value.
  Same meaning as: $balance = $balance + 50;
*/

$balance += 50;
$steps[] = [
    "operation" => "Add and assign",
    "code" => "\$balance += 50;",
    "result" => $balance
];

/*
  -= means subtract the right value from the current value.
*/

$balance -= 30;
$steps[] = [
    "operation" => "Subtract and assign",
    "code" => "\$balance -= 30;",
    "result" => $balance
];

/*
  *= means multiply the current value by the right value.
*/

$balance *= 2;
$steps[] = [
    "operation" => "Multiply and assign",
    "code" => "\$balance *= 2;",
    "result" => $balance
];

/*
  /= means divide the current value by the right value.
*/

$balance /= 4;
$steps[] = [
    "operation" => "Divide and assign",
    "code" => "\$balance /= 4;",
    "result" => $balance
];

/*
  %= means get the remainder and assign it back to the variable.
*/

$balance %= 7;
$steps[] = [
    "operation" => "Modulus and assign",
    "code" => "\$balance %= 7;",
    "result" => $balance
];

/*
  **= means calculate power and assign it back to the variable.
*/

$balance **= 2;
$steps[] = [
    "operation" => "Power and assign",
    "code" => "\$balance **= 2;",
    "result" => $balance
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 02 - Assignment Operators.php
      TOPIC: CH03 - Operators and Expressions

      Escaped PHP tag example:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH03 - Assignment Operators</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>Assignment Operators</h1>

            <p class="subtitle">
                Assignment operators are used to store values and update existing values.
            </p>

            <div class="box result-box">
                <h2>Step-by-Step Value Changes</h2>

                <table>
                    <tr>
                        <th>Step</th>
                        <th>Operation</th>
                        <th>Code</th>
                        <th>Current Value</th>
                    </tr>

                    <?php foreach ($steps as $index => $step) { ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo $step["operation"]; ?></td>
                            <td><code><?php echo $step["code"]; ?></code></td>
                            <td><?php echo $step["result"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box example-box">
                <h2>Long Form vs Short Form</h2>

                <p>These two lines have the same meaning:</p>

                <pre>$balance = $balance + 50;
$balance += 50;</pre>

                <p>
                    The second line is shorter and commonly used in real PHP projects.
                </p>
            </div>

            <div class="box note-box">
                <h2>Where This Is Useful</h2>

                <p>
                    Assignment operators are useful when updating totals, stock quantity,
                    payment amount, discount value, and counters.
                </p>
            </div>

        </div>
    </div>

</body>
</html>
