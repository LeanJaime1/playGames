<?php
require_once 'functions/autoload.php';

$vista = Vista::validar_vista($_GET['view'] ?? 'home');

$userData = $_SESSION['loggedIn'] ?? FALSE;
Autenticacion::verify($vista->getRestringida());

$generosDisponibles = Genero::menu_x_genero();

$itemsCarrito = Carrito::get_carrito();
$cantidadCarrito = count($itemsCarrito);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css?v=1.0.1">
    <title><?= $vista->getTitulo() ?></title>
</head>

<body class="bg-dark">

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0f172a">
        <div class="container">
            <a class="navbar-brand" href="index.php?view=home">PlayGames</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto align-items-center gap-2">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?view=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?view=juegos">Catalogo</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?view=quienes_somos">¿Quienes somos?</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?view=contacto">Contacto</a>
                    </li>

                    <?php if ($userData) { ?>
                        <li class="nav-item ms-lg-2">
                            <a class="btn d-flex align-items-center gap-2 py-1.5 px-3" href="index.php?view=panel_usuario"
                                style="border-radius: 8px; font-size: 0.9rem; border: 1px solid rgba(255, 255, 255, 0.08); background-color: #1e293b;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white-50">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="fw-bold text-white"><?= $userData['username'] ?? "" ?></span>
                            </a>
                        </li>
                    <?php } ?>

                    <li class="nav-item <?= $userData ? "d-none" : "" ?>">
                        <a class="nav-link fw-bold text-white" href="index.php?view=login">Login</a>
                    </li>

                    <li class="nav-item <?= $userData ? "" : "d-none" ?>">
                        <a class="nav-link text-white-50 btn btn-sm btn-link text-decoration-none px-2" href="admin/actions/auth_logout.php">
                            <span class="fw-light small">Logout</span>
                        </a>
                    </li>


                    <li class="nav-item me-lg-2">
                        <a class="nav-link d-flex align-items-center gap-1 position-relative px-2" href="index.php?view=carrito" title="Ver Carrito">
                            <i class="bi bi-cart3 fs-5 text-white"></i>
                            <span class="d-lg-none fw-bold">Carrito</span>
                            <?php if ($cantidadCarrito > 0) { ?>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem; transform: translate(-30%, 20%) !important;">
                                    <?= $cantidadCarrito ?>
                                </span>
                            <?php } ?>
                        </a>
                    </li>

                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-sm btn-outline-primary fw-bold px-3 py-1.5" href="admin/index.php" style="border-radius: 6px; font-size: 0.85rem;">
                            Ir al Admin
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <main class="container-fluid">
        <?php
        require_once "views/{$vista->getNombre()}.php";
        ?>
    </main>

    <footer class="bg-black text-center text-white p-4">PlayGames@2026 | Designed by <a href="index.php?view=autor" class="text-primary fw-bold" style="text-decoration: none;">Leandro Jaime</a></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>