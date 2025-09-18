<?php
  session_start();
  $_SESSION['currentSite'] = "";
  $title = "Post Wall";
  require_once 'partials/top_html.php';
  if ($_SERVER["REQUEST_METHOD"] != "GET") {
    header("Location: index.php");
    exit;
  }
?>

<?php
  if(isset($_GET["id"])) {
    require_once "utils/db_connection.php";

    $id = intval($_GET["id"]);

    $query = "SELECT p.*, u.username, u.avatar 
          FROM posts p 
          JOIN users u ON p.user_id = u.id 
          WHERE p.id = ?";
    $prepare_query = $connection->prepare($query);
    $prepare_query->bind_param("i", $id);
    $prepare_query->execute();
    $post = $prepare_query->get_result()->fetch_assoc();
    if (!$post) {
      header("Location: index.php");
      exit;
    }
  }
  else {
    header("Location: index.php");
    exit;
  }
?>

<div class="card shadow-sm">
  <div class="card-header d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
      <img src="avatars/<?= htmlspecialchars($post['avatar'] ?? 'default.png') ?>" 
            class="rounded-circle me-2" alt="User avatar" 
            style="width:40px;height:40px;object-fit:cover;">
      <div>
        <strong><?= htmlspecialchars($post['username']) ?></strong><br>
        <small class="text-muted">Updated at: <?= $post['updated_at'] ?></small>
      </div>
    </div>

    <?php if (isset($_SESSION["logged_in"]) && $post['user_id'] == $_SESSION["user_id"]): ?>
      <div class="d-flex gap-2">
        <form action="edit_post.php" method="POST">
          <input type="hidden" name="id" value="<?= htmlspecialchars($post['id']) ?>">
          <input type="hidden" name="user_id" value="<?= htmlspecialchars($post['user_id']) ?>">
          <button type="submit" class="btn btn-sm btn-dark">Edit</button>
        </form>
        <form action="utils/from_card_delete.php" method="POST" 
              onsubmit="return confirm('Are you sure you want to delete this post?');">
          <input type="hidden" name="id" value="<?= htmlspecialchars($post['id']) ?>">
          <input type="hidden" name="user_id" value="<?= htmlspecialchars($post['user_id']) ?>">
          <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
      </div>
    <?php endif; ?>
  </div>

  <div class="card-body">
    <h3 class="card-title mb-3"><?= htmlspecialchars($post['title']) ?></h3>
    <p class="card-text" style="white-space: pre-wrap;"><?= htmlspecialchars($post['content']) ?></p>

    <?php if (!empty($post['image'])): ?>
      <img src="images/<?= htmlspecialchars($post['image']) ?>"
            class="img-fluid rounded mt-3"
            alt="Post image">
    <?php endif; ?>
  </div>

  <div class="card-footer text-muted">
    Created at: <?= $post['created_at'] ?>
  </div>
</div>

<div class="mt-4">
  <h5>Comments</h5>
  <hr>
  <?php
    $comments_query = "SELECT c.id, c.content, c.created_at, u.username, u.avatar
          FROM comments c
          JOIN users u ON c.user_id = u.id
          WHERE c.post_id = ?
          ORDER BY c.created_at DESC";
    $prepare_query = $connection->prepare($comments_query);
    $prepare_query->bind_param("i", $id);
    $prepare_query->execute();
    $comments = $prepare_query->get_result()->fetch_all(MYSQLI_ASSOC);
    if ($comments != null) {
      foreach ($comments as $comment) {
        include "partials/comment_display.php";
      }
    }
  ?>

  <?php if (isset($_SESSION['logged_in'])): ?>
    <form action="utils/comment_add.php" method="POST" class="mt-3">
      <input type="hidden" name="post_id" value="<?= htmlspecialchars($post['id']) ?>">
      <div class="mb-3">
        <textarea name="content" class="form-control" rows="3" placeholder="Write a comment..." required></textarea>
      </div>
      <button type="submit" class="btn btn-outline-dark">Post Comment</button>
    </form>
  <?php else: ?>
    <p><a href="login.php">Log in</a> to comment.</p>
  <?php endif; ?>
</div>

<?php
  $connection->close();
  require_once 'partials/bottom_html.php';
?>
