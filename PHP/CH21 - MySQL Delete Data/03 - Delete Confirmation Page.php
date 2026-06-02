<?php
/*
  FILE: 03 - Delete Confirmation Page.php
  TOPIC: CH21 - MySQL Delete Data

  GOAL:
  - Learn how to display a record before deleting it.
  - Learn a safer delete flow using a confirmation step.
  - Understand why destructive actions should not be too easy to trigger.

  IMPORTANT:
  - In real systems, delete buttons usually show a confirmation first.
  - This reduces accidental delete mistakes.
*/

require_once __DIR__ . "/includes/db.php";

$studentId = trim($_GET["student_id"] ?? $_POST["student_id"] ?? "");
$student = null;
$students = [];
$successMessage = "";
$errorMessage = "";
$affectedRows = null;

try {
    $pdo = getPDOConnection();

    if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["confirm_delete"] ?? "") === "yes") {
        if ($studentId === "" || !ctype_digit($studentId)) {
            $errorMessage = "Invalid student ID.";
        } else {
            $deleteSql = "DELETE FROM students
                          WHERE student_id = :student_id";

            $deleteStatement = $pdo->prepare($deleteSql);
            $deleteStatement->execute([
                "student_id" => (int) $studentId
            ]);

            $affectedRows = $deleteStatement->rowCount();

            if ($affectedRows > 0) {
                $successMessage = "The selected student was deleted successfully.";
                $studentId = "";
            } else {
                $successMessage = "No record was deleted. The student may already be deleted.";
            }
        }
    }

    if ($studentId !== "" && ctype_digit($studentId)) {
        $selectSql = "SELECT student_id, student_name, email, course, year_level
                      FROM students
                      WHERE student_id = :student_id";

        $selectStatement = $pdo->prepare($selectSql);
        $selectStatement->execute([
            "student_id" => (int) $studentId
        ]);

        $student = $selectStatement->fetch();
    }

    $students = $pdo->query("SELECT student_id, student_name, email, course, year_level
                            FROM students
                            ORDER BY student_id ASC")->fetchAll();
} catch (PDOException $error) {
    $errorMessage = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file demonstrates PHP and MySQL DELETE logic.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH21 - Delete Confirmation Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH21 - Delete Confirmation Page</h1>

        <p>
            This file demonstrates a safer delete process: select a record first, review it, then confirm delete.
        </p>

        <?php if ($successMessage !== "") { ?>
            <div class="box success">
                <h2>Result</h2>
                <p><?= htmlspecialchars($successMessage) ?></p>
                <?php if ($affectedRows !== null) { ?>
                    <p>Affected rows: <strong><?= htmlspecialchars((string) $affectedRows) ?></strong></p>
                <?php } ?>
            </div>
        <?php } ?>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Error</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            </div>
        <?php } ?>

        <div class="box info">
            <h2>Step 1: Select a Student ID</h2>

            <form method="get" action="">
                <label for="student_id">Student ID</label>
                <input type="number" id="student_id" name="student_id" value="<?= htmlspecialchars($studentId) ?>" min="1">

                <button type="submit">Load Record</button>
            </form>
        </div>

        <?php if ($student) { ?>
            <div class="box danger">
                <h2>Step 2: Confirm Delete</h2>

                <p>Please review the record below before deleting it.</p>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Year</th>
                    </tr>
                    <tr>
                        <td><?= htmlspecialchars((string) $student["student_id"]) ?></td>
                        <td><?= htmlspecialchars($student["student_name"]) ?></td>
                        <td><?= htmlspecialchars($student["email"]) ?></td>
                        <td><?= htmlspecialchars($student["course"]) ?></td>
                        <td><?= htmlspecialchars((string) $student["year_level"]) ?></td>
                    </tr>
                </table>

                <form method="post" action="">
                    <input type="hidden" name="student_id" value="<?= htmlspecialchars((string) $student["student_id"]) ?>">
                    <input type="hidden" name="confirm_delete" value="yes">

                    <button type="submit" class="button-danger">Yes, Delete This Student</button>
                </form>
            </div>
        <?php } elseif ($studentId !== "") { ?>
            <div class="box warning">
                <h2>No Record Found</h2>
                <p>No student was found for the selected ID.</p>
            </div>
        <?php } ?>

        <div class="box output">
            <h2>Available Students</h2>

            <?php if (count($students) > 0) { ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Year</th>
                    </tr>

                    <?php foreach ($students as $row) { ?>
                        <tr>
                            <td><?= htmlspecialchars((string) $row["student_id"]) ?></td>
                            <td><?= htmlspecialchars($row["student_name"]) ?></td>
                            <td><?= htmlspecialchars($row["email"]) ?></td>
                            <td><?= htmlspecialchars($row["course"]) ?></td>
                            <td><?= htmlspecialchars((string) $row["year_level"]) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p class="empty-message">No students found.</p>
            <?php } ?>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="02 - Delete by ID.php">&lsaquo; Previous: 02 - Delete by ID.php</a>
            <a class="next" href="04 - Soft Delete Concept.php">Next: 04 - Soft Delete Concept.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
