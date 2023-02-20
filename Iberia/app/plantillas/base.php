<!DOCTYPE html>
<html>

<head>
  <title>Iberia</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href='web/css/base.css' />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="web/js/mostrarOcupacion.js"></script>
</head>

<body class="p-3">
  <header>
    <h1>AdrianAIR</h1>
  </header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <img src="/web/imagenes/plane.png" alt="" width="400" height="" class="d-inline-block align-text-top img-fluid">
      <a class="navbar-brand" href="index.php?ctl=inicio">La mejor aerolínea</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

        <?php if (!empty($_SESSION['correo'])) : ?>
          <?php $userLogued = ucfirst(explode('@', $_SESSION['correo'])[0])  ?>

          <div class="navbar-nav">
            <a class="nav-link active text-info" href="index.php?ctl=inicio">Inicio</a>
            <a class="nav-link active text-info" href="index.php?ctl=ocupacion">Mostrar Ocupación</a>
            <a class="nav-link active text-info" href="index.php?ctl=reserva">Reservar</a>
            <a class="nav-link active text-info"><?= 'Hola ' . $userLogued  ?></a>
            <form action="" method="post"><input class="btn btn-danger" type="submit" name="logout" value="Log Out"></form>

          </div>

        <?php else : ?>

          <div class="navbar-nav">
            <a class="nav-link active text-info" href="index.php?ctl=login">Login</a>
            <a class="nav-link active text-info" href="index.php?ctl=registro">Registrar</a>
          </div>

        <?php endif; ?>

      </div>
    </div>
  </nav>

  <?php

  if (isset($_POST['logout'])) {
    unset($_SESSION['correo']);
    session_unset();
    session_destroy();
    echo ('Sesion cerrada');

    header("Refresh:1; url=/index.php?ctl=registro", true, 303);
  } ?>


  <div id="contenido">

    <?= $contenido ?>
  </div>


  <footer class="py-3 my-4">
    <hr>
    <p class="text-center text-muted">© 2023 AdrianAIR, Inc</p>
  </footer>

</body>

</html>