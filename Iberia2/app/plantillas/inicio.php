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

<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
  <fieldset>
    <legend>Buscador de vuelos</legend>
    <label for="salida">Salir de: <input type="text" name="salida" id="salida"></label>
    <label for="destino">Destino: <input type="text" name="destino" id="destino"></label>
    <label for="ida">Ida: <input type="date" name="ida" id="ida" min="<?= date('Y-m-d') ?>"></label>
    <label for="vuelta">Vuelta: <input type="date" name="vuelta" id="vuelta" min="<?= date('Y-m-d') ?>"></label>
    <label for="adultos">Adultos: <input type="number" name="adultos" id="adultos" min="1" value="1" require size="4"></label>
    <label for="peques">Niños: <input type="number" name="peques" id="peques" min="0" value="0" require size="4"></label>
    <input type="submit" value="Buscar vuelos" name="ok">
  </fieldset>
</form>
<?php if (isset($mensajeError)) : ?>
  <p class="error"><?= $mensajeError ?></p>
<?php elseif (isset($vuelos)) : ?>
  <form action="index.php?ctl=iniReser" method="post">
    <table id="flyIda">
      <caption>Vuelos ida desde <?= $vuelos['ida'][0]['Origen'] ?> hacia <?= $vuelos['ida'][0]['Destino'] ?> </caption>
      <thead>
        <tr>
          <th>Vuelo</th>
          <th>Con salida desde</th>
          <th>A las</th>
          <th>Hacia</th>
          <th>El día</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($vuelos['ida'] as $value) : ?>
          <tr>
            <td><?= $value['Código'] ?></td>
            <td><?= $value['Origen'] ?></td>
            <td><?= substr($value['Salida'], 0, 5); ?></td>
            <td><?= $value['Destino'] ?></td>
            <td><?= $value['Fecha ida'] ?></td>
            <td><input type="checkbox" name="vueloIda[<?= $value['Código'] ?>][<?= substr($value['Salida'], 0, 5) ?>]"></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php if (isset($vuelos['vuelta'])) : ?>
      <table id="flyVuelta">
        <caption>Vuelos ida desde <?= $vuelos['vuelta'][0]['Origen'] ?> hacia <?= $vuelos['vuelta'][0]['Destino'] ?> </caption>
        <thead>
          <tr>
            <th>Vuelo</th>
            <th>Con salida desde</th>
            <th>A las</th>
            <th>Hacia</th>
            <th>El día</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($vuelos['vuelta'] as $value) : ?>
            <tr>
              <td><?= $value['Código'] ?></td>
              <td><?= $value['Origen'] ?></td>
              <td><?= substr($value['Salida'], 0, 5); ?></td>
              <td><?= $value['Destino'] ?></td>
              <td><?= $value['Fecha vuelta'] ?></td>
              <td><input type="checkbox" name="vueloVuelta[<?= $value['Código'] ?>][<?= substr($value['Salida'], 0, 5) ?>]"></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
    <input type="submit" value="Confirmar" name="ConfVuelos">
  </form>
<?php endif; ?>
<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>