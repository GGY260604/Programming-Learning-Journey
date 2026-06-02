<?php
/*
  FILE: LEFT JOIN Display.php
  TOPIC: LEFT JOIN

  GOAL:
  - Learn how LEFT JOIN works.
  - Display all records from the left table.
  - Handle NULL values from unmatched rows.

  HOW TO RUN:
  1. Start Apache and MySQL in XAMPP.
  2. Run "01 - Create Related Tables.sql" in phpMyAdmin first.
  3. Open this file through localhost.
*/

require_once __DIR__ . "/includes/db.php";

/*
  LEFT JOIN returns all rows from the left table.

  In this example:
  - ch23_students is the left table.
  - ch23_courses is the right table.
  - All students are displayed.
  - If a student has no course, the course columns become NULL.
*/

$sql = "SELECT
            s.student_id,
            s.student_name,
            s.email,
            c.course_name,
            c.faculty
        FROM ch23_students AS s
        LEFT JOIN ch23_courses AS c
            ON s.course_id = c.course_id
        ORDER BY s.student_id";

$statement = $pdo->query($sql);
$students = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH23 - LEFT JOIN Display</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH23 - LEFT JOIN Display</h1>

        <p>
            This file demonstrates <strong>LEFT JOIN</strong>.
            It displays all students, even if some students do not have a course.
        </p>

        <div class="box note">
            <h2>LEFT JOIN Meaning</h2>

            <p>
                LEFT JOIN keeps all rows from the left table.
                If the right table has no matching record, the joined columns become <code>NULL</code>.
            </p>

            <pre>SELECT ...
FROM ch23_students AS s
LEFT JOIN ch23_courses AS c
    ON s.course_id = c.course_id;</pre>
        </div>

        <div class="box output">
            <h2>All Students</h2>

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
                        <td>
                            <?= htmlspecialchars($student["course_name"] ?? "No course assigned") ?>
                        </td>
                        <td>
                            <?= htmlspecialchars($student["faculty"] ?? "-") ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <h2>What You Should Notice</h2>

            <p>
                Compared with INNER JOIN, LEFT JOIN is useful when you still want
                to show records that do not have a relationship yet.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="03 - INNER JOIN Display.php">&lsaquo; Previous: 03 - INNER JOIN Display.php</a>
            <a class="next" href="05 - COUNT with GROUP BY.php">Next: 05 - COUNT with GROUP BY.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
