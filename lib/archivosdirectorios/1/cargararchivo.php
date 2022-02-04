<?php
require_once "archivo.class.php";
$iarchivo = new archivo("1.txt");
$iarchivo->abrirparaleeroescribir();
$iarchivo->leer();
$iarchivo->escribir("esto es un archivo php");
$iarchivo->leer();
$iarchivo->cerrar();
?>