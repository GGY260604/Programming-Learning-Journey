<?php
/*
  FILE: 01 - Prevent SQL Injection.php
  TOPIC: CH25 - Security Basics for Backend PHP

  GOAL:
  - Learn what SQL injection means.
  - Learn why building SQL using direct string concatenation is dangerous.
  - Learn why prepared statements with placeholders are safer.

  IMPORTANT:
  - This file does not need an actual database connection.
  - It demonstrates the difference between unsafe SQL text and safe prepared statement logic.
  - Later, in real database code, you should use PDO prepared statements.
*/

$submittedUsername = $_GET["username"] ?? "Galen";

/*
  This input is commonly used to demonstrate SQL injection.

  The attacker tries to change the meaning of the SQL query.
*/

$attackExample = "' OR '1'='1";

/*
  UNSAFE METHOD:

  The user input is directly inserted into the SQL string.

  If the user enters a malicious value, the final SQL command may be changed.
*/

$unsafeSql = "SELECT * FROM users WHERE username = '" . $submittedUsername . "'";

/*
  SAFE METHOD:

  Use a placeholder instead of joining the user input directly.

  The SQL structure and the user data are separated.
  This is the main reason prepared statements are safer.
*/

$safeSql = "SELECT * FROM users WHERE username = :username";

/*
  This is the kind of code you would use with PDO in a real database system.

  The code below is stored as text only for display.
*/

$pdoExample = <<<'CODE'
$sql = "SELECT * FROM users WHERE username = :username";

$statement = $pdo->prepare($sql);

$statement->execute([
    "username" => $submittedUsername
]);

$user = $statement->fetch();
CODE;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This chapter teaches security basics.
      Any PHP example inside an HTML comment should be escaped if written directly.
      Example: &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH25 - Prevent SQL Injection</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH25 - Prevent SQL Injection</h1>

        <p>
            SQL injection happens when user input is allowed to change the structure
            or meaning of an SQL command.
        </p>

        <div class="box">
            <h2>Try Different Input</h2>

            <form method="GET">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="<?= htmlspecialchars($submittedUsername) ?>"
                >

                <button type="submit">Generate SQL Example</button>
            </form>

            <p class="small">
                Try entering this value: <code><?= htmlspecialchars($attackExample) ?></code>
            </p>
        </div>

        <div class="box warning">
            <h2>Unsafe SQL Example</h2>

            <p>
                This SQL is unsafe because the user input is inserted directly into the query string.
            </p>

            <pre><?= htmlspecialchars($unsafeSql) ?></pre>
        </div>

        <div class="box success">
            <h2>Safe SQL Idea</h2>

            <p>
                This SQL is safer because it uses a placeholder.
                The user input is sent separately later.
            </p>

            <pre><?= htmlspecialchars($safeSql) ?></pre>
        </div>

        <div class="box output">
            <h2>PDO Prepared Statement Pattern</h2>

            <pre><?= htmlspecialchars($pdoExample) ?></pre>

            <p>
                In backend PHP, use <code>prepare()</code> and <code>execute()</code>
                when the SQL uses user input.
            </p>
        </div>

        <div class="box note">
            <h2>Main Lesson</h2>

            <p>
                Do not build SQL by directly joining user input into the SQL string.
                Use prepared statements instead.
            </p>
        </div>

    </div>

</body>
</html>
