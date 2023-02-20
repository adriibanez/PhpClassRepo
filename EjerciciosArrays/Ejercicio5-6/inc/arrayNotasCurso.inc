<?php

//FUNCIÓN QUE DEVUELVE UN ARRAY CON 20 NOTAS NÚMERICAS RANDOM ENTRE 0 Y 10

include 'randomizer.inc';

function getArrayNotasCurso(): array
{
    $arrayNotasCurso = [];
    for ($i = 0; $i < 20; $i++) {
        array_push($arrayNotasCurso, getNotaRandom());
    }
    return $arrayNotasCurso;
}
