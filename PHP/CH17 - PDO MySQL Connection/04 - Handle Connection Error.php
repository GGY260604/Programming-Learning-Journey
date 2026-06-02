<?php
/*
  FILE: 04 - Handle Connection Error.php
  TOPIC: CH17 - PDO MySQL Connection

  GOAL:
  - Learn how try-catch handles database connection errors.
  - Learn how to show a friendly error message.
  - Learn that detailed errors are useful for learning but should be hidden in production.

  HOW TO TEST:
  - Open this file normally to test a correct connection.
  - Add ?mode=wrong to the URL to simulate a wrong database name.

  EXAMPLE:
  04 - Handle Connection Error.php?mode=wrong
*/

/*
  This mode lets us intentionally test a failed connection.
*/
$mode = $_GET["mode"] ?? "correct";

$host = "localhost";
$dbName = "php_note_db";
$username = "root";
$password = "";

/*
  If mode is wrong, use a database name that should not exist.
  This allows the catch block to run for demonstration.
*/
if ($mode === "wrong") {
    $dbName = "database_that_does_not_exist";
}

$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

$connectionStatus = "";
$userFriendlyMessage = "";
$technicalMessage = "";

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $connectionStatus = "success";
    $userFriendlyMessage = "The database connection is working.";
} catch (PDOException $error) {
    $connectionStatus = "error";
    $userFriendlyMessage = "Sorry, the system cannot connect to the database right now.";

    /*
      Store the technical message separately.
      For learning, we display it below.
    */
    $technicalMessage = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file demonstrates database error handling.
      PHP tags in HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH17 - Handle Connection Error</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH17 - Handle Connection Error</h1>

        <p>
            This file shows how to handle a database connection error using <code>try-catch</code>.
        </p>

        <?php if ($connectionStatus === "success") { ?>
            <div class="box success">
                <h2>Connection Result</h2>
                <p><?= htmlspecialchars($userFriendlyMessage) ?></p>
            </div>
        <?php } else { ?>
            <div class="box error">
                <h2>Connection Result</h2>
                <p><?= htmlspecialchars($userFriendlyMessage) ?></p>
            </div>
        <?php } ?>

        <div class="box output">
            <h2>Current Test Mode</h2>

            <table>
                <tr>
                    <th>Item</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Mode</td>
                    <td><?= htmlspecialchars($mode) ?></td>
                </tr>
                <tr>
                    <td>Database Name Used</td>
                    <td><?= htmlspecialchars($dbName) ?></td>
                </tr>
            </table>
        </div>

        <?php if ($technicalMessage !== "") { ?>
            <div class="box warning">
                <h2>Technical Error Message for Learning</h2>

                <p>
                    This message helps developers understand what went wrong:
                </p>

                <pre><?= htmlspecialchars($technicalMessage) ?></pre>

                <p class="small-note">
                    In a real public website, this detailed message should usually be written to a log file,
                    not displayed to normal users.
                </p>
            </div>
        <?php } ?>

        <div class="box info">
            <h2>Try Both Modes</h2>

            <p>
                Normal mode uses the correct database name:
            </p>

            <pre>04 - Handle Connection Error.php</pre>

            <p>
                Wrong mode intentionally uses a database name that does not exist:
            </p>

            <pre>04 - Handle Connection Error.php?mode=wrong</pre>
        </div>

        <div class="box">
            <h2>Main Code Pattern</h2>

            <pre>try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $error) {
    $message = $error-&gt;getMessage();
}</pre>
        </div>
    </div>

</body>
</html>
