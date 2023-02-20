<?php

//FUNCIÓN QUE FORMATEA LA NOTA MEDIA NÚMERICA A UN VALOR DE CADENA CORRESPONDIENTE

function getNotaMediaString(int $notaMedia, array $arrayNotas): string
{
    return $arrayNotas[$notaMedia];
}
