<div class="card mb-3 bg-light">
  <div class="card-header d-flex justify-content-between">
    <div class="d-flex justify-content-start align-items-center flex-row flex-wrap gap-2">
      <img src="avatars/<?= $post['avatar']?>" class="rounded-circle me-2" alt="User avatar" loading="lazy" style="width:36px;height:36px;object-fit:cover;display:block;">
      <div><?= htmlspecialchars($post['username'])?></div>
      <p class="card-text ms-4"><small class="text-muted">Updated at: <?= $post['updated_at']?></small></p>
    </div>

    <?php if(isset($_SESSION["logged_in"]) && $post['user_id'] == $_SESSION["user_id"]): ?>
      <div class="d-flex flex-row align-items-center gap-2">
        <form action="edit_post.php" method="POST">
          <input type="hidden" name="id" value="<?= htmlspecialchars($post['id']) ?>">
          <input type="hidden" name="user_id" value="<?= htmlspecialchars($post['user_id']) ?>">
          <button type="submit" class="btn btn-dark" 
            aria-label="Edit post">EDIT</button>
        </form>
        <form action="utils/from_card_delete.php" method="POST">
          <input type="hidden" name="id" value="<?= htmlspecialchars($post['id']) ?>">
          <input type="hidden" name="user_id" value="<?= htmlspecialchars($post['user_id']) ?>">
          <button type="submit" class="btn-close" 
            onclick="return confirm('Are you sure you want to delete this post?');"
            aria-label="Delete post"></button>
        </form>
      </div>
    <?php endif; ?>

  </div>

  <div class="card-body">
    <div class="d-flex justify-content-start align-items-start flex-row flex-wrap gap-5">
      <h5 class="card-title"><?= $post['title']?></h5>
      <p class="card-text"><small class="text-muted">Created at: <?= $post['created_at']?></small></p>
    </div>
    <div class="d-flex justify-content-between flex-row flex-wrap flex-md-nowrap">
      <p class="card-text" style="white-space: pre-wrap;"><?= htmlspecialchars($post['content']) ?></p>
      <?php if ($post['image'] !== null): ?>
      <img src="images/<?= $post['image']?>"
        class="img-fluid d-block rounded"
        style="max-width:100%; height:auto; max-height:240px;"
        alt="Post picture" loading="lazy"
      >
      <?php endif; ?>
    </div>
  </div>

  <div class="card-footer text-body-secondary">
    See full post (<?= htmlspecialchars($post['comment_count'])?> comments)
  </div>
</div>
