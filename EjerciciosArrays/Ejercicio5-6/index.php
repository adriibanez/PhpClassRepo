<?php
//INCLUDES
include 'inc/notas.inc';
include 'inc/expedienteRandom.inc';
include 'inc/alumnoRandom.inc';
include 'inc/arrayNotasCurso.inc';
include 'inc/notaMedia.inc';
include 'inc/notaMediaString.inc';
include 'inc/cuentaNotas.inc';

//VARIABLES ÚTILES
$arrayNotasCurso = getArrayNotasCurso();
$notaMedia = getNotaMedia($arrayNotasCurso);
$notaMediaString = getNotaMediaString($notaMedia, $arrayNotas);

$expedienteRandom = getExpedienteRandom();
$fullNomRandom = getFullNomRandom($arrayNombres);

$arrayNotasCount = getNotasCount($arrayNotasCurso);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <script type="module" src="js/coloresNotas.js"></script>

  <title>Ejercicio5y6</title>

</head>

<body class="bg-image">

  <div class="container">

    <div class="row d-flex justify-content-center py-5 text-center">

      <div class="card w-50 border-primary">
        <div class="card-body">
        <h3 class="card-header mb-3">Expediente número #<?=$expedienteRandom?></h3>
          <h4 class="card-subtitle mb-2 text-muted">Alumno/a: <?=$fullNomRandom?></h4>
          <h4 class="card-text">Nota media: <span class="nota"><?=$notaMedia?></span> -> <span class="nota"><?=$notaMediaString?></span></h4>
        </div>
      </div>
    </div>


    <div class="row d-flex justify-content-center py-2">


      <table class="table table-dark w-50 rounded text-center">
        <tr>
          <th>
            <h3>Nota</h3>
          </th>
          <th>
            <h3>Definición de nota</h3>
          </th>
        </tr>

        <?php foreach ($arrayNotasCurso as $clave => $nota): ?>


          <tr>
            <td>
              <h5><?=$nota?></h5>
            </td>
            <td>
              <h5 class="nota"><?=$arrayNotas[$nota]?></h5>
            </td>
          </tr>


        <?php endforeach;?>
      </table>

    </div>


    <div class="row d-flex justify-content-center py-2">

      <div class="card text-dark bg-warning text-center" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-header mb-4">Resumen de notas</h5>
          <?php foreach ($arrayNotasCount as $key => $value): ?>

            <p class="card-text"><?=$arrayStrings[$key] . ' -> ' . $arrayNotasCount[$key];?></p>

          <?php endforeach;?>
        </div>
      </div>

    </div>

  </div>


</body>

</html>