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
    <div class="mb-3 col-10 col-md-8">
      <label for="username" class="form-label">Username:</label>
      <input type="text" id="username" name="username" class="form-control"
        pattern="[A-Za-z0-9_]{4,36}"
        maxlength="36"
        title="Username must be 4-36 characters long and can only contain letters, numbers and underscores."
        required
      >
      <div class="invalid-feedback">
        Username must be 4-36 characters long and can only contain letters, numbers and underscores.
      </div>
    </div>

    <div class="mb-3 col-10 col-md-8">
      <label for="password" class="form-label">Password:</label>
      <input type="password" id="password" name="password" class="form-control"
        pattern="^\S{4,64}$"
        maxlength="64"
        title="4-64 characters and no spaces."
        required
      >
      <div class="invalid-feedback">
        4-64 characters. Can include uppercase, lowercase, number and special characters.
      </div>
    </div>

    <div class="mb-3 col-10 col-md-8">
      <label for="password_repeat" class="form-label">Repeat password:</label>
      <input type="password" id="password_repeat" name="password_repeat" class="form-control"
        pattern="^\S{4,64}$"
        maxlength="64"
        title="Please match passwords."
        required
      >
      <div class="invalid-feedback">
        Please match passwords.
      </div>
    </div>

    <div class="mb-3 col-10 col-md-8">
      <label for="role" class="form-label">Role:</label>
      <select id="role" name="role" class="form-select" required>
        <option value="user" selected>User</option>
        <option value="admin">Admin</option>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Register</button>
  </form>

<?php if (isset($_SESSION["error_message"])): ?>
  <div class="alert alert-danger alert-dismissible fade show mt-4 col-10 col-md-8" role="alert">
    <?= htmlspecialchars($_SESSION["error_message"]) ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php
  unset($_SESSION["error_message"]);
  endif;
?>

<?php
  require_once 'partials/bottom_html.php';
?>
