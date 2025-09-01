<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= $title ?? "My Site" ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <div class="row min-vh-100 align-items-stretch">

      <?php require_once 'navbar.php'; ?>

      <main class="col-12 col-md-10 p-4 bg-light">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <button class="btn btn-outline-dark d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar" aria-label="Open menu">
            <span class="navbar-toggler-icon" style="display:inline-block; width:1.2rem; height:1.2rem; background-image: url('data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 30 30%22><path stroke=%22rgba(0,0,0,0.7)%22 stroke-width=%223%22 stroke-linecap=%22round%22 d=%22M4 7h22M4 15h22M4 23h22%22/></svg>'); background-repeat:no-repeat;"></span>
          </button>
        </div>
        <section>