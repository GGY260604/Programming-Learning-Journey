<?php
/*
  FILE: 01 - Delete Static Record.php
  TOPIC: CH21 - MySQL Delete Data

  GOAL:
  - Learn the basic DELETE SQL syntax.
  - Delete one fixed record using a fixed student ID.
  - Understand why DELETE should not run automatically when the page loads.

  IMPORTANT:
  - This example uses a fixed ID: 1.
  - The DELETE query only runs after the button is submitted.
  - This avoids deleting data immediately when the page is opened.
*/

require_once __DIR__ . "/includes/db.php";

$studentIdToDelete = 1;
$successMessage = "";
$errorMessage = "";
$affectedRows = null;
$studentBeforeDelete = null;

try {
    $pdo = getPDOConnection();

    /*
      Before deleting, we try to read the target record.
      This helps the user see what will be deleted.
    */

    $selectSql = "SELECT student_id, student_name, email, course, year_level
                  FROM students
                  WHERE student_id = :student_id";

    $selectStatement = $pdo->prepare($selectSql);
    $selectStatement->execute([
        "student_id" => $studentIdToDelete
    ]);

    $studentBeforeDelete = $selectStatement->fetch();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        /*
          DELETE syntax:

          DELETE FROM table_name
          WHERE condition;

          The WHERE condition is very important.
          Without WHERE, all rows in the table may be deleted.
        */

        $deleteSql = "DELETE FROM students
                      WHERE student_id = :student_id";

        $deleteStatement = $pdo->prepare($deleteSql);
        $deleteStatement->execute([
            "student_id" => $studentIdToDelete
        ]);

        $affectedRows = $deleteStatement->rowCount();

        if ($affectedRows > 0) {
            $successMessage = "Student ID $studentIdToDelete was deleted successfully.";
            $studentBeforeDelete = null;
        } else {
            $successMessage = "No record was deleted. Student ID $studentIdToDelete may not exist.";
        }
    }
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
    <title>CH21 - Delete Static Record</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH21 - Delete Static Record</h1>

        <p>
            This file demonstrates a simple <code>DELETE</code> query using a fixed student ID.
        </p>

        <div class="box warning">
            <h2>Warning</h2>
            <p>
                This example is designed for learning. It deletes the record with
                <strong>student_id = <?= htmlspecialchars((string) $studentIdToDelete) ?></strong>.
            </p>
        </div>

        <?php if ($successMessage !== "") { ?>
            <div class="box success">
                <h2>Result</h2>
                <p><?= htmlspecialchars($successMessage) ?></p>
                <p>Affected rows: <strong><?= htmlspecialchars((string) $affectedRows) ?></strong></p>
            </div>
        <?php } ?>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Error</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            </div>
        <?php } ?>

        <div class="box output">
            <h2>Record Before Delete</h2>

            <?php if ($studentBeforeDelete) { ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Year</th>
                    </tr>
                    <tr>
                        <td><?= htmlspecialchars((string) $studentBeforeDelete["student_id"]) ?></td>
                        <td><?= htmlspecialchars($studentBeforeDelete["student_name"]) ?></td>
                        <td><?= htmlspecialchars($studentBeforeDelete["email"]) ?></td>
                        <td><?= htmlspecialchars($studentBeforeDelete["course"]) ?></td>
                        <td><?= htmlspecialchars((string) $studentBeforeDelete["year_level"]) ?></td>
                    </tr>
                </table>

                <form method="post" action="">
                    <button type="submit" class="button-danger">Delete This Fixed Record</button>
                </form>
            <?php } else { ?>
                <p class="empty-message">No record found for this fixed ID.</p>
            <?php } ?>
        </div>

        <div class="box info">
            <h2>Main Code Pattern</h2>

            <pre>$sql = "DELETE FROM students
        WHERE student_id = :student_id";

$statement = $pdo-&gt;prepare($sql);
$statement-&gt;execute([
    "student_id" =&gt; $studentIdToDelete
]);</pre>
        </div>
    </div>

</body>
</html>
