<?php
require_once '../../functions/autoload.php';


$postData = $_POST;
$datosArchivo= $_FILES['img'];

echo "<pre>";
print_r($postData);
echo "</pre>";

try {


    $imagen = Imagen::subirImagen("../../img/covers", $datosArchivo);

    $juego_id = Juego::insert(
        $postData['titulo'],
        $postData['exclusivo_de_ps'],
        $postData['lanzamiento'],
        $postData['plataforma_id'],
        $postData['precio'],
        $imagen,
        $postData['descripcion']
    );

    if(isset($postData['generos'])){
        foreach($postData['generos'] as $genero_id){
            Juego::add_generos($juego_id, $genero_id);
        }
    }

    Alerta::add_alerta('success', "El juego <strong>" . $postData['titulo'] . "</strong> se creó correctamente");

} catch (Exception $e) {
    Alerta::add_alerta('danger', "El juego no se pudo crear, disculpe las molestas ocasionadas.");
}

header('Location: ../index.php?view=admin_juegos');



