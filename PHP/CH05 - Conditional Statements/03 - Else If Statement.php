<?php
/*
  FILE: 03 - Else If Statement.php
  TOPIC: CH05 - Conditional Statements

  GOAL:
  - Learn how to use elseif for multiple conditions.
  - Learn that PHP checks conditions from top to bottom.
  - Understand why condition order matters.

  IMPORTANT:
  elseif is used when there are more than two possible outcomes.
*/

/*
  Example situation:
  Convert a numeric mark into a grade.
*/

$studentName = "Galen";
$mark = 84;
$grade = "";
$comment = "";

/*
  PHP checks the first condition.
  If it is true, PHP runs that block and skips the remaining elseif/else blocks.

  Because of this, the order should usually go from highest range to lowest range
  when checking grades or levels.
*/

if ($mark >= 80) {
    $grade = "A";
    $comment = "Excellent performance.";
} elseif ($mark >= 70) {
    $grade = "B";
    $comment = "Good performance.";
} elseif ($mark >= 60) {
    $grade = "C";
    $comment = "Satisfactory performance.";
} elseif ($mark >= 50) {
    $grade = "D";
    $comment = "Passed, but improvement is needed.";
} else {
    $grade = "F";
    $comment = "Failed. Please revise the topic again.";
}

$gradeRules = [
    ["condition" => "$mark >= 80", "grade" => "A"],
    ["condition" => "$mark >= 70", "grade" => "B"],
    ["condition" => "$mark >= 60", "grade" => "C"],
    ["condition" => "$mark >= 50", "grade" => "D"],
    ["condition" => "otherwise", "grade" => "F"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 03 - Else If Statement.php
      TOPIC: CH05 - Conditional Statements

      If you want to show PHP tags inside an HTML comment, escape them like this:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH05 - Else If Statement</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>CH05 - Else If Statement</h1>

            <p class="subtitle">
                <code>elseif</code> is used when PHP needs to check multiple possible conditions.
            </p>

            <div class="box example-box">
                <h2>Input Values</h2>

                <p><code>$studentName</code> = <?php echo $studentName; ?></p>
                <p><code>$mark</code> = <?php echo $mark; ?></p>
            </div>

            <div class="box result-box">
                <h2>Grade Result</h2>

                <p class="output-line">
                    <?php echo $studentName; ?> received grade <strong><?php echo $grade; ?></strong>.
                </p>

                <p class="output-line">
                    <?php echo $comment; ?>
                </p>
            </div>

            <div class="box note-box">
                <h2>Rules Checked</h2>

                <table>
                    <tr>
                        <th>Condition</th>
                        <th>Grade</th>
                    </tr>

                    <?php foreach ($gradeRules as $rule) { ?>
                        <tr>
                            <td><code><?php echo htmlspecialchars($rule["condition"]); ?></code></td>
                            <td><?php echo $rule["grade"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>

                <p>
                    PHP stops checking after it finds the first true condition.
                    Therefore, the order of <code>elseif</code> conditions is important.
                </p>
            </div>

            <p class="footer-note">
                Use <code>elseif</code> when your backend logic has multiple possible results.
            </p>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="02 - If Else Statement.php">&lsaquo; Previous: 02 - If Else Statement.php</a>
                <a class="next" href="04 - Nested If Statement.php">Next: 04 - Nested If Statement.php &rsaquo;</a>
            </nav>


        </div>
    </div>

</body>
</html>
