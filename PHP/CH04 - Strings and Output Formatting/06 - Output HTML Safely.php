<?php
/*
  FILE: 06 - Output HTML Safely.php
  TOPIC: CH04 - Strings and Output Formatting

  GOAL:
  - Learn why output should be escaped before displaying in HTML.
  - Learn how htmlspecialchars() protects the page output.
  - Understand the basic idea of preventing XSS.

  IMPORTANT:
  Never trust user input.
  When displaying user input in HTML, use htmlspecialchars().
*/

/*
  Imagine this value comes from a form input.
  It contains HTML tags.
*/

$userInput = "<strong>Galen</strong> <script>alert('Hello');</script>";

/*
  Unsafe output:
  If displayed directly, the browser may treat the text as real HTML or JavaScript.
  This is dangerous when the value comes from users.
*/

$unsafeOutput = $userInput;

/*
  Safe output:
  htmlspecialchars() converts special HTML characters into safe entities.

  < becomes &lt;
  > becomes &gt;
  " becomes &quot;
  & becomes &amp;
*/

$safeOutput = htmlspecialchars($userInput, ENT_QUOTES, "UTF-8");

$examples = [
    ["type" => "Original input", "description" => "Raw value received by PHP", "result" => $userInput],
    ["type" => "Unsafe display", "description" => "Displayed directly without escaping", "result" => $unsafeOutput],
    ["type" => "Safe display", "description" => "Displayed using htmlspecialchars()", "result" => $safeOutput]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 06 - Output HTML Safely.php
      TOPIC: CH04 - Strings and Output Formatting

      Escaped PHP tag example:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH04 - Output HTML Safely</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>Output HTML Safely</h1>

            <p class="subtitle">
                When displaying user input in an HTML page, escape the output first.
            </p>

            <div class="box example-box">
                <h2>Example User Input</h2>

                <pre><?php echo htmlspecialchars($userInput); ?></pre>
            </div>

            <div class="box warning-box">
                <h2>Unsafe Output</h2>

                <p>
                    The value below is printed directly. In a real system, this can be dangerous.
                </p>

                <div class="output-line">
                    <?php echo $unsafeOutput; ?>
                </div>
            </div>

            <div class="box result-box">
                <h2>Safe Output</h2>

                <p>
                    The value below is printed using <code>htmlspecialchars()</code>.
                </p>

                <div class="output-line">
                    <?php echo $safeOutput; ?>
                </div>
            </div>

            <div class="box note-box">
                <h2>Important Notes</h2>

                <p>
                    <code>htmlspecialchars()</code> does not remove the text.
                    It converts special HTML characters into safe text that the browser will display instead of execute.
                </p>

                <p>
                    This is very important when displaying values from forms, databases, comments, profiles, and search boxes.
                </p>
            </div>

            <p class="footer-note">
                In backend PHP development, safe output is one of the most important habits to build early.
            </p>

        </div>
    </div>

</body>
</html>
