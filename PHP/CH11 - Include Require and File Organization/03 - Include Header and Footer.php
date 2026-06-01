<?php
/*
  FILE: 03 - Include Header and Footer.php
  TOPIC: CH11 - Include Require and File Organization

  GOAL:
  - Learn how to reuse the same page header.
  - Learn how to reuse the same page footer.
  - Understand why include/require helps organize a PHP website.

  IMPORTANT:
  - Header and footer are repeated in many pages.
  - Instead of copying them into every file, we can store them in separate files.
*/

/*
  This variable is used by includes/header.php.
  The header file will display this value inside <title> and <h1>.
*/

$pageTitle = "CH11 - Include Header and Footer";

/*
  Load the reusable header.
  require is used because this page needs the header layout.
*/

require __DIR__ . "/includes/header.php";
?>

        <div class="box">
            <h2>Main Page Content</h2>
            <p>This part is written inside <code>03 - Include Header and Footer.php</code>.</p>
            <p>The top part of the page comes from <code>includes/header.php</code>.</p>
            <p>The bottom part of the page comes from <code>includes/footer.php</code>.</p>
        </div>

        <div class="box">
            <h2>Why is this useful?</h2>
            <ul class="info-list">
                <li>If you want to change the header, you only edit one file.</li>
                <li>If you want to change the footer, you only edit one file.</li>
                <li>This makes the project easier to maintain.</li>
            </ul>
        </div>

        <div class="box">
            <h2>Main Code</h2>
            <pre>require __DIR__ . "/includes/header.php";

// Page content here

require __DIR__ . "/includes/footer.php";</pre>
        </div>

<?php
/*
  Load the reusable footer.
  The footer file closes the container, body, and html tags.
*/

require __DIR__ . "/includes/footer.php";
?>
