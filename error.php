<?php
  session_start();
  $title = "Register";
  $_SESSION['currentSite'] = "register";
  require_once 'partials/top_html.php';
?>

<div class="mb-3">
  <h2>Oops! Something went wrong.</h2>
  <small class="text-muted">Please go back to the home page.</small>
</div>

<button class="btn btn-primary">
  <a class="nav-link" href="index.php">Go back home</a>
</button>

<?php
  require_once 'partials/bottom_html.php';
?>