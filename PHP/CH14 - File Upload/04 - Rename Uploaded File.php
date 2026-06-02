<?php
/*
  FILE: 04 - Rename Uploaded File.php
  TOPIC: CH14 - File Upload

  GOAL:
  - Learn why uploaded files should often be renamed.
  - Use pathinfo() to get the file extension.
  - Use random_bytes() to create a safer unique filename.

  IMPORTANT:
  - The original filename may contain spaces or unusual characters.
  - Two users may upload files with the same name.
  - Renaming helps prevent overwriting and makes filenames safer.
*/

$uploadFolder = __DIR__ . "/uploads";
$message = "Choose a file to upload.";
$statusClass = "warning";
$uploadedDetails = [];

$allowedExtensions = ["jpg", "jpeg", "png", "pdf", "txt"];

if (!is_dir($uploadFolder)) {
    mkdir($uploadFolder, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["uploaded_file"])) {
        $file = $_FILES["uploaded_file"];

        if ($file["error"] === UPLOAD_ERR_OK) {
            $originalName = basename($file["name"]);

            /*
              pathinfo() can get parts of a filename.

              PATHINFO_EXTENSION gives us only the extension, such as jpg or pdf.
            */
            $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

            if (in_array($extension, $allowedExtensions, true)) {
                /*
                  random_bytes(8) generates random binary data.
                  bin2hex() converts it into readable characters.

                  Example result:
                  file_8f4a90c2e3b1a77d.jpg
                */
                $newName = "file_" . bin2hex(random_bytes(8)) . "." . $extension;
                $destinationPath = $uploadFolder . "/" . $newName;

                if (move_uploaded_file($file["tmp_name"], $destinationPath)) {
                    $message = "File uploaded successfully with a new safe filename.";
                    $statusClass = "success";

                    $uploadedDetails = [
                        "Original Name" => $originalName,
                        "Extension" => $extension,
                        "New Saved Name" => $newName,
                        "Saved Path" => $destinationPath
                    ];
                } else {
                    $message = "Failed to move the uploaded file.";
                    $statusClass = "error";
                }
            } else {
                $message = "Upload rejected. File extension is not allowed.";
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
      This file teaches how to rename uploaded files.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH14 - Rename Uploaded File</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH14 - Rename Uploaded File</h1>

        <p>
            This example renames the uploaded file before saving it.
        </p>

        <form action="" method="post" enctype="multipart/form-data" class="box">
            <label for="uploaded_file">Choose a JPG, PNG, PDF, or TXT file:</label>
            <input type="file" id="uploaded_file" name="uploaded_file">

            <button type="submit">Upload and Rename File</button>
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
            <pre>$extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
$newName = "file_" . bin2hex(random_bytes(8)) . "." . $extension;</pre>

            <p>
                This gets the extension from the original file and creates a new unique filename.
            </p>
        </div>

        <div class="box warning">
            <h2>Why Rename Uploaded Files?</h2>
            <p>
                Renaming helps avoid duplicate filenames, strange characters,
                and direct trust in user-provided file names.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="03 - Validate File Size.php">&lsaquo; Previous: 03 - Validate File Size.php</a>
            <a class="next" href="05 - Upload Image Preview.php">Next: 05 - Upload Image Preview.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
