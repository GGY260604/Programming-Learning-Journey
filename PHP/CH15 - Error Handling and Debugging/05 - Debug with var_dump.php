<?php
/*
  FILE: 05 - Debug with var_dump.php
  TOPIC: CH15 - Error Handling and Debugging

  GOAL:
  - Learn how to inspect variables using var_dump().
  - Learn how to inspect arrays using print_r().
  - Learn how to check a variable type using gettype().

  IMPORTANT:
  - Debugging means checking what your variables actually contain.
  - var_dump() is very useful during development.
  - Debug output should usually be removed or hidden in production.
*/

$name = "Galen";
$age = 20;
$isStudent = true;
$price = 12.50;
$hobbies = ["Programming", "Reading", "Gaming"];
$student = [
    "name" => $name,
    "age" => $age,
    "is_student" => $isStudent,
    "hobbies" => $hobbies
];

/*
  var_dump() directly prints output.

  To store its output inside a variable, we use output buffering:

  ob_start()
  - Start capturing output.

  ob_get_clean()
  - Get the captured output and stop capturing.

  ob stands for "output buffering". It allows us to capture what would normally be printed to the screen and store it in a variable instead.
*/
ob_start();
var_dump($student);
$varDumpOutput = ob_get_clean();

ob_start();
print_r($student);
$printROutput = ob_get_clean();

$typeInformation = [
    "name" => gettype($name),
    "age" => gettype($age),
    "isStudent" => gettype($isStudent),
    "price" => gettype($price),
    "hobbies" => gettype($hobbies),
    "student" => gettype($student)
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file teaches var_dump, print_r, and gettype.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH15 - Debug with var_dump</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH15 - Debug with var_dump</h1>

        <p>
            This example shows common debugging functions used to inspect variables in PHP.
        </p>

        <div class="box output">
            <h2>Student Array</h2>

            <table>
                <tr>
                    <th>Key</th>
                    <th>Value</th>
                </tr>

                <?php foreach ($student as $key => $value) { ?>
                    <tr>
                        <td><?= htmlspecialchars($key) ?></td>
                        <td>
                            <?php if (is_array($value)) { ?>
                                <?= htmlspecialchars(implode(", ", $value)) ?>
                            <?php } elseif (is_bool($value)) { ?>
                                <?= $value ? "true" : "false" ?>
                            <?php } else { ?>
                                <?= htmlspecialchars((string) $value) ?>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <h2>var_dump()</h2>

            <p>
                <code>var_dump()</code> shows detailed information, including data type and value.
            </p>

            <pre><?= htmlspecialchars($varDumpOutput) ?></pre>
        </div>

        <div class="box">
            <h2>print_r()</h2>

            <p>
                <code>print_r()</code> is usually easier to read for arrays.
            </p>

            <pre><?= htmlspecialchars($printROutput) ?></pre>
        </div>

        <div class="box output">
            <h2>gettype()</h2>

            <table>
                <tr>
                    <th>Variable</th>
                    <th>Type</th>
                </tr>

                <?php foreach ($typeInformation as $variable => $type) { ?>
                    <tr>
                        <td><?= htmlspecialchars($variable) ?></td>
                        <td><?= htmlspecialchars($type) ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box warning">
            <h2>Production Reminder</h2>

            <p>
                Debug information may reveal sensitive data.
                Remove or hide <code>var_dump()</code> and <code>print_r()</code> before deploying a real system.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="04 - Custom Error Message.php">&lsaquo; Previous: 04 - Custom Error Message.php</a>
            <a class="next" href="../CH16 - MySQL Database Preparation/05 - Database Setup Guide.php">Next: 05 - Database Setup Guide.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
