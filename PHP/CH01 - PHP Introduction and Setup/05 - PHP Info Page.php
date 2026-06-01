<?php
/*
  FILE: 05 - PHP Info Page.php
  TOPIC: CH01 - PHP Introduction and Setup

  GOAL:
  - Learn how to check PHP configuration using phpinfo().
  - Learn why phpinfo() is useful during setup.
  - Learn why phpinfo() should not be exposed in a real public website.

  IMPORTANT:
  - phpinfo() displays detailed PHP server configuration.
  - It is useful for checking PHP version and enabled extensions.
  - In production, remove or protect this file.
*/


/*
  Change this variable to true if you want to display full phpinfo() output.

  For beginner notes, the default is false because phpinfo() output is very long.
  This page first explains what phpinfo() is before you enable it.
*/

$showFullPhpInfo = false;


/*
  PHP_VERSION is a built-in PHP constant.
  It stores the current PHP version.
*/

$currentPhpVersion = PHP_VERSION;


/*
  extension_loaded() checks whether a PHP extension is enabled.

  Later, when we learn MySQL database connection, PDO and pdo_mysql are important.
*/

$isPdoLoaded = extension_loaded("pdo") ? "Enabled" : "Not Enabled";
$isPdoMysqlLoaded = extension_loaded("pdo_mysql") ? "Enabled" : "Not Enabled";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      Safe example:
      &lt;?php phpinfo(); ?&gt;

      This is escaped inside the HTML comment.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH01 - PHP Info Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH01 - PHP Info Page</h1>

        <div class="box output">
            <h2>Basic PHP Environment Information</h2>

            <table>
                <tr>
                    <th>Item</th>
                    <th>Result</th>
                </tr>

                <tr>
                    <td>PHP Version</td>
                    <td><?php echo $currentPhpVersion; ?></td>
                </tr>

                <tr>
                    <td>PDO Extension</td>
                    <td><?php echo $isPdoLoaded; ?></td>
                </tr>

                <tr>
                    <td>PDO MySQL Extension</td>
                    <td><?php echo $isPdoMysqlLoaded; ?></td>
                </tr>
            </table>
        </div>

        <div class="box">
            <h2>What is phpinfo()?</h2>

            <p>
                <code>phpinfo()</code> is a built-in PHP function that displays
                detailed information about your PHP installation.
            </p>

            <p>
                It can show your PHP version, configuration file path, loaded extensions,
                server information, and environment settings.
            </p>

            <pre>&lt;?php
phpinfo();
?&gt;</pre>
        </div>

        <div class="box warning">
            <h2>Security Reminder</h2>

            <p>
                Do not keep a public <code>phpinfo()</code> page in a real website,
                because it exposes detailed server configuration.
            </p>

            <p>
                It is okay for local learning in XAMPP, but remove it before deployment.
            </p>
        </div>

        <?php if ($showFullPhpInfo === true) { ?>

            <div class="box">
                <h2>Full phpinfo() Output</h2>

                <?php
                    /*
                      This will display the full PHP configuration page.

                      To enable it, change:
                      $showFullPhpInfo = false;

                      to:
                      $showFullPhpInfo = true;
                    */

                    phpinfo();
                ?>
            </div>

        <?php } else { ?>

            <div class="box note">
                <h2>Full phpinfo() is Currently Hidden</h2>

                <p>
                    To display the full phpinfo page, open this file and change:
                </p>

                <pre>$showFullPhpInfo = false;</pre>

                <p>to:</p>

                <pre>$showFullPhpInfo = true;</pre>
            </div>

        <?php } ?>

    </div>

</body>
</html>
