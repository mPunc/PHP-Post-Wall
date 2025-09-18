<?php
  require_once "utils/auth.php";

  session_start();
  requireAdmin();
  $title = "Manage posts";
  $_SESSION['currentSite'] = "adminPosts";

  require_once 'partials/top_html.php';

  require_once "utils/db_connection.php";
  $sql = "SELECT p.id, p.title, p.comment_count, p.created_at, p.updated_at, u.username FROM posts p
          JOIN users u ON p.user_id = u.id
          ORDER BY p.updated_at DESC";
  $posts = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<h1 class="mb-4">Manage Posts</h1>

<div class="table-responsive">
  <table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">Created</th>
        <th scope="col">Updated</th>
        <th scope="col">Comment count</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($posts as $post): ?>
      <tr>
        <td><?= htmlspecialchars($post['id']) ?></td>
        <td><?= htmlspecialchars($post['title']) ?></td>
        <td><?= htmlspecialchars($post['username']) ?></td>
        <td><?= htmlspecialchars($post['created_at']) ?></td>
        <td><?= htmlspecialchars($post['updated_at']) ?></td>
        <td><?= htmlspecialchars($post['comment_count']) ?></td>
        <td>
          <a href="utils/admin_delete_post.php?id=<?= urlencode($post['id']) ?>" 
            class="btn btn-sm btn-danger"
            onclick="return confirm('Are you sure you want to delete this post?');">
            Delete
          </a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php
  require_once 'partials/bottom_html.php';
?>
