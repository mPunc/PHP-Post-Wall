<ul class="nav flex-column">
  <li class="nav-item mb-1">
    <a class="nav-link text-light <?php if (isset($_SESSION['currentSite']) && $_SESSION['currentSite'] == 'home') echo'border border-2 rounded-4'; ?> "
    href="index.php">Home</a>
  </li>

  <?php if (!isset($_SESSION["logged_in"])): ?>
  <li class="nav-item mb-1">
    <a class="nav-link text-light <?php if (isset($_SESSION['currentSite']) && $_SESSION['currentSite'] == 'login') echo'border border-2 rounded-4'; ?> "
    href="login.php">Login</a>
  </li>
  <li class="nav-item mb-1">
    <a class="nav-link text-light <?php if (isset($_SESSION['currentSite']) && $_SESSION['currentSite'] == 'register') echo'border border-2 rounded-4'; ?> "
    href="register.php">Register</a>
  </li>
  <?php endif; ?>

  <?php if (isset($_SESSION["logged_in"]) && $_SESSION["role"] == "admin"): ?>
  <li class="nav-item mb-1">
    <a class="nav-link text-light <?php if (isset($_SESSION['currentSite']) && $_SESSION['currentSite'] == 'adminUsers') echo'border border-2 rounded-4'; ?> "
    href="admin_users.php">Manage users</a>
  </li>
  <li class="nav-item mb-1">
    <a class="nav-link text-light <?php if (isset($_SESSION['currentSite']) && $_SESSION['currentSite'] == 'adminPosts') echo'border border-2 rounded-4'; ?> "
    href="admin_posts.php">Manage posts</a>
  </li>
  <?php endif; ?>

  <?php if (isset($_SESSION["logged_in"])): ?>
  <li class="nav-item mb-1">
    <a class="nav-link text-light <?php if (isset($_SESSION['currentSite']) && $_SESSION['currentSite'] == 'myProfile') echo'border border-2 rounded-4'; ?> "
    href="my_profile.php">My profile</a>
  </li>
  <li class="nav-item mb-1">
    <a class="nav-link text-light <?php if (isset($_SESSION['currentSite']) && $_SESSION['currentSite'] == 'newPost') echo'border border-2 rounded-4'; ?> "
    href="new_post.php">New Post</a>
  </li>
  <li class="nav-item mb-1">
    <a class="nav-link text-light rounded-4 bg-danger"
    href="utils/logout_util.php">Logout</a>
  </li>
  <?php endif; ?>

</ul>