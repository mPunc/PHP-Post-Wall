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
  <div class="row g-0 mt-2">
    <div class="col-md-4">
      <img src="avatars/<?= htmlspecialchars($_SESSION["user_avatar"]) ?>"
        class="img-fluid rounded ms-2"
        style="max-width:100%; height:auto; max-height:240px;"
        alt="Your profile picture" loading="lazy"
      >
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($_SESSION["username"]) ?></h5>
        <p class="card-text">Role: <?= htmlspecialchars($_SESSION["role"]) ?></p>
        <p class="card-text"><small class="text-muted">Joined: <?= htmlspecialchars($_SESSION["profile_created_at"]) ?></small></p>
      </div>
    </div>
    <?php if (isset($_SESSION["error_message"])): ?>
    <div class="alert alert-danger alert-dismissible fade show mt-0 col-12" role="alert">
      <?= htmlspecialchars($_SESSION["error_message"]) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
      unset($_SESSION["error_message"]);
      endif;
    ?>
    <form action="utils/upload_avatar.php" method="post" enctype="multipart/form-data">
      <div class="d-flex flex-row flex-wrap justify-content-start col-10 mx-auto gap-2 mb-3 mt-3">
        <input type="file" name="avatar_upload" class="form-control" accept="image/*" required>
        <button type="submit" class="btn btn-success">Update avatar</button>
      </div>
    </form>
  </div>
</div>

<h3>My posts:</h3>

<?php
  require_once "utils/posts_util.php";
  require_once "utils/db_connection.php";

  $posts = getAllPosts($connection, $_SESSION["user_id"]);
  $connection->close();

  foreach ($posts as $post) {
    include "partials/post_card.php";
  }
?>

<?php
  require_once 'partials/bottom_html.php';
?>
