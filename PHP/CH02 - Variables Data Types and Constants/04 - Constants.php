<?php
/*
  FILE: 04 - Constants.php
  TOPIC: CH02 - Variables Data Types and Constants

  GOAL:
  - Learn how to create constants in PHP.
  - Understand the difference between variables and constants.
  - Learn two ways to create constants: define() and const.

  HOW TO RUN:
  1. Start Apache in XAMPP.
  2. Place the PHP folder inside htdocs.
  3. Open this file using localhost.

  IMPORTANT:
  - A variable value can change.
  - A constant value should not change after it is created.
  - Constants do not use the $ symbol.
*/


/*
  Method 1: define()

  define("CONSTANT_NAME", value)

  The constant name is usually written in uppercase.
*/

define("APP_NAME", "PHP Backend Note");
define("APP_VERSION", "1.0.0");
define("TAX_RATE", 0.06);


/*
  Method 2: const

  const can also create constants.
*/

const AUTHOR_NAME = "Galen";
const DEFAULT_ROLE = "Student";


/*
  Normal variables can be changed.
*/

$pageTitle = "Constants Demo";
$pageTitle = "PHP Constants Demo";


/*
  Calculate tax using the TAX_RATE constant.
*/

$productPrice = 100;
$taxAmount = $productPrice * TAX_RATE;
$totalPrice = $productPrice + $taxAmount;

$chapter = "CH02 - Variables Data Types and Constants";
$fileName = "04 - Constants.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      Escaped PHP code example:
      &lt;?php echo APP_NAME; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH02 - Constants</title>
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
            <h2>Constant Values</h2>

            <table>
                <tr>
                    <th>Constant</th>
                    <th>Value</th>
                    <th>Created By</th>
                </tr>
                <tr>
                    <td><code>APP_NAME</code></td>
                    <td><?php echo APP_NAME; ?></td>
                    <td><code>define()</code></td>
                </tr>
                <tr>
                    <td><code>APP_VERSION</code></td>
                    <td><?php echo APP_VERSION; ?></td>
                    <td><code>define()</code></td>
                </tr>
                <tr>
                    <td><code>TAX_RATE</code></td>
                    <td><?php echo TAX_RATE; ?></td>
                    <td><code>define()</code></td>
                </tr>
                <tr>
                    <td><code>AUTHOR_NAME</code></td>
                    <td><?php echo AUTHOR_NAME; ?></td>
                    <td><code>const</code></td>
                </tr>
                <tr>
                    <td><code>DEFAULT_ROLE</code></td>
                    <td><?php echo DEFAULT_ROLE; ?></td>
                    <td><code>const</code></td>
                </tr>
            </table>
        </div>

        <div class="box">
            <h2>Using a Constant in Calculation</h2>

            <p>Product Price: RM <?php echo number_format($productPrice, 2); ?></p>
            <p>Tax Rate: <?php echo TAX_RATE * 100; ?>%</p>
            <p>Tax Amount: RM <?php echo number_format($taxAmount, 2); ?></p>
            <p>Total Price: RM <?php echo number_format($totalPrice, 2); ?></p>
        </div>

        <div class="box">
            <h2>Variable vs Constant</h2>

            <table>
                <tr>
                    <th>Item</th>
                    <th>Uses $ Symbol?</th>
                    <th>Can Change?</th>
                    <th>Example</th>
                </tr>
                <tr>
                    <td>Variable</td>
                    <td>Yes</td>
                    <td>Yes</td>
                    <td><code>$pageTitle</code></td>
                </tr>
                <tr>
                    <td>Constant</td>
                    <td>No</td>
                    <td>No</td>
                    <td><code>APP_NAME</code></td>
                </tr>
            </table>
        </div>

        <div class="box">
            <h2>Basic Constant Syntax</h2>

            <pre>&lt;?php
define("APP_NAME", "PHP Backend Note");
const AUTHOR_NAME = "Galen";

echo APP_NAME;
echo AUTHOR_NAME;
?&gt;</pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="03 - Null and Empty Values.php">&lsaquo; Previous: 03 - Null and Empty Values.php</a>
            <a class="next" href="05 - Variable Scope Preview.php">Next: 05 - Variable Scope Preview.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
