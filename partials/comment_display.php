<div class="card mb-2 shadow-sm">
  <div class="card-body d-flex align-items-start gap-2">
    <img src="avatars/<?= htmlspecialchars($comment['avatar'] ?? 'default.png') ?>" 
         class="rounded-circle" 
         alt="User avatar" 
         style="width:36px; height:36px; object-fit:cover;">

    <div class="flex-grow-1">
      <div class="d-flex justify-content-between align-items-start">
        <strong><?= htmlspecialchars($comment['username']) ?></strong>
        <small class="text-muted"><?= $comment['created_at'] ?></small>
      </div>
      <p class="mb-0" style="white-space: pre-wrap;"><?= htmlspecialchars($comment['content']) ?></p>
    </div>
  </div>
</div>
