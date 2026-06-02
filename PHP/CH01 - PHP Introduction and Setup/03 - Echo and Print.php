<?php
/*
  FILE: 03 - Echo and Print.php
  TOPIC: CH01 - PHP Introduction and Setup

  GOAL:
  - Learn how to display output using echo.
  - Learn how to display output using print.
  - Understand the basic difference between echo and print.

  IMPORTANT:
  - echo and print are both used to output content.
  - echo is more commonly used.
  - print returns 1, while echo does not return a value.
*/


$name = "Galen";
$language = "PHP";
$topic = "Echo and Print";


/*
  print returns a value of 1.
  This is rarely needed in beginner code, but it is good to know.
*/

$printResult = print "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      Safe example:
      &lt;?php echo "Hello"; ?&gt;
      &lt;?php print "Hello"; ?&gt;

      Raw PHP tags are not written directly inside this HTML comment.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH01 - Echo and Print</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">

        <h1>CH01 - Echo and Print</h1>

        <div class="box output">
            <h2>Output Using echo</h2>

            <?php
                /*
                  echo can output text, HTML tags, and variables.

                  In this example, echo prints an HTML paragraph.
                */

                echo "<p>Hello, my name is <strong>$name</strong>.</p>";
                echo "<p>I am learning <strong>$language</strong>.</p>";
            ?>
        </div>

        <div class="box output">
            <h2>Output Using print</h2>

            <?php
                /*
                  print is similar to echo.
                  It can also output text and HTML.
                */

                print "<p>This section is printed using <strong>print</strong>.</p>";
                print "<p>The current topic is <strong>$topic</strong>.</p>";
            ?>
        </div>

        <div class="box">
            <h2>Difference Between echo and print</h2>

            <table>
                <tr>
                    <th>Feature</th>
                    <th>echo</th>
                    <th>print</th>
                </tr>

                <tr>
                    <td>Main Use</td>
                    <td>Display output</td>
                    <td>Display output</td>
                </tr>

                <tr>
                    <td>Return Value</td>
                    <td>No return value</td>
                    <td>Returns 1</td>
                </tr>

                <tr>
                    <td>Common Usage</td>
                    <td>More common</td>
                    <td>Less common</td>
                </tr>
            </table>
        </div>

        <div class="box note">
            <h2>Learning Note</h2>

            <p>
                For most PHP tutorial files and backend pages, we will mainly use
                <code>echo</code> because it is simple and common.
            </p>

            <p>
                The return value of <code>print</code> in this file is:
                <strong><?php echo $printResult; ?></strong>
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="02 - PHP Inside HTML.php">&lsaquo; Previous: 02 - PHP Inside HTML.php</a>
            <a class="next" href="04 - PHP Comments.php">Next: 04 - PHP Comments.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
