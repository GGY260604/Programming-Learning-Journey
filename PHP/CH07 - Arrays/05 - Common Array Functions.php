<?php
/*
  FILE: 05 - Common Array Functions.php
  TOPIC: CH07 - Arrays

  GOAL:
  - Learn common PHP array functions.
  - Learn how to count, add, sort, search, and combine arrays.

  IMPORTANT:
  - PHP provides many built-in array functions.
  - These functions make backend data handling easier.
*/


$numbers = [50, 20, 90, 10, 70];

$fruits = ["Apple", "Banana", "Mango"];


/*
  count() returns the number of items in an array.
*/

$totalFruits = count($fruits);


/*
  array_push() adds one or more values to the end of an array.
*/

array_push($fruits, "Orange", "Grape");


/*
  in_array() checks whether a value exists inside an array.
*/

$hasMango = in_array("Mango", $fruits);


/*
  sort() sorts an indexed array in ascending order.

  For numbers, it sorts from small to large.
  For strings, it sorts alphabetically.
*/

sort($numbers);


/*
  array_sum() returns the total of all numeric values.
*/

$totalNumberValue = array_sum($numbers);


/*
  array_merge() combines arrays.
*/

$backendTopics = ["PHP", "MySQL"];
$frontendTopics = ["HTML", "CSS", "JavaScript"];
$webTopics = array_merge($backendTopics, $frontendTopics);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 05 - Common Array Functions.php

      This file shows common functions used with PHP arrays.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH07 - Common Array Functions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH07 - Common Array Functions</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                Array functions are built-in PHP functions that help us process arrays.
            </p>

            <p>
                They are commonly used when handling form data, database records,
                shopping carts, reports, and API responses.
            </p>
        </div>

        <div class="box output">
            <h2>count()</h2>

            <p>
                Original total fruits:
                <strong><?php echo $totalFruits; ?></strong>
            </p>
        </div>

        <div class="box output">
            <h2>array_push()</h2>

            <p>Fruits after adding new values:</p>

            <ul>
                <?php foreach ($fruits as $fruit) { ?>
                    <li><?php echo $fruit; ?></li>
                <?php } ?>
            </ul>
        </div>

        <div class="box output">
            <h2>in_array()</h2>

            <?php if ($hasMango) { ?>
                <p>Mango exists in the fruit list.</p>
            <?php } else { ?>
                <p>Mango does not exist in the fruit list.</p>
            <?php } ?>
        </div>

        <div class="box output">
            <h2>sort() and array_sum()</h2>

            <p>Sorted numbers:</p>

            <ul>
                <?php foreach ($numbers as $number) { ?>
                    <li><?php echo $number; ?></li>
                <?php } ?>
            </ul>

            <p>
                Total number value:
                <strong><?php echo $totalNumberValue; ?></strong>
            </p>
        </div>

        <div class="box output">
            <h2>array_merge()</h2>

            <p>Combined web topics:</p>

            <?php foreach ($webTopics as $topic) { ?>
                <span class="badge"><?php echo $topic; ?></span>
            <?php } ?>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>count($array);

array_push($array, "New Value");

in_array("Value", $array);

sort($array);

array_sum($array);

array_merge($arrayOne, $arrayTwo);</pre>
        </div>

    </div>

</body>
</html>
