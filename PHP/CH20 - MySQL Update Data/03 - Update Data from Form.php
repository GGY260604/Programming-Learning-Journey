<?php
/*
  FILE: 03 - Update Data from Form.php
  TOPIC: CH20 - MySQL Update Data

  GOAL:
  - Learn how to update a database record using form input.
  - Load the existing record first.
  - Process the form only when the request method is POST.

  IMPORTANT:
  - GET is commonly used to choose which record to edit.
  - POST is commonly used to submit the updated data.
  - Prepared statements should be used because form input comes from the user.
*/

require_once __DIR__ . "/includes/db.php";

$studentId = (int) ($_GET["id"] ?? $_POST["student_id"] ?? 1);
$studentName = "";
$email = "";
$course = "";
$yearLevel = "";
$successMessage = "";
$errorMessage = "";
$affectedRows = null;

try {
    $pdo = getPDOConnection();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $studentName = trim($_POST["student_name"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $course = trim($_POST["course"] ?? "");
        $yearLevel = trim($_POST["year_level"] ?? "");

        /*
          This SQL updates one row based on student_id.

          The placeholders will receive the real values during execute().
        */

        $sql = "UPDATE students
                SET student_name = :student_name,
                    email = :email,
                    course = :course,
                    year_level = :year_level
                WHERE student_id = :student_id";

        $statement = $pdo->prepare($sql);

        $statement->execute([
            ":student_name" => $studentName,
            ":email" => $email,
            ":course" => $course,
            ":year_level" => (int) $yearLevel,
            ":student_id" => $studentId
        ]);

        $affectedRows = $statement->rowCount();
        $successMessage = "Student update submitted successfully.";
    }

    /*
      After updating, we select the latest data from the database.
      This makes the form display the current saved values.
    */

    $selectSql = "SELECT * FROM students WHERE student_id = :student_id";
    $selectStatement = $pdo->prepare($selectSql);
    $selectStatement->execute([
        ":student_id" => $studentId
    ]);

    $student = $selectStatement->fetch();

    if ($student) {
        $studentName = $student["student_name"];
        $email = $student["email"];
        $course = $student["course"];
        $yearLevel = (string) $student["year_level"];
    }
} catch (PDOException $error) {
    $errorMessage = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file demonstrates updating database data using form values.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH20 - Update Data from Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH20 - Update Data from Form</h1>

        <p>
            This file updates one student record using values submitted from a form.
        </p>

        <?php if ($successMessage !== "") { ?>
            <div class="box success">
                <h2>Success</h2>
                <p><?= htmlspecialchars($successMessage) ?></p>
                <p>Affected rows: <strong><?= htmlspecialchars((string) $affectedRows) ?></strong></p>
                <p class="small-note">
                    If affected rows is 0, it may mean the submitted values are the same as the old values.
                </p>
            </div>
        <?php } ?>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Error</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            </div>
        <?php } ?>

        <form method="get" action="">
            <label for="id">Student ID</label>
            <input type="number" id="id" name="id" value="<?= htmlspecialchars((string) $studentId) ?>" min="1">
            <button type="submit">Load Student</button>
        </form>

        <?php if (isset($student) && $student) { ?>
            <form method="post" action="">
                <input type="hidden" name="student_id" value="<?= htmlspecialchars((string) $studentId) ?>">

                <label for="student_name">Student Name</label>
                <input type="text" id="student_name" name="student_name" value="<?= htmlspecialchars($studentName) ?>">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>">

                <label for="course">Course</label>
                <input type="text" id="course" name="course" value="<?= htmlspecialchars($course) ?>">

                <label for="year_level">Year Level</label>
                <select id="year_level" name="year_level">
                    <option value="1" <?= $yearLevel === "1" ? "selected" : "" ?>>Year 1</option>
                    <option value="2" <?= $yearLevel === "2" ? "selected" : "" ?>>Year 2</option>
                    <option value="3" <?= $yearLevel === "3" ? "selected" : "" ?>>Year 3</option>
                    <option value="4" <?= $yearLevel === "4" ? "selected" : "" ?>>Year 4</option>
                </select>

                <button type="submit">Update Student</button>
            </form>
        <?php } else { ?>
            <div class="box warning">
                <h2>No Student Found</h2>
                <p>There is no student with ID <?= htmlspecialchars((string) $studentId) ?>.</p>
            </div>
        <?php } ?>

        <div class="box info">
            <h2>GET and POST in This File</h2>
            <p>
                GET is used to choose the student ID from the URL. POST is used to submit
                the updated form values.
            </p>
        </div>
    </div>

</body>
</html>
