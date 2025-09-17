<?php

function requireAdmin() {
  if (!isset($_SESSION["logged_in"]) || !$_SESSION["role"] == "admin") {
    header("Location: index.php");
    exit;
  }
}

function isAdmin() {
  return isset($_SESSION["logged_in"]) && $_SESSION["role"] == "admin";
}

?>
