<?php ob_start() ?>

<form action="" method="post">
    <fieldset>
        <legend>Registro de usuario</legend>
        <label for="correo">Correo: <input type="text" name="correo" id="correo" placeholder="Correo"></label>
        <label for="pass">Contraseña: <input type="password" name="pass" id="pass" placeholder="Contraseña"></label>
        <label for="rol">Rol:
            <select name="rol" id="rol">
                <option value="cliente">Cliente</option>
                <option value="trabajador">Trabajador</option>
                <option value="admin">Admin</option>
            </select></label>
    </fieldset>
    <input type="submit" value="Registrarse" name="registrar">
</form>

<?php
if (isset($_SESSION['correo']) && !empty($_SESSION['correo'])) {
    header('Location: ' . '/index.php?ctl=inicio');
} ?>

<?php
if (isset($_POST['registrar'])) : ?>

    <?php
    if ($registrarOk) {
        echo '<h3>Te has registrado con el correo ' . $_POST['correo'] . '</h3>';
        echo '<br>';
        echo '<h3>Estás siendo redirigido/a al Inicio de Sesión</h3>';
        header("Refresh:3; url=/index.php?ctl=login", true, 303);
    } else {
        echo 'El usuario ya EXISTE';
    }

    ?>


<?php endif; ?>


<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>