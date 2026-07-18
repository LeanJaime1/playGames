<?php
require_once '../../functions/autoload.php';


$id =$_GET['id'] ?? FALSE;

$postData = $_POST;


try{
    $plataforma = Plataforma::plataforma_x_id($id);

    $plataforma->edit(
        $postData['nombre'],
    );
    Alerta::add_alerta('warning', "La plataforma " . $plataforma->getNombre() .  " se editó correctamente.");

} catch(Exception $e){

    Alerta::add_alerta('danger', "La plataforma no se puede editar, disculpe las molestias ocasionadas.");
}

header('Location: ../index.php?view=admin_plataforma');