<?php
/*
  FILE: 05 - Delete with Prepared Statement.php
  TOPIC: CH21 - MySQL Delete Data

  GOAL:
  - Learn a clear prepared statement pattern for DELETE.
  - Use bindValue() to bind the ID safely.
  - Use rowCount() to check whether a row was deleted.

  IMPORTANT:
  - DELETE is powerful and dangerous if used carelessly.
  - Always check the WHERE condition before running a DELETE query.
  - Always use prepared statements for user-provided IDs.
*/

require_once __DIR__ . "/includes/db.php";

$studentId = "";
$successMessage = "";
$errorMessage = "";
$affectedRows = null;
$students = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentId = trim($_POST["student_id"] ?? "");

    if ($studentId === "") {
        $errorMessage = "Please enter a student ID.";
    } elseif (!ctype_digit($studentId)) {
        $errorMessage = "Student ID must be a positive whole number.";
    } else {
        try {
            $pdo = getPDOConnection();

            $sql = "DELETE FROM students
                    WHERE student_id = :student_id";

            $statement = $pdo->prepare($sql);

            /*
              bindValue() binds a placeholder to a value.

              PDO::PARAM_INT tells PDO that student_id should be treated as an integer.
              This is suitable for primary key IDs.
            */

            $statement->bindValue(":student_id", (int) $studentId, PDO::PARAM_INT);
            $statement->execute();

            $affectedRows = $statement->rowCount();

            if ($affectedRows > 0) {
                $successMessage = "Prepared DELETE statement executed successfully.";
            } else {
                $successMessage = "Prepared DELETE executed, but no row matched the selected ID.";
            }
        } catch (PDOException $error) {
            $errorMessage = $error->getMessage();
        }
    }
}

try {
    $pdo = getPDOConnection();

    /*
      This SELECT query is only used to display existing records.
    */

    $students = $pdo->query("SELECT student_id, student_name, email, course, year_level
                            FROM students
                            ORDER BY student_id ASC")->fetchAll();
} catch (PDOException $error) {
    if ($errorMessage === "") {
        $errorMessage = $error->getMessage();
    }
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
    <title>CH21 - Delete with Prepared Statement</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH21 - Delete with Prepared Statement</h1>

        <p>
            This file demonstrates the recommended delete pattern using <code>prepare()</code>,
            <code>bindValue()</code>, and <code>rowCount()</code>.
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

            <button type="submit" class="button-danger">Delete Using Prepared Statement</button>
        </form>

        <div class="box info">
            <h2>Main Code Pattern</h2>

            <pre>$statement = $pdo-&gt;prepare($sql);
$statement-&gt;bindValue(&quot;:student_id&quot;, (int) $studentId, PDO::PARAM_INT);
$statement-&gt;execute();

$affectedRows = $statement-&gt;rowCount();</pre>
        </div>

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
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="04 - Soft Delete Concept.php">&lsaquo; Previous: 04 - Soft Delete Concept.php</a>
            <a class="next" href="../CH22 - Complete CRUD System/01 - Student CRUD/01 - index.php">Next: 01 - Student CRUD System &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
