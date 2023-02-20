<?php include 'diccionario.inc'?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ejercicio3</title>
</head>
<body>

<div class="container">

<div class="row d-flex justify-content-center py-5">
<h1>A Diccionary with a variety of languages </h1>
</div>

<div class="row d-flex justify-content-center  py-3">

<form action="" method="post">
    <h5 for="diccionario">Please select a valid language <select name="idiomas" id="idiomas">
  <option value="esp">Spanish</option>
  <option value="eng">English</option>
  <option value="fr">French</option>
</select>
    <input class="btn btn-info" type="submit" name="btnMostrarDiccionario" value="Show diccionary">
</h5>

</form>

</div>

<div class="row d-flex justify-content-center py-2">


<?php if (isset($_POST['btnMostrarDiccionario'])): ?>

<?php
$idiomaSelect = $_POST['idiomas'];
$diccionario = null;

switch ($idiomaSelect) {
    case 'esp':
        $diccionario = $arrayCastellano;
        break;
    case 'eng':
        $diccionario = $arrayIngles;
        break;
    case 'fr':
        $diccionario = $arrayFrances;
        break;
}

?>

<table class="table table-primary w-100 rounded ">
    <tr>
        <th><h3>Word</h3></th>
        <th class="text-center"><h3>Meaning</h3></th>
</tr>
<?php foreach ($diccionario as $entrada => $valor): ?>


	    <tr >
	<td><h5><?=$valor[0]?></h5></td>
	<td class="font-italic"><?=$valor[1]?></td>
	</tr>


<?php endforeach;?>
</table>

<?php else: ?>
    <div class="row d-flex justify-content-center  py-5">
    <h1 class="text-danger">There's no language selected yet</h1>

</div>

<?php endif; //fin del if del form?>

</div>



</div>





</body>
</html>
