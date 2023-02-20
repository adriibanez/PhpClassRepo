<?php ob_start() ?>

<form action="" method="post">
    <fieldset>
        <legend>Ocupación disponible</legend>
        <label for="codigo">Código:
            <select class="form-select text-center" name="codigo" id="codigo">

                <?php
                foreach ($datosVuelos as $numClave => $arrayVuelo) : ?>
                    <option value="<?= $arrayVuelo['codigo'] ?>"><?= $arrayVuelo['codigo'] . ' ' . $arrayVuelo['origen'] .  '-' . $arrayVuelo['destino'] ?></option>
                <?php endforeach; ?>

            </select></label>
        <label for="fecha">Fecha: <input type="date" name="fecha" id="fecha"></label>
    </fieldset>
    <input type="submit" value="Mostrar Ocupación" name="btnMostrarOcupacion">
</form>



<?php

if (empty($_SESSION['correo'])) {
    header('Location: ' . '/index.php?ctl=registro');
}
?>

<?php

//MOSTRAR OCUPACION IDA

if (isset($_POST['btnMostrarOcupacion'])) : ?>

    <?php
    $codigo = $_POST['codigo'];
    $fecha = $_POST['fecha'];
    // $plazas = $_POST['plazas'];
    // $libres = $_POST['libres'];
    ?>


    <div class="container">
        <div class="row d-flex justify-content-center align-items-center flex-column">
            <div class="col col-10 my-5">

                <?php if (!empty($_POST['codigo']) && !empty($_POST['fecha'])) : ?>

                    <?php $vuelo = $ocupacion[0]; ?>

                    <h1 class="text-center text-info my-3"><?= 'Vuelo ' . $vuelo['codigo'] . ' con fecha ' . $vuelo['fecha'] ?></h1>

                    <table class="table table-dark table-striped text-center">
                        <tr>
                            <th>Fila</th>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>D</th>
                            <th>E</th>
                            <th>F</th>
                        </tr>

                        <?php foreach ($vuelo as $clave => $asientos) : ?>

                            <?php if (str_contains($clave, 'fila')) : ?>
                                <tr>
                                    <td><?= substr(ucfirst($clave), 0, 1)  . substr($clave, 4) ?></td>
                                    <td><?= $asientos & 32 ? 'O' : 'L' ?></td>
                                    <td><?= $asientos & 16 ? 'O' : 'L' ?></td>
                                    <td><?= $asientos & 8 ? 'O' : 'L' ?></td>
                                    <td><?= $asientos & 4 ? 'O' : 'L' ?></td>
                                    <td><?= $asientos & 2 ? 'O' : 'L' ?></td>
                                    <td><?= $asientos & 1 ? 'O' : 'L' ?></td>
                                </tr>
                            <?php else : ?>

                            <?php endif; ?>
                        <?php endforeach; ?>

                    </table>

                <?php else : ?>
                    <h1 class="text-center text-danger"><?= 'Hay campos vacíos' ?></h1>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php endif; ?>


<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>