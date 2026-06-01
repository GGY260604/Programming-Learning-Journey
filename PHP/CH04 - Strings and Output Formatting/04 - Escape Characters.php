<?php
/*
  FILE: 04 - Escape Characters.php
  TOPIC: CH04 - Strings and Output Formatting

  GOAL:
  - Learn what escape characters are.
  - Learn how to write quotation marks inside strings.
  - Learn the difference between text new lines and HTML line breaks.

  IMPORTANT:
  Escape characters begin with a backslash.
  They tell PHP to treat the next character in a special way.
*/

/*
  Use \" to include double quotation marks inside a double-quoted string.
*/

$quoteExample = "She said, \"PHP is useful for backend development.\"";

/*
  Use \\ to include a real backslash in a string.
*/

$pathExample = "C:\\xampp\\htdocs\\PHP";

/*
  \n creates a new line in plain text.
  However, HTML does not show \n as a visible line break by default.
*/

$newLineText = "Line 1\nLine 2\nLine 3";

/*
  nl2br() converts text new lines into HTML <br> elements.
  This makes the new lines visible in the browser.
*/

$newLineHtml = nl2br($newLineText);

/*
  \t creates a tab in plain text.
  In HTML, multiple spaces and tabs are usually collapsed.
*/

$tabText = "Name:\tGalen";

$examples = [
    ["escape" => '\\"', "meaning" => "Double quote inside string", "result" => $quoteExample],
    ["escape" => '\\\\', "meaning" => "Backslash inside string", "result" => $pathExample],
    ["escape" => '\\n', "meaning" => "New line in plain text", "result" => $newLineText],
    ["escape" => '\\t', "meaning" => "Tab in plain text", "result" => $tabText]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 04 - Escape Characters.php
      TOPIC: CH04 - Strings and Output Formatting

      Escaped PHP tag example:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH04 - Escape Characters</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>Escape Characters</h1>

            <p class="subtitle">
                Escape characters allow special characters to be written inside strings.
            </p>

            <div class="box result-box">
                <h2>Escape Character Examples</h2>

                <table>
                    <tr>
                        <th>Escape Character</th>
                        <th>Meaning</th>
                        <th>Result</th>
                    </tr>

                    <?php foreach ($examples as $example) { ?>
                        <tr>
                            <td><code><?php echo htmlspecialchars($example["escape"]); ?></code></td>
                            <td><?php echo $example["meaning"]; ?></td>
                            <td><pre><?php echo htmlspecialchars($example["result"]); ?></pre></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box example-box">
                <h2>Showing New Lines in Browser</h2>

                <p>
                    Original text with <code>\n</code>:
                </p>

                <pre><?php echo htmlspecialchars($newLineText); ?></pre>

                <p>
                    After using <code>nl2br()</code>:
                </p>

                <div class="output-line">
                    <?php echo $newLineHtml; ?>
                </div>
            </div>

            <div class="box note-box">
                <h2>Important Notes</h2>

                <p>
                    <code>\n</code> creates a new line in the text data,
                    but HTML needs <code>&lt;br&gt;</code> or block elements to show visible line breaks.
                </p>

                <p>
                    That is why <code>nl2br()</code> is useful when displaying textarea content from a form.
                </p>
            </div>

            <p class="footer-note">
                Escape characters are useful when storing paths, messages, quotes, and textarea input.
            </p>

        </div>
    </div>

</body>
</html>
