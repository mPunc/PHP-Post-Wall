<?php
  session_start();
  $title = "New post";
  $_SESSION['currentSite'] = "newPost";
  require_once 'partials/top_html.php';
  if (!isset($_SESSION["logged_in"])) {
    header("Location: index.php");
    exit;
  }
?>

<div class="card mb-3 bg-light">
  <div class="card-header">
    <div class="d-flex justify-content-start align-items-center flex-row flex-wrap gap-2">
      <img src="avatars/<?= htmlspecialchars($_SESSION['user_avatar'] ?? 'default.png') ?>"
        class="rounded-circle me-2"
        alt="User avatar"
        loading="lazy"
        style="width:36px;height:36px;object-fit:cover;display:block;"
      >
      <div><?= htmlspecialchars($_SESSION['username']) ?></div>
    </div>
  </div>

  <form action="utils/new_post_util.php" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="mb-3">
        <label for="title" class="form-label">Post title</label>
        <input type="text" class="form-control" id="title" name="title" required>
      </div>

      <div class="mb-3">
        <label for="content" class="form-label">Post content</label>
        <textarea class="form-control" id="content" name="content" rows="10" required></textarea>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Upload image (optional)</label>
        <input class="form-control" type="file" id="image" name="image" accept="image/*">
      </div>

      <button type="submit" class="btn btn-success">Publish</button>
    </div>
  </form>
</div>

<?php
  require_once 'partials/bottom_html.php';
?>
