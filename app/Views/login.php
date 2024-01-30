<!DOCTYPE html>
<html lang="es">

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
  <link rel="stylesheet" href="styles/global.css">
  <link rel="stylesheet" href="styles/sign-in.css">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
  <main class="form-signin w-100 m-auto">

    <?php if (session('error') !== null) : ?>
      <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
    <?php elseif (session('errors') !== null) : ?>
      <div class="alert alert-danger" role="alert">
        <?php if (is_array(session('errors'))) : ?>
          <?php foreach (session('errors') as $error) : ?>
            <?= $error ?>
            <br>
          <?php endforeach ?>
        <?php else : ?>
          <?= session('errors') ?>
        <?php endif ?>
      </div>
    <?php endif ?>

    <?php if (session('message') !== null) : ?>
      <div class="alert alert-success" role="alert"><?= session('message') ?></div>
    <?php endif ?>

    <form action="<?= url_to('login') ?>" method="post">
      <h1 class="display-5 fw-semibold text-center mb-4">SISGETHT</h1>

      <div class="form-floating">
        <input type="email" name="email" class="form-control" required id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Correo electrónico</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" required id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Contraseña</label>
      </div>

      <div class="form-check text-start my-4">
        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Remember me
        </label>
      </div>
      <button class="btn btn-dark w-100 py-2" type="submit">Iniciar sesión</button>
    </form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>