<?php
/*
  FILE: 03 - Comparison Operators.php
  TOPIC: CH03 - Operators and Expressions

  GOAL:
  - Learn how to compare values in PHP.
  - Learn the difference between == and ===.
  - Learn why strict comparison is usually safer.

  OPERATORS COVERED:
  ==   Equal value
  ===  Identical value and type
  !=   Not equal
  <>   Not equal
  !==  Not identical
  >    Greater than
  <    Less than
  >=   Greater than or equal
  <=   Less than or equal
  <=>  Spaceship operator
*/

/*
  This helper function converts a boolean result into readable text.

  Without this function:
  - true may display as 1
  - false may display as an empty string
*/

function showBoolean($value) {
    return $value ? "true" : "false";
}

$number = 18;
$textNumber = "18";
$minimumAge = 21;

/*
  Comparison operators usually return boolean values:
  - true
  - false
*/

$comparisons = [
    [
        "operator" => "==",
        "meaning" => "Equal value",
        "expression" => "18 == \"18\"",
        "result" => showBoolean($number == $textNumber),
        "note" => "true because PHP converts the string to a number before comparing."
    ],
    [
        "operator" => "===",
        "meaning" => "Identical value and type",
        "expression" => "18 === \"18\"",
        "result" => showBoolean($number === $textNumber),
        "note" => "false because one value is integer and one value is string."
    ],
    [
        "operator" => "!=",
        "meaning" => "Not equal value",
        "expression" => "18 != 21",
        "result" => showBoolean($number != $minimumAge),
        "note" => "true because 18 is not equal to 21."
    ],
    [
        "operator" => "<>",
        "meaning" => "Not equal value",
        "expression" => "18 <> 21",
        "result" => showBoolean($number <> $minimumAge),
        "note" => "true because 18 is not equal to 21."
    ],
    [
        "operator" => "!==",
        "meaning" => "Not identical value or type",
        "expression" => "18 !== \"18\"",
        "result" => showBoolean($number !== $textNumber),
        "note" => "true because the data types are different."
    ],
    [
        "operator" => ">",
        "meaning" => "Greater than",
        "expression" => "18 > 21",
        "result" => showBoolean($number > $minimumAge),
        "note" => "false because 18 is not greater than 21."
    ],
    [
        "operator" => "<",
        "meaning" => "Less than",
        "expression" => "18 < 21",
        "result" => showBoolean($number < $minimumAge),
        "note" => "true because 18 is less than 21."
    ],
    [
        "operator" => "<=>",
        "meaning" => "Spaceship comparison",
        "expression" => "18 <=> 21",
        "result" => $number <=> $minimumAge,
        "note" => "returns -1 because the left value is smaller than the right value, and returns 0 if they are equal, and returns 1 if the left value is greater than the right value."
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 03 - Comparison Operators.php
      TOPIC: CH03 - Operators and Expressions

      Escaped PHP tag example:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH03 - Comparison Operators</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <div class="page-card">

            <h1>CH03 - Comparison Operators</h1>

            <p class="subtitle">
                Comparison operators compare values and usually return <code>true</code> or <code>false</code>.
            </p>

            <div class="box example-box">
                <h2>Values Used</h2>

                <p><code>$number</code> = <?php echo $number; ?>, type: <?php echo gettype($number); ?></p>
                <p><code>$textNumber</code> = "<?php echo $textNumber; ?>", type: <?php echo gettype($textNumber); ?></p>
                <p><code>$minimumAge</code> = <?php echo $minimumAge; ?>, type: <?php echo gettype($minimumAge); ?></p>
            </div>

            <div class="box result-box">
                <h2>Comparison Results</h2>

                <table>
                    <tr>
                        <th>Operator</th>
                        <th>Meaning</th>
                        <th>Expression</th>
                        <th>Result</th>
                        <th>Explanation</th>
                    </tr>

                    <?php foreach ($comparisons as $comparison) { ?>
                        <tr>
                            <td><code><?php echo htmlspecialchars($comparison["operator"]); ?></code></td>
                            <td><?php echo $comparison["meaning"]; ?></td>
                            <td><code><?php echo htmlspecialchars($comparison["expression"]); ?></code></td>
                            <td><?php echo $comparison["result"]; ?></td>
                            <td><?php echo $comparison["note"]; ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="box warning-box">
                <h2>Important: == vs ===</h2>

                <p>
                    <code>==</code> checks whether the values are equal after PHP performs type conversion.
                </p>

                <p>
                    <code>===</code> checks both value and data type.
                    In backend validation, <code>===</code> is usually safer because it avoids unexpected type conversion.
                </p>
            </div>
            <nav class="lesson-nav" aria-label="Lesson navigation">
                <a class="previous" href="02 - Assignment Operators.php">&lsaquo; Previous: 02 - Assignment Operators.php</a>
                <a class="next" href="04 - Logical Operators.php">Next: 04 - Logical Operators.php &rsaquo;</a>
            </nav>


        </div>
    </div>

</body>
</html>
