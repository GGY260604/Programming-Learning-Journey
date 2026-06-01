<?php
/*
  FILE: 01 - Display Error Setting.php
  TOPIC: CH15 - Error Handling and Debugging

  GOAL:
  - Learn how to control PHP error reporting.
  - Learn the difference between development and production error display.
  - Learn why detailed errors should not be shown to normal users in real systems.

  IMPORTANT:
  - During learning and development, showing errors helps you debug faster.
  - In production, detailed errors should usually be hidden from users.
  - Error settings should normally be configured in php.ini or project config.
*/

/*
  These settings are useful while learning PHP.

  display_errors = 1
  - Show errors directly in the browser.

  error_reporting(E_ALL)
  - Report all common PHP errors, warnings, and notices.
*/
ini_set("display_errors", "1");
error_reporting(E_ALL);

$currentDisplayErrors = ini_get("display_errors");
$currentErrorReporting = error_reporting();

/*
  This is a safe demonstration.

  Instead of intentionally causing a PHP warning, we store examples in an array
  and display them as teaching notes.
*/
$errorSettings = [
    "display_errors" => $currentDisplayErrors,
    "error_reporting" => $currentErrorReporting,
    "recommended_development" => "display_errors = 1 and error_reporting(E_ALL)",
    "recommended_production" => "display_errors = 0 and log errors instead"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file teaches PHP error display settings.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH15 - Display Error Setting</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH15 - Display Error Setting</h1>

        <p>
            This example shows how PHP can be configured to display errors during development.
        </p>

        <div class="box warning">
            <h2>Development Setting</h2>
            <pre>ini_set("display_errors", "1");
error_reporting(E_ALL);</pre>

            <p>
                These lines tell PHP to show errors in the browser.
                This is useful when you are learning or developing a project.
            </p>
        </div>

        <div class="box output">
            <h2>Current Error Settings</h2>

            <table>
                <tr>
                    <th>Setting</th>
                    <th>Value</th>
                </tr>

                <?php foreach ($errorSettings as $setting => $value) { ?>
                    <tr>
                        <td><?= htmlspecialchars($setting) ?></td>
                        <td><?= htmlspecialchars((string) $value) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box error">
            <h2>Production Reminder</h2>

            <p>
                In a real online system, you should usually not display detailed PHP errors to users.
                Error details may reveal file paths, database information, or internal logic.
            </p>

            <pre>ini_set("display_errors", "0");</pre>
        </div>

        <div class="box">
            <h2>Why This Matters</h2>

            <p>
                When you later connect PHP to MySQL, errors may happen because of wrong database name,
                wrong password, failed SQL query, or missing table. Error settings help you find the problem
                during development.
            </p>
        </div>
    </div>

</body>
</html>
