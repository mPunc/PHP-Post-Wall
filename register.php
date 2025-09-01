<?php
  session_start();
  $title = "Register";
  $_SESSION['currentSite'] = "register";
  require_once 'partials/top_html.php';
  if (isset($_SESSION["logged_in"])) {
    header("Location: index.php");
    exit;
  }
?>

  <h2>Register</h2>
  <form method="post" action="utils/register_util.php">
    <div class="mb-3 col-10 col-md-5">
      <label for="username" class="form-label">Username:</label>
      <input type="text" id="username" name="username" class="form-control" required>
    </div>

    <div class="mb-3 col-10 col-md-5">
      <label for="password" class="form-label">Password:</label>
      <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3 col-10 col-md-5">
      <label for="password_repeat" class="form-label">Repeat password:</label>
      <input type="password" id="password_repeat" name="password_repeat" class="form-control" required>
    </div>

    <div class="mb-3 col-10 col-md-5">
      <label for="role" class="form-label">Role:</label>
      <select id="role" name="role" class="form-select" required>
        <option value="user" selected>User</option>
        <option value="admin">Admin</option>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Register</button>
  </form>

<?php
  require_once 'partials/bottom_html.php';
?>
