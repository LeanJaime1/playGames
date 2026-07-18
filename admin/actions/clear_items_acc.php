<?php

require_once "../../functions/autoload.php";


Carrito::clear_items();
header('location: ../../index.php?view=carrito');