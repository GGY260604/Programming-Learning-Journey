<?php
/*
  FILE: 03 - POST.php
  TOPIC: CH10 - Superglobals

  GOAL:
  - Learn how to use $_POST.
  - Learn how POST form data is processed by PHP.
  - Understand that POST hides data from the URL but is not automatically secure.
*/

$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";
$email = "";
$message = "";

if ($isSubmitted) {
    $email = $_POST["email"] ?? "";
    $message = $_POST["message"] ?? "";
}

$safeEmail = htmlspecialchars($email);
$safeMessage = htmlspecialchars($message);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- FILE: 03 - POST.php | Escaped example: &lt;?php echo $_POST["email"]; ?&gt; -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH10 - POST</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>
    <div class="container">
        <h1>CH10 - $_POST</h1>

        <div class="box">
            <h2>What is $_POST?</h2>
            <p><code>$_POST</code> is used to read data submitted through a POST form. POST data does not appear in the browser URL.</p>
            <p>POST is not automatically secure. Sensitive websites should still use HTTPS.</p>
        </div>

        <div class="box">
            <h2>POST Form Example</h2>
            <form method="post" action="">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $safeEmail ?>">

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5"><?= $safeMessage ?></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="box output">
            <h2>Submitted POST Data</h2>
            <?php if (!$isSubmitted) { ?>
                <p>The form has not been submitted yet.</p>
            <?php } else { ?>
                <p><strong>Email:</strong> <?= $safeEmail === "" ? "No email entered." : $safeEmail ?></p>
                <p><strong>Message:</strong></p>
                <p><?= nl2br($safeMessage === "" ? "No message entered." : $safeMessage) ?></p>
            <?php } ?>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="02 - GET.php">&lsaquo; Previous: 02 - GET.php</a>
            <a class="next" href="04 - SERVER.php">Next: 04 - SERVER.php &rsaquo;</a>
        </nav>

    </div>
</body>
</html>
