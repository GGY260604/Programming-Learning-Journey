<?php
/*
  FILE: 01 - GET Form.php
  TOPIC: CH09 - Forms and User Input

  GOAL:
  - Learn how to submit form data using the GET method.
  - Learn how PHP reads GET data using $_GET.
  - Understand that GET data appears in the URL.

  IMPORTANT:
  - GET is commonly used for search, filter, and view actions.
  - GET data is visible in the URL.
  - Do not use GET for sensitive data such as passwords.
*/

/*
  We use the null coalescing operator ?? here.

  $_GET["keyword"] ?? ""
  means:
  - If $_GET["keyword"] exists, use its value.
  - If it does not exist, use an empty string.

  This prevents an undefined array key warning when the page loads
  before the form is submitted.
*/

$keyword = $_GET["keyword"] ?? "";
$category = $_GET["category"] ?? "";

/*
  This variable checks whether the form has been submitted.

  Since the submit button name is "search", PHP can check if
  $_GET["search"] exists.
*/

$isSubmitted = isset($_GET["search"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      FILE: 01 - GET Form.php

      This HTML form uses method="get".
      After submitting, the form data will appear in the URL.
    -->

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CH09 - GET Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <div class="card">
            <h1>CH09 - GET Form</h1>

            <p>
                This file demonstrates how PHP receives form data using
                <code>$_GET</code>.
            </p>

            <form method="get" action="">
                <!--
                  method="get" means the form data is added to the URL.

                  action="" means the form submits back to this same file.
                -->

                <div class="form-group">
                    <label for="keyword">Search Keyword</label>
                    <input
                        type="text"
                        id="keyword"
                        name="keyword"
                        value="<?= htmlspecialchars($keyword) ?>"
                        placeholder="Example: PHP">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category">
                        <option value="">-- Select Category --</option>
                        <option value="syntax" <?= $category === "syntax" ? "selected" : "" ?>>Syntax</option>
                        <option value="database" <?= $category === "database" ? "selected" : "" ?>>Database</option>
                        <option value="security" <?= $category === "security" ? "selected" : "" ?>>Security</option>
                    </select>
                </div>

                <input type="submit" name="search" value="Search">
            </form>
        </div>

        <?php if ($isSubmitted) { ?>
            <div class="result-box">
                <h2>GET Result</h2>

                <p><strong>Keyword:</strong> <?= htmlspecialchars($keyword) ?></p>
                <p><strong>Category:</strong> <?= htmlspecialchars($category) ?></p>

                <p>
                    Look at your browser URL after submitting the form.
                    You should see something like:
                </p>

                <pre>?keyword=PHP&amp;category=syntax&amp;search=Search</pre>
            </div>
        <?php } ?>

        <div class="info-box">
            <h2>Important Concept</h2>

            <p>
                The form input name becomes the key in <code>$_GET</code>.
            </p>

            <pre>&lt;input name="keyword"&gt;

$_GET["keyword"]</pre>

            <p>
                This is why the <code>name</code> attribute is very important
                when working with PHP forms.
            </p>
        </div>

    </div>

</body>
</html>
