<?php
/*
  FILE: 04 - Logical Operators.php
  TOPIC: CH03 - Operators and Expressions

  GOAL:
  - Learn how to combine multiple conditions.
  - Learn how logical operators are used in validation and access control.

  OPERATORS COVERED:
  &&   AND
  ||   OR
  !    NOT
*/

function showBoolean($value) {
    return $value ? "true" : "false";
}

/*
  Imagine these values come from a login system.
*/

$isLoggedIn = true;
$isAdmin = false;
$hasPaid = true;
$age = 20;

/*
  Logical operators are used to combine boolean expressions.
*/

$canViewDashboard = $isLoggedIn && $hasPaid;
$canAccessAdminPanel = $isLoggedIn && $isAdmin;
$canUseTrial = $isLoggedIn || $hasPaid;
$isGuest = !$isLoggedIn;
$isAdult = $age >= 18;
$canRegister = $isAdult && !$isAdmin;

$examples = [
    [
        "operator" => "&&",
        "name" => "AND",
        "expression" => "\$isLoggedIn && \$hasPaid",
        "result" => showBoolean($canViewDashboard),
        "meaning" => "true only when both conditions are true."
    ],
    [
        "operator" => "&&",
        "name" => "AND",
        "expression" => "\$isLoggedIn && \$isAdmin",
        "result" => showBoolean($canAccessAdminPanel),
        "meaning" => "false because the user is logged in but is not admin."
    ],
    [
        "operator" => "||",
        "name" => "OR",
        "expression" => "\$isLoggedIn || \$hasPaid",
        "result" => showBoolean($canUseTrial),
        "meaning" => "true when at least one condition is true."
    ],
    [
        "operator" => "!",
        "name" => "NOT",
        "expression" => "!\$isLoggedIn",
        "result" => showBoolean($isGuest),
        "meaning" => "reverses true to false, or false to true."
    ],
    [
        "operator" => "&& and !",
        "name" => "Combined condition",
        "expression" => "\$age >= 18 && !\$isAdmin",
        "result" => showBoolean($canRegister),
        "meaning" => "true because age is at least 18 and the user is not admin."
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 04 - Logical Operators.php
      TOPIC: CH03 - Operators and Expressions

      Escaped PHP tag example:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH03 - Logical Operators</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>Logical Operators</h1>

            <p class="subtitle">
                Logical operators are used to combine conditions, especially in login, validation, and permission checking.
            </p>

            <div class="box example-box">
                <h2>Values Used</h2>

                <div class="output-line"><code>$isLoggedIn</code> = <?php echo showBoolean($isLoggedIn); ?></div>
                <div class="output-line"><code>$isAdmin</code> = <?php echo showBoolean($isAdmin); ?></div>
                <div class="output-line"><code>$hasPaid</code> = <?php echo showBoolean($hasPaid); ?></div>
                <div class="output-line"><code>$age</code> = <?php echo $age; ?></div>
            </div>

            <div class="box result-box">
                <h2>Logical Results</h2>

                <table>
                    <tr>
                        <th>Operator</th>
                        <th>Name</th>
                        <th>Expression</th>
                        <th>Result</th>
                        <th>Meaning</th>
                    </tr>

                    <?php foreach ($examples as $example) { ?>
                        <tr>
                            <td><code><?php echo htmlspecialchars($example["operator"]); ?></code></td>
                            <td><?php echo $example["name"]; ?></td>
                            <td><code><?php echo htmlspecialchars($example["expression"]); ?></code></td>
                            <td><?php echo $example["result"]; ?></td>
                            <td><?php echo $example["meaning"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box note-box">
                <h2>Backend Use Case</h2>

                <p>
                    A protected page may check whether the user is logged in before allowing access:
                </p>

                <pre>if ($isLoggedIn && $hasPaid) {
    echo "Access allowed";
}</pre>

                <p>
                    This kind of condition will be very common when we learn sessions, login systems, and database validation.
                </p>
            </div>

        </div>
    </div>

</body>
</html>
