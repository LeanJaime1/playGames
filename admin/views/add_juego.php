<?php
$juegos = Juego::catalogo_completo();
$generos = Genero::genero_completo();
$plataformas = Plataforma::plataforma_completa();
?>


<h1 class="text-white text-center mt-5">Creación de Juego</h1>
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-lg-10 col-xl-8">
        <form class="row g-3" action="actions/add_juego_acc.php" method="POST" enctype="multipart/form-data">

            <div class="col-md-6 mb-3">
                <label for="titulo" class="form-label text-white fw-bold">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ej: God of War" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="lanzamiento" class="form-label text-white fw-bold">Año de Lanzamiento</label>
                <input type="number" class="form-control" id="lanzamiento" name="lanzamiento" min="1950" max="2030" placeholder="Ej: 2022" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="precio" class="form-label text-white fw-bold">Precio (ARS)</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" placeholder="Ej: 50000" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="plataforma_id" class="form-label text-white fw-bold">Plataforma</label>
                <select class="form-select" id="plataforma_id" name="plataforma_id" required>
                    <option selected disabled value="">Seleccionar plataforma...</option>
                    <?php foreach ($plataformas as $p) { ?>
                        <option value="<?= $p->getId() ?>"><?= $p->getNombre() ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label text-white fw-bold d-block mb-2">Género</label>
                <div class="d-flex flex-wrap gap-3">
                    <?php foreach ($generos as $g) { ?>
                        <div class="form-check form-check-inline m-0">
                            <input class="form-check-input" type="checkbox" name="generos[]" id="genero_<?= $g->getId() ?>" value="<?= $g->getId() ?>">
                            <label class="form-check-label text-white" for="genero_<?= $g->getId() ?>">
                                <?= $g->getNombre() ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="exclusivo_de_ps" class="form-label text-white fw-bold">Exclusivo de PlayStation</label>
                <select class="form-select" id="exclusivo_de_ps" name="exclusivo_de_ps" required>
                    <option selected disabled value="">Seleccionar...</option>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="col-12 mb-3">
                <label for="img" class="form-label text-white fw-bold">Imagen de Portada</label>
                <input type="file" class="form-control" id="img" name="img" required>
            </div>

            <div class="col-12 mb-4">
                <label for="descripcion" class="form-label text-white fw-bold">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="form-control" placeholder="Escribe una breve descripción del juego..."></textarea>
            </div>

            <div class="col-12 text-center"> <button type="submit" class="btn btn-primary px-5 py-2 fw-bold text-uppercase">Cargar Juego</button>
            </div>

        </form>
    </div>
</div>