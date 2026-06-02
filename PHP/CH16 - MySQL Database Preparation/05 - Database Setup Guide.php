<?php
/*
  FILE: 05 - Database Setup Guide.php
  TOPIC: CH16 - MySQL Database Preparation

  GOAL:
  - Learn the correct order to prepare a MySQL database.
  - Learn what each SQL file in this chapter does.
  - Understand that database preparation should happen before PHP connects to MySQL.

  IMPORTANT:
  - This file does not connect to MySQL yet.
  - The next chapter will teach PDO MySQL connection.
  - This file is a guide page for running the SQL setup files.
*/

/*
  Store the SQL files in an array.

  Each item contains:
  - file name
  - purpose
  - whether the file exists in this folder
*/
$sqlFiles = [
    [
        "file" => "01 - Create Database.sql",
        "purpose" => "Create the php_note_db database and select it using USE."
    ],
    [
        "file" => "02 - Create Students Table.sql",
        "purpose" => "Create the students table with columns such as student_id, student_name, email, course, year_level, and created_at."
    ],
    [
        "file" => "03 - Insert Sample Students.sql",
        "purpose" => "Insert sample student records that will be used in later PDO examples."
    ],
    [
        "file" => "04 - Select Sample Data.sql",
        "purpose" => "Test SELECT queries to confirm that the sample data exists."
    ]
];

foreach ($sqlFiles as $index => $sqlFile) {
    $sqlFiles[$index]["exists"] = file_exists(__DIR__ . DIRECTORY_SEPARATOR . $sqlFile["file"]);
}

/*
  This array explains the main database information used in this chapter.
*/
$databaseInfo = [
    "Database name" => "php_note_db",
    "Main table" => "students",
    "Database system" => "MySQL / MariaDB",
    "Recommended local tool" => "XAMPP with phpMyAdmin",
    "Next PHP concept" => "PDO MySQL connection"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file explains database preparation before PHP connects to MySQL.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH16 - Database Setup Guide</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH16 - MySQL Database Preparation</h1>

        <p>
            This chapter prepares the database before PHP starts using PDO to connect to MySQL.
        </p>

        <div class="box warning">
            <h2>Important Idea</h2>

            <p>
                Before PHP can read or save data in MySQL, the database and table must already exist.
                That is why this chapter focuses on SQL setup first.
            </p>
        </div>

        <div class="box output">
            <h2>Database Information</h2>

            <table>
                <tr>
                    <th>Item</th>
                    <th>Value</th>
                </tr>

                <?php foreach ($databaseInfo as $item => $value) { ?>
                    <tr>
                        <td><?= htmlspecialchars($item) ?></td>
                        <td><?= htmlspecialchars($value) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box info">
            <h2>SQL Files in This Chapter</h2>

            <table>
                <tr>
                    <th>No.</th>
                    <th>SQL File</th>
                    <th>Purpose</th>
                    <th>Status</th>
                </tr>

                <?php foreach ($sqlFiles as $index => $sqlFile) { ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($sqlFile["file"]) ?></td>
                        <td><?= htmlspecialchars($sqlFile["purpose"]) ?></td>
                        <td>
                            <?php if ($sqlFile["exists"]) { ?>
                                <span class="status-present">File found</span>
                            <?php } else { ?>
                                <span class="status-missing">File missing</span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <h2>Suggested Running Order</h2>

            <ol class="file-list">
                <?php foreach ($sqlFiles as $sqlFile) { ?>
                    <li><?= htmlspecialchars($sqlFile["file"]) ?></li>
                <?php } ?>
            </ol>

            <p>
                The order is important because the table cannot be created before the database exists,
                and records cannot be inserted before the table exists.
            </p>
        </div>

        <div class="box">
            <h2>How to Run in phpMyAdmin</h2>

            <ol>
                <li>Start Apache and MySQL in XAMPP.</li>
                <li>Open <code>http://localhost/phpmyadmin</code> in your browser.</li>
                <li>Click the SQL tab.</li>
                <li>Copy the SQL from the first SQL file.</li>
                <li>Paste it into the SQL editor.</li>
                <li>Click Go.</li>
                <li>Repeat the same process for the next SQL files.</li>
            </ol>
        </div>

        <div class="box output">
            <h2>Example SQL Pattern</h2>

            <p>
                A database setup usually follows this pattern:
            </p>

            <pre>CREATE DATABASE database_name;
USE database_name;
CREATE TABLE table_name (...);
INSERT INTO table_name (...) VALUES (...);
SELECT * FROM table_name;</pre>
        </div>

        <div class="box success">
            <h2>After This Chapter</h2>

            <p>
                After the database is ready, the next chapter can use PHP PDO to connect to
                <code>php_note_db</code> and run SQL commands from PHP.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="../CH15 - Error Handling and Debugging/05 - Debug with var_dump.php">&lsaquo; Previous: 05 - Debug with var_dump.php</a>
            <a class="next" href="../CH17 - PDO MySQL Connection/01 - PDO Connection Test.php">Next: 01 - PDO Connection Test.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
