<?php
require_once '../../functions/autoload.php';

$id = $_GET['id'] ?? FALSE;

try {

    $juego = Juego::juego_x_id($id);

    $nombre_imagen = $juego->getImg();
    if (!empty($nombre_imagen)) {
        Imagen::borrarImagen("../../img/covers/" . $nombre_imagen);
    }

    $juego->clear_generos();
    $juego->delete();

    Alerta::add_alerta('danger', "El juego " . $juego->getTitulo() . " se eliminó correctamente.");
} catch (Exception $e) {

    if ($e->getCode() == 23000) {
        Alerta::add_alerta('danger', "El juego no se pudo eliminar porque esta en una relación con otra entidad. Elimine las relaciones e intente de nuevo.");
    } else {
        Alerta::add_alerta('danger', "El juego no se puede eliminar.");
    }
}


header("Location: ../index.php?view=admin_juegos");
