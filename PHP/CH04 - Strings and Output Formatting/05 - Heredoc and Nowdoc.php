<?php
/*
  FILE: 05 - Heredoc and Nowdoc.php
  TOPIC: CH04 - Strings and Output Formatting

  GOAL:
  - Learn how to write multiline strings using heredoc.
  - Learn how to write multiline strings using nowdoc.
  - Understand the difference between heredoc and nowdoc.

  IMPORTANT:
  Heredoc behaves like a double-quoted string.
  Nowdoc behaves like a single-quoted string.
*/

$name = "Galen";
$course = "PHP Backend";

/*
  Heredoc syntax:
  <<<LABEL
  text here
  LABEL;

  Heredoc can read variable values inside the text.
*/

$heredocText = <<<MESSAGE
Hello $name,

Welcome to the $course note.
This text is written using heredoc syntax.
Variables can be displayed directly here.
MESSAGE;

/*
  Nowdoc syntax:
  <<<'LABEL'
  text here
  LABEL;

  Nowdoc does not read variable values inside the text.
  It displays them as normal text.
*/

$nowdocText = <<<'MESSAGE'
Hello $name,

Welcome to the $course note.
This text is written using nowdoc syntax.
Variables are not displayed directly here.
MESSAGE;

$examples = [
    ["type" => "Heredoc", "behavior" => "Works like double quotes", "result" => $heredocText],
    ["type" => "Nowdoc", "behavior" => "Works like single quotes", "result" => $nowdocText]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 05 - Heredoc and Nowdoc.php
      TOPIC: CH04 - Strings and Output Formatting

      Escaped PHP tag example:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH04 - Heredoc and Nowdoc</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>Heredoc and Nowdoc</h1>

            <p class="subtitle">
                Heredoc and nowdoc are useful when you want to store long multiline text.
            </p>

            <div class="box example-box">
                <h2>Original Values</h2>

                <p><code>$name</code> = <?php echo $name; ?></p>
                <p><code>$course</code> = <?php echo $course; ?></p>
            </div>

            <div class="box result-box">
                <h2>Comparison</h2>

                <table>
                    <tr>
                        <th>Type</th>
                        <th>Behavior</th>
                        <th>Output</th>
                    </tr>

                    <?php foreach ($examples as $example) { ?>
                        <tr>
                            <td><?php echo $example["type"]; ?></td>
                            <td><?php echo $example["behavior"]; ?></td>
                            <td><pre><?php echo htmlspecialchars($example["result"]); ?></pre></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box note-box">
                <h2>Important Notes</h2>

                <p>
                    Heredoc is useful when you want variables to be inserted into a long text.
                </p>

                <p>
                    Nowdoc is useful when you want the text to stay exactly as written.
                </p>

                <p>
                    In backend systems, multiline strings can be useful for email templates,
                    long messages, and sample SQL text.
                </p>
            </div>

            <p class="footer-note">
                Heredoc and nowdoc are not always needed, but they make long strings easier to read.
            </p>

        </div>
    </div>

</body>
</html>
