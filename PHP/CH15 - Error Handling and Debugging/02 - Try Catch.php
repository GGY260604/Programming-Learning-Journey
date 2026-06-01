<?php
/*
  FILE: 02 - Try Catch.php
  TOPIC: CH15 - Error Handling and Debugging

  GOAL:
  - Learn how to use try-catch in PHP.
  - Learn how to handle code that may fail.
  - Learn how to prevent a page from crashing suddenly.

  IMPORTANT:
  - try contains code that may throw an exception.
  - catch handles the exception if it happens.
  - This pattern is very common in database connection and SQL execution.
*/

$message = "No calculation performed yet.";
$statusClass = "warning";
$result = null;

function divideNumbers(float $number, float $divider): float
{
    /*
      Division by zero is not allowed.

      Instead of allowing the program to continue wrongly, we throw an Exception.
    */
    if ($divider == 0) {
        throw new Exception("The divider cannot be zero.");
    }

    return $number / $divider;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $number = (float) ($_POST["number"] ?? 0);
    $divider = (float) ($_POST["divider"] ?? 0);

    try {
        /*
          This code may fail because the divider may be zero.
        */
        $result = divideNumbers($number, $divider);
        $message = "Calculation completed successfully.";
        $statusClass = "success";

    } catch (Exception $error) {
        /*
          This block runs only when an Exception is thrown.
        */
        $message = $error->getMessage();
        $statusClass = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file teaches try-catch.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH15 - Try Catch</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH15 - Try Catch</h1>

        <p>
            This example uses <code>try</code> and <code>catch</code> to handle a division error.
        </p>

        <form action="" method="post" class="box">
            <label for="number">Number:</label>
            <input type="number" step="any" id="number" name="number" value="<?= htmlspecialchars($_POST["number"] ?? "10") ?>">

            <label for="divider">Divider:</label>
            <input type="number" step="any" id="divider" name="divider" value="<?= htmlspecialchars($_POST["divider"] ?? "2") ?>">

            <button type="submit">Calculate</button>
        </form>

        <div class="box <?= htmlspecialchars($statusClass) ?>">
            <h2>Result</h2>
            <p><?= htmlspecialchars($message) ?></p>

            <?php if ($result !== null) { ?>
                <p><strong>Answer:</strong> <?= htmlspecialchars((string) $result) ?></p>
            <?php } ?>
        </div>

        <div class="box">
            <h2>Important Code</h2>

            <pre>try {
    $result = divideNumbers($number, $divider);
} catch (Exception $error) {
    $message = $error-&gt;getMessage();
}</pre>

            <p>
                The <code>try</code> block runs the risky code.
                The <code>catch</code> block handles the problem if an exception happens.
            </p>
        </div>

        <div class="box info">
            <h2>Database Preview</h2>

            <p>
                Later, when you use PDO to connect to MySQL, you will often use <code>try-catch</code>
                to handle connection errors and SQL errors.
            </p>
        </div>
    </div>

</body>
</html>
