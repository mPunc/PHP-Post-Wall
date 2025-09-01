<?php
  session_start();
  $title = "Login";
  $_SESSION['currentSite'] = "login";
  require_once 'partials/top_html.php';
?>

  <div>login content</div>

<?php
  require_once 'partials/bottom_html.php';
?>