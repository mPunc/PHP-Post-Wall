<?php
  session_start();
  $title = "Login";
  $_SESSION['currentSite'] = "login";
  require_once 'partials/top_html.php';
  if (isset($_SESSION["logged_in"])) {
    header("Location: index.php");
    exit;
  }
?>

  <h2>Login</h2>
  <form method="post" action="utils/login_util.php">
    <div class="mb-3 col-10 col-md-5">
      <label for="username" class="form-label">Username:</label>
      <input type="text" id="username" name="username" class="form-control" required>
    </div>

    <div class="mb-3 col-10 col-md-5">
      <label for="password" class="form-label">Password:</label>
      <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Login</button>
  </form>

<?php
  require_once 'partials/bottom_html.php';
?>
