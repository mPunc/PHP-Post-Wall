<?php
  require_once "utils/auth.php";

  session_start();
  requireAdmin();
  $title = "Manage users";
  $_SESSION['currentSite'] = "adminUsers";

  require_once 'partials/top_html.php';

  require_once "utils/db_connection.php";
  $sql = "SELECT id, username, role, avatar, created_at FROM users ORDER BY id ASC";
  $users = $connection->query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<h1 class="mb-4">Manage Users</h1>

<div class="table-responsive">
  <table class="table table-striped table-bordered align-middle">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Avatar</th>
        <th scope="col">Username</th>
        <th scope="col">Role</th>
        <th scope="col">Created</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
      <tr>
        <td><?= htmlspecialchars($user['id']) ?></td>
        <td>
          <?php if (!empty($user['avatar'])): ?>
            <img src="avatars/<?= htmlspecialchars($user['avatar']) ?>" class="img-thumbnail" style="width:50px; height:50px; object-fit:cover;">
          <?php else: ?>
            <span class="text-muted">No avatar</span>
          <?php endif; ?>
        </td>
        <td><?= htmlspecialchars($user['username']) ?></td>
        <td>
          <?php if ($user['role'] === 'admin'): ?>
            <span class="badge bg-primary">Admin</span>
          <?php else: ?>
            <span class="badge bg-secondary">User</span>
          <?php endif; ?>
        </td>
        <td><?= htmlspecialchars($user['created_at']) ?></td>
        <td>
          <?php if ($user['role'] !== 'admin'): ?>
            <a href="utils/admin_delete_user.php?id=<?= urlencode($user['id']) ?>" 
              class="btn btn-sm btn-danger"
              onclick="return confirm('Are you sure you want to delete this user?');">
              Delete
            </a>
          <?php else: ?>
            <span class="text-muted">Cannot delete</span>
          <?php endif; ?>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php
  require_once 'partials/bottom_html.php';
?>
