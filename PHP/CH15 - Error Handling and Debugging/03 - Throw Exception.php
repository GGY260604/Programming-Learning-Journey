<?php
/*
  FILE: 03 - Throw Exception.php
  TOPIC: CH15 - Error Handling and Debugging

  GOAL:
  - Learn how to manually throw an exception.
  - Learn why throwing an exception is useful for invalid data.
  - Learn how validation logic can stop wrong processing early.

  IMPORTANT:
  - throw creates an exception.
  - The exception can be caught by catch.
  - This is useful when the program detects an invalid situation.
*/

$message = "Submit the form to validate the age.";
$statusClass = "warning";
$validAge = null;

function validateAge(int $age): int
{
    /*
      This function accepts only age from 1 to 120.

      If the value is invalid, it throws an Exception.
    */
    if ($age < 1) {
        throw new Exception("Age must be at least 1.");
    }

    if ($age > 120) {
        throw new Exception("Age cannot be greater than 120.");
    }

    return $age;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $age = (int) ($_POST["age"] ?? 0);

    try {
        $validAge = validateAge($age);
        $message = "The age is valid.";
        $statusClass = "success";

    } catch (Exception $error) {
        $message = $error->getMessage();
        $statusClass = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file teaches throw Exception.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH15 - Throw Exception</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH15 - Throw Exception</h1>

        <p>
            This example manually throws an exception when the age is outside the accepted range.
        </p>

        <form action="" method="post" class="box">
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?= htmlspecialchars($_POST["age"] ?? "18") ?>">

            <button type="submit">Validate Age</button>
        </form>

        <div class="box <?= htmlspecialchars($statusClass) ?>">
            <h2>Validation Result</h2>
            <p><?= htmlspecialchars($message) ?></p>

            <?php if ($validAge !== null) { ?>
                <p><strong>Accepted Age:</strong> <?= htmlspecialchars((string) $validAge) ?></p>
            <?php } ?>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>if ($age &lt; 1) {
    throw new Exception("Age must be at least 1.");
}</pre>

            <p>
                <code>throw</code> is used when your program detects that something is wrong
                and should not continue normally.
            </p>
        </div>

        <div class="box info">
            <h2>When to Use This</h2>

            <p>
                You can throw exceptions when required data is missing, a number is invalid,
                a file cannot be found, or a database operation fails.
            </p>
        </div>
    </div>

</body>
</html>
