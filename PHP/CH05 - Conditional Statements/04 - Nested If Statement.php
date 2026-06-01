<?php
/*
  FILE: 04 - Nested If Statement.php
  TOPIC: CH05 - Conditional Statements

  GOAL:
  - Learn how to place one if statement inside another if statement.
  - Understand nested conditions in backend validation.
  - Learn how multiple requirements can be checked step by step.

  IMPORTANT:
  Nested if means an if statement is written inside another if statement.
  It is useful when the second condition should only be checked after the first condition is true.
*/

/*
  Example situation:
  A user can access the admin dashboard only if:
  1. The user is logged in.
  2. The user role is admin.
*/

$username = "Galen";
$isLoggedIn = true;
$userRole = "admin";

$accessStatus = "";
$accessMessage = "";

/*
  First, check whether the user is logged in.
  If the user is not logged in, there is no need to check the role.
*/

if ($isLoggedIn) {

    /*
      This inner if statement only runs when $isLoggedIn is true.
    */

    if ($userRole === "admin") {
        $accessStatus = "allowed";
        $accessMessage = "Access granted. You can open the admin dashboard.";
    } else {
        $accessStatus = "denied";
        $accessMessage = "Access denied. You are logged in, but you are not an admin.";
    }

} else {
    $accessStatus = "denied";
    $accessMessage = "Access denied. Please login first.";
}

$steps = [
    ["step" => "Step 1", "condition" => '$isLoggedIn', "meaning" => "Check whether the user has logged in."],
    ["step" => "Step 2", "condition" => '$userRole === "admin"', "meaning" => "Check whether the logged-in user is an admin."]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 04 - Nested If Statement.php
      TOPIC: CH05 - Conditional Statements

      If you want to show PHP tags inside an HTML comment, escape them like this:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH05 - Nested If Statement</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>Nested If Statement</h1>

            <p class="subtitle">
                Nested <code>if</code> statements check conditions step by step.
            </p>

            <div class="box example-box">
                <h2>User Data</h2>

                <p><code>$username</code> = <?php echo $username; ?></p>
                <p><code>$isLoggedIn</code> = <?php echo $isLoggedIn ? "true" : "false"; ?></p>
                <p><code>$userRole</code> = <?php echo $userRole; ?></p>
            </div>

            <div class="box <?php echo $accessStatus === "allowed" ? "result-box" : "warning-box"; ?>">
                <h2>Access Result</h2>

                <p><span class="badge">Access: <?php echo ucfirst($accessStatus); ?></span></p>

                <p class="output-line">
                    <?php echo $accessMessage; ?>
                </p>
            </div>

            <div class="box note-box">
                <h2>Checking Steps</h2>

                <table>
                    <tr>
                        <th>Step</th>
                        <th>Condition</th>
                        <th>Meaning</th>
                    </tr>

                    <?php foreach ($steps as $item) { ?>
                        <tr>
                            <td><?php echo $item["step"]; ?></td>
                            <td><code><?php echo htmlspecialchars($item["condition"]); ?></code></td>
                            <td><?php echo $item["meaning"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>

                <p>
                    Nested conditions are common in authentication, permission checking,
                    form validation, and database operation control.
                </p>
            </div>

            <p class="footer-note">
                Use nested <code>if</code> carefully. Too many levels can make code hard to read.
            </p>

        </div>
    </div>

</body>
</html>
