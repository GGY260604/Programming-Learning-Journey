<?php
/*
  FILE: 07 - Logout.php
  TOPIC: CH24 - Logout

  GOAL:
  - Remove login session data.
  - Destroy the current session.
  - Redirect the user back to the login form.

  IMPORTANT:
  - Logging out is not just showing a message.
  - We must remove the stored session data.
*/

session_start();

/*
  Clear all session variables.

  After this line, $_SESSION becomes an empty array.
*/
$_SESSION = [];

/*
  If the session uses a cookie, delete the session cookie also.

  This helps remove the session ID from the browser.
*/
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        "",
        time() - 3600,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

/*
  Destroy the session data stored on the server.
*/
session_destroy();

header("Location: 04 - Login Form.php?message=You have logged out successfully");
exit;
?>
