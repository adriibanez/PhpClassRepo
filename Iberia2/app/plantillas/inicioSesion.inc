<?php ob_start(); ?>



<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <fieldset>
        <legend>Inicio de sesión</legend>
        <label for="eCorreo">ECorreo: <input type="email" name="eCorreo" id="eCorreo" required></label>
        <label for="pass">Contraseña: <input type="password" name="pass" id="pass" required></label>
        <p><a href="index.php?ctl=nuevoCli">Aún no estoy registrado</a></p>
        <input type="submit" name="okIniSes" value="Iniciar Sesión">
    </fieldset>
</form>



<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>