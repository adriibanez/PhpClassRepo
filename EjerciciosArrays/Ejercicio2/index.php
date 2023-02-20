<?php
//VARIABLES
$peseta = 166.386;
$arrayEuros = [0.01, 0.02, 0.05, 0.1, 0.2, 0.5, 1, 2, 5, 10, 20, 50, 100, 200, 500];
$arrayPesetas = [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ejercicio2</title>
</head>
<body>


<div class="container">
    <div class="row d-flex justify-content-center  py-5">
        <h1>Tabla de conversión de monedas(Euros - Pesetas)</h1>
    </div>
    <div class="row d-flex justify-content-center  py-3">

    <?php for ($i = 0; $i < count($arrayEuros); $i++) {
    $conversionPeseta = $peseta * $arrayEuros[$i];
    array_push($arrayPesetas, $conversionPeseta);
}
?>

<table class="table table-dark text-center w-50 rounded">
<tr>
    <th><h5>Euros</h5></th>
    <th><h5>Pesetas</h5></th>
</tr>

<?php foreach ($arrayEuros as $key => $value): ?>
    <tr>
<td><?=number_format($value, 2, '.', ' ') . ' €'?></td>
<td><?=number_format($arrayPesetas[$key], 2, '.', ' ') . ' Pts'?></td>
</tr>
<?php endforeach;?>

</table>

    </div>
</div>

</body>
</html>
