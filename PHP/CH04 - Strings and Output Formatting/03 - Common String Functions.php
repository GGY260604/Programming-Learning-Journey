<?php
/*
  FILE: 03 - Common String Functions.php
  TOPIC: CH04 - Strings and Output Formatting

  GOAL:
  - Learn common PHP string functions.
  - Learn how to get string length, change letter case, trim spaces, extract text, and replace text.

  IMPORTANT:
  PHP has many built-in functions.
  A function performs a task and may return a result.
*/

$text = "  Welcome to PHP Backend Learning  ";
$productCode = "ITEM-2026-ABC";
$message = "I like JavaScript. JavaScript is useful.";

/*
  strlen() counts the number of characters in a string.
  Spaces are counted too.
*/

$length = strlen($text);

/*
  trim() removes spaces from the beginning and end of a string.
*/

$trimmedText = trim($text);

/*
  strtoupper() converts text to uppercase.
  strtolower() converts text to lowercase.
*/

$upperText = strtoupper($trimmedText);
$lowerText = strtolower($trimmedText);

/*
  substr() extracts part of a string.
  The first position is 0.
*/

$shortCode = substr($productCode, 0, 4);

/*
  str_replace() replaces part of a string with another string.
*/

$updatedMessage = str_replace("JavaScript", "PHP", $message);

$examples = [
    ["function" => "strlen()", "purpose" => "Count characters", "result" => $length],
    ["function" => "trim()", "purpose" => "Remove spaces at beginning and end", "result" => $trimmedText],
    ["function" => "strtoupper()", "purpose" => "Convert to uppercase", "result" => $upperText],
    ["function" => "strtolower()", "purpose" => "Convert to lowercase", "result" => $lowerText],
    ["function" => "substr()", "purpose" => "Extract part of a string", "result" => $shortCode],
    ["function" => "str_replace()", "purpose" => "Replace text", "result" => $updatedMessage]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 03 - Common String Functions.php
      TOPIC: CH04 - Strings and Output Formatting

      Escaped PHP tag example:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH04 - Common String Functions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>Common String Functions</h1>

            <p class="subtitle">
                String functions help us process and clean text data.
            </p>

            <div class="box example-box">
                <h2>Original Values</h2>

                <p><code>$text</code> = <code><?php echo htmlspecialchars($text); ?></code></p>
                <p><code>$productCode</code> = <code><?php echo $productCode; ?></code></p>
                <p><code>$message</code> = <code><?php echo $message; ?></code></p>
            </div>

            <div class="box result-box">
                <h2>Function Results</h2>

                <table>
                    <tr>
                        <th>Function</th>
                        <th>Purpose</th>
                        <th>Result</th>
                    </tr>

                    <?php foreach ($examples as $example) { ?>
                        <tr>
                            <td><code><?php echo $example["function"]; ?></code></td>
                            <td><?php echo $example["purpose"]; ?></td>
                            <td><?php echo htmlspecialchars((string) $example["result"]); ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box note-box">
                <h2>Backend Usage</h2>

                <p>
                    In backend development, string functions are often used to clean user input,
                    format names, check text length, and prepare data before storing it in a database.
                </p>

                <p>
                    For example, <code>trim()</code> is commonly used before validating form input
                    because users may accidentally type extra spaces.
                </p>
            </div>

            <p class="footer-note">
                String functions are small tools, but they are very useful in form handling and database systems.
            </p>

        </div>
    </div>

</body>
</html>
