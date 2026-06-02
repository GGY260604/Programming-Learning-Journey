<?php
/*
  FILE: 05 - Show Success and Error Message.php
  TOPIC: CH19 - MySQL Insert Data

  GOAL:
  - Learn how to show clear success and error messages after database insert.
  - Learn how to handle duplicate email errors more nicely.
  - Learn how to separate validation errors from database errors.

  IMPORTANT:
  - A real backend should not show confusing raw database errors to normal users.
  - For learning, it is useful to know the original database error too.
*/

require_once __DIR__ . "/includes/db.php";

$studentName = "";
$email = "";
$course = "";
$yearLevel = "";
$errors = [];
$successMessage = "";
$errorMessage = "";
$technicalError = "";
$newStudentId = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentName = trim($_POST["student_name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $course = trim($_POST["course"] ?? "");
    $yearLevel = trim($_POST["year_level"] ?? "");

    if ($studentName === "") {
        $errors[] = "Please enter the student name.";
    }

    if ($email === "") {
        $errors[] = "Please enter the email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if ($course === "") {
        $errors[] = "Please enter the course.";
    }

    if (!in_array($yearLevel, ["1", "2", "3", "4"], true)) {
        $errors[] = "Please select a valid year level.";
    }

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

            $newStudentId = $pdo->lastInsertId();
            $successMessage = "Student record has been added successfully.";

            $studentName = "";
            $email = "";
            $course = "";
            $yearLevel = "";
        } catch (PDOException $error) {
            /*
              MySQL duplicate entry error code is usually 23000.
              This can happen because the email column is UNIQUE.
            */

            if ($error->getCode() === "23000") {
                $errorMessage = "This email already exists. Please use another email.";
            } else {
                $errorMessage = "Something went wrong while inserting the record.";
            }

            /*
              This technical error is shown here for learning only.
              In production, it should usually be logged instead of displayed.
            */

            $technicalError = $error->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file shows user-friendly success and error messages.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH19 - Show Success and Error Message</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH19 - Show Success and Error Message</h1>

        <p>
            This file improves the user experience by showing clear messages after
            the insert operation.
        </p>

        <?php if ($successMessage !== "") { ?>
            <div class="box success">
                <h2>Success</h2>
                <p><?= htmlspecialchars($successMessage) ?></p>
                <p>New student ID: <strong><?= htmlspecialchars((string) $newStudentId) ?></strong></p>
            </div>
        <?php } ?>

        <?php if (count($errors) > 0) { ?>
            <div class="box error">
                <h2>Please Fix These Problems</h2>
                <ul>
                    <?php foreach ($errors as $error) { ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Insert Failed</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>

                <?php if ($technicalError !== "") { ?>
                    <p class="small-note">
                        Technical error for learning:
                        <?= htmlspecialchars($technicalError) ?>
                    </p>
                <?php } ?>
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

        <div class="box info">
            <h2>Message Handling Pattern</h2>

            <pre>try {
    // Insert data
    $successMessage = "Record added successfully.";
} catch (PDOException $error) {
    if ($error-&gt;getCode() === "23000") {
        $errorMessage = "This email already exists.";
    } else {
        $errorMessage = "Something went wrong.";
    }
}</pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="04 - Validate Before Insert.php">&lsaquo; Previous: 04 - Validate Before Insert.php</a>
            <a class="next" href="../CH20 - MySQL Update Data/01 - Update Static Data.php">Next: 01 - Update Static Data.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
