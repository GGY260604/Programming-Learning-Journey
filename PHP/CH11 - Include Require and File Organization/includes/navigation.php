<?php
/*
  FILE: includes/navigation.php
  TOPIC: CH11 - Include Require and File Organization

  PURPOSE:
  - This file stores a reusable navigation menu.

  IMPORTANT:
  - The main file can set $currentPage before including this file.
  - We use $currentPage to add the active class to the current link.
*/

$currentPage = $currentPage ?? "";

$menuItems = [
    "home" => "03 - Include Header and Footer.php",
    "navigation" => "04 - Reusable Navigation.php",
    "config" => "05 - Config File Concept.php"
];
?>

<nav>
    <?php foreach ($menuItems as $key => $fileName) { ?>
        <a class="<?= $currentPage === $key ? 'active' : '' ?>" href="<?= htmlspecialchars($fileName) ?>">
            <?= ucfirst($key) ?>
        </a>
    <?php } ?>
</nav>
