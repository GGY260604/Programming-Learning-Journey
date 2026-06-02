<?php
/*
  FILE: 03 - Insert with Prepared Statement.php
  TOPIC: CH19 - MySQL Insert Data

  GOAL:
  - Learn how to insert data using PDO prepared statements.
  - Learn named placeholders such as :student_name and :email.
  - Understand why prepared statements are safer for user input.

  IMPORTANT:
  - Prepared statements help prevent SQL injection.
  - User input should not be directly combined into SQL text.
*/

require_once __DIR__ . "/includes/db.php";

$studentName = "";
$email = "";
$course = "";
$yearLevel = "";
$successMessage = "";
$errorMessage = "";
$newStudentId = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentName = trim($_POST["student_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $course = trim($_POST["course"] ?? "");
    $yearLevel = trim($_POST["year_level"] ?? "");

    try {
        $pdo = getPDOConnection();

        /*
          This SQL uses named placeholders.

          :student_name, :email, :course, and :year_level are placeholders.
          They are not real values yet.
        */

        $sql = "INSERT INTO students (student_name, email, course, year_level)
                VALUES (:student_name, :email, :course, :year_level)";

        /*
          prepare() tells PDO to prepare the SQL safely.
        */

        $statement = $pdo->prepare($sql);

        /*
          execute() sends the real values to the placeholders.

          The values are sent separately from the SQL structure.
          This is why prepared statements are safer.
        */

        $statement->execute([
            ":student_name" => $studentName,
            ":email" => $email,
            ":course" => $course,
            ":year_level" => (int) $yearLevel
        ]);

        $newStudentId = $pdo->lastInsertId();
        $successMessage = "Student inserted successfully using a prepared statement.";
    } catch (PDOException $error) {
        $errorMessage = $error->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file demonstrates INSERT with a prepared statement.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH19 - Insert with Prepared Statement</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH19 - Insert with Prepared Statement</h1>

        <p>
            This file shows the recommended way to insert user input into MySQL.
        </p>

        <?php if ($successMessage !== "") { ?>
            <div class="box success">
                <h2>Success</h2>
                <p><?= htmlspecialchars($successMessage) ?></p>
                <p>New student ID: <strong><?= htmlspecialchars((string) $newStudentId) ?></strong></p>
            </div>
        <?php } ?>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Error</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            </div>
        <?php } ?>

        <form method="post" action="">
            <label for="student_name">Student Name</label>
            <input type="text" id="student_name" name="student_name" value="<?= htmlspecialchars($studentName) ?>">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>">

            <label for="course">Course</label>
            <input type="text" id="course" name="course" value="<?= htmlspecialchars($course) ?>">

            <label for="year_level">Year Level</label>
            <select id="year_level" name="year_level">
                <option value="">-- Select Year --</option>
                <option value="1" <?= $yearLevel === "1" ? "selected" : "" ?>>Year 1</option>
                <option value="2" <?= $yearLevel === "2" ? "selected" : "" ?>>Year 2</option>
                <option value="3" <?= $yearLevel === "3" ? "selected" : "" ?>>Year 3</option>
                <option value="4" <?= $yearLevel === "4" ? "selected" : "" ?>>Year 4</option>
            </select>

            <button type="submit">Insert Student Safely</button>
        </form>

        <div class="box info">
            <h2>Main Code Pattern</h2>

            <pre>$sql = "INSERT INTO students (student_name, email, course, year_level)
        VALUES (:student_name, :email, :course, :year_level)";

$statement = $pdo-&gt;prepare($sql);

$statement-&gt;execute([
    ":student_name" =&gt; $studentName,
    ":email" =&gt; $email,
    ":course" =&gt; $course,
    ":year_level" =&gt; $yearLevel
]);</pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="02 - Insert Data from Form.php">&lsaquo; Previous: 02 - Insert Data from Form.php</a>
            <a class="next" href="04 - Validate Before Insert.php">Next: 04 - Validate Before Insert.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
