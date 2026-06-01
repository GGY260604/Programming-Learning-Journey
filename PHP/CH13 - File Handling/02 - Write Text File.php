<?php
/*
  FILE: 02 - Write Text File.php
  TOPIC: CH13 - File Handling

  GOAL:
  - Learn how to write content into a text file.
  - Learn how file_put_contents() can create or replace a file.
  - Understand that writing without FILE_APPEND replaces old content.

  IMPORTANT:
  - file_put_contents() writes text into a file.
  - If the file does not exist, PHP tries to create it.
  - If the file already exists, old content is replaced unless FILE_APPEND is used.
*/

$filePath = __DIR__ . "/data/generated-note.txt";

$message = "";
$statusClass = "";
$currentContent = "";

/*
  This form uses POST because it changes data by writing into a file.
*/
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $noteTitle = trim($_POST["note_title"] ?? "");
    $noteBody = trim($_POST["note_body"] ?? "");

    if ($noteTitle === "" || $noteBody === "") {
        $message = "Please enter both title and body.";
        $statusClass = "error";
    } else {
        /*
          PHP_EOL means the correct new line symbol for the operating system.
          EOL stands for End Of Line.

          This creates a simple text format:
          Title: ...
          Body: ...
          Created At: ...
        */
        $contentToWrite = "Title: " . $noteTitle . PHP_EOL;
        $contentToWrite .= "Body: " . $noteBody . PHP_EOL;
        $contentToWrite .= "Created At: " . date("Y-m-d H:i:s") . PHP_EOL;

        /*
          This writes content into the file.
          Old content will be replaced.
        */
        $bytesWritten = file_put_contents($filePath, $contentToWrite);

        if ($bytesWritten === false) {
            $message = "Failed to write into the file.";
            $statusClass = "error";
        } else {
            $message = "File written successfully. Bytes written: " . $bytesWritten;
            $statusClass = "success";
        }
    }
}

if (file_exists($filePath)) {
    $currentContent = file_get_contents($filePath);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This file teaches writing text files.
      Escaped PHP tag example: &lt;?php echo "Hello World"; ?&gt;
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH13 - Write Text File</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH13 - Write Text File</h1>

        <p>
            This example writes form input into <code>data/generated-note.txt</code>.
        </p>

        <?php if ($message !== "") { ?>
            <div class="box <?= $statusClass ?>">
                <h2>Status</h2>
                <p><?= htmlspecialchars($message) ?></p>
            </div>
        <?php } ?>

        <div class="box">
            <h2>Write New File Content</h2>

            <form method="POST">
                <label for="note_title">Note Title</label>
                <input
                    type="text"
                    id="note_title"
                    name="note_title"
                    value="<?= htmlspecialchars($_POST["note_title"] ?? "") ?>"
                    placeholder="Example: PHP File Note"
                >

                <label for="note_body">Note Body</label>
                <textarea
                    id="note_body"
                    name="note_body"
                    placeholder="Write something here..."
                ><?= htmlspecialchars($_POST["note_body"] ?? "") ?></textarea>

                <button type="submit">Write File</button>
            </form>
        </div>

        <div class="box output">
            <h2>Current File Content</h2>

            <?php if ($currentContent !== "") { ?>
                <pre><?= htmlspecialchars($currentContent) ?></pre>
            <?php } else { ?>
                <p>No file content yet.</p>
            <?php } ?>
        </div>

        <div class="box">
            <h2>Important Code</h2>
            <pre>$bytesWritten = file_put_contents($filePath, $contentToWrite);</pre>

            <p>
                This writes the string stored in <code>$contentToWrite</code> into the file.
                Without <code>FILE_APPEND</code>, the previous content will be replaced.
            </p>
        </div>
    </div>

</body>
</html>
