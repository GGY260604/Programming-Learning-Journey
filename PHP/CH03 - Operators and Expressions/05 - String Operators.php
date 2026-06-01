<?php
/*
  FILE: 05 - String Operators.php
  TOPIC: CH03 - Operators and Expressions

  GOAL:
  - Learn how to combine strings in PHP.
  - Learn how the concatenation operator works.

  OPERATORS COVERED:
  .   Concatenate / join strings
  .=  Concatenate and assign
*/

$firstName = "Galen";
$lastName = "Gui";
$course = "PHP Backend Tutorial";

/*
  The dot operator joins strings together.
*/

$fullName = $firstName . " " . $lastName;
$introduction = "My name is " . $fullName . ".";

/*
  The .= operator adds more text to the existing string.
*/

$message = "Welcome";
$message .= " to ";
$message .= $course;
$message .= ".";

/*
  This example builds a simple HTML list using string concatenation.
  Later, this idea is useful when generating dynamic HTML from database data.
*/

$item1 = "Variables";
$item2 = "Operators";
$item3 = "Forms";

$listHtml = "<ul>";
$listHtml .= "<li>" . $item1 . "</li>";
$listHtml .= "<li>" . $item2 . "</li>";
$listHtml .= "<li>" . $item3 . "</li>";
$listHtml .= "</ul>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 05 - String Operators.php
      TOPIC: CH03 - Operators and Expressions

      Escaped PHP tag example:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH03 - String Operators</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>String Operators</h1>

            <p class="subtitle">
                String operators are used to join text together.
            </p>

            <div class="box example-box">
                <h2>Original Values</h2>

                <div class="output-line"><code>$firstName</code> = <?php echo $firstName; ?></div>
                <div class="output-line"><code>$lastName</code> = <?php echo $lastName; ?></div>
                <div class="output-line"><code>$course</code> = <?php echo $course; ?></div>
            </div>

            <div class="box result-box">
                <h2>Output</h2>

                <p><strong>Full Name:</strong> <?php echo $fullName; ?></p>
                <p><strong>Introduction:</strong> <?php echo $introduction; ?></p>
                <p><strong>Message:</strong> <?php echo $message; ?></p>
            </div>

            <div class="box result-box">
                <h2>Generated HTML List</h2>

                <?php echo $listHtml; ?>
            </div>

            <div class="box note-box">
                <h2>Important Syntax</h2>

                <pre>$fullName = $firstName . " " . $lastName;</pre>

                <p>
                    The dot <code>.</code> joins strings.
                    The space <code>" "</code> is also a string.
                </p>

                <pre>$message .= " to PHP";</pre>

                <p>
                    The <code>.=</code> operator appends text to the current string.
                </p>
            </div>

            <div class="box warning-box">
                <h2>Security Preview</h2>

                <p>
                    When the text comes from a user, do not directly output it.
                    Later, we will use <code>htmlspecialchars()</code> to prevent XSS.
                </p>
            </div>

        </div>
    </div>

</body>
</html>
