<?php
  $title = "Post Wall";
  require_once 'partials/top_html.php';
?>

  <div class="container-fluid">
    <div class="row min-vh-100 align-items-stretch">

      <!-- Desktop sidebar: visible on md+ -->
      <nav class="col-12 col-md-2 bg-black text-light p-3 d-none d-md-block position-sticky" style="top:0; height:100vh;">
        <h4>Hello, user</h4>
        <ul class="nav flex-column">
          <!-- border means highlight -->
          <li class="nav-item"><a class="nav-link text-light border border-2 rounded-4" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link text-light" href="login.php">Login</a></li>
          <li class="nav-item"><a class="nav-link text-light" href="#">Register</a></li>
          <li class="nav-item"><a class="nav-link text-light" href="#">New Post</a></li>
        </ul>
      </nav>

      <!-- Offcanvas for small screens: toggled by hamburger -->
      <div class="d-md-none">
        <!-- Offcanvas markup (will slide in from left) -->
        <div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title text-light" id="mobileSidebarLabel">Hello, user</h5>
            <button type="button" class="btn-close text-reset btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="nav flex-column">
              <li class="nav-item"><a class="nav-link text-light border border-2 rounded-4" href="#">Home</a></li>
              <li class="nav-item"><a class="nav-link text-light" href="login.php">Login</a></li>
              <li class="nav-item"><a class="nav-link text-light" href="#">Register</a></li>
              <li class="nav-item"><a class="nav-link text-light" href="#">New Post</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Main content column -->
      <main class="col-12 col-md-10 p-4 bg-light">
        <!-- TOP BAR: contains hamburger (visible only on small screens) -->
        <div class="d-flex justify-content-between align-items-center mb-4">
          <!-- Hamburger visible only on small screens -->
          <button class="btn btn-outline-dark d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar" aria-label="Open menu">
            <!-- simple hamburger icon -->
            <span class="navbar-toggler-icon" style="display:inline-block; width:1.2rem; height:1.2rem; background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 30 30%22><path stroke=%22rgba(0,0,0,0.7)%22 stroke-width=%223%22 stroke-linecap=%22round%22 d=%22M4 7h22M4 15h22M4 23h22%22/></svg>'); background-repeat:no-repeat;"></span>
          </button>

          <div>
            <h1 class="h4 mb-0">Welcome to your Post Wall</h1>
            <small class="text-muted">This is where the posts will appear.</small>
          </div>
        </div>

        <!-- Example content (posts) -->
        <section>
          <div class="card mb-3 bg-light">
            <div class="card-body">
              <h5 class="card-title">Example post</h5>
              <p class="card-text">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          <div class="card mb-3 bg-light">
            <div class="card-body">
              <h5 class="card-title">Example post</h5>
              <p class="card-text">Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
          <!-- more posts... -->
        </section>
      </main>

    </div>
  </div>

<?php
  require_once 'partials/bottom_html.php';
?>
