<?php
/*
  FILE: 02 - Insert Data from Form.php
  TOPIC: CH19 - MySQL Insert Data

  GOAL:
  - Learn how to collect form data using $_POST.
  - Insert form values into a MySQL table.
  - Understand the basic flow of form insert.

  IMPORTANT:
  - This file shows the basic idea of inserting form data.
  - Later files improve this using prepared statements and validation.
*/

require_once __DIR__ . "/includes/db.php";

$studentName = "";
$email = "";
$course = "";
$yearLevel = "";
$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    /*
      $_POST receives data from a form that uses method="post".

      The null coalescing operator ?? means:
      - use the submitted value if it exists
      - otherwise use an empty string
    */

    $studentName = $_POST["student_name"] ?? "";
    $email = $_POST["email"] ?? "";
    $course = $_POST["course"] ?? "";
    $yearLevel = $_POST["year_level"] ?? "";

    try {
        $pdo = getPDOConnection();

        /*
          This file uses string concatenation for teaching the basic idea.

          However, this is NOT the safest method when using user input.
          The next file teaches prepared statements, which are safer.
        */

        $sql = "INSERT INTO students (student_name, email, course, year_level)
                VALUES (" .
                $pdo->quote($studentName) . ", " .
                $pdo->quote($email) . ", " .
                $pdo->quote($course) . ", " .
                (int) $yearLevel . ")";

        $pdo->exec($sql);

        $successMessage = "Student inserted successfully.";
    } catch (PDOException $error) {
        $errorMessage = $error->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file demonstrates inserting form data into MySQL.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH19 - Insert Data from Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH19 - Insert Data from Form</h1>

        <p>
            This file collects student data from a form and inserts it into MySQL.
        </p>

        <?php if ($successMessage !== "") { ?>
            <div class="box success">
                <h2>Success</h2>
                <p><?= htmlspecialchars($successMessage) ?></p>
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

            <button type="submit">Insert Student</button>
        </form>

        <div class="box warning">
            <h2>Important Safety Note</h2>
            <p>
                This file uses <code>$pdo-&gt;quote()</code> to reduce risk, but the
                better professional method is still <code>prepare()</code> and
                <code>execute()</code>. The next file teaches that method.
            </p>
        </div>
    </div>

</body>
</html>
