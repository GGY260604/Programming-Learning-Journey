<?php
/*
  FILE: includes/helpers.php
  TOPIC: CH11 - Include Require and File Organization

  PURPOSE:
  - This file stores reusable helper functions.

  IMPORTANT:
  - require_once is useful for helper files because loading the same function
    more than one time can cause a fatal error.
*/

function safeOutput($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}

function showBooleanText($value) {
    return $value ? "true" : "false";
}
