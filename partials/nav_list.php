<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link text-light <?php if (isset($_SESSION['currentSite']) && $_SESSION['currentSite'] == 'home') echo'border border-2 rounded-4'; ?> "
    href="index.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light <?php if (isset($_SESSION['currentSite']) && $_SESSION['currentSite'] == 'login') echo'border border-2 rounded-4'; ?> "
    href="login.php">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light <?php if (isset($_SESSION['currentSite']) && $_SESSION['currentSite'] == 'register') echo'border border-2 rounded-4'; ?> "
    href="register.php">Register</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-light <?php if (isset($_SESSION['currentSite']) && $_SESSION['currentSite'] == 'newPost') echo'border border-2 rounded-4'; ?> "
    href="new_post.php">New Post</a>
  </li>
</ul>