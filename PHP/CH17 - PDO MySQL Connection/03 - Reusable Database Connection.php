<?php
/*
  FILE: 03 - Reusable Database Connection.php
  TOPIC: CH17 - PDO MySQL Connection

  GOAL:
  - Learn how to reuse database connection code from another file.
  - Learn why require_once is useful.
  - Learn how a helper function can return a PDO connection object.

  IMPORTANT:
  - This file uses includes/db.php.
  - The actual PDO connection code is stored inside includes/db.php.
*/

/*
  require_once loads another PHP file.

  __DIR__ means the directory path of the current file.
  This makes the path more reliable.

  We use require_once instead of include because the database file is required
  for this page to work and we only want to load it once.
*/
require_once __DIR__ . "/includes/db.php";

$connectionStatus = "";
$message = "";
$serverInfo = "";
$studentCount = null;

try {
    /*
      getDatabaseConnection() is a function from includes/db.php.

      It returns a PDO object.
    */
    $pdo = getDatabaseConnection();

    $connectionStatus = "success";
    $message = "Reusable database connection loaded successfully.";

    /*
      getAttribute() can read information from the PDO connection.
    */
    $serverInfo = $pdo->getAttribute(PDO::ATTR_SERVER_VERSION);

    /*
      This query checks whether the students table has records.
      query() is okay here because this SQL has no user input.
    */
    $statement = $pdo->query("SELECT COUNT(*) AS total_students FROM students");
    $row = $statement->fetch();
    $studentCount = $row["total_students"];
} catch (PDOException $error) {
    $connectionStatus = "error";
    $message = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file demonstrates reusable database connection code.
      Escape PHP examples inside HTML comments like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH17 - Reusable Database Connection</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH17 - Reusable Database Connection</h1>

        <p>
            This file uses <code>includes/db.php</code> so the database connection code does not need to be repeated.
        </p>

        <?php if ($connectionStatus === "success") { ?>
            <div class="box success">
                <h2>Connection Result</h2>
                <p><?= htmlspecialchars($message) ?></p>
            </div>
        <?php } else { ?>
            <div class="box error">
                <h2>Connection Result</h2>
                <p><?= htmlspecialchars($message) ?></p>
            </div>
        <?php } ?>

        <?php if ($connectionStatus === "success") { ?>
            <div class="box output">
                <h2>Database Check</h2>

                <table>
                    <tr>
                        <th>Item</th>
                        <th>Value</th>
                    </tr>
                    <tr>
                        <td>MySQL / MariaDB Server Version</td>
                        <td><?= htmlspecialchars($serverInfo) ?></td>
                    </tr>
                    <tr>
                        <td>Total Students in students Table</td>
                        <td><?= htmlspecialchars((string) $studentCount) ?></td>
                    </tr>
                </table>
            </div>
        <?php } ?>

        <div class="box info">
            <h2>Main Code Pattern</h2>

            <pre>require_once __DIR__ . "/includes/db.php";
$pdo = getDatabaseConnection();</pre>

            <p>
                This pattern is useful because many pages can reuse the same database connection function.
            </p>
        </div>

        <div class="box warning">
            <h2>If This File Shows an Error</h2>

            <p>
                Make sure you already ran the SQL files from CH16, especially the file that creates the
                <code>students</code> table.
            </p>
        </div>
    </div>

</body>
</html>
