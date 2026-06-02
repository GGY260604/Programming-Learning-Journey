<?php
/*
  FILE: 04 - SERVER.php
  TOPIC: CH10 - Superglobals

  GOAL:
  - Learn how to use $_SERVER.
  - Learn how PHP can read information about the current request.
*/

$serverInfo = [
    "REQUEST_METHOD" => $_SERVER["REQUEST_METHOD"] ?? "Not available",
    "PHP_SELF" => $_SERVER["PHP_SELF"] ?? "Not available",
    "SCRIPT_NAME" => $_SERVER["SCRIPT_NAME"] ?? "Not available",
    "SERVER_NAME" => $_SERVER["SERVER_NAME"] ?? "Not available",
    "SERVER_SOFTWARE" => $_SERVER["SERVER_SOFTWARE"] ?? "Not available",
    "REMOTE_ADDR" => $_SERVER["REMOTE_ADDR"] ?? "Not available",
    "HTTP_USER_AGENT" => $_SERVER["HTTP_USER_AGENT"] ?? "Not available"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- FILE: 04 - SERVER.php | Escaped example: &lt;?php echo $_SERVER["REQUEST_METHOD"]; ?&gt; -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH10 - SERVER</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>
    <div class="container">
        <h1>CH10 - $_SERVER</h1>

        <div class="box">
            <h2>What is $_SERVER?</h2>
            <p><code>$_SERVER</code> stores information about the server and the current HTTP request.</p>
        </div>

        <div class="box output">
            <h2>Selected $_SERVER Values</h2>
            <table>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                </tr>
                <?php foreach ($serverInfo as $key => $value) { ?>
                    <tr>
                        <td><code><?= htmlspecialchars($key) ?></code></td>
                        <td><?= htmlspecialchars($value) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box warning">
            <h2>Important Reminder</h2>
            <p>Some values inside <code>$_SERVER</code>, such as <code>HTTP_USER_AGENT</code>, come from the client request. Do not trust them blindly for security decisions.</p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="03 - POST.php">&lsaquo; Previous: 03 - POST.php</a>
            <a class="next" href="05 - FILES Preview.php">Next: 05 - FILES Preview.php &rsaquo;</a>
        </nav>

    </div>
</body>
</html>
