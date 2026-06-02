<?php
/*
  FILE: 02 - Display Records in HTML Table.php
  TOPIC: CH18 - MySQL Select and Display Data

  GOAL:
  - Learn how to display database rows inside an HTML table.
  - Learn how to loop through database records using foreach.
  - Learn why htmlspecialchars() is important when showing database data.

  IMPORTANT:
  - The database may contain text entered by users.
  - Therefore, database values should be escaped before displaying in HTML.
*/

require_once __DIR__ . "/includes/db.php";

$students = [];
$errorMessage = "";

try {
    $pdo = getPDOConnection();

    $sql = "SELECT student_id, student_name, email, course, year_level
            FROM students
            ORDER BY student_id ASC";

    $statement = $pdo->query($sql);
    $students = $statement->fetchAll();
} catch (PDOException $error) {
    $errorMessage = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH18 - Display Records in HTML Table</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH18 - Display Records in HTML Table</h1>

        <p>
            This file displays records from the <code>students</code> table in a
            proper HTML table.
        </p>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Database Error</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            </div>
        <?php } else { ?>
            <div class="box output">
                <h2>Student Records</h2>

                <?php if (count($students) === 0) { ?>
                    <p class="empty-message">No student records found.</p>
                <?php } else { ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Year Level</th>
                        </tr>

                        <?php foreach ($students as $student) { ?>
                            <tr>
                                <td><?= htmlspecialchars($student["student_id"]) ?></td>
                                <td><?= htmlspecialchars($student["student_name"]) ?></td>
                                <td><?= htmlspecialchars($student["email"]) ?></td>
                                <td><?= htmlspecialchars($student["course"]) ?></td>
                                <td><?= htmlspecialchars($student["year_level"]) ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="box info">
            <h2>Why Use htmlspecialchars()?</h2>

            <p>
                The short echo tag <code>&lt;?= ?&gt;</code> only outputs a value.
                It does not automatically protect the output.
            </p>

            <p>
                Therefore, this chapter uses this pattern when displaying database values:
            </p>

            <pre>&lt;?= htmlspecialchars($student["student_name"]) ?&gt;</pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="01 - Select All Records.php">&lsaquo; Previous: 01 - Select All Records.php</a>
            <a class="next" href="03 - Select One Record by ID.php">Next: 03 - Select One Record by ID.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
