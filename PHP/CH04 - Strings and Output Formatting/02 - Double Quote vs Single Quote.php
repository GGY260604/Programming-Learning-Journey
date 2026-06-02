<?php
/*
  FILE: 02 - Double Quote vs Single Quote.php
  TOPIC: CH04 - Strings and Output Formatting

  GOAL:
  - Learn the difference between double-quoted strings and single-quoted strings.
  - Learn how variable interpolation works.
  - Learn when to use each quote style.

  IMPORTANT:
  Double quotes can read variables inside the string.
  Single quotes usually display the text exactly as written.
*/

$name = "Galen";
$language = "PHP";

/*
  Double quotes:
  PHP will replace $name and $language with their actual values.
*/

$doubleQuoteExample = "Hello, $name. You are learning $language.";

/*
  Single quotes:
  PHP will not replace $name and $language.
  It displays them as normal text.
*/

$singleQuoteExample = 'Hello, $name. You are learning $language.';

/*
  Concatenation with single quotes:
  If you use single quotes but still want variable values,
  you can join the variables using the dot operator.
*/

$singleQuoteWithConcat = 'Hello, ' . $name . '. You are learning ' . $language . '.';

$examples = [
    ["type" => "Double quotes", "code" => '"Hello, $name. You are learning $language."', "result" => $doubleQuoteExample],
    ["type" => "Single quotes", "code" => "'Hello, \$name. You are learning \$language.'", "result" => $singleQuoteExample],
    ["type" => "Single quotes with concatenation", "code" => "'Hello, ' . \$name . '. You are learning ' . \$language", "result" => $singleQuoteWithConcat]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 02 - Double Quote vs Single Quote.php
      TOPIC: CH04 - Strings and Output Formatting

      Escaped PHP tag example:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH04 - Double Quote vs Single Quote</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>CH04 - Double Quote vs Single Quote</h1>

            <p class="subtitle">
                PHP treats variables differently depending on whether the string uses double quotes or single quotes.
            </p>

            <div class="box example-box">
                <h2>Original Values</h2>

                <p><code>$name</code> = <?php echo $name; ?></p>
                <p><code>$language</code> = <?php echo $language; ?></p>
            </div>

            <div class="box result-box">
                <h2>Output Comparison</h2>

                <table>
                    <tr>
                        <th>String Type</th>
                        <th>Code Pattern</th>
                        <th>Output</th>
                    </tr>

                    <?php foreach ($examples as $example) { ?>
                        <tr>
                            <td><?php echo $example["type"]; ?></td>
                            <td><code><?php echo htmlspecialchars($example["code"]); ?></code></td>
                            <td><?php echo $example["result"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box note-box">
                <h2>When Should You Use Them?</h2>

                <p>
                    Use <strong>double quotes</strong> when you want PHP to read variables directly inside the string.
                </p>

                <p>
                    Use <strong>single quotes</strong> when the text does not need variable interpolation.
                    Single quotes are often clearer for fixed text.
                </p>
            </div>

            <p class="footer-note">
                For beginner PHP code, both quote styles are okay. The important part is knowing how variables behave inside them.
            </p>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="01 - String Concatenation.php">&lsaquo; Previous: 01 - String Concatenation.php</a>
                <a class="next" href="03 - Common String Functions.php">Next: 03 - Common String Functions.php &rsaquo;</a>
            </nav>


        </div>
    </div>

</body>
</html>
