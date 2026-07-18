<?php
require_once '../../functions/autoload.php';

$id = $_GET['id'] ?? FALSE;

try{
    $plataforma = Plataforma::plataforma_x_id($id);
    $plataforma->delete();
    Alerta::add_alerta('danger', "La plataforma " . $plataforma->getNombre() . " se eliminó correctamente.");
} catch(Exception $e){
    if($e->getCode() == 23000){
        Alerta::add_alerta('danger', "La plataforma no se pudo eliminar porque esta en una relación con otra entidad. Elimine las relaciones e intente de nuevo.");
    } else {
        Alerta::add_alerta('danger', "La plataforma no se puede eliminar.");
    }
}


header('Location: ../index.php?view=admin_plataforma');

