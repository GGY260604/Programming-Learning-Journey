<?php
/*
  FILE: 05 - FILES Preview.php
  TOPIC: CH10 - Superglobals

  GOAL:
  - Learn what $_FILES is.
  - Learn how uploaded file information is stored in PHP.

  IMPORTANT:
  - File upload forms must use enctype="multipart/form-data".
  - This file only previews information. It does not save the uploaded file.
*/

$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";
$fileInfo = null;
$errorMessage = "";

if ($isSubmitted) {
    if (isset($_FILES["uploaded_file"])) {
        $fileInfo = $_FILES["uploaded_file"];

        if ($fileInfo["error"] === UPLOAD_ERR_NO_FILE) {
            $errorMessage = "No file was selected.";
        }
    } else {
        $errorMessage = "The uploaded_file input was not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- FILE: 05 - FILES Preview.php | Escaped example: &lt;?php print_r($_FILES); ?&gt; -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH10 - FILES Preview</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>CH10 - $_FILES Preview</h1>

        <div class="box">
            <h2>What is $_FILES?</h2>
            <p><code>$_FILES</code> is used to read information about uploaded files.</p>
            <p>This example previews uploaded file information only. File saving is taught later in the file upload chapter.</p>
        </div>

        <div class="box">
            <h2>Upload Form</h2>
            <form method="post" action="" enctype="multipart/form-data">
                <label for="uploaded_file">Choose a file:</label>
                <input type="file" id="uploaded_file" name="uploaded_file">
                <button type="submit">Preview File Info</button>
            </form>
        </div>

        <div class="box output">
            <h2>Uploaded File Information</h2>
            <?php if (!$isSubmitted) { ?>
                <p>No file submitted yet.</p>
            <?php } elseif ($errorMessage !== "") { ?>
                <p><?= htmlspecialchars($errorMessage) ?></p>
            <?php } else { ?>
                <table>
                    <tr><th>$_FILES Key</th><th>Value</th><th>Meaning</th></tr>
                    <tr><td><code>name</code></td><td><?= htmlspecialchars($fileInfo["name"]) ?></td><td>Original filename.</td></tr>
                    <tr><td><code>type</code></td><td><?= htmlspecialchars($fileInfo["type"]) ?></td><td>File type reported by the browser.</td></tr>
                    <tr><td><code>tmp_name</code></td><td><?= htmlspecialchars($fileInfo["tmp_name"]) ?></td><td>Temporary path on the server.</td></tr>
                    <tr><td><code>error</code></td><td><?= htmlspecialchars((string) $fileInfo["error"]) ?></td><td>Upload error code. 0 means no error.</td></tr>
                    <tr><td><code>size</code></td><td><?= htmlspecialchars((string) $fileInfo["size"]) ?> bytes</td><td>File size in bytes.</td></tr>
                </table>
            <?php } ?>
        </div>

        <div class="box warning">
            <h2>Security Reminder</h2>
            <p>Never trust uploaded files directly. Real upload systems must check file size, extension, MIME type, and rename the file before saving it.</p>
        </div>
    </div>
</body>
</html>
