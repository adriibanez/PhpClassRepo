<?php

//FUNCIÓN QUE CALCULA LA NOTA MEDIA DE UN ARRAY CON NOTAS NUMÉRICAS

function getNotaMedia(array $arrayNotasCurso): int
{
    $notaMedia = 0;
    foreach ($arrayNotasCurso as $key => $nota) {
        $notaMedia += $nota;
    }
    return floor($notaMedia / 20);
}
