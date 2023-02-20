<?php ob_start()?>

<form action="" method="post">
  <fieldset>
    <legend>Buscador de vuelos</legend>
    <label for="salida">Salir de: <input type="text" name="salida" id="salida" placeholder="Origen"></label>
    <label for="destino">Destino: <input type="text" name="destino" id="destino" placeholder="Destino"></label>
    <label for="ida">Ida: <input type="date" name="ida" id="ida"></label>
    <label for="vuelta">Vuelta: <input type="date" name="vuelta" id="vuelta"></label>
  </fieldset>
  <input type="submit" value="Buscar vuelos" name="ok">
</form>

<?php
if (empty($_SESSION['correo'])) {
    header('Location: ' . '/index.php?ctl=registro');
}
?>
<?php

if (isset($_POST['ok'])): ?>

  <?php
if (!empty($_POST['salida']) && !empty($_POST['destino'] && !empty($_POST['ida']) && !empty($_POST['vuelta']))): ?>
    <?php

$vuelosIda = [];

//ARRAY VUELTA
$vuelosVuelta = [];

if (!empty($vuelos['ida']) && !empty($vuelos['vuelta'])): ?>

      <?php
$vuelosIda = $vuelos['ida'][0];
$vuelosVuelta = $vuelos['vuelta'][0];

//HORA SALIDA IDA
$horasYminutosIda = substr($vuelosIda['Salida'], 0, 5);

$tiempoFIda = explode(':', $horasYminutosIda);
$horaFIda = $tiempoFIda[0];
$minutosFIda = $tiempoFIda[1];

$cadenaFinalIda = $horaFIda . 'H' . $minutosFIda . 'M';

//DURACIÓN IDA
$horasYminutosDuracionIda = substr($vuelosIda['Duracion'], 0, 5);

$tiempoFDuracionIda = explode(':', $horasYminutosDuracionIda);
$horaDuracionFIda = $tiempoFDuracionIda[0];
$minutosDuracionFIda = $tiempoFDuracionIda[1];

$cadenaFinalDuracionIda = $horaDuracionFIda . 'H' . $minutosDuracionFIda . 'M';

//HORA SALIDA VUELTA
$horasYminutosVuelta = substr($vuelosVuelta['Salida'], 0, 5);

$tiempoFVuelta = explode(':', $horasYminutosVuelta);
$horaFVuelta = $tiempoFVuelta[0];
$minutosFVuelta = $tiempoFVuelta[1];

$cadenaFinalVuelta = $horaFVuelta . 'H' . $minutosFVuelta . 'M';

//DURACIÓN VUELTA
$horasYminutosDuracionVuelta = substr($vuelosVuelta['Duracion'], 0, 5);

$tiempoFDuracionVuelta = explode(':', $horasYminutosDuracionVuelta);
$horaDuracionFVuelta = $tiempoFDuracionVuelta[0];
$minutosDuracionFVuelta = $tiempoFDuracionVuelta[1];

$cadenaFinalDuracionVuelta = $horaDuracionFVuelta . 'H' . $minutosDuracionFVuelta . 'M';

?>
      <div class="container px-5">
        <div class="row ">
          <div class="col d-flex justify-content-around align-items-center flex-column">
            <h1>IDA</h1>
            <table class="table table-dark table-striped w-75">

              <tr>
                <th>Código Vuelo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Salida</th>
                <th>Duración</th>
                <th>Fecha Ida</th>
              </tr>
              <tr>
                <td><?=$vuelosIda['Codigo']?></td>
                <td><?=$vuelosIda['Origen']?></td>
                <td><?=$vuelosIda['Destino']?></td>
                <td><?=$cadenaFinalIda?></td>
                <td><?=$cadenaFinalDuracionIda?></td>
                <td><?=$vuelosIda['Fecha ida']?></td>

              </tr>
            </table>
          </div>

          <div class="col d-flex justify-content-around align-items-center flex-column">
            <h1>VUELTA</h1>
            <table class="table table-dark table-striped  w-75">

              <tr>
                <th>Código Vuelo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Salida</th>
                <th>Duración</th>
                <th>Fecha Ida</th>
              </tr>
              <tr>

                <td><?=$vuelosVuelta['Codigo']?></td>
                <td><?=$vuelosVuelta['Origen']?></td>
                <td><?=$vuelosVuelta['Destino']?></td>
                <td><?=$cadenaFinalVuelta?></td>
                <td><?=$cadenaFinalDuracionVuelta?></td>
                <td><?=$vuelosVuelta['Fecha vuelta']?></td>

              </tr>
            </table>

          </div>
        </div>
      </div>
    <?php else: ?>
      <h1 class="text-center text-danger"><?='No se ha encontrado este vuelo'?></h1>
    <?php endif?>

  <?php else: ?>
    <h1 class="text-center text-danger"><?='Hay campos vacíos'?></h1>
  <?php endif;?>


<?php endif;?>


<?php $contenido = ob_get_clean()?>

<?php include 'base.php'?>