<?php
require_once "../../functions/autoload.php";


$postData = $_POST;

echo "<pre>";
print_r($postData);
echo "</pre>";

$login = Autenticacion::log_in($postData['username'], $postData['pass']);

if($login){

    if($login == "usuario"){
        header('location: ../../index.php?view=juegos');
    } else{
        header('location: ../index.php?view=dashboard');
    }

} else {
    header('location: ../../index.php?view=login');
}