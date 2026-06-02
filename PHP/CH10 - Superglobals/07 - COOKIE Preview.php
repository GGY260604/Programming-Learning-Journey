<?php
/*
  FILE: 07 - COOKIE Preview.php
  TOPIC: CH10 - Superglobals

  GOAL:
  - Learn what $_COOKIE is.
  - Learn how to create, read, and delete cookies.

  IMPORTANT:
  - Cookies are stored in the user's browser.
  - setcookie() must run before HTML output.
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? "";

    if ($action === "set") {
        $theme = $_POST["theme"] ?? "light";
        setcookie("preferred_theme", $theme, time() + 3600, "/"); // '/' means the cookie is available across the entire website. The cookie will expire in 1 hour (3600 seconds).
    }

    if ($action === "delete") {
        setcookie("preferred_theme", "", time() - 3600, "/");
    }

    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

$theme = $_COOKIE["preferred_theme"] ?? "";
$safeTheme = htmlspecialchars($theme);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- FILE: 07 - COOKIE Preview.php | Escaped example: &lt;?php echo $_COOKIE["preferred_theme"]; ?&gt; -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH10 - COOKIE Preview</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>
    <div class="container">
        <h1>CH10 - $_COOKIE Preview</h1>

        <div class="box">
            <h2>What is $_COOKIE?</h2>
            <p><code>$_COOKIE</code> is used to read cookie data sent by the browser. Cookies are small pieces of data stored in the user's browser.</p>
        </div>

        <div class="box">
            <h2>Set Cookie</h2>
            <form method="post" action="">
                <input type="hidden" name="action" value="set">
                <label for="theme">Preferred Theme:</label>
                <select id="theme" name="theme">
                    <option value="light" <?= $theme === "light" ? "selected" : "" ?>>Light</option>
                    <option value="dark" <?= $theme === "dark" ? "selected" : "" ?>>Dark</option>
                    <option value="blue" <?= $theme === "blue" ? "selected" : "" ?>>Blue</option>
                </select>
                <button type="submit">Save Cookie</button>
            </form>
        </div>

        <div class="box output">
            <h2>Current Cookie Value</h2>
            <p><strong>preferred_theme:</strong> <?= $safeTheme === "" ? "No cookie stored yet." : $safeTheme ?></p>
        </div>

        <div class="box">
            <h2>Delete Cookie</h2>
            <form method="post" action="">
                <input type="hidden" name="action" value="delete">
                <button type="submit">Delete Cookie</button>
            </form>
        </div>

        <div class="box warning">
            <h2>Important Reminder</h2>
            <p>Cookie values are stored in the browser, so users can modify them. Do not trust cookies blindly for sensitive backend decisions.</p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="06 - SESSION Preview.php">&lsaquo; Previous: 06 - SESSION Preview.php</a>
            <a class="next" href="../CH11 - Include Require and File Organization/01 - Include File.php">Next: 01 - Include File.php &rsaquo;</a>
        </nav>

    </div>
</body>
</html>
