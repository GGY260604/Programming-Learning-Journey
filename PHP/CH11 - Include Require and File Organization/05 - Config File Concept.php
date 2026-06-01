<?php
/*
  FILE: 05 - Config File Concept.php
  TOPIC: CH11 - Include Require and File Organization

  GOAL:
  - Learn how to store project settings in a config file.
  - Learn how to load reusable helper functions.
  - Understand why require_once is commonly used for config and helper files.

  IMPORTANT:
  - A config file stores values that may be used by many pages.
  - A helper file stores reusable functions.
  - require_once prevents loading the same file more than one time.
*/

require_once __DIR__ . "/includes/config.php";
require_once __DIR__ . "/includes/helpers.php";

$pageTitle = "CH11 - Config File Concept";
$currentPage = "config";

require __DIR__ . "/includes/header.php";
require __DIR__ . "/includes/navigation.php";
?>

        <div class="box">
            <h2>What is a Config File?</h2>
            <p>A config file stores project settings in one place.</p>
            <p>In a real PHP backend project, database connection settings are often placed in a config file.</p>
        </div>

        <div class="box output">
            <h2>Values from includes/config.php</h2>
            <p><strong>Application Name:</strong> <?= safeOutput($appConfig["app_name"]) ?></p>
            <p><strong>Environment:</strong> <?= safeOutput($appConfig["environment"]) ?></p>
            <p><strong>Debug Mode:</strong> <?= showBooleanText($appConfig["debug_mode"]) ?></p>
            <p><strong>Timezone:</strong> <?= safeOutput($appConfig["timezone"]) ?></p>
            <p><strong>Current Date and Time:</strong> <?= safeOutput(date("Y-m-d H:i:s")) ?></p>
        </div>

        <div class="box">
            <h2>Why use require_once?</h2>
            <p><code>require_once</code> loads a file only one time.</p>
            <p>This is useful for helper files because declaring the same function twice can cause an error.</p>
            <pre>require_once __DIR__ . "/includes/config.php";
require_once __DIR__ . "/includes/helpers.php";</pre>
        </div>

        <div class="box warning">
            <h2>Backend Connection</h2>
            <p>Later, when learning MySQL, we can store database settings in a config file and require it inside the database connection file.</p>
        </div>

<?php
require __DIR__ . "/includes/footer.php";
?>
