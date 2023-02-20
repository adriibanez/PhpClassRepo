<?php

//FUNCIÓN QUE SACA UN NOMBRE RANDOM DE UNA LISTA DE NOMRBES

$arrayNombres = [
    "Teodoro Cuenca",
    "Nieves Quiros",
    "Stephanie Santos",
    "Daniel Myers",
    "Jesse Thompson",
    "Samantha Figueroa",
    "Vilma Muñoz Gonzalo",
    "Teresita Maestre-Alberdi",
    "José María Torres",
    "Eduardo Muñoz Rojas",
    "Tiburcio Murillo Salamanca",
    "Renato Ayuso Santamaria",
    "Juan José Hierro-Ibañez",
    "Rosalía Vendrell Ureña",
    "Timoteo Tapia Núñez",
    "Natanael Pozo Mesa",
];

function getFullNomRandom($arrayNombres): string
{
    $randomNum = rand(0, (count($arrayNombres) - 1));
    return $arrayNombres[$randomNum];
}
