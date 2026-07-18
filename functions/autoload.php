<?php
session_start();

function autoloadClasses(string $nombreClase){

    
$archivoClase = __DIR__ . "/../classes/$nombreClase.php";

if(file_exists($archivoClase)){
    require_once $archivoClase;
}   else {
    die("No se pudo cargar la clas: $nombreClase");
}

}

spl_autoload_register('autoloadClasses');

