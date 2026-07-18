<?php
$id = $_GET['id'] ?? FALSE;
$juego = Juego::juego_x_id($id);
?>

<div class="container my-5 vh-100">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <h1 class="text-center text-white mb-5 fw-bold">¿Estás seguro que deseas eliminar este juego?</h1>
            
            <div class="card bg-dark text-white shadow-lg border-0 p-4 p-md-5">
                <div class="row align-items-center g-4">
                    
                    <div class="col-12 col-md-5 text-center">
                        <img src="../img/covers/<?= $juego->getImg() ?>" alt="Imagen Ilustrativa de <?= $juego->getTitulo() ?>" class="img-fluid rounded shadow border border-secondary" style="max-height: 350px; object-fit: cover;">
                    </div>

                    <div class="col-12 col-md-7 text-center text-md-start d-flex flex-column justify-content-center">
                        
                        <span class="text-muted text-uppercase small fw-bold mb-1">Confirmar Eliminación</span>
                        
                        <p class="h4 text-secondary mb-2">Nombre del Juego</p>
                        <p class="fs-3 fw-bold text-white mb-4"><?= $juego->getTitulo() ?></p>

                        <div class="mt-2">
                            <a href="actions/delete_juego_acc.php?id=<?= $juego->getId() ?>" role="button" class="btn btn-danger btn-lg px-5 fw-bold text-uppercase shadow-sm">
                                Eliminar
                            </a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>