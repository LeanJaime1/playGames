<?php
$id = $_GET['id'] ?? FALSE;
$plataforma = Plataforma::plataforma_x_id($id);

?>
<div class="container my-5 vh-100">
    <div class="row justify-content-center">
    <div class="col-lg-10">
        
        <h1 class="text-center text-white mt-2 mb-4 fw-bold fs-2">Editar los datos de una Plataforma</h1>

        <?php if ($plataforma) { ?>

            <div class="card bg-dark text-white shadow-lg border-0 p-4 p-md-5 text-center">
                
                <form action="actions/edit_plataforma_acc.php?id=<?= $plataforma->getId() ?>" method="POST" enctype="multipart/form-data" class="row g-3 justify-content-center">

                    <div class="col-md-8 col-lg-6">
                        <div class="mx-auto" style="max-width: 400px;">
                            <label for="nombre" class="form-label text-white fw-bold">Nombre</label>
                            <input type="text" class="form-control text-center" id="nombre" name="nombre" value="<?= $plataforma->getNombre() ?>" required>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-4"> 
                        <button type="submit" class="btn btn-warning btn-lg px-5 py-2 fw-bold text-uppercase shadow">Editar</button>
                    </div>

                </form>
            </div>

        <?php } else { ?>
            <div class="col-12 text-center py-5">
                <div class="p-5 rounded-4 border border-secondary" style="background-color: #0f172a;">
                    <h2 class="text-white mb-4 fs-4">No se encontró la plataforma solicitada.</h2>
                    <a href="index.php?view=admin_plataforma" class="btn btn-primary px-4">Volver al listado</a>
                </div>
            </div>
        <?php } ?>

    </div>
</div>
</div>