<?php
  session_start();
  $title = "Register";
  $_SESSION['currentSite'] = "newPost";
  require_once 'partials/top_html.php';
?>

  <div>write new post</div>

<?php
  require_once 'partials/bottom_html.php';
?>