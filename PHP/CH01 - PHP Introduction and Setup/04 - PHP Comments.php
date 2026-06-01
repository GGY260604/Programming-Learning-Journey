<?php
/*
  FILE: 04 - PHP Comments.php
  TOPIC: CH01 - PHP Introduction and Setup

  GOAL:
  - Learn the different types of PHP comments.
  - Learn when to use comments.
  - Learn why PHP tags should be escaped when shown inside HTML comments.

  IMPORTANT:
  - Comments are ignored by PHP.
  - Comments are useful for explaining code.
  - However, avoid placing raw PHP closing tags inside comments because it can confuse beginners
    and may accidentally affect the file structure.
*/


// This is a single-line comment in PHP.

# This is also a single-line comment in PHP.

/*
  This is a multi-line comment in PHP.

  Multi-line comments are useful when you want to explain:
  - the purpose of a file
  - the logic of a code block
  - important reminders
*/

$singleLineComment = "// This is a single-line PHP comment.";
$hashComment = "# This is also a single-line PHP comment.";
$multiLineComment = "/* This is a multi-line PHP comment. */";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      HTML comments are written like this.

      Safe PHP example inside HTML comment:
      &lt;?php echo "Hello World"; ?&gt;

      Do not write the raw PHP opening and closing tags directly in an HTML comment
      inside a .php file.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH01 - PHP Comments</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH01 - PHP Comments</h1>

        <div class="box output">
            <h2>Types of PHP Comments</h2>

            <table>
                <tr>
                    <th>Comment Type</th>
                    <th>Example</th>
                    <th>Common Use</th>
                </tr>

                <tr>
                    <td>Single-line comment</td>
                    <td><code><?php echo htmlspecialchars($singleLineComment); ?></code></td>
                    <td>Short explanation beside or above one line of code</td>
                </tr>

                <tr>
                    <td>Hash comment</td>
                    <td><code><?php echo htmlspecialchars($hashComment); ?></code></td>
                    <td>Also used for short explanation, but less common in PHP tutorials</td>
                </tr>

                <tr>
                    <td>Multi-line comment</td>
                    <td><code><?php echo htmlspecialchars($multiLineComment); ?></code></td>
                    <td>Longer explanation for a file or code block</td>
                </tr>
            </table>
        </div>

        <div class="box">
            <h2>Example in PHP Code</h2>

            <pre>&lt;?php

// This is a single-line comment.

# This is also a single-line comment.

/*
  This is a multi-line comment.
  It can take more than one line.
*/

echo "Hello World";

?&gt;</pre>
        </div>

        <div class="box warning">
            <h2>Important Warning</h2>

            <p>
                When showing PHP code inside an HTML comment, write the PHP tags
                using escaped symbols.
            </p>

            <p>Safe version:</p>

            <pre>&lt;!-- &amp;lt;?php echo "Hello World"; ?&amp;gt; --&gt;</pre>

            <p>
                This prevents the PHP server from reading the example as real PHP code.
            </p>
        </div>

    </div>

</body>
</html>
