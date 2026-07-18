<?php
require_once "../../functions/autoload.php";

$nombre  = $_POST['nombre'] ?? '';
$email   = $_POST['email'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';

if (empty($nombre) || empty($email) || empty($mensaje)) {
    $_SESSION['alerta_contacto'] = [
        'tipo'    => 'danger',
        'mensaje' => 'Todos los campos son obligatorios.'
    ];
    
   
    header("Location: ../../index.php?view=contacto");
}

$_SESSION['alerta_contacto'] = [
    'tipo'    => 'success',
    'mensaje' => "¡Gracias por escribirnos, <strong>" . $nombre . "</strong>! Tu consulta fue enviada con éxito."
];


header("Location: ../../index.php?view=contacto");
