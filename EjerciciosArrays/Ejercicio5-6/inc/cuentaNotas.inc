<?php

//FUNCIÓN QUE DEVUELVE UN ARRAY CON LOS CONTADORES DE CADA NOTA FORMATEADA 

$arrayStrings = [
  'Muy deficiente',
  'Deficiente',
  'Insuficiente',
  'Suficiente',
  'Bien',
  'Notable',
  'Sobresaliente'
];

function getNotasCount(array $arrayNotasCurso):array
{
  $arrayNotasCount = [0, 0, 0, 0, 0, 0, 0];

  foreach ($arrayNotasCurso as $key => $value) {

    switch ($value) {
      case 0:
      case 1:
        $arrayNotasCount[0]++;
        break;
      case 2:
      case 3:
        $arrayNotasCount[1]++;
        break;
      case 4:
        $arrayNotasCount[2]++;
        break;
      case 5:
        $arrayNotasCount[3]++;
        break;
      case 6:
        $arrayNotasCount[4]++;
        break;
      case 7:
      case 8:
        $arrayNotasCount[5]++;
        break;
      case 9:
      case 10:
        $arrayNotasCount[6]++;
        break;
    }
  }
  return $arrayNotasCount;
}


