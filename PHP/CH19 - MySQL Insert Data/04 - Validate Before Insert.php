<?php
/*
  FILE: 04 - Validate Before Insert.php
  TOPIC: CH19 - MySQL Insert Data

  GOAL:
  - Learn how to validate form input before inserting into MySQL.
  - Store validation errors in an array.
  - Insert only when there are no validation errors.

  IMPORTANT:
  - HTML required attributes are useful, but backend validation is still needed.
  - Users can bypass frontend validation.
*/

require_once __DIR__ . "/includes/db.php";

$studentName = "";
$email = "";
$course = "";
$yearLevel = "";
$errors = [];
$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentName = trim($_POST["student_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $course = trim($_POST["course"] ?? "");
    $yearLevel = trim($_POST["year_level"] ?? "");

    /*
      Validation means checking whether the input is acceptable.
      We collect all errors first instead of stopping at the first error.
    */

    if ($studentName === "") {
        $errors[] = "Student name is required.";
    }

    if ($email === "") {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email format is invalid.";
    }

    if ($course === "") {
        $errors[] = "Course is required.";
    }

    if ($yearLevel === "") {
        $errors[] = "Year level is required.";
    } elseif (!in_array($yearLevel, ["1", "2", "3", "4"], true)) {
        $errors[] = "Year level must be between 1 and 4.";
    }

    /*
      Only insert into the database when there are no validation errors.
    */

    if (count($errors) === 0) {
        try {
            $pdo = getPDOConnection();

            $sql = "INSERT INTO students (student_name, email, course, year_level)
                    VALUES (:student_name, :email, :course, :year_level)";

            $statement = $pdo->prepare($sql);

            $statement->execute([
                ":student_name" => $studentName,
                ":email" => $email,
                ":course" => $course,
                ":year_level" => (int) $yearLevel
            ]);

            $successMessage = "Student inserted successfully after validation.";

            /*
              Clear the form after successful insert.
            */

            $studentName = "";
            $email = "";
            $course = "";
            $yearLevel = "";
        } catch (PDOException $error) {
            $errorMessage = $error->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file validates user input before INSERT.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH19 - Validate Before Insert</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH19 - Validate Before Insert</h1>

        <p>
            This file checks the input first. The database insert only happens when
            all validation rules pass.
        </p>

        <?php if (count($errors) > 0) { ?>
            <div class="box error">
                <h2>Validation Errors</h2>
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <?php if ($successMessage !== "") { ?>
            <div class="box success">
                <h2>Success</h2>
                <p><?= htmlspecialchars($successMessage) ?></p>
            </div>
        <?php } ?>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Database Error</h2>
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

            <button type="submit">Validate and Insert</button>
        </form>

        <div class="box info">
            <h2>Validation Pattern</h2>

            <pre>if ($studentName === "") {
    $errors[] = "Student name is required.";
}

if (count($errors) === 0) {
    // Insert into database
}</pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="03 - Insert with Prepared Statement.php">&lsaquo; Previous: 03 - Insert with Prepared Statement.php</a>
            <a class="next" href="05 - Show Success and Error Message.php">Next: 05 - Show Success and Error Message.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
