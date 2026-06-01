<?php
/*
  FILE: 04 - Array Looping.php
  TOPIC: CH07 - Arrays

  GOAL:
  - Learn how to loop through arrays.
  - Learn when to use for loop and foreach loop.
  - Learn how to get both key and value from an associative array.

  IMPORTANT:
  - for loop is suitable when you need numeric indexes.
  - foreach loop is usually easier for arrays.
  - foreach can read both key and value.
*/


$subjects = ["PHP", "MySQL", "JavaScript", "HTML", "CSS"];

$student = [
    "name" => "Galen",
    "course" => "Software Engineering",
    "university" => "UTM",
    "status" => "Active"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 04 - Array Looping.php

      This file shows different ways to loop through arrays in PHP.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH07 - Array Looping</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH07 - Array Looping</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                Looping is useful when an array has many values.
                Instead of writing many <code>echo</code> statements manually,
                we can use loops to display all values.
            </p>
        </div>

        <div class="box output">
            <h2>Using for Loop with Indexed Array</h2>

            <ol>
                <?php
                /*
                  count($subjects) returns the total number of items.

                  The for loop starts from index 0 and runs until
                  the last index of the array.
                */

                for ($i = 0; $i < count($subjects); $i++) {
                ?>
                    <li>
                        Index <?php echo $i; ?>:
                        <?php echo $subjects[$i]; ?>
                    </li>
                <?php } ?>
            </ol>
        </div>

        <div class="box output">
            <h2>Using foreach Loop with Indexed Array</h2>

            <ul>
                <?php
                /*
                  foreach is simpler when we only need the value.
                */

                foreach ($subjects as $subject) {
                ?>
                    <li><?php echo $subject; ?></li>
                <?php } ?>
            </ul>
        </div>

        <div class="box output">
            <h2>Using foreach Loop with Associative Array</h2>

            <table>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                </tr>

                <?php
                /*
                  This foreach syntax gives both key and value.

                  $key stores the array key.
                  $value stores the array value.
                */

                foreach ($student as $key => $value) {
                ?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $value; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>foreach ($array as $value) {
    echo $value;
}

foreach ($array as $key => $value) {
    echo $key;
    echo $value;
}</pre>
        </div>

    </div>

</body>
</html>
