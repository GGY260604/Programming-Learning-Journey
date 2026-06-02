<?php
/*
  FILE: 02 - Edit Form with Existing Data.php
  TOPIC: CH20 - MySQL Update Data

  GOAL:
  - Learn how to load one existing record from MySQL.
  - Display the record values inside an HTML form.
  - Understand the purpose of an edit form before updating data.

  IMPORTANT:
  - An edit page usually needs the record ID.
  - The old database values are placed inside form fields.
  - The form itself does not update data unless we process the submitted values.
*/

require_once __DIR__ . "/includes/db.php";

/*
  For learning purpose, the page uses ?id=1 by default.

  You can test another student by changing the URL, for example:
  02 - Edit Form with Existing Data.php?id=2
*/

$studentId = (int) ($_GET["id"] ?? 1);
$student = null;
$errorMessage = "";

try {
    $pdo = getPDOConnection();

    /*
      We use a prepared statement because the ID comes from the URL.
    */

    $sql = "SELECT * FROM students WHERE student_id = :student_id";
    $statement = $pdo->prepare($sql);
    $statement->execute([
        ":student_id" => $studentId
    ]);

    $student = $statement->fetch();
} catch (PDOException $error) {
    $errorMessage = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file demonstrates how to display existing database data inside a form.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH20 - Edit Form with Existing Data</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH20 - Edit Form with Existing Data</h1>

        <p>
            This file loads one student from the database and places the existing values
            inside an edit form.
        </p>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Error</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            </div>
        <?php } ?>

        <form method="get" action="">
            <label for="id">Choose Student ID to Load</label>
            <input type="number" id="id" name="id" value="<?= htmlspecialchars((string) $studentId) ?>" min="1">
            <button type="submit">Load Student</button>
        </form>

        <?php if ($student) { ?>
            <div class="box output">
                <h2>Edit Form Example</h2>

                <form method="post" action="#">
                    <!--
                      A hidden input can store the ID of the record being edited.
                      This allows the next processing page to know which row to update.
                    -->
                    <input type="hidden" name="student_id" value="<?= htmlspecialchars((string) $student["student_id"]) ?>">

                    <label for="student_name">Student Name</label>
                    <input type="text" id="student_name" name="student_name" value="<?= htmlspecialchars($student["student_name"]) ?>">

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($student["email"]) ?>">

                    <label for="course">Course</label>
                    <input type="text" id="course" name="course" value="<?= htmlspecialchars($student["course"]) ?>">

                    <label for="year_level">Year Level</label>
                    <select id="year_level" name="year_level">
                        <option value="1" <?= (int) $student["year_level"] === 1 ? "selected" : "" ?>>Year 1</option>
                        <option value="2" <?= (int) $student["year_level"] === 2 ? "selected" : "" ?>>Year 2</option>
                        <option value="3" <?= (int) $student["year_level"] === 3 ? "selected" : "" ?>>Year 3</option>
                        <option value="4" <?= (int) $student["year_level"] === 4 ? "selected" : "" ?>>Year 4</option>
                    </select>

                    <button type="button">This Button Does Not Update Yet</button>
                </form>
            </div>
        <?php } else { ?>
            <div class="box warning">
                <h2>No Student Found</h2>
                <p>There is no student with ID <?= htmlspecialchars((string) $studentId) ?>.</p>
            </div>
        <?php } ?>

        <div class="box info">
            <h2>Important Idea</h2>
            <p>
                Before updating data, an edit page usually loads the old values first.
                This makes the form easier to use because users can modify existing data
                instead of typing everything again.
            </p>

            <pre>&lt;input type="text" name="student_name" value="&lt;?= htmlspecialchars($student[&quot;student_name&quot;]) ?&gt;"&gt;</pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="01 - Update Static Data.php">&lsaquo; Previous: 01 - Update Static Data.php</a>
            <a class="next" href="03 - Update Data from Form.php">Next: 03 - Update Data from Form.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
