<?php
/*
  FILE: INNER JOIN Display.php
  TOPIC: INNER JOIN

  GOAL:
  - Learn how INNER JOIN works.
  - Display data from two related tables.
  - Understand why unmatched rows are hidden.

  HOW TO RUN:
  1. Start Apache and MySQL in XAMPP.
  2. Run "01 - Create Related Tables.sql" in phpMyAdmin first.
  3. Open this file through localhost.
*/

require_once __DIR__ . "/includes/db.php";

/*
  INNER JOIN returns only rows that have matching records in both tables.

  In this example:
  - A student must have a matching course to appear in the result.
  - The student with NULL course_id will not appear.
*/

$sql = "SELECT
            s.student_id,
            s.student_name,
            s.email,
            c.course_name,
            c.faculty
        FROM ch23_students AS s
        INNER JOIN ch23_courses AS c
            ON s.course_id = c.course_id
        ORDER BY s.student_id";

// Inner Join is the same as JOIN. You can write JOIN instead of INNER JOIN and it will work the same way.

$statement = $pdo->query($sql);
$students = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH23 - INNER JOIN Display</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH23 - INNER JOIN Display</h1>

        <p>
            This file demonstrates <strong>INNER JOIN</strong>.
            It only displays students that have a matching course.
        </p>

        <div class="box note">
            <h2>INNER JOIN Meaning</h2>

            <p>
                If a student does not have a valid matching course, that student
                will not appear in the result.
            </p>

            <pre>SELECT ...
FROM ch23_students AS s
INNER JOIN ch23_courses AS c
    ON s.course_id = c.course_id;</pre>
        </div>

        <div class="box output">
            <h2>Students with Matching Courses</h2>

            <table>
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Course</th>
                    <th>Faculty</th>
                </tr>

                <?php foreach ($students as $student) { ?>
                    <tr>
                        <td><?= htmlspecialchars($student["student_id"]) ?></td>
                        <td><?= htmlspecialchars($student["student_name"]) ?></td>
                        <td><?= htmlspecialchars($student["email"]) ?></td>
                        <td><?= htmlspecialchars($student["course_name"]) ?></td>
                        <td><?= htmlspecialchars($student["faculty"]) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <h2>What You Should Notice</h2>

            <p>
                The student named <code>Mei Ling</code> has no course in the sample data.
                Because this file uses <code>INNER JOIN</code>, she is not shown.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="02 - One to Many Relationship.php">&lsaquo; Previous: 02 - One to Many Relationship.php</a>
            <a class="next" href="04 - LEFT JOIN Display.php">Next: 04 - LEFT JOIN Display.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
