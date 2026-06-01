<?php
/*
  FILE: 06 - Write CSV File.php
  TOPIC: CH13 - File Handling

  GOAL:
  - Learn how to write structured data into a CSV file.
  - Learn how to use fopen(), fputcsv(), and fclose().
  - Understand that CSV files can be opened by spreadsheet software.

  IMPORTANT:
  - fputcsv() writes an array as one CSV row.
  - The mode "w" creates or replaces the file.
  - The mode "a" appends to the file.
*/

$filePath = __DIR__ . "/data/generated-students.csv";

$message = "";
$statusClass = "";
$csvContent = "";

/*
  This is sample structured data.
  Each inner array represents one student row.
*/
$students = [
    ["id" => 1, "name" => "Galen", "course" => "PHP", "score" => 88],
    ["id" => 2, "name" => "Cleo", "course" => "MySQL", "score" => 91],
    ["id" => 3, "name" => "Ali", "course" => "Backend", "score" => 84]
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    /*
      Open the file in write mode.

      "w" means:
      - create the file if it does not exist
      - replace the content if the file already exists
    */
    $file = fopen($filePath, "w");

    if ($file === false) {
        $message = "Failed to open the file for writing.";
        $statusClass = "error";
    } else {
        /*
          Write the header row first.
        */
        fputcsv($file, ["id", "name", "course", "score"]);

        /*
          Write each student as one CSV row.
        */
        foreach ($students as $student) {
            fputcsv($file, $student);
        }

        fclose($file);

        $message = "CSV file written successfully.";
        $statusClass = "success";
    }
}

if (file_exists($filePath)) {
    $csvContent = file_get_contents($filePath);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Escaped PHP tag example: &lt;?php echo "Hello World"; ?&gt; -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH13 - Write CSV File</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH13 - Write CSV File</h1>

        <p>
            This example writes a PHP array into <code>data/generated-students.csv</code>.
        </p>

        <?php if ($message !== "") { ?>
            <div class="box <?= $statusClass ?>">
                <h2>Status</h2>
                <p><?= htmlspecialchars($message) ?></p>
            </div>
        <?php } ?>

        <div class="box">
            <h2>Generate CSV File</h2>

            <p>
                Click the button to write the sample student data into a CSV file.
            </p>

            <form method="POST">
                <button type="submit">Write CSV File</button>
            </form>
        </div>

        <div class="box output">
            <h2>Current Generated CSV Content</h2>

            <?php if ($csvContent !== "") { ?>
                <pre><?= htmlspecialchars($csvContent) ?></pre>
            <?php } else { ?>
                <p>The CSV file is empty or does not exist yet.</p>
            <?php } ?>
        </div>

        <div class="box">
            <h2>Important Code</h2>
            <pre>$file = fopen($filePath, "w");

fputcsv($file, ["id", "name", "course", "score"]);

foreach ($students as $student) {
    fputcsv($file, $student);
}

fclose($file);</pre>

            <p>
                <code>fputcsv()</code> converts the array into a proper CSV row automatically.
            </p>
        </div>
    </div>

</body>
</html>
