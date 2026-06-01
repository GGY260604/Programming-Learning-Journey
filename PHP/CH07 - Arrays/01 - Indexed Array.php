<?php
/*
  FILE: 01 - Indexed Array.php
  TOPIC: CH07 - Arrays

  GOAL:
  - Learn how to create an indexed array.
  - Learn how to access array values using numeric indexes.
  - Learn how to update and add array values.

  IMPORTANT:
  - An indexed array stores multiple values in one variable.
  - Each value has a numeric index.
  - In PHP, array indexes start from 0.
*/


/*
  Create an indexed array.

  The array below stores several programming language names.

  Index:
  0 => "PHP"
  1 => "JavaScript"
  2 => "Java"
  3 => "C++"
*/

$languages = ["PHP", "JavaScript", "Java", "C++"];


/*
  Access array values.

  Because array indexes start from 0:
  - $languages[0] means the first value
  - $languages[1] means the second value
*/

$firstLanguage = $languages[0];
$secondLanguage = $languages[1];


/*
  Update an array value.

  This changes the value at index 2 from "Java" to "Python".
*/

$languages[2] = "Python";


/*
  Add a new value to the end of the array.

  When we use empty square brackets [],
  PHP automatically adds the value to the next available index.
*/

$languages[] = "Ruby";


/*
  Count the total number of values in the array.
*/

$totalLanguages = count($languages);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 01 - Indexed Array.php

      This file shows the basic use of indexed arrays in PHP.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH07 - Indexed Array</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH07 - Indexed Array</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                An indexed array stores many values in one variable.
                Each value is accessed using a numeric index.
            </p>

            <p>
                The first index is always <code>0</code>, not <code>1</code>.
            </p>
        </div>

        <div class="box output">
            <h2>Access Array Values</h2>

            <p><strong>First language:</strong> <?php echo $firstLanguage; ?></p>
            <p><strong>Second language:</strong> <?php echo $secondLanguage; ?></p>
        </div>

        <div class="box output">
            <h2>All Languages After Update and Add</h2>

            <ul>
                <?php foreach ($languages as $language) { ?>
                    <li><?php echo $language; ?></li>
                <?php } ?>
            </ul>

            <p><strong>Total languages:</strong> <?php echo $totalLanguages; ?></p>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>$languages = ["PHP", "JavaScript", "Java", "C++"];

echo $languages[0];

$languages[2] = "Python";

$languages[] = "Ruby";</pre>
        </div>

    </div>

</body>
</html>
