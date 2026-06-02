<?php
/*
  FILE: 02 - String Integer Float Boolean.php
  TOPIC: CH02 - Variables Data Types and Constants

  GOAL:
  - Learn four common PHP data types.
  - Understand string, integer, float, and boolean values.
  - Learn how gettype() can show the type of a value.

  HOW TO RUN:
  1. Start Apache in XAMPP.
  2. Place the PHP folder inside htdocs.
  3. Open this file using localhost.

  IMPORTANT:
  - PHP is loosely typed.
  - You do not need to declare the data type before assigning a value.
  - PHP decides the type based on the value assigned.
*/


/*
  String:
  - Used for text.
  - Can be written using double quotes or single quotes.
*/

$productName = "Chicken Burger";


/*
  Integer:
  - Used for whole numbers.
  - No decimal point.
*/

$quantity = 3;


/*
  Float:
  - Used for decimal numbers.
  - Also called double in some PHP outputs.
*/

$price = 8.50;


/*
  Boolean:
  - Used for true or false values.
  - Often used for conditions, login status, validation result, and database checks.
*/

$isAvailable = true;


/*
  Calculate total price.

  PHP can calculate using variables that store numbers.
*/

$totalPrice = $quantity * $price;


/*
  Store the examples in an array so we can display them in a table.

  You will learn arrays in a later chapter.
  For now, just understand that this is a list of values.
*/

$examples = [
    ["Variable" => "\$productName", "Value" => $productName, "Type" => gettype($productName), "Meaning" => "Text data"],
    ["Variable" => "\$quantity", "Value" => $quantity, "Type" => gettype($quantity), "Meaning" => "Whole number"],
    ["Variable" => "\$price", "Value" => $price, "Type" => gettype($price), "Meaning" => "Decimal number"],
    ["Variable" => "\$isAvailable", "Value" => $isAvailable ? "true" : "false", "Type" => gettype($isAvailable), "Meaning" => "True or false value"],
    ["Variable" => "\$totalPrice", "Value" => $totalPrice, "Type" => gettype($totalPrice), "Meaning" => "Calculated result"]
];

$chapter = "CH02 - Variables Data Types and Constants";
$fileName = "02 - String Integer Float Boolean.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      PHP code shown inside HTML comments should be escaped.
      Example:
      &lt;?php echo gettype($price); ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH02 - String Integer Float Boolean</title>
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
            <h2>Data Type Examples</h2>

            <table>
                <tr>
                    <th>Variable</th>
                    <th>Value</th>
                    <th>PHP Type</th>
                    <th>Meaning</th>
                </tr>

                <?php foreach ($examples as $example) { ?>
                    <tr>
                        <td><code><?php echo $example["Variable"]; ?></code></td>
                        <td><?php echo $example["Value"]; ?></td>
                        <td><?php echo $example["Type"]; ?></td>
                        <td><?php echo $example["Meaning"]; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <h2>Example Calculation</h2>

            <p>
                Product: <strong><?php echo $productName; ?></strong>
            </p>

            <p>
                Quantity: <strong><?php echo $quantity; ?></strong>
            </p>

            <p>
                Price per item: <strong>RM <?php echo number_format($price, 2); ?></strong>
            </p>

            <p>
                Total price: <strong>RM <?php echo number_format($totalPrice, 2); ?></strong>
            </p>
        </div>

        <div class="box">
            <h2>Basic Syntax</h2>

            <pre>&lt;?php
$name = "Galen";      // string
$age = 20;            // integer
$price = 9.99;        // float
$isStudent = true;    // boolean
?&gt;</pre>

            <p>
                PHP automatically detects the type from the assigned value.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="01 - Variables.php">&lsaquo; Previous: 01 - Variables.php</a>
            <a class="next" href="03 - Null and Empty Values.php">Next: 03 - Null and Empty Values.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
