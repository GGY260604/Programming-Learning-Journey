<?php
/*
  FILE: 02 - Delete by ID.php
  TOPIC: CH21 - MySQL Delete Data

  GOAL:
  - Learn how to delete a record using an ID submitted from a form.
  - Understand how user input should be validated before delete.
  - Use a prepared statement to protect the DELETE query.

  IMPORTANT:
  - Never directly place user input inside a DELETE SQL string.
  - Always use a prepared statement when the ID comes from the user.
*/

require_once __DIR__ . "/includes/db.php";

$studentId = "";
$successMessage = "";
$errorMessage = "";
$affectedRows = null;
$students = [];

try {
    $pdo = getPDOConnection();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $studentId = trim($_POST["student_id"] ?? "");

        if ($studentId === "") {
            $errorMessage = "Please enter a student ID.";
        } elseif (!ctype_digit($studentId)) {
            $errorMessage = "Student ID must be a positive whole number.";
        } else {
            $sql = "DELETE FROM students
                    WHERE student_id = :student_id";

            $statement = $pdo->prepare($sql);
            $statement->execute([
                "student_id" => (int) $studentId
            ]);

            $affectedRows = $statement->rowCount();

            if ($affectedRows > 0) {
                $successMessage = "The record was deleted successfully.";
            } else {
                $successMessage = "No record was deleted. The student ID may not exist.";
            }
        }
    }

    /*
      Display remaining records so the user can see the current table state.
    */

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
    <title>CH21 - Delete by ID</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH21 - Delete by ID</h1>

        <p>
            This file deletes a student record based on the ID submitted from a form.
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
            <label for="student_id">Student ID to Delete</label>
            <input type="number" id="student_id" name="student_id" value="<?= htmlspecialchars($studentId) ?>" min="1">

            <button type="submit" class="button-danger">Delete Record</button>
        </form>

        <div class="box output">
            <h2>Current Students</h2>

            <?php if (count($students) > 0) { ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Year</th>
                    </tr>

                    <?php foreach ($students as $student) { ?>
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
                <p class="empty-message">No students found.</p>
            <?php } ?>
        </div>

        <div class="box info">
            <h2>Why Prepared Statement?</h2>

            <p>
                The ID comes from user input, so the SQL should use a placeholder.
            </p>

            <pre>$sql = "DELETE FROM students WHERE student_id = :student_id";
$statement = $pdo-&gt;prepare($sql);
$statement-&gt;execute([
    "student_id" =&gt; (int) $studentId
]);</pre>
        </div>
    </div>

</body>
</html>
