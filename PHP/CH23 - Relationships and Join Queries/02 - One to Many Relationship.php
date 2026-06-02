<?php
/*
  FILE: One to Many Relationship.php
  TOPIC: One-to-Many Relationship

  GOAL:
  - Understand the meaning of one-to-many relationship.
  - Display parent records and their related child records.
  - Use a foreign key to connect two tables.

  HOW TO RUN:
  1. Start Apache and MySQL in XAMPP.
  2. Run "01 - Create Related Tables.sql" in phpMyAdmin first.
  3. Open this file through localhost.
*/

require_once __DIR__ . "/includes/db.php";

/*
  In a one-to-many relationship:
  - One parent record can be connected to many child records.

  Example:
  - One course can have many students.
  - ch23_courses is the parent table.
  - ch23_students is the child table.
  - ch23_students.course_id is the foreign key.
*/

$sql = "SELECT course_id, course_name, faculty FROM ch23_courses ORDER BY course_id";
$statement = $pdo->query($sql);
$courses = $statement->fetchAll();

/*
  For each course, we will later count and display the students under it.
  This file uses a prepared statement inside the loop because the course ID changes.
*/
$studentSql = "SELECT student_id, student_name, email FROM ch23_students WHERE course_id = :course_id ORDER BY student_id";
$studentStatement = $pdo->prepare($studentSql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH23 - One to Many Relationship</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH23 - One to Many Relationship</h1>

        <p>
            This file demonstrates a <strong>one-to-many relationship</strong>.
            One course can be linked to many students.
        </p>

        <div class="box note">
            <h2>Relationship Meaning</h2>

            <p>
                <code>ch23_courses.course_id</code> is the primary key.
                <code>ch23_students.course_id</code> is the foreign key.
            </p>

            <pre>ch23_courses 1 ---- many ch23_students</pre>
        </div>

        <?php foreach ($courses as $course) { ?>
            <?php
                /*
                  Execute the prepared statement for the current course.
                  The placeholder :course_id receives the current course ID.
                */
                $studentStatement->execute([
                    "course_id" => $course["course_id"]
                ]);

                $students = $studentStatement->fetchAll();
            ?>

            <div class="box output">
                <h2><?= htmlspecialchars($course["course_name"]) ?></h2>

                <p>
                    <strong>Faculty:</strong>
                    <?= htmlspecialchars($course["faculty"]) ?>
                </p>

                <p>
                    <span class="badge">
                        Number of students: <?= count($students) ?>
                    </span>
                </p>

                <?php if (count($students) > 0) { ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Email</th>
                        </tr>

                        <?php foreach ($students as $student) { ?>
                            <tr>
                                <td><?= htmlspecialchars($student["student_id"]) ?></td>
                                <td><?= htmlspecialchars($student["student_name"]) ?></td>
                                <td><?= htmlspecialchars($student["email"]) ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } else { ?>
                    <p>No students are currently linked to this course.</p>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="box">
            <h2>Important Idea</h2>

            <p>
                In backend systems, a foreign key is commonly used to connect
                one table to another table.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="../CH22 - Complete CRUD System/02 - Product CRUD/01 - index.php">&lsaquo; Previous: 02 - Product CRUD System</a>
            <a class="next" href="03 - INNER JOIN Display.php">Next: 03 - INNER JOIN Display.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
