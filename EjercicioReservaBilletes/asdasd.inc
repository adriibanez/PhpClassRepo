<?php $codReserva = $_POST['vuelo'];?>
        <?php $fila = intval($_POST['fila'])?>
        <?php $asiento = intVal($_POST['asiento'])?>


        <?php $asientoReserva = $arrayVuelos[$codReserva]['asientos'][$fila]?>


        <?php $filaString = sprintf("%06d", decbin($asientoReserva))?>