<?php
/*
  FILE: 03 - Validate File Size.php
  TOPIC: CH14 - File Upload

  GOAL:
  - Learn how to limit uploaded file size.
  - Learn how to read file size from $_FILES.
  - Combine upload error checking with size validation.

  IMPORTANT:
  - $_FILES["uploaded_file"]["size"] stores the file size in bytes.
  - 1 KB is about 1024 bytes.
  - 1 MB is about 1024 * 1024 bytes.
*/

$uploadFolder = __DIR__ . "/uploads";
$message = "Choose a file to upload.";
$statusClass = "warning";
$uploadedDetails = [];

/*
  This example allows files up to 1 MB.
*/
$maxFileSize = 1024 * 1024;

if (!is_dir($uploadFolder)) {
    mkdir($uploadFolder, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["uploaded_file"])) {
        $file = $_FILES["uploaded_file"];

        if ($file["error"] === UPLOAD_ERR_OK) {
            if ($file["size"] <= $maxFileSize) {
                $originalName = basename($file["name"]);
                $safeName = preg_replace("/[^A-Za-z0-9._-]/", "_", $originalName);
                $destinationPath = $uploadFolder . "/" . $safeName;

                if (move_uploaded_file($file["tmp_name"], $destinationPath)) {
                    $message = "File uploaded successfully. File size is allowed.";
                    $statusClass = "success";

                    $uploadedDetails = [
                        "Original Name" => $originalName,
                        "Saved Name" => $safeName,
                        "File Size" => $file["size"] . " bytes",
                        "Maximum Allowed" => $maxFileSize . " bytes"
                    ];
                } else {
                    $message = "Failed to move the uploaded file.";
                    $statusClass = "error";
                }
            } else {
                $message = "Upload rejected. File is too large. Maximum allowed size is 1 MB.";
                $statusClass = "error";
            }
        } else {
            $message = "Upload failed. Error code: " . $file["error"];
            $statusClass = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file teaches file size validation.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH14 - Validate File Size</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH14 - Validate File Size</h1>

        <p>
            This example rejects files larger than <strong>1 MB</strong>.
        </p>

        <form action="" method="post" enctype="multipart/form-data" class="box">
            <label for="uploaded_file">Choose a file smaller than 1 MB:</label>
            <input type="file" id="uploaded_file" name="uploaded_file">

            <button type="submit">Upload and Validate Size</button>
        </form>

        <div class="box <?= htmlspecialchars($statusClass) ?>">
            <h2>Upload Result</h2>
            <p><?= htmlspecialchars($message) ?></p>
        </div>

        <?php if (!empty($uploadedDetails)) { ?>
            <div class="box output">
                <h2>Uploaded File Details</h2>

                <table>
                    <tr>
                        <th>Item</th>
                        <th>Value</th>
                    </tr>

                    <?php foreach ($uploadedDetails as $key => $value) { ?>
                        <tr>
                            <td><?= htmlspecialchars($key) ?></td>
                            <td><?= htmlspecialchars((string) $value) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } ?>

        <div class="box">
            <h2>Important Code</h2>
            <pre>if ($file["size"] &lt;= $maxFileSize) {
    // Save the file
}</pre>

            <p>
                This condition checks whether the uploaded file size is within the allowed limit.
            </p>
        </div>

        <div class="box warning">
            <h2>Server Configuration Note</h2>
            <p>
                PHP also has upload size settings in <code>php.ini</code>, such as
                <code>upload_max_filesize</code> and <code>post_max_size</code>.
                This example shows application-level validation inside your PHP code.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="02 - Validate File Type.php">&lsaquo; Previous: 02 - Validate File Type.php</a>
            <a class="next" href="04 - Rename Uploaded File.php">Next: 04 - Rename Uploaded File.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
