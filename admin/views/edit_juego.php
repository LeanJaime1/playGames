<?php
$id = $_GET['id'] ?? FALSE;
$juego = Juego::juego_x_id($id);
$gen_checked = $juego->getGeneros_ids();


$plataformas = Plataforma::plataforma_completa();
$generosCompletos = Genero::genero_completo();



?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <h1 class="text-center text-white mb-5 fw-bold">Editar los datos de un juego</h1>

            <div class="card bg-dark text-white shadow-lg border-0 p-4 p-md-5">

                <form action="actions/edit_juego_acc.php?id=<?= $juego->getId() ?>" method="POST" enctype="multipart/form-data" class="row g-3">

                    <div class="col-md-6">
                        <label for="titulo" class="form-label text-white fw-bold">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $juego->getTitulo() ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="lanzamiento" class="form-label text-white fw-bold">Año de Lanzamiento</label>
                        <input type="number" class="form-control" id="lanzamiento" name="lanzamiento" min="1950" max="2030" value="<?= $juego->getLanzamiento() ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="precio" class="form-label text-white fw-bold">Precio (ARS)</label>
                        <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?= $juego->getPrecio() ?>" required>
                    </div>

                    <div class="col-md-6">
                        <label for="plataforma_id" class="form-label text-white fw-bold">Plataforma</label>

                        <select class="form-select" id="plataforma_id" name="plataforma_id" required>
                            <option selected disabled value="">Elija una opción</option>
                            <?php foreach ($plataformas as $p) { ?>
                                <option value="<?= $p->getId() ?>" <?= $p->getId() == $juego->getPlataforma()->getId() ? "selected" : "" ?>><?= $p->getNombre() ?></option>
                            <?php } ?>
                        </select>
                    </div>

                     <div class="col-md-6">
                        <label for="exclusivo_de_ps" class="form-label text-white fw-bold">Exclusivo de PlayStation</label>
                        <select class="form-select" id="exclusivo_de_ps" name="exclusivo_de_ps" required>
                            <option value="1" <?= $juego->getExclusivo_de_ps() == 1 ? "selected" : "" ?>>Sí</option>
                            <option value="0" <?= $juego->getExclusivo_de_ps() == 0 ? "selected" : "" ?>>No</option>
                        </select>
                    </div>


                    <div class="col-12">
                        <label class="form-label text-white fw-bold mb-3">Géneros</label>

                        <div class="row g-3 bg-secondary bg-opacity-10 p-3 rounded border border-secondary border-opacity-25">
                            <?php foreach ($generosCompletos as $g) { ?>
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-check custom-checkbox">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="generos[]"
                                            id="generos_<?= $g->getId() ?>"
                                            value="<?= $g->getId() ?>"
                                            <?= in_array($g->getId(), $gen_checked) ? "checked" : "" ?>>

                                        <label class="form-check-label text-white-50 text-wrap dynamic-label" for="generos_<?= $g->getId() ?>">
                                            <?= $g->getNombre() ?>
                                        </label>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                   
                    <div class="col-12 my-4">
                        <hr class="border-secondary">
                    </div>

                    <div class="col-md-4 text-center">
                        <label class="form-label text-white fw-bold d-block">Imagen actual</label>
                        <img src="../img/covers/<?= $juego->getImg() ?>" alt="Imagen ilustrativa de <?= $juego->getTitulo() ?>" class="img-fluid rounded shadow-sm mx-auto d-block" style="max-height: 200px; object-fit: cover;">
                        <input type="hidden" class="form-control" id="img_og" name="img_og" value="<?= $juego->getImg() ?>" required>
                    </div>

                    <div class="col-md-8 d-flex flex-column justify-content-center">
                        <label for="img" class="form-label text-white fw-bold">Reemplazar imagen</label>
                        <input type="file" class="form-control" id="img" name="img">
                    </div>

                    <div class="col-12 my-4">
                        <hr class="border-secondary">
                    </div>

                    <div class="col-12">
                        <label for="descripcion" class="form-label text-white fw-bold">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="4" class="form-control"><?= $juego->getDescripcion() ?></textarea>
                    </div>

                    <div class="col-12 text-center mt-5">
                        <button type="submit" class="btn btn-warning btn-lg px-5 py-2 fw-bold text-uppercase shadow">Editar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>