<?php
require_once '../../functions/autoload.php';


$id =$_GET['id'] ?? FALSE;

$postData = $_POST;


try{
    $genero = Genero::genero_x_id($id);

    $genero->edit(
        $postData['titulo'],
    );

    Alerta::add_alerta('warning', "El género " . $genero->getNombre() . " se editó correctamente.");
} catch(Exception $e){

    Alerta::add_alerta('danger', "El género no se puede editar, disculpe las molestias ocasionadas.");
}

header('Location: ../index.php?view=admin_genero');