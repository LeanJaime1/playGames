<?php
require_once '../../functions/autoload.php';

$postData = $_POST;
$fileDate = $_FILES;


try {
    Plataforma::insert(
        $postData['nombre']
    );
     Alerta::add_alerta('success', "La plataforma <strong>" . $postData['nombre'] . "</strong> se creó correctamente");
} catch (Exception $e) {

    Alerta::add_alerta('danger', "La plataforma no se pudo crear, disculpe las molestas ocasionadas.");
}


header('Location: ../index.php?view=admin_plataforma');