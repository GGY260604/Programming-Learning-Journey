<?php
/*
  FILE: includes/header.php
  TOPIC: CH11 - Include Require and File Organization

  PURPOSE:
  - This is a reusable header file.
  - It contains the starting HTML layout.

  IMPORTANT:
  - The main page should set $pageTitle before including this file.
  - If $pageTitle is not set, we provide a default value.
*/

$pageTitle = $pageTitle ?? "CH11 - PHP Include and Require";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--
      This header is loaded from includes/header.php.
      Example of escaped PHP tag:
      &lt;?php include "includes/header.php"; ?&gt;
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1><?= htmlspecialchars($pageTitle) ?></h1>
