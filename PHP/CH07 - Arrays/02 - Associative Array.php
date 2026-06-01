<?php
/*
  FILE: 02 - Associative Array.php
  TOPIC: CH07 - Arrays

  GOAL:
  - Learn how to create an associative array.
  - Learn how to access values using named keys.
  - Understand why associative arrays are useful in backend development.

  IMPORTANT:
  - Indexed arrays use numeric indexes.
  - Associative arrays use named keys.
  - Associative arrays are easier to understand when storing record-like data.
*/


/*
  Create an associative array.

  This array represents one student.

  Instead of using indexes such as 0, 1, and 2,
  we use meaningful keys such as name, course, and age.
*/

$student = [
    "name" => "Galen",
    "course" => "Software Engineering",
    "age" => 20,
    "university" => "UTM"
];


/*
  Access values using keys.

  The key must be written inside square brackets.
*/

$studentName = $student["name"];
$studentCourse = $student["course"];


/*
  Update an associative array value.
*/

$student["age"] = 21;


/*
  Add a new key-value pair.
*/

$student["status"] = "Active";


/*
  Use array_key_exists() to check whether a key exists.
*/

$hasEmail = array_key_exists("email", $student);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 02 - Associative Array.php

      This file shows how associative arrays store values using named keys.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH07 - Associative Array</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH07 - Associative Array</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                An associative array uses named keys instead of numeric indexes.
            </p>

            <p>
                This is very useful when storing data that has labels,
                such as student name, course, age, and status.
            </p>
        </div>

        <div class="box output">
            <h2>Access Specific Values</h2>

            <p><strong>Name:</strong> <?php echo $studentName; ?></p>
            <p><strong>Course:</strong> <?php echo $studentCourse; ?></p>
        </div>

        <div class="box output">
            <h2>Student Details</h2>

            <table>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                </tr>

                <?php foreach ($student as $key => $value) { ?>
                    <tr>
                        <td><?php echo $key; ?></td>
                        <td><?php echo $value; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <h2>Check Key Exists</h2>

            <?php if ($hasEmail) { ?>
                <p>The email key exists.</p>
            <?php } else { ?>
                <p>The email key does not exist.</p>
            <?php } ?>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>$student = [
    "name" => "Galen",
    "course" => "Software Engineering",
    "age" => 20
];

echo $student["name"];

$student["status"] = "Active";

$hasEmail = array_key_exists("email", $student);</pre>
        </div>

    </div>

</body>
</html>
