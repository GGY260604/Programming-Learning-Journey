<?php
/*
  FILE: 02 - If Else Statement.php
  TOPIC: CH05 - Conditional Statements

  GOAL:
  - Learn how to use if else.
  - Learn how PHP chooses between two branches.
  - Understand how if else is useful for backend validation.

  IMPORTANT:
  if else is used when there are two possible results:
  - one result when the condition is true
  - another result when the condition is false
*/

/*
  Example situation:
  A login form checks whether the entered password is correct.
*/

$correctPassword = "php123";
$enteredPassword = "php123";

/*
  This variable will store the final login message.
*/

$loginMessage = "";
$loginStatus = "";

/*
  The if block runs when the password matches.
  The else block runs when the password does not match.
*/

if ($enteredPassword === $correctPassword) {
    $loginStatus = "success";
    $loginMessage = "Login successful. Welcome back.";
} else {
    $loginStatus = "failed";
    $loginMessage = "Login failed. Incorrect password.";
}

/*
  === means strict comparison.
  It checks both value and data type.
*/

$conditionText = '$enteredPassword === $correctPassword';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 02 - If Else Statement.php
      TOPIC: CH05 - Conditional Statements

      If you want to show PHP tags inside an HTML comment, escape them like this:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH05 - If Else Statement</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>If Else Statement</h1>

            <p class="subtitle">
                An <code>if else</code> statement lets PHP choose one of two possible paths.
            </p>

            <div class="box example-box">
                <h2>Input Values</h2>

                <p><code>$correctPassword</code> = <?php echo $correctPassword; ?></p>
                <p><code>$enteredPassword</code> = <?php echo $enteredPassword; ?></p>
            </div>

            <div class="box <?php echo $loginStatus === "success" ? "result-box" : "warning-box"; ?>">
                <h2>Login Result</h2>

                <p>
                    Condition checked:
                    <code><?php echo htmlspecialchars($conditionText); ?></code>
                </p>

                <p><span class="badge">Status: <?php echo ucfirst($loginStatus); ?></span></p>

                <p class="output-line">
                    <?php echo $loginMessage; ?>
                </p>
            </div>

            <div class="box note-box">
                <h2>Code Pattern</h2>

                <pre>if ($enteredPassword === $correctPassword) {
    echo "Login successful.";
} else {
    echo "Login failed.";
}</pre>

                <p>
                    This pattern is very common in backend systems.
                    For example, the server checks user input first, then decides whether
                    to continue the process or show an error message.
                </p>
            </div>

            <p class="footer-note">
                Use <code>if else</code> when your logic has exactly two main possibilities.
            </p>

        </div>
    </div>

</body>
</html>
