<?php ob_start() ?>
<?php

use app\iberia\repo\ReservarRepo; ?>
<div class="container d-flex justify-content-center flex-column my-5">


    <div class="card text-center my-2">
        <div class="card-header">
            <h1>Compra de Billetes</h1>
        </div>
        <div class="card-body ">
            <div class="row d-flex justify-content-center flex-column">
                <form method="post" action="" name="vuelosForm">
                    <h5 class="card-title">Info Pasajero</h5>
                    <label for="chk" aria-hidden="true">Nombre:</label>
                    <input type="text" name="nombre" placeholder="Nombre">
                    <label for="chk" aria-hidden="true">Apellido:</label>
                    <input type="text" name="apellido" placeholder="Apelllido">
                    <br>
                    <label for="chk" aria-hidden="true">Dni:</label>
                    <input type="text" name="dni" placeholder="DNI">
                    <label for="chk" aria-hidden="true">Fecha de Nacimiento:</label>
                    <input type="date" name="fNac">

                    <br>
                    <br>
                    <br>
                    <h5 class="card-title">Info Vuelo</h5>
                    <label for="chk" aria-hidden="true">Seleccione su vuelo</label>
                    <select class="form-select text-center" name="codigo" id="codigo">
                        <?php
                        foreach ($datosVuelos as $numClave => $arrayVuelo) : ?>
                            <option value="<?= $arrayVuelo['codigo'] ?>"><?= $arrayVuelo['codigo'] . ' ' . $arrayVuelo['origen'] . '-' . $arrayVuelo['destino'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php $min = new DateTime(); ?>
                    <label for="fecha">Fecha: <input type="date" min="<?= $min->format("Y-m-d") ?>" name="fecha" id="fecha"></label>
                    <br>
                    <label for="chk" aria-hidden="true">Fila:</label>
                    <input type="number" name="fila" min="1" max="20" value="1">
                    <label for="chk" aria-hidden="true">Asiento:</label>
                    <select name="asiento" id="asiento">
                        <option value="0">A</option>
                        <option value="1">B</option>
                        <option value="2">C</option>
                        <option value="3">D</option>
                        <option value="4">E</option>
                        <option value="5">F</option>
                    </select>
                    <br>
                    <br>

                    <button type="submit" class="btn btn-info" name="btnReservarAsiento">Reservar</button>
                    <button type="submit" class="btn btn-info" name="btnCancelarAsiento">Cancelar</button>
                </form>

            </div>


            <div class="row d-flex justify-content-center flex-column my-2">
                <form method="post" action="" name="ocupacionForm">
                    <button type="submit" class="btn btn-danger" name="btnMostrarReservas">Mostrar reservas</button>
                </form>

            </div>
        </div>
    </div>

</div>
<?php if (isset($_POST['btnReservarAsiento'])) : ?>

    <?php if (!empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['dni']) && !empty($_POST['fNac']) && !empty($_POST['fecha'])) : ?>

        <?php if ($vueloSelec[0]['libres'] > 0) : ?>
            <?php
            $fila = $_POST['fila'];
            $asiento = $_POST['asiento'];

            $asientoReserva = $vueloSelec[0]['fila' . $fila];
            $filaString = sprintf("%06d", decbin($asientoReserva))

            ?>


            <?php if ($filaString[$asiento] === '0') : ?>

                <?php

                $arrayBinarios = [32, 16, 8, 4, 2, 1];

                //sumo los binarios
                $binarioFinal = $asientoReserva + $arrayBinarios[$asiento];

                //AÑADIR EL ASIENTO A LA BD

                $claveFila = "fila$fila";

                (new ReservarRepo())->Reservar($_POST['codigo'], $_POST['fecha'], $claveFila, $binarioFinal);

                //AÑADIR BILLETE AL PASAJERO
                (new ReservarRepo())->AñadirBilleteAPasajero($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_SESSION['idUsers'], $_POST['fNac']);
                //AÑADIR DATOS AL VIAJE
                // (new ReservarRepo())->AñadirViaje($_POST['nombre'], $_POST['codigo'], $_POST['fecha'], $_SESSION['fila'], intval($_POST['asiento'])+1);


                ?>

                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Asiento reservado con éxito</h5>
                        <p class="card-text"><?= $_POST['nombre'] . ' ' . $_POST['apellido'] . ' con dni: ' . $_POST['dni'] . ' y fecha de nacimiento ' . $_POST['fNac'] ?></p>
                        <p class="card-text"><?= 'Vuelo ' . $_POST['codigo'] . ' con fecha ' . $_POST['fecha'] . ' reservado a nombre de ' . $_SESSION['correo'] ?></p>
                    </div>
                </div>

            <?php else : ?>
                <h1><?= 'Asiento ocupado' ?></h1>
            <?php endif; ?>


        <?php else : ?>
            <h1><?= 'No hay asientos disponibles en el vuelo' ?></h1>
        <?php endif; ?>

    <?php else : ?>
        <h1><?= 'Hay campos vacíos' ?></h1>
    <?php endif; ?>




<?php endif; ?>





<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>