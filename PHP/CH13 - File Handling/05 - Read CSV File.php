<?php
/*
  FILE: 05 - Read CSV File.php
  TOPIC: CH13 - File Handling

  GOAL:
  - Learn how to read a CSV file using fopen() and fgetcsv().
  - Learn how to separate the header row from data rows.
  - Display CSV data in an HTML table.

  IMPORTANT:
  - CSV means Comma-Separated Values.
  - It is commonly used for spreadsheet-like data.
  - fgetcsv() reads one row at a time and converts it into an array.
*/

$filePath = __DIR__ . "/data/students.csv";

$headers = [];
$students = [];
$message = "";
$statusClass = "";

if (!file_exists($filePath)) {
    $message = "CSV file does not exist.";
    $statusClass = "error";
} else {
    /*
      fopen() opens the file.

      The mode "r" means read only.
    */
    $file = fopen($filePath, "r");

    if ($file === false) {
        $message = "Failed to open the CSV file.";
        $statusClass = "error";
    } else {
        /*
          The first row of this CSV file is the header row.
        */
        $headers = fgetcsv($file);

        /*
          Continue reading rows until fgetcsv() returns false.
        */
        while (($row = fgetcsv($file)) !== false) {
            $students[] = $row;
        }

        /*
          Close the opened file resource.
        */
        fclose($file);

        $message = "CSV file read successfully.";
        $statusClass = "success";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Escaped PHP tag example: &lt;?php echo "Hello World"; ?&gt; -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH13 - Read CSV File</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH13 - Read CSV File</h1>

        <p>
            This example reads <code>data/students.csv</code> and displays the rows in a table.
        </p>

        <div class="box <?= $statusClass ?>">
            <h2>Status</h2>
            <p><?= htmlspecialchars($message) ?></p>
        </div>

        <div class="box output">
            <h2>CSV Data</h2>

            <?php if (!empty($headers) && !empty($students)) { ?>
                <table>
                    <tr>
                        <?php foreach ($headers as $header) { ?>
                            <th><?= htmlspecialchars($header) ?></th>
                        <?php } ?>
                    </tr>

                    <?php foreach ($students as $student) { ?>
                        <tr>
                            <?php foreach ($student as $value) { ?>
                                <td><?= htmlspecialchars($value) ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else { ?>
                <p>No CSV data to display.</p>
            <?php } ?>
        </div>

        <div class="box">
            <h2>Important Code</h2>
            <pre>$file = fopen($filePath, "r");

while (($row = fgetcsv($file)) !== false) {
    $students[] = $row;
}

fclose($file);</pre>

            <p>
                This reads the CSV file row by row.
                Each row becomes an array.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="04 - Check File Exists.php">&lsaquo; Previous: 04 - Check File Exists.php</a>
            <a class="next" href="06 - Write CSV File.php">Next: 06 - Write CSV File.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
