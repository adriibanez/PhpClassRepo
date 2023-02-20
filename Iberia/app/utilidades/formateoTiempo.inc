<?php


function formatearFechas(array $vuelos)
{
    $horasYminutosIda = substr($vuelos['ida'][0]['Salida'], 0, 5);

    $tiempoFIda =  explode(':', $horasYminutosIda);
    $horaFIda = $tiempoFIda[0];
    $minutosFIda = $tiempoFIda[1];

    $cadenaFinalIda = $horaFIda . 'H' . $minutosFIda . 'M';


    $horasYminutosVuelta = substr($vuelos['vuelta'][0]['Salida'], 0, 5);

    $tiempoFVuelta =  explode(':', $horasYminutosVuelta);
    $horaFVuelta = $tiempoFVuelta[0];
    $minutosFVuelta = $tiempoFVuelta[1];

    $cadenaFinalVuelta = $horaFVuelta . 'H' . $minutosFVuelta . 'M';
}
