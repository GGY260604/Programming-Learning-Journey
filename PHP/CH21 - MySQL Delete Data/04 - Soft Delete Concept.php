<?php
/*
  FILE: 04 - Soft Delete Concept.php
  TOPIC: CH21 - MySQL Delete Data

  GOAL:
  - Learn the difference between hard delete and soft delete.
  - Understand how to mark a record as deleted without removing it.
  - Use UPDATE instead of DELETE for safer data management.

  IMPORTANT:
  - Hard delete removes the row permanently.
  - Soft delete keeps the row but marks it as deleted.
  - Soft delete is useful when records may need to be restored later.
*/

require_once __DIR__ . "/includes/db.php";

$studentId = "";
$successMessage = "";
$errorMessage = "";
$affectedRows = null;
$activeStudents = [];
$deletedStudents = [];

try {
    $pdo = getPDOConnection();

    /*
      This chapter originally uses the students table from CH16.
      The CH16 table may not have an is_deleted column yet.

      For this example, we check whether the column exists.
      If it does not exist, we add it.
    */

    $checkColumn = $pdo->query("SHOW COLUMNS FROM students LIKE 'is_deleted'")->fetch();

    if (!$checkColumn) {
        $pdo->exec("ALTER TABLE students
                    ADD COLUMN is_deleted TINYINT(1) NOT NULL DEFAULT 0");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $studentId = trim($_POST["student_id"] ?? "");

        if ($studentId === "") {
            $errorMessage = "Please enter a student ID.";
        } elseif (!ctype_digit($studentId)) {
            $errorMessage = "Student ID must be a positive whole number.";
        } else {
            /*
              This is soft delete.

              Instead of:
              DELETE FROM students WHERE student_id = :student_id

              We use:
              UPDATE students SET is_deleted = 1 WHERE student_id = :student_id

              The row still exists in the table, but normal SELECT queries can hide it.
            */

            $sql = "UPDATE students
                    SET is_deleted = 1
                    WHERE student_id = :student_id";

            $statement = $pdo->prepare($sql);
            $statement->execute([
                "student_id" => (int) $studentId
            ]);

            $affectedRows = $statement->rowCount();

            if ($affectedRows > 0) {
                $successMessage = "The student was soft deleted successfully.";
            } else {
                $successMessage = "No row was changed. The student ID may not exist or may already be soft deleted.";
            }
        }
    }

    $activeStudents = $pdo->query("SELECT student_id, student_name, email, course, year_level
                                  FROM students
                                  WHERE is_deleted = 0
                                  ORDER BY student_id ASC")->fetchAll();

    $deletedStudents = $pdo->query("SELECT student_id, student_name, email, course, year_level
                                   FROM students
                                   WHERE is_deleted = 1
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
    <title>CH21 - Soft Delete Concept</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH21 - Soft Delete Concept</h1>

        <p>
            This file demonstrates soft delete using an <code>is_deleted</code> column.
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

        <form method="post" action="">
            <label for="student_id">Student ID to Soft Delete</label>
            <input type="number" id="student_id" name="student_id" value="<?= htmlspecialchars($studentId) ?>" min="1">

            <button type="submit" class="button-danger">Soft Delete Record</button>
        </form>

        <div class="box info">
            <h2>Main Code Pattern</h2>

            <pre>$sql = "UPDATE students
        SET is_deleted = 1
        WHERE student_id = :student_id";</pre>

            <p>
                A normal listing page can then show only records where <code>is_deleted = 0</code>.
            </p>
        </div>

        <div class="box output">
            <h2>Active Students</h2>

            <?php if (count($activeStudents) > 0) { ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Year</th>
                    </tr>

                    <?php foreach ($activeStudents as $student) { ?>
                        <tr>
                            <td><?= htmlspecialchars((string) $student["student_id"]) ?></td>
                            <td><?= htmlspecialchars($student["student_name"]) ?></td>
                            <td><?= htmlspecialchars($student["email"]) ?></td>
                            <td><?= htmlspecialchars($student["course"]) ?></td>
                            <td><?= htmlspecialchars((string) $student["year_level"]) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p class="empty-message">No active students found.</p>
            <?php } ?>
        </div>

        <div class="box warning">
            <h2>Soft Deleted Students</h2>

            <?php if (count($deletedStudents) > 0) { ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Year</th>
                    </tr>

                    <?php foreach ($deletedStudents as $student) { ?>
                        <tr>
                            <td><?= htmlspecialchars((string) $student["student_id"]) ?></td>
                            <td><?= htmlspecialchars($student["student_name"]) ?></td>
                            <td><?= htmlspecialchars($student["email"]) ?></td>
                            <td><?= htmlspecialchars($student["course"]) ?></td>
                            <td><?= htmlspecialchars((string) $student["year_level"]) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p class="empty-message">No soft deleted students found.</p>
            <?php } ?>
        </div>
    </div>

</body>
</html>
