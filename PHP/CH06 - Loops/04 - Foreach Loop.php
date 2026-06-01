<?php
/*
  FILE: 04 - Foreach Loop.php
  TOPIC: CH06 - Loops

  GOAL:
  - Learn how to use foreach with arrays.
  - Learn how to loop through indexed arrays.
  - Learn how to loop through associative arrays.

  IMPORTANT:
  foreach is one of the most useful loops in PHP backend development.
  It is commonly used to display records from arrays or database query results.
*/

/*
  Example 1:
  Indexed array.
  Each value has a numeric index.
*/

$subjects = ["PHP", "MySQL", "HTML", "CSS", "JavaScript"];

/*
  Example 2:
  Associative array.
  Each value has a named key.
*/

$student = [
    "name" => "Galen",
    "course" => "Software Engineering",
    "level" => "Beginner",
    "topic" => "PHP Backend"
];

/*
  Example 3:
  Multidimensional array.
  This looks similar to records returned from a database.
*/

$students = [
    ["id" => 1, "name" => "Ali", "mark" => 85],
    ["id" => 2, "name" => "Bala", "mark" => 72],
    ["id" => 3, "name" => "Chong", "mark" => 91]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file is a PHP file that outputs HTML.

      Important:
      If we want to show PHP syntax inside an HTML comment,
      we should escape the PHP opening tag.

      Safe example inside HTML comment:
      &lt;?php echo "Hello World"; ?&gt;

      Do not write the real PHP opening tag inside an HTML comment
      when you only want to display it as text.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH06 - Foreach Loop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>CH06 - Foreach Loop</h1>

        <div class="box example">
            <h2>What is Foreach?</h2>

            <p>
                <code>foreach</code> is used to loop through arrays easily.
                It is easier to read than a normal <code>for</code> loop when working with arrays.
            </p>

            <pre>foreach ($array as $value) {
    // use $value
}</pre>
        </div>

        <div class="box output">
            <h2>Example 1: Indexed Array</h2>

            <?php foreach ($subjects as $subject) { ?>
                <span class="badge"><?php echo htmlspecialchars($subject); ?></span>
            <?php } ?>
        </div>

        <div class="box output">
            <h2>Example 2: Associative Array</h2>

            <?php foreach ($student as $key => $value) { ?>
                <div class="result-item">
                    <span class="highlight"><?php echo htmlspecialchars($key); ?>:</span>
                    <?php echo htmlspecialchars($value); ?>
                </div>
            <?php } ?>
        </div>

        <div class="box output">
            <h2>Example 3: Array of Student Records</h2>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mark</th>
                    <th>Status</th>
                </tr>

                <?php foreach ($students as $row) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo htmlspecialchars($row["name"]); ?></td>
                        <td><?php echo $row["mark"]; ?></td>
                        <td>
                            <?php
                                if ($row["mark"] >= 50) {
                                    echo "Pass";
                                } else {
                                    echo "Fail";
                                }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box warning">
            <h2>Backend Usage</h2>

            <p>
                Later, when we select records from MySQL, PHP will often receive many rows of data.
                We can use <code>foreach</code> to display each database row in an HTML table.
            </p>
        </div>

    </div>

</body>
</html>
