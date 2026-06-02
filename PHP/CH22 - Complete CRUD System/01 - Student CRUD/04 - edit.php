<?php
/*
  FILE: 04 - edit.php
  TOPIC: CH22 - Complete CRUD System

  GOAL:
  - Get one existing student record from the database.
  - Display the existing values inside an edit form.
  - Learn the first page involved in the UPDATE operation.
*/

require __DIR__ . "/includes/db.php";

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id === false || $id === null) {
    die("Invalid student ID.");
}

/*
  We use a prepared statement because the ID comes from the URL.
  URL data should not be trusted directly.
*/
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
    <title>CH22 - Edit Student</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="container">

        <h1>Edit Student</h1>

        <p>
            This page demonstrates the form part of the <strong>Update</strong> operation.
            Existing database values are displayed inside the form.
        </p>

        <div class="nav">
            <a href="01%20-%20index.php">Back to Student List</a>
        </div>

        <div class="box">
            <h2>Edit Form</h2>

            <form action="05%20-%20update.php" method="post">

                <input type="hidden" name="student_id" value="<?= e($student["student_id"]) ?>">

                <div class="form-group">
                    <label for="student_name">Student Name</label>
                    <input type="text" id="student_name" name="student_name" value="<?= e($student["student_name"]) ?>" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= e($student["email"]) ?>" required>
                </div>

                <div class="form-group">
                    <label for="course">Course</label>
                    <input type="text" id="course" name="course" value="<?= e($student["course"]) ?>" required>
                </div>

                <div class="form-group">
                    <label for="year_level">Year Level</label>
                    <select id="year_level" name="year_level" required>
                        <?php for ($year = 1; $year <= 4; $year++) { ?>
                            <option value="<?= e($year) ?>" <?= ((int) $student["year_level"] === $year) ? "selected" : "" ?>>
                                Year <?= e($year) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="button-primary">Update Student</button>
            </form>
        </div>

        <div class="box info">
            <h2>Important Concept</h2>
            <p>
                A hidden input is used to send the record ID to the update page.
                Without the ID, the update page would not know which record should be updated.
            </p>
        </div>

    </div>

</body>
</html>
