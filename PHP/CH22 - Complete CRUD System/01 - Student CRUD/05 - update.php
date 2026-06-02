<?php
/*
  FILE: 05 - update.php
  TOPIC: CH22 - Complete CRUD System

  GOAL:
  - Receive edited form data.
  - Validate the data.
  - Update one existing student record in MySQL.
*/

require __DIR__ . "/includes/db.php";

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: 01%20-%20index.php");
    exit;
}

$id = filter_input(INPUT_POST, "student_id", FILTER_VALIDATE_INT);
$studentName = trim($_POST["student_name"] ?? "");
$email = trim($_POST["email"] ?? "");
$course = trim($_POST["course"] ?? "");
$yearLevel = filter_input(INPUT_POST, "year_level", FILTER_VALIDATE_INT);

$errors = [];

if ($id === false || $id === null) {
    $errors[] = "Invalid student ID.";
}

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
    $sql = "UPDATE students
            SET student_name = :student_name,
                email = :email,
                course = :course,
                year_level = :year_level
            WHERE student_id = :student_id";

    $statement = $pdo->prepare($sql);

    $statement->execute([
        "student_name" => $studentName,
        "email" => $email,
        "course" => $course,
        "year_level" => $yearLevel,
        "student_id" => $id
    ]);

    header("Location: 01%20-%20index.php?message=updated");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH22 - Update Student</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class="container">

        <h1>Update Student</h1>

        <div class="box error">
            <h2>Validation Failed</h2>

            <ul>
                <?php foreach ($errors as $error) { ?>
                    <li><?= e($error) ?></li>
                <?php } ?>
            </ul>

            <a href="01%20-%20index.php">Back to Student List</a>
        </div>

    </div>

</body>
</html>
