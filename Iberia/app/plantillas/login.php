<?php ob_start()?>

<form action="" method="post">
    <fieldset>
        <legend>Loguear usuario</legend>
        <label for="correo">Correo: <input type="text" name="correo" id="correo" placeholder="Correo"></label>
        <label for="pass">Contraseña: <input type="password" name="pass" id="pass" placeholder="Contraseña"></label>
    </fieldset>
    <input type="submit" value="Login" name="login">
</form>

<?php
if (isset($_SESSION['correo']) && !empty($_SESSION['correo'])) {
    header('Location: ' . '/index.php?ctl=inicio');
}?>
<?php
if (isset($_POST['login'])): ?>

    <?php
if ($usuario === false) {
    echo 'Login incorrecto';
} else {

    $passOk = password_verify($_POST['pass'], $usuario[0]['pwd']);
    var_dump($passOk);

    if ($passOk) {
        echo 'Usuario logueado con éxito';

        $_SESSION['idUsers'] = $usuario[0]['idUsers'];
        $_SESSION['correo'] = $usuario[0]['eCorreo'];
        $_SESSION['rol'] = $usuario[0]['rol'];

        echo '<h3>Estás siendo redirigido/a al Inicio de nuestra web</h3>';
        header("Refresh:3; url=/index.php?ctl=inicio", true, 303);
    } else {
        echo 'Contraseña incorrecta';
    }
}
?>
<?php endif;?>

<?php $contenido = ob_get_clean()?>

<?php include 'base.php'?>