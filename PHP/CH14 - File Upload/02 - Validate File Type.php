<?php
/*
  FILE: 02 - Validate File Type.php
  TOPIC: CH14 - File Upload

  GOAL:
  - Learn why file type validation is important.
  - Learn why the browser-provided file type is not enough.
  - Use finfo_file() to check the real MIME type of the uploaded file.

  IMPORTANT:
  - Do not trust only $_FILES["uploaded_file"]["type"].
  - MIME type validation helps confirm what kind of file was uploaded.
  - This example allows JPG, PNG, PDF, and TXT files only.
*/

$uploadFolder = __DIR__ . "/uploads";
$message = "Choose a file to upload.";
$statusClass = "warning";
$uploadedDetails = [];

$allowedMimeTypes = [
    "image/jpeg" => "jpg",
    "image/png" => "png",
    "application/pdf" => "pdf",
    "text/plain" => "txt"
];

if (!is_dir($uploadFolder)) {
    mkdir($uploadFolder, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["uploaded_file"])) {
        $file = $_FILES["uploaded_file"];

        if ($file["error"] === UPLOAD_ERR_OK) {
            $temporaryPath = $file["tmp_name"];

            /*
              finfo_open() creates a file information object.
              FILEINFO_MIME_TYPE tells PHP we want to detect the MIME type.
            */
            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
            $detectedMimeType = finfo_file($fileInfo, $temporaryPath);
            finfo_close($fileInfo);

            /*
              array_key_exists() checks whether the detected MIME type is allowed.
            */
            if (array_key_exists($detectedMimeType, $allowedMimeTypes)) {
                $originalName = basename($file["name"]);
                $safeName = preg_replace("/[^A-Za-z0-9._-]/", "_", $originalName);
                $destinationPath = $uploadFolder . "/" . $safeName;

                if (move_uploaded_file($temporaryPath, $destinationPath)) {
                    $message = "File uploaded successfully. File type is allowed.";
                    $statusClass = "success";

                    $uploadedDetails = [
                        "Original Name" => $originalName,
                        "Saved Name" => $safeName,
                        "Browser Type" => $file["type"],
                        "Detected MIME Type" => $detectedMimeType,
                        "Size in Bytes" => $file["size"]
                    ];
                } else {
                    $message = "Failed to move the uploaded file.";
                    $statusClass = "error";
                }
            } else {
                $message = "Upload rejected. This file type is not allowed. Detected type: " . $detectedMimeType;
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
      This file teaches file type validation.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH14 - Validate File Type</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH14 - Validate File Type</h1>

        <p>
            This example validates the uploaded file type before saving it.
        </p>

        <div class="box">
            <h2>Allowed File Types</h2>
            <ul>
                <li>JPG image</li>
                <li>PNG image</li>
                <li>PDF document</li>
                <li>TXT text file</li>
            </ul>
        </div>

        <form action="" method="post" enctype="multipart/form-data" class="box">
            <label for="uploaded_file">Choose a JPG, PNG, PDF, or TXT file:</label>
            <input type="file" id="uploaded_file" name="uploaded_file">

            <button type="submit">Upload and Validate Type</button>
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
            <pre>$fileInfo = finfo_open(FILEINFO_MIME_TYPE);
$detectedMimeType = finfo_file($fileInfo, $temporaryPath);</pre>

            <p>
                This code checks the file's detected MIME type from the temporary uploaded file.
            </p>
        </div>

        <div class="box warning">
            <h2>Important Note</h2>
            <p>
                The value in <code>$_FILES["uploaded_file"]["type"]</code> comes from the browser.
                It is useful for display, but it should not be the only validation rule.
            </p>
        </div>
    </div>

</body>
</html>
