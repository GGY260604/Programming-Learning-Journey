<?php
/*
  FILE: 05 - Type Declaration.php
  TOPIC: CH08 - Functions

  GOAL:
  - Learn how to declare parameter types.
  - Learn how to declare return types.
  - Understand why type declarations make backend code safer.

  IMPORTANT:
  - Type declarations help control what data type a function should receive.
  - Return type declarations help control what data type a function should return.
  - Common types include string, int, float, bool, and array.
*/


/*
  Function with parameter type declarations and return type declaration.

  float $price means the price should be a floating-point number.
  int $quantity means the quantity should be an integer.
  : float means the function should return a float value.

  if you pass a different data type, PHP will throw a TypeError.
  if the function returns a different data type, PHP will also throw a TypeError.
*/

function calculateSubtotal(float $price, int $quantity): float {
    return $price * $quantity;
}


/*
  Function that receives string and returns string.
*/

function formatStudentName(string $name): string {
    return strtoupper($name);
}


/*
  Function that receives array and returns int.
*/

function countItems(array $items): int {
    return count($items);
}

$subtotal = calculateSubtotal(9.90, 4);
$studentName = formatStudentName("Galen");
$cartItems = ["Book", "Pen", "Notebook"];
$totalItems = countItems($cartItems);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 05 - Type Declaration.php

      This file shows parameter and return type declarations in PHP.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH08 - Type Declaration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH08 - Type Declaration</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                Type declarations make the expected data type clearer.
                This is useful in backend systems because functions often receive data from forms, databases, or APIs.
            </p>
        </div>

        <div class="box output">
            <h2>Output</h2>

            <p><strong>Subtotal:</strong> RM <?php echo number_format($subtotal, 2); ?></p>
            <p><strong>Formatted student name:</strong> <?php echo $studentName; ?></p>
            <p><strong>Total cart items:</strong> <?php echo $totalItems; ?></p>
        </div>

        <div class="box warning">
            <h2>Important Reminder</h2>

            <p>
                Type declaration does not replace validation.
                For real form input, you still need to validate user input before using it.
            </p>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>function calculateSubtotal(float $price, int $quantity): float {
    return $price * $quantity;
}</pre>
        </div>

    </div>

</body>
</html>
