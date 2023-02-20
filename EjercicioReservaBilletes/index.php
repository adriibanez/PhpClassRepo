<?php /* include 'listaVuelos.php';
$array = serialize($arrayVuelos);
file_put_contents('vuelos.txt', $array);*/?>

<?php $arrayVuelos = unserialize(file_get_contents('vuelos.txt'));?>

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

    <!-- LISTADO DE VUELOS -->

    <div class="container d-flex justify-content-center flex-column my-5">
        <div class="row">
            <div class="d-flex justify-content-center py-2">
                <h1>Información de Vuelos, Destinos, Horario y Ocupación</h1>

            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <?php foreach ($arrayVuelos as $vuelo => $valor): ?>

                <div class="col col-4">
                    <table class="table text-center">
                        <tr>
                            <td>
                                <h2><?=$valor['cod'] . ' ' . $valor['origen'] . ' ' . $valor['destino'] . ' ' . $valor['hora']?></h2>
                            </td>
                        </tr>

                        <tr class="d-flex justify-content-center flex-column">

                            <?php foreach ($valor as $claveAsientos => $asientos): ?>
                                <?php if (is_array($asientos)): ?>
                                    <?php foreach ($asientos as $key => $value): ?>
                                        <?php $binarioFormateado = sprintf("%06d", decbin($value))?>

                                        <td> <?='Fila ' . $key . ' ,asientos ' . $binarioFormateado?></td>

                                    <?php endforeach;?>
                                <?php endif;?>


                            <?php endforeach;?>

                        </tr>
                    </table>
                </div>
            <?php endforeach;?>
        </div>




    </div>


</body>

</html>