<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Welcome to CodeIgniter 4!</title>
  <meta name="description" content="The small framework with powerful features">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="/favicon.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('styles/global.css') ?>">
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="vh-100 d-flex flex-column">
  <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark" aria-label="Main navigation">
    <div class="container">
      <div class="d-flex align-items-center">
        <span class="navbar-brand mb-0 h1 fw-semibold">SISGETHT</span>
        <?php foreach (auth()->user()->getGroups() as $group) : ?>
          <span class="badge rounded-pill text-bg-light">
            <?php
            switch ($group) {
              case 'admin':
                echo 'admin';
                break;
              case 'boss':
                echo 'jefe';
                break;
              case 'secretary':
                echo 'secretaria';
                break;
              case 'worker':
                echo 'trabajador';
                break;
              default:
                # code...
                break;
            }
            ?>
          </span>
        <?php endforeach; ?>
      </div>
      <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <div class="d-flex navbar-nav ms-auto">
          <a href="<?= base_url('logout') ?>" class="btn btn-sm btn-outline-light">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </nav>

  <main class="container my-4 h-100 overflow-hidden">
    <?= $this->renderSection('content') ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script>
    feather.replace({
      width: 16,
      height: 16,
    })
  </script>
  <?= $this->renderSection('scripts') ?>
</body>

</html>