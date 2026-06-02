<?php
/*
  FILE: 02 - GET.php
  TOPIC: CH10 - Superglobals

  GOAL:
  - Learn how to use $_GET.
  - Learn how GET form data appears in the URL.
  - Learn when GET is suitable.

  IMPORTANT:
  - GET data is visible in the URL.
  - GET is suitable for search, filter, page number, category, and non-sensitive data.
*/

$keyword = $_GET["keyword"] ?? "";
$category = $_GET["category"] ?? "";

$safeKeyword = htmlspecialchars($keyword);
$safeCategory = htmlspecialchars($category);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 02 - GET.php
      Escaped example: &lt;?php echo $_GET["keyword"]; ?&gt;
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH10 - GET</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>
    <div class="container">
        <h1>CH10 - $_GET</h1>

        <div class="box">
            <h2>What is $_GET?</h2>
            <p><code>$_GET</code> is used to read data sent through the URL. It is commonly used for search, filtering, and navigation.</p>
            <p>After submitting this form, look at the browser URL. You will see the submitted values in the query string.</p>
        </div>

        <div class="box">
            <h2>GET Form Example</h2>
            <form method="get" action="">
                <label for="keyword">Search Keyword:</label>
                <input type="text" id="keyword" name="keyword" value="<?= $safeKeyword ?>">

                <label for="category">Category:</label>
                <select id="category" name="category">
                    <option value="">-- Select Category --</option>
                    <option value="syntax" <?= $category === "syntax" ? "selected" : "" ?>>Syntax</option>
                    <option value="database" <?= $category === "database" ? "selected" : "" ?>>Database</option>
                    <option value="security" <?= $category === "security" ? "selected" : "" ?>>Security</option>
                </select>

                <button type="submit">Search</button>
            </form>
        </div>

        <div class="box output">
            <h2>Submitted GET Data</h2>
            <?php if ($keyword === "" && $category === "") { ?>
                <p>No GET data submitted yet.</p>
            <?php } else { ?>
                <p><strong>Keyword:</strong> <?= $safeKeyword === "" ? "No keyword entered." : $safeKeyword ?></p>
                <p><strong>Category:</strong> <?= $safeCategory === "" ? "No category selected." : $safeCategory ?></p>
            <?php } ?>
        </div>

        <div class="box warning">
            <h2>When Should You Use GET?</h2>
            <p>Use <code>GET</code> when the data is not sensitive and can be shown in the URL.</p>
            <p>Do not use <code>GET</code> for passwords.</p>
        </div>
        <nav class="lesson-nav" aria-label="Lesson navigation">
            <a class="previous" href="01 - REQUEST.php">&lsaquo; Previous: 01 - REQUEST.php</a>
            <a class="next" href="03 - POST.php">Next: 03 - POST.php &rsaquo;</a>
        </nav>

    </div>
</body>
</html>
