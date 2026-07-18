<?php
$id = $_GET['id'] ?? FALSE;
$genero = Genero::genero_x_id($id);
?>
<div class="container my-5 vh-100">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <h1 class="text-center text-white mb-5 fw-bold">Editar los datos de un género.</h1>

            <div class="card bg-dark text-white shadow-lg border-0 p-4 p-md-5 text-center">
                
                <form action="actions/edit_genero_acc.php?id=<?= $genero->getId() ?>" method="POST" enctype="multipart/form-data" class="row g-3 justify-content-center">

                    <div class="col-md-8 col-lg-6">
                        <div class="mx-auto" style="max-width: 400px;">
                            <label for="titulo" class="form-label text-white fw-bold">Nombre</label>
                            <input type="text" class="form-control text-center" id="titulo" name="titulo" value="<?= $genero->getNombre() ?>" required>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-5"> 
                        <button type="submit" class="btn btn-warning btn-lg px-5 py-2 fw-bold text-uppercase shadow">Editar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>