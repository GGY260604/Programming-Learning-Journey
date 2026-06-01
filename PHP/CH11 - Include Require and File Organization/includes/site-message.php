<?php
/*
  FILE: includes/site-message.php
  TOPIC: CH11 - Include Require and File Organization

  PURPOSE:
  - This file stores a small message.
  - It will be loaded by 01 - Include File.php using include.

  IMPORTANT:
  - Included files can contain normal PHP variables.
  - After this file is included, the main file can use $siteMessage.
*/

$siteMessage = "This message comes from includes/site-message.php.";
$lessonName = "PHP include statement";
