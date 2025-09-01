<?php
  session_start();
  $title = "My Profile";
  $_SESSION['currentSite'] = "myProfile";
  require_once 'partials/top_html.php';
  if (!isset($_SESSION["logged_in"])) {
    header("Location: index.php");
    exit;
  }
?>

<div class="card mb-3" style="max-width: 640px;">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($_SESSION["username"]) ?></h5>
        <p class="card-text">Role: <?= htmlspecialchars($_SESSION["role"]) ?></p>
        <p class="card-text">Number of posts: 25</p>
        <p class="card-text"><small class="text-muted">Joined: <?= htmlspecialchars($_SESSION["profile_created_at"]) ?></small></p>
      </div>
    </div>
  </div>
</div>

<h3>My latest posts</h3>

<div>multiple divs</div>

<?php
  require_once 'partials/bottom_html.php';
?>
