<?php
  session_start();
  $title = "Post Wall";
  $_SESSION['currentSite'] = "home";
  require_once 'partials/top_html.php';
?>
<?php if (isset($_SESSION["logged_in"])): ?>
  <h2 class="mb-3">
    You are logged in as <?= htmlspecialchars($_SESSION["role"]) ?>
  </h2>
<?php endif; ?>


  <div class="card mb-3 bg-light">
    <div class="card-body">
      <h5 class="card-title">Example post</h5>
      <p class="card-text">Lorem ipsum dolor sit amet...</p>
    </div>
  </div>
  <div class="card mb-3 bg-light">
    <div class="card-body">
      <h5 class="card-title">Example post</h5>
      <p class="card-text">Lorem ipsum dolor sit amet...</p>
    </div>
  </div>
      
<?php
  require_once 'partials/bottom_html.php';
?>
