<?php
/*
  FILE: 04 - Check File Exists.php
  TOPIC: CH13 - File Handling

  GOAL:
  - Learn how to check whether a file exists.
  - Learn why checking file existence prevents warnings.
  - Display file information such as size and modified time.

  IMPORTANT:
  - file_exists() returns true if the file or folder exists.
  - filesize() returns the file size in bytes.
  - filemtime() returns the last modified time as a timestamp.
*/

$existingFile = __DIR__ . "/data/sample-read.txt";
$missingFile = __DIR__ . "/data/missing-file.txt";

$filesToCheck = [
    "Existing File" => $existingFile,
    "Missing File" => $missingFile
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Escaped PHP tag example: &lt;?php echo "Hello World"; ?&gt; -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH13 - Check File Exists</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH13 - Check File Exists</h1>

        <p>
            This example checks two files: one exists and one does not exist.
        </p>

        <div class="box output">
            <h2>File Checking Result</h2>

            <table>
                <tr>
                    <th>Label</th>
                    <th>Path</th>
                    <th>Status</th>
                    <th>Size</th>
                    <th>Last Modified</th>
                </tr>

                <?php foreach ($filesToCheck as $label => $path) { ?>
                    <tr>
                        <td><?= htmlspecialchars($label) ?></td>
                        <td><code><?= htmlspecialchars($path) ?></code></td>

                        <?php if (file_exists($path)) { ?>
                            <td>Exists</td>
                            <td><?= filesize($path) ?> bytes</td>
                            <td><?= date("Y-m-d H:i:s", filemtime($path)) ?></td>
                        <?php } else { ?>
                            <td>Does not exist</td>
                            <td>-</td>
                            <td>-</td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <h2>Important Code</h2>
            <pre>if (file_exists($filePath)) {
    // Safe to read the file
}</pre>

            <p>
                Before reading a file, use <code>file_exists()</code> to avoid
                warnings caused by missing files.
            </p>
        </div>

        <div class="box warning">
            <h2>Important Reminder</h2>
            <p>
                A file can exist but still be unreadable if the permission is wrong.
                For more advanced checking, PHP also has <code>is_readable()</code>
                and <code>is_writable()</code>.
            </p>
        </div>
    </div>

</body>
</html>
