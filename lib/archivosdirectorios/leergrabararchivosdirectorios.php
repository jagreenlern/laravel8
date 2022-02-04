<?php
require_once "archivo.class.php";
require_once "carpeta.class.php";
//$iarchivo = new archivo("test.txt");
//$iarchivo->nuevo();
$iarchivo = new archivo("2.txt");
$iarchivo->abrircrearparaleeroescribir();
$iarchivo->leer();
$iarchivo->escribir("esto es un archivo php");
$iarchivo->leer();

$iarchivo->cerrar();
$iarchivo = new archivo("1.txt");

$iarchivo->renombrar("nuevo.txt");
$iarchivo->renombrar("1.txt");
$iarchivo = new archivo("1.txt");
$iarchivo->copiar("6.txt");
$iarchivo->borrar();

//$iarchivo->borrar();
$icarpeta = new carpeta("1");
$icarpeta->leercontenido();

$icarpeta->renombrar(rand(3,100));
$icarpeta->copiarrecursiva(rand(3,100));
$icarpeta->renombrar("1");
$icarpeta->copiarrecursiva(rand(3,100));
$icarpeta->borrarcascada();
$icarpeta = new carpeta("nuevo");
$icarpeta->nuevo();


//xfc $icarpeta->deletedir();


//$icarpeta->deleteDirectory()


?>