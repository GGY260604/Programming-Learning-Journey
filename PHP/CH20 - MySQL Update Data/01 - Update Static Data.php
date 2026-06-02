<?php
/*
  FILE: 01 - Update Static Data.php
  TOPIC: CH20 - MySQL Update Data

  GOAL:
  - Learn the basic UPDATE syntax in MySQL.
  - Update one record using fixed values.
  - Understand why the WHERE condition is very important.

  IMPORTANT:
  - UPDATE changes existing data.
  - Always use WHERE when you only want to update one row.
  - Without WHERE, MySQL may update every row in the table.
*/

require_once __DIR__ . "/includes/db.php";

$targetStudentId = 1;
$studentBeforeUpdate = null;
$studentAfterUpdate = null;
$successMessage = "";
$errorMessage = "";
$affectedRows = null;

try {
    $pdo = getPDOConnection();

    /*
      First, we select the current record so we can see the original data
      before running the UPDATE command.
    */

    $selectSql = "SELECT * FROM students WHERE student_id = :student_id";
    $selectStatement = $pdo->prepare($selectSql);
    $selectStatement->execute([
        ":student_id" => $targetStudentId
    ]);
    $studentBeforeUpdate = $selectStatement->fetch();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        /*
          This UPDATE statement uses fixed values.

          The WHERE condition tells MySQL to update only the student
          whose student_id is 1.
        */

        $updateSql = "UPDATE students
                      SET student_name = :student_name,
                          email = :email,
                          course = :course,
                          year_level = :year_level
                      WHERE student_id = :student_id";

        $updateStatement = $pdo->prepare($updateSql);

        $updateStatement->execute([
            ":student_name" => "Updated Static Student",
            ":email" => "updated.static.student@example.com",
            ":course" => "Software Engineering",
            ":year_level" => 2,
            ":student_id" => $targetStudentId
        ]);

        /*
          rowCount() returns how many rows were affected by the last SQL command.
        */

        $affectedRows = $updateStatement->rowCount();
        $successMessage = "Static update command executed successfully.";

        /*
          Select the record again after update to display the latest data.
        */

        $selectStatement->execute([
            ":student_id" => $targetStudentId
        ]);
        $studentAfterUpdate = $selectStatement->fetch();
    }
} catch (PDOException $error) {
    $errorMessage = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file demonstrates a basic UPDATE statement.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH20 - Update Static Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH20 - Update Static Data</h1>

        <p>
            This file updates one student record using fixed values inside the PHP code.
        </p>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Error</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            </div>
        <?php } ?>

        <?php if ($successMessage !== "") { ?>
            <div class="box success">
                <h2>Success</h2>
                <p><?= htmlspecialchars($successMessage) ?></p>
                <p>Affected rows: <strong><?= htmlspecialchars((string) $affectedRows) ?></strong></p>
            </div>
        <?php } ?>

        <div class="box warning">
            <h2>Warning About UPDATE</h2>
            <p>
                The <code>WHERE</code> condition is very important. Without it, the database
                may update every student in the table.
            </p>
        </div>

        <div class="box output">
            <h2>Student Before Update</h2>

            <?php if ($studentBeforeUpdate) { ?>
                <table>
                    <tr><th>Column</th><th>Value</th></tr>
                    <tr><td>Student ID</td><td><?= htmlspecialchars((string) $studentBeforeUpdate["student_id"]) ?></td></tr>
                    <tr><td>Name</td><td><?= htmlspecialchars($studentBeforeUpdate["student_name"]) ?></td></tr>
                    <tr><td>Email</td><td><?= htmlspecialchars($studentBeforeUpdate["email"]) ?></td></tr>
                    <tr><td>Course</td><td><?= htmlspecialchars($studentBeforeUpdate["course"]) ?></td></tr>
                    <tr><td>Year Level</td><td><?= htmlspecialchars((string) $studentBeforeUpdate["year_level"]) ?></td></tr>
                </table>
            <?php } else { ?>
                <p class="empty-message">Student ID 1 was not found. Please insert sample data first.</p>
            <?php } ?>
        </div>

        <?php if ($studentAfterUpdate) { ?>
            <div class="box output">
                <h2>Student After Update</h2>
                <table>
                    <tr><th>Column</th><th>Value</th></tr>
                    <tr><td>Student ID</td><td><?= htmlspecialchars((string) $studentAfterUpdate["student_id"]) ?></td></tr>
                    <tr><td>Name</td><td><?= htmlspecialchars($studentAfterUpdate["student_name"]) ?></td></tr>
                    <tr><td>Email</td><td><?= htmlspecialchars($studentAfterUpdate["email"]) ?></td></tr>
                    <tr><td>Course</td><td><?= htmlspecialchars($studentAfterUpdate["course"]) ?></td></tr>
                    <tr><td>Year Level</td><td><?= htmlspecialchars((string) $studentAfterUpdate["year_level"]) ?></td></tr>
                </table>
            </div>
        <?php } ?>

        <form method="post" action="">
            <button type="submit">Run Static Update for Student ID 1</button>
        </form>

        <div class="box info">
            <h2>Main SQL Pattern</h2>

            <pre>UPDATE students
SET student_name = :student_name,
    email = :email,
    course = :course,
    year_level = :year_level
WHERE student_id = :student_id;</pre>
        </div>
    </div>

</body>
</html>
