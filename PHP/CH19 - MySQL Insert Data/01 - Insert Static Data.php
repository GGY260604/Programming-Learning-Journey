<?php
/*
  FILE: 01 - Insert Static Data.php
  TOPIC: CH19 - MySQL Insert Data

  GOAL:
  - Learn the basic INSERT INTO syntax.
  - Insert a hard-coded student record into the students table.
  - Learn how lastInsertId() returns the new auto-increment ID.

  BEFORE YOU RUN:
  - Start Apache and MySQL in XAMPP.
  - Make sure php_note_db exists.
  - Make sure the students table exists from CH16.

  IMPORTANT:
  - This file uses hard-coded values, not user input.
  - Because there is no user input, direct SQL is acceptable for this simple demo.
  - In real systems, prepared statements are recommended when values may come from users.
*/

require_once __DIR__ . "/includes/db.php";

$insertedId = null;
$successMessage = "";
$errorMessage = "";

/*
  We only insert when the button is clicked.
  This prevents accidental repeated insert every time the page is refreshed.
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $pdo = getPDOConnection();

        /*
          INSERT INTO syntax:

          INSERT INTO table_name (column1, column2, column3)
          VALUES (value1, value2, value3);

          We do not insert student_id because it is AUTO_INCREMENT.
          We do not insert created_at because it uses DEFAULT CURRENT_TIMESTAMP.
        */

        $sql = "INSERT INTO students (student_name, email, course, year_level)
                VALUES ('Static Student', 'static.student@example.com', 'Software Engineering', 1)";

        /*
          exec() runs an SQL command and returns the number of affected rows.
          For INSERT, the affected row count is usually 1 if the insert succeeds.
        */

        $affectedRows = $pdo->exec($sql);

        /*
          lastInsertId() returns the most recent AUTO_INCREMENT value.
        */

        $insertedId = $pdo->lastInsertId();

        $successMessage = "Inserted $affectedRows row successfully.";
    } catch (PDOException $error) {
        $errorMessage = $error->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file demonstrates a static INSERT statement.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH19 - Insert Static Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH19 - Insert Static Data</h1>

        <p>
            This file inserts one hard-coded student record into the
            <code>students</code> table.
        </p>

        <form method="post" action="">
            <button type="submit">Insert Static Student</button>
        </form>

        <?php if ($successMessage !== "") { ?>
            <div class="box success">
                <h2>Insert Successful</h2>
                <p><?= htmlspecialchars($successMessage) ?></p>
                <p>New student ID: <strong><?= htmlspecialchars((string) $insertedId) ?></strong></p>
            </div>
        <?php } ?>

        <?php if ($errorMessage !== "") { ?>
            <div class="box error">
                <h2>Insert Failed</h2>
                <p><?= htmlspecialchars($errorMessage) ?></p>
                <p class="small-note">
                    If the error says duplicate email, it means the same static email
                    has already been inserted before.
                </p>
            </div>
        <?php } ?>

        <div class="box info">
            <h2>Main SQL Pattern</h2>

            <pre>INSERT INTO students (student_name, email, course, year_level)
VALUES ('Static Student', 'static.student@example.com', 'Software Engineering', 1);</pre>

            <p>
                <code>INSERT INTO</code> is used to add a new row into a table.
            </p>
        </div>
    </div>

</body>
</html>
