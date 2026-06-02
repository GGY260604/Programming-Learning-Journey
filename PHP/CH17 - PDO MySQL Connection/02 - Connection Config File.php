<?php
/*
  FILE: 02 - Connection Config File.php
  TOPIC: CH17 - PDO MySQL Connection

  GOAL:
  - Understand what database configuration means.
  - Learn how configuration values are used to build a PDO DSN.
  - Learn why database settings should be organized clearly.

  IMPORTANT:
  - This file focuses on configuration structure.
  - The next file will use includes/db.php for reusable connection logic.
*/

/*
  A database configuration array stores connection settings in one place.

  This is easier to manage than scattering values everywhere in the code.
*/
$databaseConfig = [
    "host" => "localhost",
    "database" => "php_note_db",
    "username" => "root",
    "password" => "",
    "charset" => "utf8mb4"
];

/*
  Build the DSN from the configuration array.

  Notice that the password is not included in the DSN.
  The password is passed separately to new PDO().
*/
$dsn = "mysql:host=" . $databaseConfig["host"] .
       ";dbname=" . $databaseConfig["database"] .
       ";charset=" . $databaseConfig["charset"];

/*
  This array explains each configuration value for display.
*/
$configExplanation = [
    "host" => "The database server location. In XAMPP, this is usually localhost.",
    "database" => "The name of the database created in MySQL.",
    "username" => "The MySQL user account. In default XAMPP, this is usually root.",
    "password" => "The MySQL user password. In default XAMPP, this is usually empty.",
    "charset" => "The character set used by the connection. utf8mb4 is recommended."
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file explains database configuration values.
      PHP code examples in HTML comments should escape PHP tags:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH17 - Connection Config File</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH17 - Connection Config File</h1>

        <p>
            This file shows how database connection settings can be organized before creating a PDO connection.
        </p>

        <div class="box output">
            <h2>Database Configuration Values</h2>

            <table>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                    <th>Explanation</th>
                </tr>

                <?php foreach ($databaseConfig as $key => $value) { ?>
                    <tr>
                        <td><code><?= htmlspecialchars($key) ?></code></td>
                        <td>
                            <?php if ($key === "password" && $value === "") { ?>
                                <em>empty string</em>
                            <?php } else { ?>
                                <?= htmlspecialchars($value) ?>
                            <?php } ?>
                        </td>
                        <td><?= htmlspecialchars($configExplanation[$key]) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box info">
            <h2>Generated DSN</h2>

            <pre><?= htmlspecialchars($dsn) ?></pre>

            <p>
                The DSN tells PDO which database driver, host, database name, and character set to use.
            </p>
        </div>

        <div class="box warning">
            <h2>Security Reminder</h2>

            <p>
                In a real deployed system, database passwords should not be publicly exposed.
                This note uses simple local XAMPP values for learning only.
            </p>
        </div>

        <div class="box">
            <h2>Why Organize Config?</h2>

            <p>
                When the database name, username, or password changes, it is easier to update one configuration area
                instead of searching through many files.
            </p>
        </div>
    </div>

</body>
</html>
