<?php
/*
  FILE: 01 - PDO Connection Test.php
  TOPIC: CH17 - PDO MySQL Connection

  GOAL:
  - Learn how to connect PHP to MySQL using PDO.
  - Learn the meaning of host, database name, username, password, and DSN.
  - Learn how to use try-catch when connecting to a database.

  BEFORE YOU RUN:
  - Start Apache and MySQL in XAMPP.
  - Make sure the database php_note_db already exists.
  - You can create the database using CH16.

  IMPORTANT:
  - This file keeps everything in one file for learning purpose.
  - Later files will move the connection code into includes/db.php.
*/

/*
  Database configuration.
*/
$host = "localhost";
$dbName = "php_note_db";
$username = "root";
$password = "";

/*
  DSN means Data Source Name.

  This string tells PDO how to connect to the database.
*/
$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";

/*
  Prepare variables for displaying the result in HTML.
*/
$connectionStatus = "";
$message = "";
$connectionDetails = [];

try {
    /*
      Create the PDO connection object.

      If the connection is successful, $pdo can be used to run SQL commands.
      If the connection fails, PHP jumps to the catch block.
    */
    $pdo = new PDO($dsn, $username, $password);
    // $pdo = new PDO("mysql:host=localhost;dbname=php_note_db;charset=utf8mb4", $username, $password); // Alternative way to write the same thing.

    /*
      Tell PDO to throw exceptions when errors happen.
    */
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $connectionStatus = "success";
    $message = "Database connected successfully.";

    $connectionDetails = [
        "Host" => $host,
        "Database" => $dbName,
        "Username" => $username,
        "Character set" => "utf8mb4"
    ];
} catch (PDOException $error) {
    /*
      This block runs when the database connection fails.

      For learning, we show the error message.
      In a real public website, detailed database errors should usually be logged,
      not shown directly to normal users.
    */
    $connectionStatus = "error";
    $message = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file demonstrates a basic PDO connection.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH17 - PDO Connection Test</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH17 - PDO Connection Test</h1>

        <p>
            This file connects PHP to MySQL using PDO.
        </p>

        <?php if ($connectionStatus === "success") { ?>
            <div class="box success">
                <h2>Connection Result</h2>
                <p><strong>Status:</strong> Success</p>
                <p><?= htmlspecialchars($message) ?></p>
            </div>
        <?php } else { ?>
            <div class="box error">
                <h2>Connection Result</h2>
                <p><strong>Status:</strong> Failed</p>
                <p><?= htmlspecialchars($message) ?></p>
            </div>
        <?php } ?>

        <?php if (!empty($connectionDetails)) { ?>
            <div class="box output">
                <h2>Connection Details</h2>

                <table>
                    <tr>
                        <th>Item</th>
                        <th>Value</th>
                    </tr>

                    <?php foreach ($connectionDetails as $item => $value) { ?>
                        <tr>
                            <td><?= htmlspecialchars($item) ?></td>
                            <td><?= htmlspecialchars($value) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>

        <div class="box info">
            <h2>Main Code Pattern</h2>

            <pre>$dsn = "mysql:host=$host;dbname=$dbName;charset=utf8mb4";
$pdo = new PDO($dsn, $username, $password);</pre>

            <p>
                The variable <code>$pdo</code> stores the database connection object.
                Later, we can use it to run SQL commands.
            </p>
        </div>

        <div class="box warning">
            <h2>Common Reasons Connection Fails</h2>

            <ul>
                <li>MySQL is not started in XAMPP.</li>
                <li>The database name is wrong.</li>
                <li>The username or password is wrong.</li>
                <li>The PDO MySQL extension is not enabled.</li>
            </ul>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="../CH16 - MySQL Database Preparation/05 - Database Setup Guide.php">&lsaquo; Previous: 05 - Database Setup Guide.php</a>
            <a class="next" href="02 - Connection Config File.php">Next: 02 - Connection Config File.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
