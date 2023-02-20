<?php include 'diccionario.inc'?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ejercicio4</title>
</head>
<body>

<div class="container">

<div class="row d-flex justify-content-center py-5">
<h1>Diccionario castellano </h1>
</div>


<div class="row d-flex justify-content-center py-2">

<table class="table table-primary w-100 rounded ">
    <tr>
        <th><h3>Palabra</h3></th>
        <th class="text-center"><h3>Definición</h3></th>
</tr>
<?php foreach ($arrayCastellano as $entrada => $valor): ?>


	    <tr >
	<td><h5><?=$valor[0]?></h5></td>
	<td class="font-italic"><?=$valor[1]?></td>
	</tr>


<?php endforeach;?>
</table>

</div>

</div>


</body>
</html>
