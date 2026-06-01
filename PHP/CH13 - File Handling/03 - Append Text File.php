<?php
/*
  FILE: 03 - Append Text File.php
  TOPIC: CH13 - File Handling

  GOAL:
  - Learn how to add content to the end of a file.
  - Learn the purpose of FILE_APPEND.
  - Build a simple log file example.

  IMPORTANT:
  - Normal file_put_contents() replaces existing content.
  - file_put_contents() with FILE_APPEND adds new content to the end.
*/

$filePath = __DIR__ . "/data/append-log.txt";

$message = "";
$statusClass = "";
$logContent = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $logMessage = trim($_POST["log_message"] ?? "");

    if ($logMessage === "") {
        $message = "Please enter a log message.";
        $statusClass = "error";
    } else {
        /*
          This creates one log line with date and time.
        */
        $line = "[" . date("Y-m-d H:i:s") . "] " . $logMessage . PHP_EOL;

        /*
          FILE_APPEND tells PHP to add the new line at the end of the file.
          It will not remove the old content.
        */
        $bytesWritten = file_put_contents($filePath, $line, FILE_APPEND);

        if ($bytesWritten === false) {
            $message = "Failed to append the log message.";
            $statusClass = "error";
        } else {
            $message = "Log message appended successfully.";
            $statusClass = "success";
        }
    }
}

if (file_exists($filePath)) {
    $logContent = file_get_contents($filePath);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Escaped PHP tag example: &lt;?php echo "Hello World"; ?&gt; -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH13 - Append Text File</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>CH13 - Append Text File</h1>

        <p>
            This example adds a new line to <code>data/append-log.txt</code>
            every time the form is submitted.
        </p>

        <?php if ($message !== "") { ?>
            <div class="box <?= $statusClass ?>">
                <h2>Status</h2>
                <p><?= htmlspecialchars($message) ?></p>
            </div>
        <?php } ?>

        <div class="box">
            <h2>Add New Log Message</h2>

            <form method="POST">
                <label for="log_message">Log Message</label>
                <input
                    type="text"
                    id="log_message"
                    name="log_message"
                    value="<?= htmlspecialchars($_POST["log_message"] ?? "") ?>"
                    placeholder="Example: User opened the dashboard"
                >

                <button type="submit">Append Log</button>
            </form>
        </div>

        <div class="box output">
            <h2>Current Log File Content</h2>

            <?php if ($logContent !== "") { ?>
                <pre><?= htmlspecialchars($logContent) ?></pre>
            <?php } else { ?>
                <p>The log file is empty.</p>
            <?php } ?>
        </div>

        <div class="box">
            <h2>Important Code</h2>
            <pre>$bytesWritten = file_put_contents($filePath, $line, FILE_APPEND);</pre>

            <p>
                <code>FILE_APPEND</code> is the key difference.
                It adds the new text after the old text.
            </p>
        </div>
    </div>

</body>
</html>
