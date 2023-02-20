<?php ob_start(); ?>



<form action="" method="post">

    <fieldset>

        <legend>Datos del pasajero</legend>

        <label for="nombre">Nombre: <input type="text" name="pasj[nombre]" id="nombre" value="<?= isset($pasj['nombre']) ? $pasj['nombre'] : '' ?>" required>
            <?= isset($erroresPasj['nombre']) ? '<span class="error">' . $erroresPasj['nombre'] . '</span>' : '' ?></label>

        <label for="apellido">Apellido: <input type="text" name="pasj[apellido]" id="apellido" value="<?= isset($pasj['apellido']) ? $pasj['apellido'] : '' ?>" required>
            <?= isset($erroresPasj['apellido']) ? '<span class="error">' . $erroresPasj['apellido'] . '</span>' : '' ?></label>

        <label for="dni">Dni: <input type="text" name="pasj[dni]" id="dni" value="<?= isset($pasj['dni']) ? $pasj['dni'] : '' ?>" required pattern="[0-9]{8}{A-Z}">
            <?= isset($erroresPasj['dni']) ? '<span class="error">' . $erroresPasj['dni'] . '</span>' : '' ?></label>

        <label for="fNacimiento">Nacimiento: <input type="date" name="pasj[fNacimiento]" id="fNacimiento" value="<?= isset($pasj['fNacimiento']) ? $pasj['fNacimiento'] : '' ?>" required max="<?= (new DateTime("now"))->format('Y-m-d') ?>">
            <?= isset($erroresPasj['fNacimiento']) ? '<span class="error">' . $erroresPasj['fNacimiento'] . '</span>' : '' ?></label>

    </fieldset>

    <fieldset>

        <legend>Registro de usuario</legend>
        <label for="eCorreo">ECorreo: <input type="email" name="usu[eCorreo]" id="eCorreo" required autocomplete="on">
            <?= isset($erroresUsu['eCorreo']) ? '<span class="error">' . $erroresUsu['eCorreo'] . '</span>' : '' ?></label>

        <label for="pass1">Contraseña: <input type="password" name="usu[pass1]" id="pass1" required>
            <?= isset($erroresUsu['pass1']) ? '<span class="error">' . $erroresUsu['pass1'] . '</span>' : '' ?></label>

        <label for="pass2">Contraseña: <input type="password" name="usu[pass2]" id="pass2" required>
            <?= isset($erroresUsu['pass2']) ? '<span class="error">' . $erroresUsu['pass2'] . '</span>' : '' ?></label>
        <?= isset($errorContrDif) ? '<span class="error">' . $errorContrDif . '</span>' : '' ?></label>

        <p><a href="index.php?ctl=iniSes">Ya estoy registrado</a></p>
        <input type="submit" name="okReg" value="Registrar">
    </fieldset>
</form>







<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>