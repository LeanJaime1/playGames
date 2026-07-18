<?php
$id = $_GET['id'] ?? 0;
$juego = Juego::juego_x_id($id);

?>

<div class="container py-5 min-vh-100">
    <div class="row mb-4">
        <div class="col-12 text-start">
            <a href="index.php?view=juegos" class="btn btn-outline-primary btn-sm px-3 shadow-sm">
                ← Volver a los juegos
            </a>
        </div>
    </div>

    <div class="row g-4 justify-content-center">

        <?php if (!empty($juego)) { ?>
            <div class="row g-5 align-items-start">

                <div class="col-12 col-md-5">
                    <div class="shadow-lg overflow-hidden" style="border-radius: 15px;">
                        <img src="img/covers/<?= $juego->getImg() ?>" class="img-fluid w-100 d-block" alt="Imagen de <?= $juego->getTitulo() ?>">
                    </div>
                </div>

                <div class="col-12 col-md-7">

                    <h1 class="display-5 fw-bold text-white mb-3"><?= $juego->getTitulo() ?></h1>

                    <div class="mb-4 d-flex gap-2">
                        <span class="badge rounded-pill text-bg-primary px-3 py-2 fw-bold"><?= $juego->getPlataforma()->getNombre() ?></span>

                        <?php foreach ($juego->getGeneros() as $genero) { ?>
                            <span class="badge rounded-pill bg-dark text-white-50 border border-secondary border-opacity-50 px-3 py-2">
                                <?= $genero->getNombre() ?>
                            </span>
                        <?php } ?>
                    </div>



                    <p class="text-secondary small mb-4">
                        Lanzamiento: <span class="text-white"><?= $juego->getLanzamiento() ?></span>
                    </p>

                    <div class="mb-5">
                        <h2 class="fw-bold text-white fs-3 border-bottom border-secondary pb-2 mb-3">Descripción</h2>
                        <p class="lead text-white-50" style="line-height: 1.6; font-size: 1.1rem;">
                            <?= $juego->getDescripcion() ?>
                        </p>
                    </div>




                    <p class="text-white fw-bold mb-4 fs-1">
                        <?= $juego->precio_formateado() ?>
                    </p>

                    <form action="admin/actions/add_item_acc.php" method="GET" class="row">
                        <div class="col-6 d-flex align-items-center">
                            <label for="q" class="fw-bold me-2">Cantidad: </label>
                            <input type="number" class="form-control" value="1" name="q" id="q">
                        </div>
                        <div class="col-6">
                            <input type="submit" value="AGREGAR A CARRITO" class="btn btn-primary w-100 fw-bold">
                            <input type="hidden" value="<?= $id ?>" name="id" id="id">
                        </div>


                    </form>

                </div>
            </div>

        <?php } else { ?>
            <div class="col-12 text-center py-5">
                <div class="bg-dark p-5 rounded-4 border border-secondary">
                    <h2 class="text-white mb-4">No se encontró el producto.</h2>
                    <a href="index.php?view=juegos" class="btn btn-primary px-4">Ir al catálogo</a>
                </div>
            </div>
        <?php } ?>

    </div>
</div>