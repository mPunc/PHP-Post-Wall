<?php
  session_start();
  $title = "Post Wall";
  $_SESSION['currentSite'] = "home";
  require_once 'partials/top_html.php';
?>
<!---
maybe delete this part
<?php if (isset($_SESSION["logged_in"])): ?>
  <h2 class="mb-3">
    You are logged in as <?= htmlspecialchars($_SESSION["role"]) ?>
  </h2>
<?php endif; ?>
--->

  <div class="card mb-3 bg-light">
    <div class="card-header">
      <div class="d-flex justify-content-start align-items-center flex-row flex-wrap gap-2">
        <img src="avatars/default.png" class="rounded-circle me-2" alt="User avatar" loading="lazy" style="width:36px;height:36px;object-fit:cover;display:block;">
        <div>Username</div>
        <p class="card-text"><small class="text-muted">Updated at: </small></p>
      </div>
    </div>

    <div class="card-body">
      <div class="d-flex justify-content-start align-items-start flex-row flex-wrap gap-5">
        <h5 class="card-title">Post title</h5>
        <p class="card-text"><small class="text-muted">Created at: </small></p>
      </div>
      <div class="d-flex justify-content-start flex-row flex-wrap flex-md-nowrap">
        <p class="card-text">Post text: Lorem ipsum dolor sit amet...Lorem ipsum dolor sit amet...Lorem ipsum dolor sit amet...Lorem ipsum dolor sit amet...Lorem ipsum dolor sit amet...Lorem ipsum dolor sit amet...Lorem ipsum dolor sit amet...</p>
        <img src="images/StockCake-Starry night reflection_1756763170.jpg"
          class="img-fluid d-block rounded"
          style="max-width:100%; height:auto; max-height:240px;"
          alt="Post picture" loading="lazy"
        >
      </div>
    </div>

    <div class="card-footer text-body-secondary">
      See full post link (2 comments)
    </div>
  </div>
      
<?php
  require_once 'partials/bottom_html.php';
?>
