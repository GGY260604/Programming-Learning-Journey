<?php
/*
  FILE: 04 - Default Parameter Value.php
  TOPIC: CH08 - Functions

  GOAL:
  - Learn how to set default parameter values.
  - Understand what happens when an argument is not provided.
  - Use default values to make functions easier to call.

  IMPORTANT:
  - A default parameter value is used when no argument is passed.
  - Default values are useful for optional settings.
*/


/*
  Function with a default parameter value.

  $role has a default value of "Student".
  If no role is given, PHP uses "Student" automatically.
  default parameter values must be defined at the end of the parameter list.
*/

function showProfile($name, $role = "Student") {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($name) . "</td>";
    echo "<td>" . htmlspecialchars($role) . "</td>";
    echo "</tr>";
}


/*
  Function with multiple default values.

  This is useful for repeated backend messages.
*/

function createStatusMessage($message = "No message provided.", $type = "info") {
    return "[" . strtoupper($type) . "] " . $message;
}

$messageOne = createStatusMessage("Record saved successfully.", "success");
$messageTwo = createStatusMessage("Please check your input.");
$messageThree = createStatusMessage("Database connection failed.", "error");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 04 - Default Parameter Value.php

      This file shows how default parameter values work in PHP.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH08 - Default Parameter Value</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">

        <h1>CH08 - Default Parameter Value</h1>

        <div class="box note">
            <h2>Concept</h2>

            <p>
                A default parameter value is used when the caller does not provide an argument.
                This helps us create flexible functions.
            </p>
        </div>

        <div class="box output">
            <h2>User Profiles</h2>

            <table>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                </tr>

                <?php
                    /*
                      The first function call does not provide the second argument.
                      Therefore, $role uses the default value "Student".
                    */

                    showProfile("Galen");
                    showProfile("Cleo", "Admin");
                    showProfile("Mika", "Staff");
                ?>
            </table>
        </div>

        <div class="box output">
            <h2>Status Messages</h2>

            <p><?php echo htmlspecialchars($messageOne); ?></p>
            <p><?php echo htmlspecialchars($messageTwo); ?></p>
            <p><?php echo htmlspecialchars($messageThree); ?></p>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>function showProfile($name, $role = "Student") {
    echo $name . " - " . $role;
}

showProfile("Galen");
showProfile("Cleo", "Admin");</pre>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="03 - Return Value.php">&lsaquo; Previous: 03 - Return Value.php</a>
            <a class="next" href="05 - Type Declaration.php">Next: 05 - Type Declaration.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
