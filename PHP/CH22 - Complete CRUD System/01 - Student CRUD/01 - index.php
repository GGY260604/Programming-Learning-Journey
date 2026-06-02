<?php
/*
  FILE: 01 - index.php
  TOPIC: CH22 - Complete CRUD System

  GOAL:
  - Display all student records from the database.
  - Learn the READ part of CRUD.
  - Provide links to create, edit, and delete pages.

  CRUD FLOW:
  - Create: 02 - create.php and 03 - store.php
  - Read:   01 - index.php
  - Update: 04 - edit.php and 05 - update.php
  - Delete: 06 - delete.php
*/

require __DIR__ . "/includes/db.php";

/*
  This helper function safely displays values in HTML.
  It prevents HTML code from being executed as real HTML.
*/
function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

/*
  The message is taken from the URL query string.
  Example: 01 - index.php?message=created
*/
$message = $_GET["message"] ?? "";

$messageText = match ($message) {
    "created" => "Student created successfully.",
    "updated" => "Student updated successfully.",
    "deleted" => "Student deleted successfully.",
    default => ""
};

/*
  SELECT is used to read records from the database.
  fetchAll() returns all matching rows.
*/
$sql = "SELECT student_id, student_name, email, course, year_level, created_at
        FROM students
        ORDER BY student_id DESC";

$statement = $pdo->query($sql);
$students = $statement->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file is the main page of the Student CRUD system.
      It reads records from MySQL and displays them in an HTML table.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH22 - Student CRUD</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="container">

        <h1>Student CRUD System</h1>

        <p>
            This page demonstrates the <strong>Read</strong> operation.
            It uses <code>SELECT</code> to get all student records from MySQL.
        </p>

        <div class="nav">
            <a href="02%20-%20create.php" class="button-primary">Add New Student</a>
        </div>

        <?php if ($messageText !== "") { ?>
            <div class="box success">
                <?= e($messageText) ?>
            </div>
        <?php } ?>

        <div class="box">
            <h2>Student Records</h2>

            <?php if (count($students) === 0) { ?>

                <p>No student records found.</p>
                <p>Click <strong>Add New Student</strong> to create the first record.</p>

            <?php } else { ?>

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student) { ?>
                            <tr>
                                <td><?= e($student["student_id"]) ?></td>
                                <td><?= e($student["student_name"]) ?></td>
                                <td><?= e($student["email"]) ?></td>
                                <td><?= e($student["course"]) ?></td>
                                <td><?= e($student["year_level"]) ?></td>
                                <td><?= e($student["created_at"]) ?></td>
                                <td>
                                    <div class="action-list">
                                        <a href="04%20-%20edit.php?id=<?= e($student["student_id"]) ?>">Edit</a>
                                        <a href="06%20-%20delete.php?id=<?= e($student["student_id"]) ?>" class="button-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            <?php } ?>
        </div>

        <div class="box info">
            <h2>Important Concept</h2>
            <p>
                In a CRUD system, the index page commonly acts as the main listing page.
                It gives users access to create, edit, and delete operations.
            </p>
        </div>

    </div>

</body>
</html>
