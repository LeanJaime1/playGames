<?php
$id = $_GET['id'] ?? FALSE;
$plataforma = Plataforma::plataforma_x_id($id);
?>

<div class="container my-5 vh-100">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <h1 class="text-center text-white mb-5 fw-bold">¿Estás seguro que deseas eliminar esta plataforma?</h1>
            
            <div class="card bg-dark text-white shadow-lg border-0 p-4 p-md-5">
                <div class="row justify-content-center align-items-center g-4">
                    
                    <div class="col-12 col-md-7 text-center d-flex flex-column justify-content-center align-items-center">
                        
                        <span class="text-muted text-uppercase small fw-bold mb-1">Confirmar Eliminación</span>
                        
                        <p class="h4 text-secondary mb-2">Nombre de la Plataforma</p>
                        <p class="fs-3 fw-bold text-white mb-4"><?= $plataforma->getNombre() ?></p>

                        <div class="mt-2">
                            <a href="actions/delete_plataforma_acc.php?id=<?= $plataforma->getId() ?>" role="button" class="btn btn-danger btn-lg px-5 fw-bold text-uppercase shadow-sm">
                                Eliminar
                            </a>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>