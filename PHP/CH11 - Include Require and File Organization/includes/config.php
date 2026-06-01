<?php
/*
  FILE: includes/config.php
  TOPIC: CH11 - Include Require and File Organization

  PURPOSE:
  - This file represents a simple project configuration file.

  REAL BACKEND EXAMPLE:
  - Later, database settings such as host, database name, username, and password
    can also be placed in a config file.
*/

$appConfig = [
    "app_name" => "PHP Backend Tutorial",
    "environment" => "development",
    "debug_mode" => true,
    "timezone" => "Asia/Kuala_Lumpur"
];

date_default_timezone_set($appConfig["timezone"]);
