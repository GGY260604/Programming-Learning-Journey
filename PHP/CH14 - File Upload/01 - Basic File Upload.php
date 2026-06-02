<?php
/*
  FILE: 01 - Basic File Upload.php
  TOPIC: CH14 - File Upload

  GOAL:
  - Learn the basic HTML form requirement for uploading files.
  - Learn how PHP receives uploaded files using $_FILES.
  - Learn how to move an uploaded file into an uploads folder.

  IMPORTANT:
  - The form must use enctype="multipart/form-data".
  - The uploaded file is first stored in a temporary location.
  - move_uploaded_file() moves it from the temporary location to your selected folder.
  - This first example is basic. Later files add validation and safer naming.
*/

$uploadFolder = __DIR__ . "/uploads";
$message = "No file uploaded yet.";
$statusClass = "warning";
$uploadedDetails = [];

/*
  Make sure the uploads folder exists.

  In this note, the folder already exists, but this check makes the code safer.
  The 0777 means the folder is readable, writable, and executable by everyone.
  7 = 4 (read) + 2 (write) + 1 (execute). 
*/
if (!is_dir($uploadFolder)) {
    mkdir($uploadFolder, 0777, true);
}

/*
  The upload process should run only when the form is submitted.
*/
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    /*
      Check whether the file input exists in $_FILES.

      The name "uploaded_file" must match:
      <input type="file" name="uploaded_file">
    */
    if (isset($_FILES["uploaded_file"])) {
        $file = $_FILES["uploaded_file"];

        /*
          UPLOAD_ERR_OK means the file was uploaded without error.
        */
        if ($file["error"] === UPLOAD_ERR_OK) {
            $originalName = basename($file["name"]);

            /*
              Basic filename cleanup.

              This replaces characters that are not letters, numbers, dots,
              dashes, or underscores.
            */
            $safeName = preg_replace("/[^A-Za-z0-9._-]/", "_", $originalName);

            $temporaryPath = $file["tmp_name"];
            $destinationPath = $uploadFolder . "/" . $safeName;

            /*
              move_uploaded_file() returns true if the file is moved successfully.
            */
            if (move_uploaded_file($temporaryPath, $destinationPath)) {
                $message = "File uploaded successfully.";
                $statusClass = "success";

                $uploadedDetails = [
                    "Original Name" => $originalName,
                    "Saved Name" => $safeName,
                    "Size in Bytes" => $file["size"],
                    "Temporary Path" => $temporaryPath,
                    "Saved Path" => $destinationPath
                ];
            } else {
                $message = "Failed to move the uploaded file.";
                $statusClass = "error";
            }
        } else {
            $message = "Upload failed. Error code: " . $file["error"];
            $statusClass = "error";
        }
    } else {
        $message = "The uploaded_file input was not found.";
        $statusClass = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file teaches basic file upload.
      Example PHP tags inside HTML comments should be escaped like:
      &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH14 - Basic File Upload</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>

    <div class="container">
        <h1>CH14 - Basic File Upload</h1>

        <p>
            This example uploads one file and saves it into the <code>uploads</code> folder.
        </p>

        <div class="box warning">
            <h2>Important Form Setting</h2>
            <p>
                A file upload form must include <code>enctype="multipart/form-data"</code>.
                Without it, PHP will not receive the uploaded file correctly.
            </p>
        </div>

        <form action="" method="post" enctype="multipart/form-data" class="box">
            <label for="uploaded_file">Choose a file:</label>
            <input type="file" id="uploaded_file" name="uploaded_file">

            <button type="submit">Upload File</button>
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
            <pre>move_uploaded_file($temporaryPath, $destinationPath);</pre>

            <p>
                This function moves the uploaded file from PHP's temporary folder
                into your selected folder.
            </p>
        </div>

        <div class="box warning">
            <h2>Security Reminder</h2>
            <p>
                This first example focuses on the basic upload process.
                Real systems should also validate file type, validate file size,
                and rename uploaded files safely.
            </p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="../CH13 - File Handling/06 - Write CSV File.php">&lsaquo; Previous: 06 - Write CSV File.php</a>
            <a class="next" href="02 - Validate File Type.php">Next: 02 - Validate File Type.php &rsaquo;</a>
        </nav>

    </div>

</body>
</html>
