<?php
/*
  FILE: 05 - Upload Image Preview.php
  TOPIC: CH14 - File Upload

  GOAL:
  - Upload an image file.
  - Validate that the uploaded file is really an image.
  - Display the uploaded image preview in the browser.

  IMPORTANT:
  - This example allows JPG, PNG, and GIF images only.
  - getimagesize() helps check whether the uploaded file is a valid image.
  - The image path displayed in HTML must use a browser-accessible path.
*/

$uploadFolder = __DIR__ . "/uploads";
$message = "Choose an image to upload.";
$statusClass = "warning";
$previewPath = "";
$uploadedDetails = [];

$allowedMimeTypes = [
    "image/jpeg" => "jpg",
    "image/png" => "png",
    "image/gif" => "gif"
];

if (!is_dir($uploadFolder)) {
    mkdir($uploadFolder, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_FILES["image_file"])) {
        $file = $_FILES["image_file"];

        if ($file["error"] === UPLOAD_ERR_OK) {
            $temporaryPath = $file["tmp_name"];

            /*
              getimagesize() returns image information if the file is a valid image.
              It returns false if the file is not a valid image.
            */
            $imageInfo = getimagesize($temporaryPath);

            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
            $detectedMimeType = finfo_file($fileInfo, $temporaryPath);
            finfo_close($fileInfo);

            if ($imageInfo !== false && array_key_exists($detectedMimeType, $allowedMimeTypes)) {
                $extension = $allowedMimeTypes[$detectedMimeType];
                $newName = "image_" . bin2hex(random_bytes(8)) . "." . $extension;
                $destinationPath = $uploadFolder . "/" . $newName;

                if (move_uploaded_file($temporaryPath, $destinationPath)) {
                    $message = "Image uploaded successfully.";
                    $statusClass = "success";

                    /*
                      This path is used inside the src attribute of the img tag.
                      Because this PHP file and uploads folder are in the same folder,
                      the browser path starts with uploads/.
                    */
                    $previewPath = "uploads/" . $newName;

                    $uploadedDetails = [
                        "Original Name" => basename($file["name"]),
                        "Saved Name" => $newName,
                        "Detected MIME Type" => $detectedMimeType,
                        "Image Width" => $imageInfo[0] . " px",
                        "Image Height" => $imageInfo[1] . " px",
                        "Size in Bytes" => $file["size"]
                    ];
                } else {
                    $message = "Failed to move the uploaded image.";
                    $statusClass = "error";
                }
            } else {
                $message = "Upload rejected. Please upload a valid JPG, PNG, or GIF image.";
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
      This file teaches image upload preview.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH14 - Upload Image Preview</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH14 - Upload Image Preview</h1>

        <p>
            This example uploads an image and displays a preview after the upload succeeds.
        </p>

        <form action="" method="post" enctype="multipart/form-data" class="box">
            <label for="image_file">Choose a JPG, PNG, or GIF image:</label>
            <input type="file" id="image_file" name="image_file" accept="image/jpeg,image/png,image/gif">

            <button type="submit">Upload Image</button>
        </form>

        <div class="box <?= htmlspecialchars($statusClass) ?>">
            <h2>Upload Result</h2>
            <p><?= htmlspecialchars($message) ?></p>
        </div>

        <?php if ($previewPath !== "") { ?>
            <div class="box output">
                <h2>Image Preview</h2>

                <img
                    src="<?= htmlspecialchars($previewPath) ?>"
                    alt="Uploaded image preview"
                    class="preview-image"
                >
            </div>
        <?php } ?>

        <?php if (!empty($uploadedDetails)) { ?>
            <div class="box output">
                <h2>Uploaded Image Details</h2>

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
            <pre>$imageInfo = getimagesize($temporaryPath);</pre>

            <p>
                This checks whether the uploaded file is a valid image and also gives image information,
                such as width and height.
            </p>
        </div>

        <div class="box warning">
            <h2>Important Note</h2>
            <p>
                The file system path and browser path are different.
                PHP uses <code>__DIR__ . "/uploads"</code> to save the file,
                but the browser displays the image using <code>uploads/filename.jpg</code>.
            </p>
        </div>
    </div>

</body>
</html>
