<?php
/*
  FILE: 04 - Search Records.php
  TOPIC: CH18 - MySQL Select and Display Data

  GOAL:
  - Learn how to search database records using a keyword.
  - Learn how to use LIKE in SQL.
  - Learn how to use a prepared statement for search input.

  IMPORTANT:
  - Search keywords come from the user.
  - Therefore, the search value should be passed through a prepared statement.
*/

require_once __DIR__ . "/includes/db.php";

$keyword = trim($_GET["keyword"] ?? "");
$students = [];
$errorMessage = "";

try {
    $pdo = getPDOConnection();

    if ($keyword === "") {
        /*
          If no keyword is entered, show all records.
        */
        $sql = "SELECT student_id, student_name, email, course, year_level
                FROM students
                ORDER BY student_id ASC";

        $statement = $pdo->query($sql);
    } else {
        /*
          LIKE is used for pattern searching.

          Example:
          WHERE student_name LIKE '%ali%'

          The percent sign % means any characters before or after the keyword.
        */
        $sql = "SELECT student_id, student_name, email, course, year_level
                FROM students
                WHERE student_name LIKE :keyword
                   OR email LIKE :keyword
                   OR course LIKE :keyword
                ORDER BY student_id ASC";

        $statement = $pdo->prepare($sql);

        $statement->execute([
            "keyword" => "%" . $keyword . "%"
        ]);
    }

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
    <title>CH18 - Search Records</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH18 - Search Records</h1>

        <p>
            This file searches student records by name, email, or course.
        </p>

        <div class="box info">
            <h2>Search Form</h2>

            <form method="get" action="">
                <label for="keyword">Keyword</label>
                <input
                    type="text"
                    id="keyword"
                    name="keyword"
                    value="<?= htmlspecialchars($keyword) ?>"
                    placeholder="Example: Ali, software, gmail"
                >

                <button type="submit">Search</button>
                <a class="button" href="04 - Search Records.php">Reset</a>
            </form>
        </div>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Database Error</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            </div>
        <?php } else { ?>
            <div class="box success">
                <h2>Search Result</h2>

                <?php if ($keyword === "") { ?>
                    <p>Showing all records because no keyword was entered.</p>
                <?php } else { ?>
                    <p>Keyword: <span class="badge"><?= htmlspecialchars($keyword) ?></span></p>
                <?php } ?>

                <p>Total records found: <strong><?= count($students) ?></strong></p>
            </div>

            <div class="box output">
                <h2>Students</h2>

                <?php if (count($students) === 0) { ?>
                    <p class="empty-message">No matching records found.</p>
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

            <pre>$sql = "SELECT * FROM students WHERE student_name LIKE :keyword";
$statement = $pdo-&gt;prepare($sql);
$statement-&gt;execute([
    "keyword" =&gt; "%" . $keyword . "%"
]);</pre>

            <p>
                The <code>%</code> symbol allows the database to find records that
                contain the keyword anywhere inside the text.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="03 - Select One Record by ID.php">&lsaquo; Previous: 03 - Select One Record by ID.php</a>
            <a class="next" href="05 - Sort Records.php">Next: 05 - Sort Records.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
