<?php
/*
  FILE: 04 - Update with Prepared Statement.php
  TOPIC: CH20 - MySQL Update Data

  GOAL:
  - Learn another way to use prepared statements for UPDATE.
  - Use bindValue() to bind one value at a time.
  - Understand the difference between SQL text and user input values.

  IMPORTANT:
  - Prepared statements separate SQL structure from data values.
  - bindValue() is useful when you want more control over each placeholder.
*/

require_once __DIR__ . "/includes/db.php";

$studentId = "";
$course = "";
$yearLevel = "";
$successMessage = "";
$errorMessage = "";
$affectedRows = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentId = trim($_POST["student_id"] ?? "");
    $course = trim($_POST["course"] ?? "");
    $yearLevel = trim($_POST["year_level"] ?? "");

    try {
        $pdo = getPDOConnection();

        /*
          This example only updates course and year_level.
          Not every UPDATE form must update every column.
        */

        $sql = "UPDATE students
                SET course = :course,
                    year_level = :year_level
                WHERE student_id = :student_id";

        $statement = $pdo->prepare($sql);

        /*
          bindValue() binds one placeholder to one value.
          it is used here to show an alternative to passing an array of values to execute().

          PDO::PARAM_STR means the value is treated as a string.
          PDO::PARAM_INT means the value is treated as an integer.
        */

        $statement->bindValue(":course", $course, PDO::PARAM_STR);
        $statement->bindValue(":year_level", (int) $yearLevel, PDO::PARAM_INT);
        $statement->bindValue(":student_id", (int) $studentId, PDO::PARAM_INT);

        $statement->execute();

        $affectedRows = $statement->rowCount();
        $successMessage = "Prepared UPDATE statement executed successfully.";
    } catch (PDOException $error) {
        $errorMessage = $error->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file demonstrates UPDATE with prepare() and bindValue().
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH20 - Update with Prepared Statement</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH20 - Update with Prepared Statement</h1>

        <p>
            This file uses <code>prepare()</code> and <code>bindValue()</code> to update selected columns safely.
        </p>

        <?php if ($successMessage !== "") { ?>
            <div class="box success">
                <h2>Success</h2>
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

        <form method="post" action="">
            <label for="student_id">Student ID</label>
            <input type="number" id="student_id" name="student_id" value="<?= htmlspecialchars($studentId) ?>" min="1">

            <label for="course">New Course</label>
            <input type="text" id="course" name="course" value="<?= htmlspecialchars($course) ?>" placeholder="Example: Data Engineering">

            <label for="year_level">New Year Level</label>
            <select id="year_level" name="year_level">
                <option value="">-- Select Year --</option>
                <option value="1" <?= $yearLevel === "1" ? "selected" : "" ?>>Year 1</option>
                <option value="2" <?= $yearLevel === "2" ? "selected" : "" ?>>Year 2</option>
                <option value="3" <?= $yearLevel === "3" ? "selected" : "" ?>>Year 3</option>
                <option value="4" <?= $yearLevel === "4" ? "selected" : "" ?>>Year 4</option>
            </select>

            <button type="submit">Update Course and Year</button>
        </form>

        <div class="box info">
            <h2>Main Code Pattern</h2>

            <pre>$statement = $pdo-&gt;prepare($sql);
$statement-&gt;bindValue(&quot;:course&quot;, $course, PDO::PARAM_STR);
$statement-&gt;bindValue(&quot;:year_level&quot;, (int) $yearLevel, PDO::PARAM_INT);
$statement-&gt;bindValue(&quot;:student_id&quot;, (int) $studentId, PDO::PARAM_INT);
$statement-&gt;execute();</pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="03 - Update Data from Form.php">&lsaquo; Previous: 03 - Update Data from Form.php</a>
            <a class="next" href="05 - Redirect After Update.php">Next: 05 - Redirect After Update.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
