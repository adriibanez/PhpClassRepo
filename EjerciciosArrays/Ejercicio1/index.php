<?php
//VARIABLES
$euro = 0.0060;
$arrayPesetas = [100, 200, 500, 1000, 2000, 5000, 10000];
$arrayEuros = [];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ejercicio1</title>
</head>
<body>


<div class="container">
    <div class="row d-flex justify-content-center  py-5">
        <h1>Tabla de conversión de monedas(Pesetas - Euros)</h1>
    </div>
    <div class="row d-flex justify-content-center  py-3">

    <?php for ($i = 0; $i < count($arrayPesetas); $i++) {
    $conversionEuro = $euro * $arrayPesetas[$i];
    array_push($arrayEuros, $conversionEuro);
}
?>

<table class="table table-dark text-center w-50 rounded">
<tr>
    <th><h5>Pesetas</h5></th>
    <th><h5>Euros</h5></th>
</tr>

<?php foreach ($arrayPesetas as $key => $value): ?>
    <tr>
<td><?=number_format($value, 0, '.', ' ') . ' Ptas'?></td>
<td><?=number_format($arrayEuros[$key], 2, '.', ' ') . ' €'?></td>
</tr>
<?php endforeach;?>

</table>

    </div>
</div>



</body>
</html>
