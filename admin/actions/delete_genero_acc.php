<?php
require_once '../../functions/autoload.php';
$id = $_GET['id'] ?? FALSE;

try{
    $genero =Genero::genero_x_id($id);
    $genero->delete();

    Alerta::add_alerta('danger', "El género " . $genero->getNombre() . " se eliminó correctamente.");
} catch(Exception $e){
    
    if($e->getCode() == 23000){
        Alerta::add_alerta('danger', "El género no se pudo eliminar porque esta en una relación con otra entidad. Elimine las relaciones e intente de nuevo.");
    } else {
        Alerta::add_alerta('danger', "El género no se puede eliminar.");
    }

}


header('Location: ../index.php?view=admin_genero');

