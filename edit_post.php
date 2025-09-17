<?php
  session_start();
  $title = "New post";
  $_SESSION['currentSite'] = "newPost";
  require_once 'partials/top_html.php';
  if (!isset($_SESSION["logged_in"]) || $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit;
  }
?>

<?php
  if (isset($_POST["id"]) && $_POST["user_id"] == $_SESSION["user_id"]) {
    require_once "utils/db_connection.php";

    $id = intval($_POST["id"]);
    
    $query = "SELECT user_id, title, content, image FROM posts WHERE id = ?";
    $prepare_query = $connection->prepare($query);
    $prepare_query->bind_param("i", $id);
    $prepare_query->execute();
    $post = $prepare_query->get_result()->fetch_assoc();
  }
  else {
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

  <form action="utils/edit_post_util.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <input type="hidden" name="user_id" value="<?= htmlspecialchars($post['user_id']) ?>">
    <div class="card-body">
      <div class="mb-3">
        <label for="title" class="form-label">Post title</label>
        <input type="text" class="form-control" id="title" name="title" required value="<?= htmlspecialchars($post['title']) ?>">
      </div>

      <div class="mb-3">
        <label for="content" class="form-label">Post content</label>
        <textarea class="form-control" id="content" name="content" rows="10" required><?= htmlspecialchars($post['content']) ?></textarea>
      </div>

      <?php if ($post['image'] !== null): ?>
        <img src="images/<?= $post['image']?>"
          class="img-fluid d-block rounded"
          style="max-width:100%; height:auto; max-height:240px;"
          alt="Post picture" loading="lazy"
        >
      <?php endif; ?>

      <div class="mb-3">
        <label for="image" class="form-label">Upload new image (overwrites old)</label>
        <input class="form-control" type="file" id="image" name="image" accept="image/*">
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

      <button type="submit" class="btn btn-success">Update</button>
    </div>
  </form>
</div>

<?php
  require_once 'partials/bottom_html.php';
?>
