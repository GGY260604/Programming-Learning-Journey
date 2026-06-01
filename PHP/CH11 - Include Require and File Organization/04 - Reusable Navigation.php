<?php
/*
  FILE: 04 - Reusable Navigation.php
  TOPIC: CH11 - Include Require and File Organization

  GOAL:
  - Learn how to reuse a navigation menu.
  - Learn how to use a variable to highlight the current page.
  - Understand how included files can use variables from the main file.

  IMPORTANT:
  - The main file sets $currentPage before including navigation.php.
  - The included navigation file uses $currentPage to decide which menu item is active.
*/

$pageTitle = "CH11 - Reusable Navigation";
$currentPage = "navigation";

require __DIR__ . "/includes/header.php";
require __DIR__ . "/includes/navigation.php";
?>

        <div class="box">
            <h2>Reusable Navigation Menu</h2>
            <p>The navigation above comes from <code>includes/navigation.php</code>.</p>
            <p>This page sets <code>$currentPage = "navigation";</code> before loading the navigation file.</p>
        </div>

        <div class="box output">
            <h2>Current Page Value</h2>
            <p><strong>$currentPage:</strong> <?= htmlspecialchars($currentPage) ?></p>
        </div>

        <div class="box">
            <h2>How the Active Link Works</h2>
            <p>The navigation file compares each menu key with <code>$currentPage</code>.</p>
            <pre>class="&lt;?= $currentPage === $key ? 'active' : '' ?&gt;"</pre>
            <p>If the values are the same, the link receives the <code>active</code> CSS class.</p>
        </div>

        <div class="box warning">
            <h2>Important Reminder</h2>
            <p>Reusable navigation is useful because most pages in a website need the same menu.</p>
        </div>

<?php
require __DIR__ . "/includes/footer.php";
?>
