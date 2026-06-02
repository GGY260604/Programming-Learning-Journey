<?php
/*
  FILE: COUNT with GROUP BY.php
  TOPIC: COUNT and GROUP BY

  GOAL:
  - Learn how to summarize related data.
  - Use COUNT() to count child records.
  - Use GROUP BY to group rows by parent records.

  HOW TO RUN:
  1. Start Apache and MySQL in XAMPP.
  2. Run "01 - Create Related Tables.sql" in phpMyAdmin first.
  3. Open this file through localhost.
*/

require_once __DIR__ . "/includes/db.php";

/*
  GROUP BY is used to group rows.
  COUNT() is used to count rows inside each group.

  In this example:
  - We group students by course.
  - We count how many students are in each course.

  LEFT JOIN is used so that courses with 0 students can still appear.
*/

$sql = "SELECT
            c.course_id,
            c.course_name,
            c.faculty,
            COUNT(s.student_id) AS total_students
        FROM ch23_courses AS c
        LEFT JOIN ch23_students AS s
            ON c.course_id = s.course_id
        GROUP BY c.course_id, c.course_name, c.faculty
        ORDER BY c.course_id";

$statement = $pdo->query($sql);
$courses = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH23 - COUNT with GROUP BY</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH23 - COUNT with GROUP BY</h1>

        <p>
            This file demonstrates <strong>COUNT()</strong> with <strong>GROUP BY</strong>.
            It counts how many students belong to each course.
        </p>

        <div class="box note">
            <h2>COUNT with GROUP BY</h2>

            <p>
                <code>GROUP BY</code> groups related rows together.
                <code>COUNT()</code> counts how many rows exist in each group.
            </p>

            <pre>SELECT c.course_name, COUNT(s.student_id) AS total_students
FROM ch23_courses AS c
LEFT JOIN ch23_students AS s
    ON c.course_id = s.course_id
GROUP BY c.course_id, c.course_name;</pre>
        </div>

        <div class="box output">
            <h2>Number of Students by Course</h2>

            <table>
                <tr>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Faculty</th>
                    <th>Total Students</th>
                </tr>

                <?php foreach ($courses as $course) { ?>
                    <tr>
                        <td><?= htmlspecialchars($course["course_id"]) ?></td>
                        <td><?= htmlspecialchars($course["course_name"]) ?></td>
                        <td><?= htmlspecialchars($course["faculty"]) ?></td>
                        <td><?= htmlspecialchars($course["total_students"]) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <h2>Backend Usage</h2>

            <p>
                This pattern is often used for dashboards, reports, and summaries.
                For example, counting orders by customer or counting products by category.
            </p>
        </div>

    </div>

</body>
</html>
