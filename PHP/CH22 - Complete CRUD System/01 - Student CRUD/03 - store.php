<?php
/*
  FILE: 03 - store.php
  TOPIC: CH22 - Complete CRUD System

  GOAL:
  - Receive data from the create form.
  - Validate user input.
  - Insert a new student record into MySQL.

  IMPORTANT:
  - This file is a processing page.
  - It should receive POST data from 02 - create.php.
*/

require __DIR__ . "/includes/db.php";

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

/*
  $_SERVER["REQUEST_METHOD"] tells us how the page was requested.
  We only want this file to process POST requests.
*/
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: 02%20-%20create.php");
    exit;
}

/*
  trim() removes extra spaces from the beginning and end of a string.
  The null coalescing operator ?? gives a default value if the input does not exist.
*/
$studentName = trim($_POST["student_name"] ?? "");
$email = trim($_POST["email"] ?? "");
$course = trim($_POST["course"] ?? "");
$yearLevel = filter_input(INPUT_POST, "year_level", FILTER_VALIDATE_INT);

$errors = [];

if ($studentName === "") {
    $errors[] = "Student name is required.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "A valid email address is required.";
}

if ($course === "") {
    $errors[] = "Course is required.";
}

if ($yearLevel === false || $yearLevel < 1 || $yearLevel > 4) {
    $errors[] = "Year level must be between 1 and 4.";
}

if (count($errors) === 0) {
    /*
      Prepared statements protect the query from SQL injection.
      The values are not placed directly into the SQL string.
    */

    $sql = "INSERT INTO students (student_name, email, course, year_level)
            VALUES (:student_name, :email, :course, :year_level)";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        "student_name" => $studentName,
        "email" => $email,
        "course" => $course,
        "year_level" => $yearLevel
    ]);

    header("Location: 01%20-%20index.php?message=created");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH22 - Store Student</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="container">

        <h1>Store Student</h1>

        <div class="box error">
            <h2>Validation Failed</h2>

            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= e($error) ?></li>
                <?php } ?>
            </ul>

            <a href="02%20-%20create.php">Back to Create Form</a>
        </div>

        <div class="box info">
            <h2>Important Concept</h2>
            <p>
                A processing page can still display an error page if validation fails.
                If validation passes, it usually redirects the user back to the list page.
            </p>
        </div>

    </div>

</body>
</html>
