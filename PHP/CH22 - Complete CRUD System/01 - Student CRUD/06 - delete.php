<?php
/*
  FILE: 06 - delete.php
  TOPIC: CH22 - Complete CRUD System

  GOAL:
  - Show a confirmation page before deleting.
  - Delete one student record only after the user confirms.

  IMPORTANT:
  - GET is used to display the confirmation page.
  - POST is used to actually delete the record.
*/

require __DIR__ . "/includes/db.php";

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = filter_input(INPUT_POST, "student_id", FILTER_VALIDATE_INT);

    if ($id === false || $id === null) {
        die("Invalid student ID.");
    }

    $sql = "DELETE FROM students WHERE student_id = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        "id" => $id
    ]);

    header("Location: 01%20-%20index.php?message=deleted");
    exit;
}

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    die("Invalid student ID.");
}

$sql = "SELECT student_id, student_name, email, course, year_level
        FROM students
        WHERE student_id = :id";

$statement = $pdo->prepare($sql);
$statement->execute([
    "id" => $id
]);

$student = $statement->fetch();

if (!$student) {
    die("Student record not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH22 - Delete Student</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="container">

        <h1>Delete Student</h1>

        <div class="box warning">
            <h2>Confirm Delete</h2>

            <p>Are you sure you want to delete this student?</p>

            <table>
                <tr>
                    <th>ID</th>
                    <td><?= e($student["student_id"]) ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?= e($student["student_name"]) ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= e($student["email"]) ?></td>
                </tr>
                <tr>
                    <th>Course</th>
                    <td><?= e($student["course"]) ?></td>
                </tr>
                <tr>
                    <th>Year</th>
                    <td><?= e($student["year_level"]) ?></td>
                </tr>
            </table>

            <form action="06%20-%20delete.php" method="post">
                <input type="hidden" name="student_id" value="<?= e($student["student_id"]) ?>">
                <button type="submit" class="button-danger">Yes, Delete</button>
                <a href="01%20-%20index.php">Cancel</a>
            </form>
        </div>

        <div class="box info">
            <h2>Important Concept</h2>
            <p>
                It is safer to ask for confirmation before deleting because DELETE permanently removes records.
            </p>
        </div>

    </div>

</body>
</html>
