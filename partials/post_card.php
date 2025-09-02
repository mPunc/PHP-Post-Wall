<div class="card mb-3 bg-light">
  <div class="card-header">
    <div class="d-flex justify-content-start align-items-center flex-row flex-wrap gap-2">
      <img src="avatars/<?= $post['avatar']?>" class="rounded-circle me-2" alt="User avatar" loading="lazy" style="width:36px;height:36px;object-fit:cover;display:block;">
      <div><?= $post['username']?></div>
      <p class="card-text ms-4"><small class="text-muted">Updated at: <?= $post['updated_at']?></small></p>
    </div>
  </div>

  <div class="card-body">
    <div class="d-flex justify-content-start align-items-start flex-row flex-wrap gap-5">
      <h5 class="card-title"><?= $post['title']?></h5>
      <p class="card-text"><small class="text-muted">Created at: <?= $post['created_at']?></small></p>
    </div>
    <div class="d-flex justify-content-between flex-row flex-wrap flex-md-nowrap">
      <p class="card-text"><?= $post['content']?></p>
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
    See full post (<?= $post['comment_count']?> comments)
  </div>
</div>
