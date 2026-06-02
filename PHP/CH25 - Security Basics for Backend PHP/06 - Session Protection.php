<?php
/*
  FILE: 06 - Session Protection.php
  TOPIC: CH25 - Security Basics for Backend PHP

  GOAL:
  - Learn basic safer habits when using PHP sessions.
  - Learn why protected pages should check session values.
  - Learn why session_regenerate_id() is useful after login.

  IMPORTANT:
  - session_start() must run before HTML output.
  - A session can store login status on the server side.
*/

/*
  session_set_cookie_params() configures the session cookie.

  httponly:
  - Helps prevent JavaScript from reading the session cookie.

  samesite:
  - Helps reduce some cross-site request risks.

  secure:
  - Should be true when the website uses HTTPS.
  - In local XAMPP without HTTPS, we keep it false for learning.
*/

session_set_cookie_params([
    "httponly" => true,
    "samesite" => "Lax",
    "secure" => false
]);

session_start();

$message = "";

/*
  This is only a simple learning demo.
  A real system should verify username and password from database.
*/

$correctUsername = "admin";
$correctPassword = "12345";

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";
$action = $_POST["action"] ?? "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && $action === "login") {
    if ($username === $correctUsername && $password === $correctPassword) {
        /*
          session_regenerate_id(true) creates a new session ID.

          This is useful after login because it helps reduce session fixation risk.
        */

        session_regenerate_id(true);

        $_SESSION["is_logged_in"] = true;
        $_SESSION["username"] = $username;

        $message = "Login successful. Session ID has been regenerated.";
    } else {
        $message = "Invalid username or password.";
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && $action === "logout") {
    /*
      Clear session data from the $_SESSION array.
    */

    $_SESSION = [];

    /*
      Destroy the session data on the server.
    */

    session_destroy();

    $message = "You have logged out.";
}

$isLoggedIn = $_SESSION["is_logged_in"] ?? false;
$currentUsername = $_SESSION["username"] ?? "Guest";
$currentSessionId = session_id();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH25 - Session Protection</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH25 - Session Protection</h1>

        <p>
            Sessions are commonly used to remember that a user has logged in.
        </p>

        <?php if ($message !== "") { ?>
            <div class="box output">
                <h2>Message</h2>
                <p><?= htmlspecialchars($message) ?></p>
            </div>
        <?php } ?>

        <div class="box">
            <h2>Login Demo</h2>

            <p class="small">
                Demo username: <code>admin</code>, demo password: <code>12345</code>
            </p>

            <form method="POST">
                <input type="hidden" name="action" value="login">

                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?= htmlspecialchars($username) ?>">

                <label for="password">Password</label>
                <input type="password" id="password" name="password">

                <button type="submit">Login</button>
            </form>

            <form method="POST">
                <input type="hidden" name="action" value="logout">
                <button type="submit">Logout</button>
            </form>
        </div>

        <div class="box <?= $isLoggedIn ? 'success' : 'warning' ?>">
            <h2>Protected Page Status</h2>

            <?php if ($isLoggedIn) { ?>
                <p>You are logged in as <strong><?= htmlspecialchars($currentUsername) ?></strong>.</p>
                <p>This means protected page content can be displayed.</p>
            <?php } else { ?>
                <p>You are not logged in.</p>
                <p>Protected page content should not be displayed.</p>
            <?php } ?>
        </div>

        <div class="box output">
            <h2>Current Session Information</h2>

            <table>
                <tr>
                    <th>Item</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Session ID</td>
                    <td><code><?= htmlspecialchars($currentSessionId) ?></code></td>
                </tr>
                <tr>
                    <td>Login Status</td>
                    <td><?= $isLoggedIn ? "Logged in" : "Not logged in" ?></td>
                </tr>
            </table>
        </div>

        <div class="box note">
            <h2>Common Session Protection Habits</h2>

            <ul>
                <li>Call <code>session_start()</code> before output.</li>
                <li>Use <code>session_regenerate_id(true)</code> after successful login.</li>
                <li>Check session values before showing protected content.</li>
                <li>Use <code>httponly</code> cookies for sessions.</li>
                <li>Destroy session data during logout.</li>
            </ul>
        </div>

    </div>

</body>
</html>
