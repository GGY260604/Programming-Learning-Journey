<?php
/*
  FILE: 01 - Read Text File.php
  TOPIC: CH13 - File Handling

  GOAL:
  - Learn how to read a text file using file_get_contents().
  - Learn why __DIR__ is useful when writing file paths.
  - Display file content safely in HTML.

  IMPORTANT:
  - file_get_contents() reads the whole file as one string.
  - It is simple and suitable for small files.
  - For very large files, reading line by line is usually better.
*/

/*
  __DIR__ means the folder path of this current PHP file.

  The sample text file is inside:
  CH13 - File Handling/data/sample-read.txt
*/
$filePath = __DIR__ . "/data/sample-read.txt";

$fileContent = "";
$message = "";
$statusClass = "";

/*
  Before reading a file, it is safer to check whether the file exists.
*/
if (file_exists($filePath)) {
    $fileContent = file_get_contents($filePath);
    $message = "The file was read successfully.";
    $statusClass = "success";
} else {
    $message = "The file does not exist.";
    $statusClass = "error";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file teaches PHP file reading.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH13 - Read Text File</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH13 - Read Text File</h1>

        <p>
            This example reads a text file from the <code>data</code> folder.
        </p>

        <div class="box <?php echo $statusClass; ?>">
            <h2>Status</h2>
            <p><?= htmlspecialchars($message) ?></p>
        </div>

        <div class="box output">
            <h2>File Path</h2>
            <p><code><?= htmlspecialchars($filePath) ?></code></p>
        </div>

        <div class="box output">
            <h2>File Content</h2>

            <?php if ($fileContent !== "") { ?>
                <!--
                  nl2br() converts new line characters into HTML line breaks.
                  htmlspecialchars() protects the page from unsafe HTML output.
                -->
                <p><?= nl2br(htmlspecialchars($fileContent)) ?></p>
            <?php } else { ?>
                <p>No content to display.</p>
            <?php } ?>
        </div>

        <div class="box">
            <h2>Important Code</h2>
            <pre>$fileContent = file_get_contents($filePath);</pre>

            <p>
                This reads the whole text file and stores the content inside a PHP variable.
            </p>
        </div>

        <div class="box warning">
            <h2>Security Reminder</h2>
            <p>
                Even if content comes from a file, it may still contain unsafe HTML.
                That is why this example uses <code>htmlspecialchars()</code> before displaying it.
            </p>
        </div>
    </div>

</body>
</html>
