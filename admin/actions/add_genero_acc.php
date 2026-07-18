<?php
require_once '../../functions/autoload.php';


$postData = $_POST;
$fileDate = $_FILES;




try {
    Genero::insert(
        $postData['nombre']
    );

    Alerta::add_alerta('success', "El género <strong>" . $postData['nombre'] . "</strong> se creó correctamente");
} catch (Exception $e) {

    Alerta::add_alerta('danger', "El género no se pudo crear, disculpe las molestas ocasionadas.");
}


header('Location: ../index.php?view=admin_genero');
