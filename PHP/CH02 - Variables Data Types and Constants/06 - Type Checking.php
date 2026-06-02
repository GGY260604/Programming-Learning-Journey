<?php
/*
  FILE: 06 - Type Checking.php
  TOPIC: CH02 - Variables Data Types and Constants

  GOAL:
  - Learn how to check the type of a value.
  - Learn gettype().
  - Learn common is_* type checking functions.
  - Understand why type checking is important in backend development.

  HOW TO RUN:
  1. Start Apache in XAMPP.
  2. Place the PHP folder inside htdocs.
  3. Open this file using localhost.

  IMPORTANT:
  - Form input usually arrives as string data.
  - Type checking helps prevent logic mistakes.
  - Type casting can convert one type to another type.
*/


/*
  Create values with different data types.
*/

$username = "Galen";
$age = 20;
$height = 1.75;
$isLoggedIn = true;
$subjects = ["PHP", "MySQL", "Backend"];
$middleName = null;


/*
  Simulate input from a form.

  Even though this looks like a number, form data usually arrives as a string.
*/

$formQuantity = "5";


/*
  Convert string to integer using type casting.
*/

$convertedQuantity = (int) $formQuantity;


/*
  Store all examples in an array for table display.
*/

$values = [
    ["Name" => "\$username", "Value" => $username],
    ["Name" => "\$age", "Value" => $age],
    ["Name" => "\$height", "Value" => $height],
    ["Name" => "\$isLoggedIn", "Value" => $isLoggedIn],
    ["Name" => "\$subjects", "Value" => $subjects],
    ["Name" => "\$middleName", "Value" => $middleName],
    ["Name" => "\$formQuantity", "Value" => $formQuantity],
    ["Name" => "\$convertedQuantity", "Value" => $convertedQuantity]
];


/*
  This helper function converts any value into readable text.

  You will learn functions in a later chapter.
  For now, focus on how the value is displayed.
*/

function readableValue($value) {
    return htmlspecialchars(var_export($value, true));
}

$chapter = "CH02 - Variables Data Types and Constants";
$fileName = "06 - Type Checking.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      Escaped PHP code example:
      &lt;?php echo gettype($username); ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH02 - Type Checking</title>
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
            <h2>Type Checking Table</h2>

            <table>
                <tr>
                    <th>Variable</th>
                    <th>Value</th>
                    <th>gettype()</th>
                    <th>Type Check Result</th>
                </tr>

                <?php foreach ($values as $item) { ?>
                    <tr>
                        <td><code><?php echo $item["Name"]; ?></code></td>
                        <td><code><?php echo readableValue($item["Value"]); ?></code></td>
                        <td><?php echo gettype($item["Value"]); ?></td>
                        <td>
                            <?php
                                if (is_string($item["Value"])) {
                                    echo "is_string() is true";
                                } elseif (is_int($item["Value"])) {
                                    echo "is_int() is true";
                                } elseif (is_float($item["Value"])) {
                                    echo "is_float() is true";
                                } elseif (is_bool($item["Value"])) {
                                    echo "is_bool() is true";
                                } elseif (is_array($item["Value"])) {
                                    echo "is_array() is true";
                                } elseif (is_null($item["Value"])) {
                                    echo "is_null() is true";
                                } else {
                                    echo "Other type";
                                }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <h2>Form Input Example</h2>

            <p>
                Original form quantity:
                <code><?php echo readableValue($formQuantity); ?></code>
            </p>

            <p>
                Original type:
                <strong><?php echo gettype($formQuantity); ?></strong>
            </p>

            <p>
                Converted quantity:
                <code><?php echo readableValue($convertedQuantity); ?></code>
            </p>

            <p>
                Converted type:
                <strong><?php echo gettype($convertedQuantity); ?></strong>
            </p>
        </div>

        <div class="box">
            <h2>Common Type Checking Functions</h2>

            <table>
                <tr>
                    <th>Function</th>
                    <th>Purpose</th>
                </tr>
                <tr>
                    <td><code>gettype($value)</code></td>
                    <td>Returns the type name of a value.</td>
                </tr>
                <tr>
                    <td><code>is_string($value)</code></td>
                    <td>Checks whether the value is a string.</td>
                </tr>
                <tr>
                    <td><code>is_int($value)</code></td>
                    <td>Checks whether the value is an integer.</td>
                </tr>
                <tr>
                    <td><code>is_float($value)</code></td>
                    <td>Checks whether the value is a float.</td>
                </tr>
                <tr>
                    <td><code>is_bool($value)</code></td>
                    <td>Checks whether the value is a boolean.</td>
                </tr>
                <tr>
                    <td><code>is_array($value)</code></td>
                    <td>Checks whether the value is an array.</td>
                </tr>
                <tr>
                    <td><code>is_null($value)</code></td>
                    <td>Checks whether the value is null.</td>
                </tr>
            </table>
        </div>

        <div class="box warning">
            <h2>Backend Reminder</h2>

            <p>
                When using form input in calculations or database operations,
                check and convert the type first. This can reduce bugs in backend logic.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="05 - Variable Scope Preview.php">&lsaquo; Previous: 05 - Variable Scope Preview.php</a>
            <a class="next" href="../CH03 - Operators and Expressions/01 - Arithmetic Operators.php">Next: 01 - Arithmetic Operators.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
