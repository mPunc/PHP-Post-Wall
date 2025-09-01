<?php
  if(isset($_SESSION["username"])) {
    $helloText = "Hello, " . $_SESSION["username"];
  }
  else {
    $helloText = "Welcome, guest.";
  }
?>

<nav class="col-12 col-md-2 bg-black text-light p-3 d-none d-md-block position-sticky" style="top:0; height:100vh;">
  <h4><?= $helloText ?? "Post Wall" ?></h4>
  <?php require 'nav_list.php'; ?>
</nav>

<div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-light" id="mobileSidebarLabel"><?= $helloText ?? "Post Wall" ?></h5>
    <button type="button" class="btn-close text-reset btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <?php require 'nav_list.php'; ?>
  </div>
</div>
