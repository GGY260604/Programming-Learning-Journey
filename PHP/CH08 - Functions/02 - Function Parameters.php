<?php
/*
  FILE: 02 - Function Parameters.php
  TOPIC: CH08 - Functions

  GOAL:
  - Learn how to pass values into a function.
  - Understand the meaning of parameter and argument.
  - Use one function with different input values.

  IMPORTANT:
  - A parameter is the variable written inside the function definition.
  - An argument is the actual value passed into the function call.
*/


/*
  Function with one parameter.

  $name is a parameter.
  It receives the value passed when the function is called.
*/

function greetUser($name) {
    echo "<p>Hello, " . htmlspecialchars($name) . ". Welcome back.</p>";
}


/*
  Function with multiple parameters.

  This function receives a product name, price, and quantity.
*/

function showOrderSummary($productName, $price, $quantity) {
    $total = $price * $quantity;

    echo "<tr>";
    echo "<td>" . htmlspecialchars($productName) . "</td>";
    echo "<td>RM " . number_format($price, 2) . "</td>";
    echo "<td>" . $quantity . "</td>";
    echo "<td>RM " . number_format($total, 2) . "</td>";
    echo "</tr>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 02 - Function Parameters.php

      This file shows how parameters make functions more flexible.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH08 - Function Parameters</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH08 - Function Parameters</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                Parameters allow a function to receive data.
                This makes the function reusable with different values.
            </p>
        </div>

        <div class="box output">
            <h2>Function with One Parameter</h2>

            <?php
                /*
                  "Galen", "Cleo", and "Admin" are arguments.
                  Each value is passed into the $name parameter.
                */

                greetUser("Galen");
                greetUser("Cleo");
                greetUser("Admin");
            ?>
        </div>

        <div class="box output">
            <h2>Function with Multiple Parameters</h2>

            <table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>

                <?php
                    showOrderSummary("Burger", 8.50, 2);
                    showOrderSummary("Iced Lemon Tea", 3.20, 1);
                    showOrderSummary("French Fries", 4.00, 3);
                ?>
            </table>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>function greetUser($name) {
    echo "Hello, " . $name;
}

greetUser("Galen");</pre>
        </div>

    </div>

</body>
</html>
