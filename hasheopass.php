<?php

echo "<h1>PASSWORDS Y HASHES </h1>";



$passwordProvisto = "usuario123";

$passwordProvistoPH = password_hash($passwordProvisto, PASSWORD_DEFAULT);

echo " <p>El password es: " . $passwordProvisto . "</p>";

echo " <p>El password hasheado es: " . $passwordProvistoPH . "</p>";


$hashGuardado = '$2y$10$sJkEDBz0tOQ2w5PHbXPWH.Ke5FJO53OzqjO7JniYOmiXkgf0kChvG';

if(password_verify($passwordProvisto, $hashGuardado)){
    echo "<p> Password PH correcto!</p>";
} else {
    echo "<p> Password PH incorrecto! </p>";
}