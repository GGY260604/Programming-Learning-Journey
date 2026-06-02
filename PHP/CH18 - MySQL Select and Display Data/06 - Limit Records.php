<?php
/*
  FILE: 06 - Limit Records.php
  TOPIC: CH18 - MySQL Select and Display Data

  GOAL:
  - Learn how to limit the number of records returned by MySQL.
  - Learn how to use the LIMIT clause.
  - Learn how to validate a limit value from user input.

  IMPORTANT:
  - LIMIT is useful for dashboards, previews, and pagination.
  - User input should be validated before being used as a limit number.
*/

require_once __DIR__ . "/includes/db.php";

$allowedLimits = [2, 3, 5, 10];
$limit = filter_input(INPUT_GET, "limit", FILTER_VALIDATE_INT);

if ($limit === null || $limit === false || !in_array($limit, $allowedLimits, true)) {
    $limit = 3;
}

$students = [];
$errorMessage = "";

try {
    $pdo = getPDOConnection();

    /*
      The limit value is safe here because it has been validated against
      the allowed limit list.
    */
    $sql = "SELECT student_id, student_name, email, course, year_level
            FROM students
            ORDER BY student_id ASC
            LIMIT $limit";

    $statement = $pdo->query($sql);
    $students = $statement->fetchAll();
} catch (PDOException $error) {
    $errorMessage = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH18 - Limit Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH18 - Limit Records</h1>

        <p>
            This file uses <code>LIMIT</code> to control how many records are displayed.
        </p>

        <div class="box info">
            <h2>Choose Limit</h2>

            <form method="get" action="">
                <label for="limit">Number of Records</label>
                <select id="limit" name="limit">
                    <?php foreach ($allowedLimits as $option) { ?>
                        <option value="<?= htmlspecialchars((string) $option) ?>" <?= $limit === $option ? "selected" : "" ?>>
                            <?= htmlspecialchars((string) $option) ?> records
                        </option>
                    <?php } ?>
                </select>

                <button type="submit">Apply Limit</button>
            </form>
        </div>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Database Error</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            </div>
        <?php } else { ?>
            <div class="box success">
                <h2>Current Limit</h2>
                <p>Showing maximum <strong><?= htmlspecialchars((string) $limit) ?></strong> records.</p>
            </div>

            <div class="box output">
                <h2>Limited Student Records</h2>

                <?php if (count($students) === 0) { ?>
                    <p class="empty-message">No student records found.</p>
                <?php } else { ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Year Level</th>
                        </tr>

                        <?php foreach ($students as $student) { ?>
                            <tr>
                                <td><?= htmlspecialchars($student["student_id"]) ?></td>
                                <td><?= htmlspecialchars($student["student_name"]) ?></td>
                                <td><?= htmlspecialchars($student["email"]) ?></td>
                                <td><?= htmlspecialchars($student["course"]) ?></td>
                                <td><?= htmlspecialchars($student["year_level"]) ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="box info">
            <h2>Main Code Pattern</h2>

            <pre>$sql = "SELECT * FROM students ORDER BY student_id ASC LIMIT $limit";</pre>

            <p>
                <code>LIMIT</code> is commonly used together with pagination,
                where a website displays only a small number of records per page.
            </p>
        </div>
    </div>

</body>
</html>
