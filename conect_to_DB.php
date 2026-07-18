<?php

require_once 'functions/autoload.php';

$conexion = Conexion::getConexion();

$query = "SELECT * FROM juego";

$PDOStatement = $conexion->prepare($query);
$PDOStatement->setFetchMode(PDO::FETCH_CLASS, 'juego');
$PDOStatement->execute();





$juego = $PDOStatement->fetchAll();





