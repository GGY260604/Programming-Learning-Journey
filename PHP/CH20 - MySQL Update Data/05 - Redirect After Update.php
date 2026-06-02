<?php
/*
  FILE: 05 - Redirect After Update.php
  TOPIC: CH20 - MySQL Update Data

  GOAL:
  - Learn how to redirect after a successful update.
  - Understand the POST-Redirect-GET pattern.
  - Avoid repeated update when the browser refreshes the page.

  IMPORTANT:
  - header("Location: ...") must run before any HTML output.
  - Use exit after header() to stop the script.
  - Do not echo or print anything before calling header().
*/

require_once __DIR__ . "/includes/db.php";

$studentId = (int) ($_GET["id"] ?? $_POST["student_id"] ?? 1);
$student = null;
$studentName = "";
$email = "";
$course = "";
$yearLevel = "";
$errorMessage = "";
$showUpdatedMessage = isset($_GET["updated"]);

try {
    $pdo = getPDOConnection();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $studentName = trim($_POST["student_name"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $course = trim($_POST["course"] ?? "");
        $yearLevel = trim($_POST["year_level"] ?? "");

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

        /*
          Redirect after successful update.

          This changes the request from POST back to GET.
          Then, if the user refreshes the page, the browser will not submit
          the update form again.
        */

        header("Location: 05%20-%20Redirect%20After%20Update.php?id=" . urlencode((string) $studentId) . "&updated=1");
        exit;
    }

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
      This file demonstrates redirecting after an UPDATE command.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH20 - Redirect After Update</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH20 - Redirect After Update</h1>

        <p>
            This file uses the POST-Redirect-GET pattern after updating a student record.
        </p>

        <?php if ($showUpdatedMessage) { ?>
            <div class="box success">
                <h2>Success</h2>
                <p>The student record was updated and the page redirected back using GET.</p>
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

        <?php if ($student) { ?>
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

                <button type="submit">Update and Redirect</button>
            </form>
        <?php } else { ?>
            <div class="box warning">
                <h2>No Student Found</h2>
                <p>There is no student with ID <?= htmlspecialchars((string) $studentId) ?>.</p>
            </div>
        <?php } ?>

        <div class="box info">
            <h2>POST-Redirect-GET Pattern</h2>
            <p>
                After processing a POST request, the server redirects the browser to a GET page.
                This helps prevent repeated form submission when the user refreshes the browser.
            </p>

            <pre>header(&quot;Location: page.php?updated=1&quot;);
exit;</pre>
        </div>
    </div>

</body>
</html>
