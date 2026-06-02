<?php
/*
  FILE: 01 - Select All Records.php
  TOPIC: CH18 - MySQL Select and Display Data

  GOAL:
  - Learn how to use SELECT to retrieve all records from a MySQL table.
  - Learn how to use PDO query().
  - Learn how to use fetchAll() to get all result rows.

  BEFORE YOU RUN:
  - Start Apache and MySQL in XAMPP.
  - Make sure the database php_note_db exists.
  - Make sure the students table already contains sample data from CH16.

  IMPORTANT:
  - query() is suitable here because this SQL does not contain user input.
  - If the SQL contains user input, use prepare() and execute() instead.
*/

require_once __DIR__ . "/includes/db.php";

$students = [];
$errorMessage = "";

try {
    /*
      Get the reusable PDO connection from includes/db.php.
    */
    $pdo = getPDOConnection();

    /*
      This SQL retrieves all student records.

      ORDER BY student_id ASC means:
      - sort the records by student_id
      - ASC means ascending order
    */
    $sql = "SELECT student_id, student_name, email, course, year_level
            FROM students
            ORDER BY student_id ASC";

    /*
      query() runs the SQL directly and returns a PDOStatement object.
    */
    $statement = $pdo->query($sql);

    /*
      fetchAll() retrieves all rows from the result.

      Because includes/db.php sets PDO::FETCH_ASSOC as the default fetch mode,
      each row is returned as an associative array.
    */
    $students = $statement->fetchAll();
} catch (PDOException $error) {
    /*
      If the database query fails, store the error message for display.
    */
    $errorMessage = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file demonstrates SELECT all records.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH18 - Select All Records</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH18 - Select All Records</h1>

        <p>
            This file uses <code>SELECT</code> to retrieve all records from the
            <code>students</code> table.
        </p>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Database Error</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            </div>
        <?php } else { ?>
            <div class="box success">
                <h2>Query Successful</h2>
                <p>Total records found: <strong><?= count($students) ?></strong></p>
            </div>

            <div class="box output">
                <h2>Raw Array Output</h2>

                <p>
                    This output is useful for learning because it shows the structure
                    returned by <code>fetchAll()</code>.
                </p>

                <pre><?php print_r($students); ?></pre>
            </div>
        <?php } ?>

        <div class="box info">
            <h2>Main Code Pattern</h2>

            <pre>$sql = "SELECT student_id, student_name, email, course, year_level FROM students";
$statement = $pdo-&gt;query($sql);
$students = $statement-&gt;fetchAll();</pre>

            <p>
                <code>fetchAll()</code> is commonly used when you want to display
                multiple database records.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="../CH17 - PDO MySQL Connection/04 - Handle Connection Error.php">&lsaquo; Previous: 04 - Handle Connection Error.php</a>
            <a class="next" href="02 - Display Records in HTML Table.php">Next: 02 - Display Records in HTML Table.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
