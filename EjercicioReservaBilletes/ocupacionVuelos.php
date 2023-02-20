<?php $arrayVuelos = unserialize(file_get_contents('vuelos.txt')); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de vuelos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="js/script.js"></script>
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


    <!-- MOSTRAR OCUPACION VUELO -->

    <div class="container d-flex justify-content-center flex-column my-5">


        <div class="card text-center my-5">
            <div class="card-header">
                <h1>Mostrar ocupación</h1>
            </div>
            <div class="card-body">

                <div class="col">
                    <form method="post" action="" name="ocupacionForm">
                        <label for="chk" aria-hidden="true">Mostrar ocupación del vuelo</label>
                        <select name="vuelos" id="vuelos">
                            <option value="AK127">AK127</option>
                            <option value="AM250">AM250</option>
                            <option value="AK128">AK128</option>
                        </select>
                        <label for="chk" aria-hidden="true">Orientación</label>
                        <select name="orientacion" id="orientacion">
                            <option value="Vertical">Vertical</option>
                            <option value="Horizontal">Horizontal</option>
                        </select>
                        <button type="submit" class="btn btn-info" name="btnMostrarOcupacion">Mostrar Ocupación</button>
                    </form>
                </div>

                <div class="col">
                    <?php if (isset($_POST['btnMostrarOcupacion'])) : ?>
                        <?php $codVuelo = $_POST['vuelos']; ?>
                        <h3><?= 'El vuelo ' . $codVuelo . ' ' . $arrayVuelos[$codVuelo]['origen'] . '-' . $arrayVuelos[$codVuelo]['destino'] . ' y con salida: ' . $arrayVuelos[$codVuelo]['hora'] ?></h3>
                </div>

                <div class="col">

                    <?php $orientacion = $_POST['orientacion'] ?>

                    <?php if ($orientacion === 'Vertical') : ?>

                        <table class="table  text-center table-hover">
                            <tr>
                                <th>Fila</th>
                                <th>A</th>
                                <th>B</th>
                                <th>C</th>
                                <th>D</th>
                                <th>E</th>
                                <th>F</th>
                            </tr>

                            <?php
                            $arrayAsientos = $arrayVuelos[$codVuelo]['asientos']; ?>

                            <?php foreach ($arrayAsientos as $clave => $asientos) : ?>
                                <tr>
                                    <td><?= $clave ?></td>
                                    <td><?= $asientos & 32 ? 'ocupado' : 'libre' ?></td>
                                    <td><?= $asientos & 16 ? 'ocupado' : 'libre' ?></td>
                                    <td><?= $asientos & 8 ? 'ocupado' : 'libre' ?></td>
                                    <td><?= $asientos & 4 ? 'ocupado' : 'libre' ?></td>
                                    <td><?= $asientos & 2 ? 'ocupado' : 'libre' ?></td>
                                    <td><?= $asientos & 1 ? 'ocupado' : 'libre' ?></td>
                                </tr>

                            <?php endforeach; ?>


                            <?php foreach ($arrayVuelos as $vuelo => $datos) : ?>
                                <?php foreach ($datos as $dato => $valorDatos) : ?>

                                    <?php if ($dato === $codVuelo) : ?>
                                        <?php foreach ($valorDatos as $claveAsientos => $valorAsientos) : ?>

                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                <?php endforeach; ?>
                            <?php endforeach; ?>

                        </table>

                    <?php else : ?>


                        <table class="table text-center table-hover">
                            <tr>
                                <th>Filas</th>
                                <?php for ($i = 1; $i <= 20; $i++) {
                                    echo '<th>' . $i . '</th>';
                                } ?>
                            </tr>

                            <?php $bit = 32;
                            for ($i = 0; $i <= 5; $i++) : ?>

                                <?php
                                $arrayAsientos = $arrayVuelos[$codVuelo]['asientos'];
                                ?>

                                <?php $arrayLetras = ['A', 'B', 'C', 'D', 'E', 'F'] ?>
                                <tr>
                                    <td><?= $arrayLetras[$i] ?></td>
                                    <?php foreach ($arrayAsientos as $key => $value) : ?>
                                        <td class="p-0"><?= $value & $bit ? 'ocupado' : 'libre' ?></td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php $bit = $bit / 2; ?>
                            <?php endfor; ?>

                        </table>

                    <?php endif; ?>

                </div>

            <?php else : ?>
                <h3 class="py-5"><?= 'Selecciona un vuelo y la orientación en la que se mostrará la tabla' ?></h3>


            <?php endif; ?>


            </div>

        </div>
    </div>


</body>

</html>