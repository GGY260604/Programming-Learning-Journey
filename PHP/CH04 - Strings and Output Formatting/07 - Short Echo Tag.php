<?php
/*
  FILE: 07 - Short Echo Tag.php
  TOPIC: CH04 - Strings and Output Formatting

  GOAL:
  - Learn how to use the PHP short echo tag.
  - Understand that the short echo tag is mainly used inside HTML.
  - Learn that output from users should still be escaped before display.

  IMPORTANT:
  The short echo tag is a shorter way to output a value.
  It is commonly used when mixing PHP with HTML templates.

  To avoid accidentally closing or starting PHP inside comments,
  PHP tags are written in escaped form when shown as text.
*/

/*
  These variables will be displayed in the HTML page.
*/

$name = "Galen";
$course = "PHP Backend";
$chapter = "CH04 - Strings and Output Formatting";

/*
  These strings store the code patterns that we want to display.

  Notice:
  We use &lt; and &gt; instead of real PHP tag symbols.
  This prevents the PHP server from treating them as real PHP code.
*/

$normalEchoCode = '&lt;?php echo $name; ?&gt;';
$shortEchoCode = '&lt;?= $name ?&gt;';

/*
  Example of user-like input.
  In a real system, this may come from a form or database.
*/

$userInput = "<strong>Student</strong> <script>alert('test');</script>";

/*
  Safe output for user-like input.
  The short echo tag can output any value, but the value should be prepared safely first.
*/

$safeUserInput = htmlspecialchars($userInput, ENT_QUOTES, "UTF-8");

$examples = [
    [
        "description" => "Normal echo syntax",
        "code" => $normalEchoCode,
        "note" => "Longer syntax, but very clear for beginners."
    ],
    [
        "description" => "Short echo syntax",
        "code" => $shortEchoCode,
        "note" => "Shorter syntax, useful inside HTML."
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 07 - Short Echo Tag.php
      TOPIC: CH04 - Strings and Output Formatting

      If you want to show PHP tags inside an HTML comment, escape them like this:
      &lt;?php echo "Hello World"; ?&gt;
      &lt;?= "Hello World" ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH04 - Short Echo Tag</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>CH04 - Short Echo Tag</h1>

            <p class="subtitle">
                The short echo tag is a faster way to output PHP values inside HTML.
            </p>

            <div class="box example-box">
                <h2>Basic Idea</h2>

                <p>
                    The normal echo syntax is:
                </p>

                <pre><?php echo $normalEchoCode; ?></pre>

                <p>
                    The short echo syntax is:
                </p>

                <pre><?php echo $shortEchoCode; ?></pre>

                <p>
                    Both are used to display the value of <code>$name</code>.
                </p>
            </div>

            <div class="box result-box">
                <h2>Output Comparison</h2>

                <table>
                    <tr>
                        <th>Description</th>
                        <th>Code Pattern</th>
                        <th>Explanation</th>
                    </tr>

                    <?php foreach ($examples as $example) { ?>
                        <tr>
                            <td><?= $example["description"] ?></td>
                            <td><code><?= $example["code"] ?></code></td>
                            <td><?= $example["note"] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box result-box">
                <h2>Real Output</h2>

                <p>
                    Normal echo output:
                    <strong><?php echo $name; ?></strong>
                </p>

                <p>
                    Short echo output:
                    <strong><?= $name ?></strong>
                </p>

                <p>
                    Course:
                    <strong><?= $course ?></strong>
                </p>

                <p>
                    Chapter:
                    <strong><?= $chapter ?></strong>
                </p>
            </div>

            <div class="box warning-box">
                <h2>Important Security Reminder</h2>

                <p>
                    The short echo tag only makes output shorter.
                    It does not automatically make unsafe input safe.
                </p>

                <p>
                    Unsafe user-like input before escaping:
                </p>

                <pre><?= htmlspecialchars($userInput, ENT_QUOTES, "UTF-8") ?></pre>

                <p>
                    Safe displayed output using <code>htmlspecialchars()</code>:
                </p>

                <div class="output-line">
                    <?= $safeUserInput ?>
                </div>
            </div>

            <div class="box note-box">
                <h2>Important Notes</h2>

                <p>
                    The short echo tag is best used when the PHP code only needs to display one value.
                </p>

                <p>
                    For longer logic such as <code>if</code>, <code>foreach</code>, database queries,
                    and validation, use normal PHP blocks.
                </p>

                <p>
                    In later chapters, this syntax will be useful when displaying form values,
                    database records, table rows, and success messages.
                </p>
            </div>

            <p class="footer-note">
                Use short echo tags to keep HTML templates clean, but always remember to escape user input.
            </p>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="06 - Output HTML Safely.php">&lsaquo; Previous: 06 - Output HTML Safely.php</a>
                <a class="next" href="../CH05 - Conditional Statements/01 - If Statement.php">Next: 01 - If Statement.php &rsaquo;</a>
            </nav>


        </div>
    </div>

</body>
</html>
