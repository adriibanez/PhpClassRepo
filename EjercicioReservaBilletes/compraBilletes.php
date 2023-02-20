<?php $arrayVuelos = unserialize(file_get_contents('vuelos.txt'));?>
<?php /*$arrayReservas = ['AK127' => [], 'AM250' => [], 'AK128' => []];
$array = serialize($arrayReservas);
file_put_contents('billetes.txt', $array);*/
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de vuelos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">AdrianAIR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav 1">
                    <li class="nav-item d-flex justify-content-center">
                        <a class="nav-link active" aria-current="page" href="index.php">Tabla de vuelos disponibles</a>
                        <a class="nav-link active" aria-current="page" href="compraBilletes.php">Compra de vuelos</a>
                        <a class="nav-link active" aria-current="page" href="ocupacionVuelos.php">Ocupaciones de vuelos</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center flex-column my-5">

        <div class="card text-center my-5">
            <div class="card-header">
                <h1>Compra de Billetes</h1>
            </div>
            <div class="card-body ">
                <div class="row d-flex justify-content-center flex-column my-2">
                    <form method="post" action="" name="vuelosForm">
                        <label for="chk" aria-hidden="true">Introduce los datos para reservar tu vuelo</label>
                        <select name="vuelo" id="vuelo">
                            <option value="AK127">AK127</option>
                            <option value="AM250">AM250</option>
                            <option value="AK128">AK128</option>
                        </select>

                        <label for="chk" aria-hidden="true">Selecciona una fila:</label>
                        <input type="number" name="fila" min="1" max="20" value="1">
                        <label for="chk" aria-hidden="true">Selecciona un asiento:</label>
                        <select name="asiento" id="asiento">
                            <option value="0">A</option>
                            <option value="1">B</option>
                            <option value="2">C</option>
                            <option value="3">D</option>
                            <option value="4">E</option>
                            <option value="5">F</option>
                        </select>

                        <button type="submit" class="btn btn-info" name="btnReservarAsiento">Reservar</button>
                        <button type="submit" class="btn btn-info" name="btnCancelarAsiento">Cancelar</button>
                    </form>

                </div>

                <!-- <div class="row d-flex justify-content-center flex-column my-2">
                    <form method="post" action="" name="ocupacionForm">
                        <label for="chk" aria-hidden="true">Introduce los datos para cancelar tu vuelo</label>
                        <select name="vueloC" id="vueloC">
                            <option value="AK127">AK127</option>
                            <option value="AM250">AM250</option>
                            <option value="AK128">AK128</option>
                        </select>

                        <label for="chk" aria-hidden="true">Selecciona una fila:</label>
                        <input type="number" name="filaC" min="1" max="20" value="1">
                        <label for="chk" aria-hidden="true">Selecciona un asiento:</label>
                        <select name="asientoC" id="asientoC">
                            <option value="0">A</option>
                            <option value="1">B</option>
                            <option value="2">C</option>
                            <option value="3">D</option>
                            <option value="4">E</option>
                            <option value="5">F</option>
                        </select>

                        <button type="submit" class="btn btn-info" name="btnCancelarAsiento">Cancelar</button>
                    </form>

                </div> -->

                <div class="row d-flex justify-content-center flex-column my-2">
                    <form method="post" action="" name="ocupacionForm">
                        <button type="submit" class="btn btn-danger" name="btnMostrarReservas">Mostrar reservas</button>
                    </form>

                </div>


            </div>

        </div>


    </div>







    <!-- RESERVA -->
    <?php if (isset($_POST['btnReservarAsiento'])): ?>


        <?php $codReserva = $_POST['vuelo'];?>
        <?php $fila = intval($_POST['fila'])?>
        <?php $asiento = intVal($_POST['asiento'])?>


        <?php $asientoReserva = $arrayVuelos[$codReserva]['asientos'][$fila]?>


        <?php $filaString = sprintf("%06d", decbin($asientoReserva))?>

        <?php if ($filaString[$asiento] === '0') {

    $arrayBinarios = [0b100000, 0b010000, 0b001000, 0b000100, 0b000010, 0b000001];

    $binarioFinal = $asientoReserva + $arrayBinarios[$asiento];
    $valorArray = decbin($binarioFinal);

    $arrayVuelos[$codReserva]['asientos'][$fila] = $binarioFinal;

    file_put_contents('vuelos.txt', serialize($arrayVuelos));

    //AÑADIR BILLETE

    $arrayReservas = unserialize(file_get_contents('billetes.txt'));

    $arrayLetras = ['A', 'B', 'C', 'D', 'E', 'F'];

    $filaYasiento = $arrayLetras[$asiento] . $fila;

    array_push($arrayReservas[$codReserva], $filaYasiento);

    file_put_contents('billetes.txt', serialize($arrayReservas));

    echo 'Asiento reservado con éxito';

} else {
    echo 'Asiento ocupado';
}?>



    <?php endif;?>

    <!-- CANCELACION -->
    <?php if (isset($_POST['btnCancelarAsiento'])): ?>


        <?php $codCancelar = $_POST['vuelo'];?>
        <?php $fila = intval($_POST['fila'])?>
        <?php $asiento = intVal($_POST['asiento'])?>


        <?php $asientoReserva = $arrayVuelos[$codCancelar]['asientos'][$fila]?>


        <?php $filaString = sprintf("%06d", decbin($asientoReserva))?>

        <?php if ($filaString[$asiento] === '1') {

    $arrayBinarios = [0b100000, 0b010000, 0b001000, 0b000100, 0b000010, 0b000001];

    $binarioFinal = $asientoReserva - $arrayBinarios[$asiento];
    $valorArray = decbin($binarioFinal);

    $arrayVuelos[$codCancelar]['asientos'][$fila] = $binarioFinal;
    file_put_contents('vuelos.txt', serialize($arrayVuelos));

    //QUITAR BILLETE

    $arrayReservas = unserialize(file_get_contents('billetes.txt'));

    $arrayLetras = ['A', 'B', 'C', 'D', 'E', 'F'];

    $filaYasiento = $arrayLetras[$asiento] . $fila;

    unset($arrayReservas[$codCancelar][array_search($filaYasiento, $arrayReservas[$codCancelar])]);

    file_put_contents('billetes.txt', serialize($arrayReservas));

    echo 'Asiento cancelado con éxito';
} else {
    echo 'No se puede cancelar este asiento porque está libre';

}?>



    <?php endif;?>


    <!-- MOSTRAR RESERVAS -->
    <?php if (isset($_POST['btnMostrarReservas'])): ?>

<?php $arrayReservas = unserialize(file_get_contents('billetes.txt'));
?>
<?='Asientos reservados: '?>
        <?php foreach ($arrayReservas as $cod => $arrayBilletes) {
    echo '<br>' . $cod . '=> ';
    foreach ($arrayBilletes as $clave => $billete) {
        echo $billete . ' ';
    }

}?>


    <?php endif;?>



</body>

</html>