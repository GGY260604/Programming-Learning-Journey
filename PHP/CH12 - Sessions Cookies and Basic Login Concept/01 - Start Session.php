<?php
/*
  FILE: 01 - Start Session.php
  TOPIC: CH12 - Sessions Cookies and Basic Login Concept

  GOAL:
  - Learn how to start a session in PHP.
  - Understand why session_start() must be placed before HTML output.
  - See a session ID created by PHP.

  IMPORTANT:
  - A session allows PHP to remember data across multiple page requests.
  - Without session_start(), PHP cannot use $_SESSION properly.
  - session_start() should be placed before <!DOCTYPE html>.
*/

/*
  session_start() tells PHP:
  "Start a session for this visitor or continue the existing session."

  PHP will usually create a session ID and store it in a browser cookie.
*/
session_start();

/*
  session_id() returns the current session ID.

  The session ID is used by PHP to identify which session data belongs to
  which browser/user.
*/
$currentSessionId = session_id();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CH12 - Start Session</title>
</head>
<body>

    <div class="container">
        <h1>CH12 - Start Session</h1>

        <p>
            This file shows the most basic session setup in PHP.
        </p>

        <div class="box output">
            <h2>Session Result</h2>

            <p><strong>Current Session ID:</strong></p>
            <pre><?= htmlspecialchars($currentSessionId) ?></pre>

            <p class="small-note">
                The value may look random because PHP uses it to identify your session.
            </p>
        </div>

        <div class="box">
            <h2>Main Code</h2>

            <pre>session_start();</pre>

            <p>
                This line should appear before normal HTML output.
                In most projects, it is placed at the very top of the PHP file.
            </p>
        </div>

        <div class="box warning">
            <h2>Important Reminder</h2>

            <p>
                If you output HTML before calling <code>session_start()</code>, PHP may show
                a header-related warning because session information needs to be prepared
                before the page content is sent to the browser.
            </p>
        </div>
    </div>

</body>
</html>
