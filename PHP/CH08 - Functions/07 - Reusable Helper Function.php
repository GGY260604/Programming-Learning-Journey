<?php
/*
  FILE: 07 - Reusable Helper Function.php
  TOPIC: CH08 - Functions

  GOAL:
  - Learn how to create reusable helper functions.
  - Understand why helper functions are useful in backend projects.
  - Use helper functions to format output and protect HTML output.

  IMPORTANT:
  - Helper functions are small functions that solve repeated tasks.
  - Backend projects often use helper functions for escaping output, formatting dates, formatting prices, and checking data.
*/


/*
  Helper function: escape output.

  In backend development, user data should not be displayed directly.
  htmlspecialchars() helps prevent HTML injection and basic XSS issues.

  This helper function makes the code shorter when displaying output.
*/

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}


/*
  Helper function: format price.

  This is useful when displaying prices in an order system or product system.
*/

function formatPrice($price) {
    return "RM " . number_format((float) $price, 2);
}


/*
  Helper function: show status badge.

  This is useful when displaying record status from a database.
*/

function statusBadge($status) {
    $status = strtolower($status);

    if ($status === "active") {
        return "<span class='badge'>Active</span>";
    }

    if ($status === "pending") {
        return "<span class='badge'>Pending</span>";
    }

    return "<span class='badge'>Inactive</span>";
}


/*
  Sample data.

  Later in database chapters, data like this can come from MySQL.
*/

$students = [
    ["name" => "Galen", "course" => "Software Engineering", "fee" => 120.5, "status" => "active"],
    ["name" => "Cleo", "course" => "Data Science", "fee" => 99.9, "status" => "pending"],
    ["name" => "Mika", "course" => "Cyber Security", "fee" => 150, "status" => "inactive"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 07 - Reusable Helper Function.php

      This file shows how helper functions reduce repeated backend code.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH08 - Reusable Helper Function</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">

        <h1>CH08 - Reusable Helper Function</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                A helper function is a small reusable function.
                It helps us avoid repeating the same code many times.
            </p>

            <p>
                In real PHP projects, helper functions are often stored in a separate file
                and included using <code>include</code> or <code>require</code>.
            </p>
        </div>

        <div class="box output">
            <h2>Student Table Using Helper Functions</h2>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Fee</th>
                    <th>Status</th>
                </tr>

                <?php foreach ($students as $student) { ?>
                    <tr>
                        <td><?php echo e($student["name"]); ?></td>
                        <td><?php echo e($student["course"]); ?></td>
                        <td><?php echo formatPrice($student["fee"]); ?></td>
                        <td><?php echo statusBadge($student["status"]); ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box warning">
            <h2>Security Note</h2>

            <p>
                The <code>e()</code> helper function is important because it escapes output before displaying it in HTML.
                This is a good habit when displaying data from forms or databases.
            </p>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

function formatPrice($price) {
    return "RM " . number_format((float) $price, 2);
}</pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="06 - Variable Scope.php">&lsaquo; Previous: 06 - Variable Scope.php</a>
            <a class="next" href="../CH09 - Forms and User Input/01 - GET Form.php">Next: 01 - GET Form.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
