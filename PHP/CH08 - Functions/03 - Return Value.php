<?php
/*
  FILE: 03 - Return Value.php
  TOPIC: CH08 - Functions

  GOAL:
  - Learn how to return a value from a function.
  - Understand the difference between echo and return.
  - Use a returned value in another calculation or output.

  IMPORTANT:
  - echo displays output immediately.
  - return sends a value back to the place where the function was called.
*/


/*
  This function calculates total price.

  It does not directly display the result.
  Instead, it returns the result to the caller.
*/

function calculateTotal($price, $quantity) {
    $total = $price * $quantity;

    return $total;
}


/*
  This function calculates final price after discount.
*/

function calculateFinalPrice($total, $discount) {
    return $total - $discount;
}


/*
  Call the functions and store the returned values.
*/

$itemPrice = 12.90;
$itemQuantity = 3;
$discount = 5.00;

$totalPrice = calculateTotal($itemPrice, $itemQuantity);
$finalPrice = calculateFinalPrice($totalPrice, $discount);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 03 - Return Value.php

      This file shows how to return values from PHP functions.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH08 - Return Value</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">

        <h1>CH08 - Return Value</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                A function can use <code>return</code> to send a result back.
                The returned value can be stored in a variable or used in another calculation.
            </p>
        </div>

        <div class="box output">
            <h2>Receipt Calculation</h2>

            <p><strong>Item price:</strong> RM <?php echo number_format($itemPrice, 2); ?></p>
            <p><strong>Quantity:</strong> <?php echo $itemQuantity; ?></p>
            <p><strong>Total price:</strong> RM <?php echo number_format($totalPrice, 2); ?></p>
            <p><strong>Discount:</strong> RM <?php echo number_format($discount, 2); ?></p>
            <p><strong>Final price:</strong> RM <?php echo number_format($finalPrice, 2); ?></p>
        </div>

        <div class="box warning">
            <h2>echo vs return</h2>

            <p>
                Use <code>echo</code> when you want to display something immediately.
            </p>

            <p>
                Use <code>return</code> when you want the function to produce a value
                that can be reused later.
            </p>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>function calculateTotal($price, $quantity) {
    return $price * $quantity;
}

$totalPrice = calculateTotal(12.90, 3);</pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="02 - Function Parameters.php">&lsaquo; Previous: 02 - Function Parameters.php</a>
            <a class="next" href="04 - Default Parameter Value.php">Next: 04 - Default Parameter Value.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
