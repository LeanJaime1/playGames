<?php
require_once '../../functions/autoload.php';



$postData = $_POST;
$fileData = $_FILES['img'] ?? FALSE;
$id = $_GET['id'] ?? FALSE;

try {
    $juego = Juego::juego_x_id($id);

    $juego->clear_generos();

    if (isset($postData['generos'])) {
        foreach ($postData['generos'] as $genero_id) {
            $juego->add_generos($id, $genero_id);
        }
    }

    if (!empty($fileData['tmp_name'])) {
        $imagen = Imagen::subirImagen("../../img/covers/", $fileData);

        if (!empty($postData['img_og'])) {
            Imagen::borrarImagen("../../img/covers/" . $postData['img_og']);
        }
    } else {
        $imagen = $postData['img_og'];
    }

    $juego->edit(
        $postData['titulo'],
        $postData['exclusivo_de_ps'],
        $postData['lanzamiento'],
        $postData['plataforma_id'],
        $postData['precio'],
        $imagen,
        $postData['descripcion']
    );
    Alerta::add_alerta('warning', "El juego " . $juego->getTitulo() .  " se editó correctamente.");
} catch (Exception $e) {
    Alerta::add_alerta('danger', "El juego no se puede editar, disculpe las molestias ocasionadas.");
}

header('Location: ../index.php?view=admin_juegos');
