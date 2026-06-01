<?php
/*
  FILE: 03 - Null and Empty Values.php
  TOPIC: CH02 - Variables Data Types and Constants

  GOAL:
  - Understand null values.
  - Understand empty values.
  - Learn the difference between isset(), empty(), and is_null().

  HOW TO RUN:
  1. Start Apache in XAMPP.
  2. Place the PHP folder inside htdocs.
  3. Open this file using localhost.

  IMPORTANT:
  - null means no value.
  - empty string means text exists, but the text has no characters.
  - 0 and false can also be treated as empty by empty().
*/


/*
  Different kinds of values that beginners often confuse.
*/

$nullValue = null;
$emptyString = "";
$zeroInteger = 0;
$falseBoolean = false;
$normalText = "PHP";


/*
  This variable is intentionally not created:

  $notCreated

  We will use isset() to check whether it exists.
*/


/*
  Create an array of test cases.

  var_export() is used because it can show readable values such as:
  - NULL
  - ''
  - 0
  - false
*/

$values = [
    ["Name" => "\$nullValue", "Value" => $nullValue],
    ["Name" => "\$emptyString", "Value" => $emptyString],
    ["Name" => "\$zeroInteger", "Value" => $zeroInteger],
    ["Name" => "\$falseBoolean", "Value" => $falseBoolean],
    ["Name" => "\$normalText", "Value" => $normalText]
];

$chapter = "CH02 - Variables Data Types and Constants";
$fileName = "03 - Null and Empty Values.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      Escaped PHP code example:
      &lt;?php echo empty($value); ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH02 - Null and Empty Values</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1><?php echo $chapter; ?></h1>

        <div class="box note">
            <h2>Current File</h2>
            <p><?php echo $fileName; ?></p>
        </div>

        <div class="box output">
            <h2>Null and Empty Checking</h2>

            <table>
                <tr>
                    <th>Variable</th>
                    <th>Displayed Value</th>
                    <th>gettype()</th>
                    <th>isset()</th>
                    <th>empty()</th>
                    <th>is_null()</th>
                </tr>

                <?php foreach ($values as $item) { ?>
                    <tr>
                        <td><code><?php echo $item["Name"]; ?></code></td>
                        <td><code><?php echo htmlspecialchars(var_export($item["Value"], true)); ?></code></td>
                        <td><?php echo gettype($item["Value"]); ?></td>
                        <td><?php echo isset($item["Value"]) ? "true" : "false"; ?></td>
                        <td><?php echo empty($item["Value"]) ? "true" : "false"; ?></td>
                        <td><?php echo is_null($item["Value"]) ? "true" : "false"; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <h2>Checking a Variable That Does Not Exist</h2>

            <p>
                <code>isset($notCreated)</code> result:
                <strong><?php echo isset($notCreated) ? "true" : "false"; ?></strong>
            </p>

            <p>
                <code>empty($notCreated)</code> result:
                <strong><?php echo empty($notCreated) ? "true" : "false"; ?></strong>
            </p>

            <p>
                <code>isset()</code> is commonly used to check whether a form input exists
                before using it.
            </p>
        </div>

        <div class="box">
            <h2>Important Difference</h2>

            <ul>
                <li><code>isset($value)</code> checks whether the variable exists and is not null.</li>
                <li><code>empty($value)</code> checks whether the value is considered empty.</li>
                <li><code>is_null($value)</code> checks whether the value is exactly null.</li>
            </ul>
        </div>

        <div class="box warning">
            <h2>Backend Reminder</h2>

            <p>
                When handling form input, do not assume a value exists. Always check it first.
                This avoids warning messages and unexpected behavior.
            </p>
        </div>

    </div>

</body>
</html>
