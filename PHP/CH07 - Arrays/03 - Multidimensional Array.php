<?php
/*
  FILE: 03 - Multidimensional Array.php
  TOPIC: CH07 - Arrays

  GOAL:
  - Learn what a multidimensional array is.
  - Learn how to store many records using arrays.
  - Learn how to access nested array values.

  IMPORTANT:
  - A multidimensional array means an array inside another array.
  - This is useful for storing table-like data.
  - Many database query results look similar to multidimensional arrays.
*/


/*
  Create a multidimensional array.

  The $students array contains many student records.
  Each student record is an associative array.
*/

$students = [
    [
        "id" => 1,
        "name" => "Galen",
        "course" => "Software Engineering",
        "mark" => 88
    ],
    [
        "id" => 2,
        "name" => "Cleo",
        "course" => "Computer Science",
        "mark" => 76
    ],
    [
        "id" => 3,
        "name" => "Daniel",
        "course" => "Data Engineering",
        "mark" => 91
    ]
];


/*
  Access nested array values.

  $students[0] means the first student record.
  $students[0]["name"] means the name of the first student.
*/

$firstStudentName = $students[0]["name"];
$secondStudentCourse = $students[1]["course"];


/*
  Add another student record into the array.
*/

$students[] = [
    "id" => 4,
    "name" => "Mia",
    "course" => "Software Engineering",
    "mark" => 69
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 03 - Multidimensional Array.php

      This file shows how to store many records using nested arrays.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH07 - Multidimensional Array</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH07 - Multidimensional Array</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                A multidimensional array is an array that contains another array.
            </p>

            <p>
                This is suitable for storing many records, such as many students.
            </p>
        </div>

        <div class="box output">
            <h2>Access Nested Values</h2>

            <p><strong>First student name:</strong> <?php echo $firstStudentName; ?></p>
            <p><strong>Second student course:</strong> <?php echo $secondStudentCourse; ?></p>
        </div>

        <div class="box output">
            <h2>Student Records</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Mark</th>
                </tr>

                <?php foreach ($students as $student) { ?>
                    <tr>
                        <td><?php echo $student["id"]; ?></td>
                        <td><?php echo $student["name"]; ?></td>
                        <td><?php echo $student["course"]; ?></td>
                        <td><?php echo $student["mark"]; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>$students = [
    [
        "id" => 1,
        "name" => "Galen",
        "course" => "Software Engineering"
    ],
    [
        "id" => 2,
        "name" => "Cleo",
        "course" => "Computer Science"
    ]
];

echo $students[0]["name"];</pre>
        </div>

    </div>

</body>
</html>
