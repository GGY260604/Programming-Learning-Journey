<?php
/*
  FILE: 04 - Create Cookie.php
  TOPIC: CH12 - Sessions Cookies and Basic Login Concept

  GOAL:
  - Learn how to create a cookie in PHP.
  - Understand the setcookie() function.
  - Understand why cookie creation must happen before HTML output.

  IMPORTANT:
  - Cookies are stored in the user's browser.
  - Cookies are sent back to the server on future requests.
  - Do not store sensitive information directly in cookies.
*/

$message = "No cookie action has been performed yet.";

/*
  When the user clicks the button, the URL contains ?create=1.
*/
if (isset($_GET["create"]) && $_GET["create"] === "1") {
    /*
      setcookie(name, value, expire, path)

      name:
      - The cookie name.

      value:
      - The cookie value.

      expire:
      - time() + 3600 means the cookie will expire after 1 hour.

      path:
      - "/" means the cookie is available across the whole localhost site.
    */
    setcookie("student_name", "Galen", time() + 3600, "/");

    $message = "Cookie creation command has been sent to the browser.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>CH12 - Create Cookie</title>
</head>
<body>

    <div class="container">
        <h1>CH12 - Create Cookie</h1>

        <p>
            This file shows how to create a cookie using <code>setcookie()</code>.
        </p>

        <div class="box output">
            <h2>Cookie Result</h2>

            <p><?= htmlspecialchars($message) ?></p>

            <a class="button" href="?create=1">Create Cookie</a>
            <a class="button secondary" href="05%20-%20Read%20Cookie.php">Go to Read Cookie Page</a>
        </div>

        <div class="box warning">
            <h2>Important Behavior</h2>

            <p>
                After creating a cookie, it may not appear in <code>$_COOKIE</code>
                immediately in the same request. Usually, you need to refresh the page
                or open another page because the browser sends the cookie back on the next request.
            </p>
        </div>

        <div class="box">
            <h2>Main Code</h2>

            <pre>setcookie("student_name", "Galen", time() + 3600, "/");</pre>
        </div>
    </div>

</body>
</html>
