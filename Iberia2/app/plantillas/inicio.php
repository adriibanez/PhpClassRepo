<?php
/* Ejemplo de plantilla que se mostrará dentro de la plantilla principal
  ob_start() activa el almacenamiento en buffer de la página. Mientras se
             almacena en el buffer no se produce salida alguna hacia el
             navegador del cliente
  luego viene el código html y/o php que especifica lo que debe aparecer en
     el cliente web
  ob_get_clean() obtiene el contenido del buffer (que se pasa a la variable
             $contenido) y elimina el contenido del buffer
  Por último se incluye la página que muestra la imagen común de la aplicación
    (en este caso base.php) la cual contiene una referencia a la variable
    $contenido que provocará que se muestre la salida del buffer dentro dicha
    página "base.php"
*/
?>
<?php ob_start() ?>

<form action="index.php?ctl=iniReserva" method="post">
  <label for="">Salir de: <input type="text" name="salida" id="salida"></label>
  <label for="">Destino <input type="text" name="destino" id="destino"></label>
  <label for="">Ida: <input type="date" name="ida" id="salida" min="<?= date('Y-m-d') ?>"></label>
  <label for="">Vuelta: <input type="date" name="vuelta" id="salida" min="<?= date('Y-m-d') ?>"></label>
  <label for="">Adultos: <input type="number" name="adultos" id="salida" min="1" max=""></label>
  <label for="">Niños: <input type="number" name="peques" id="peques" min="0" max=""></label>
  <input type="submit" name="ok">
</form>
<?php if (isset($mensajeError)) : ?>
  <p><?= $mensajeError ?></p>
<?php elseif (isset($vuelos)) : ?>
  <form action="" method="post">
    <table id="flyIda">
      <caption>Vuelos ida desde <?= $vuelos['ida'][0]['Origen'] ?>hacia <?= $vuelos['ida'][0]['Destino'] ?></caption>
      <thead>
        <tr>
          <th>Vuelo</th>
          <th>Con salida desde</th>
          <th>A las</th>
          <th>Hacia</th>
          <th>El dia</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($vuelos['ida'] as $value) : ?>
          <tr>
            <td><?= $value['Codigo'] ?></td>
            <td><?= $value['Origen'] ?></td>
            <td><?= substr($value['Salida'], 0, 5); ?></td>
            <td><?= $value['Destino'] ?></td>
            <td><?= $value['Fecha ida'] ?></td>
            <td><input type="checkbox" name="<?= $value['Codigo'] ?>>[<?= substr($value['Salida'], 0, 5) ?>]"></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

    <?php if (isset($vuelos['vuelta'])) : ?>
      <table id="flyVuelta">
        <caption>Vuelos ida desde <?= $vuelos['vuelta'][0]['Origen'] ?>hacia <?= $vuelos['vuelta'][0]['Destino'] ?></caption>
        <thead>
          <tr>
            <th>Vuelo</th>
            <th>Con salida desde</th>
            <th>A las</th>
            <th>Hacia</th>
            <th>El dia</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($vuelos['vuelta'] as $value) : ?>
            <tr>
              <td><?= $value['Codigo'] ?></td>
              <td><?= $value['Origen'] ?></td>
              <td><?= substr($value['Salida'], 0, 5); ?></td>
              <td><?= $value['Destino'] ?></td>
              <td><?= $value['Fecha vuelta'] ?></td>
              <td><input type="checkbox" name="<?= $value['Codigo'] ?>>[<?= substr($value['Salida'], 0, 5) ?>]"></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    <?php endif ?>
    <input type="submit" value="Confirmar" name="ConfVuelos">
  </form>
<?php endif; ?>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>