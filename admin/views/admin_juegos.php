<?php
$juegos = Juego::catalogo_completo();
?>

<div class="container p-4">
    <h1 class="mb-3 fw-bold text-white fs-3 mt-4">Administración de Juegos</h1>

    <div class="row">
        <div class="col-12 mb-3">
            <?= Alerta::get_alertas(); ?>
        </div>
    </div>
    <hr class="border border w-50 mb-5">

    <h2 class="visually-hidden">Listado completo de juegos registrados</h2>

    <div class="row g-4">
        <div class="col-12">
            <div class="bg-dark p-4 rounded-3 border border-secondary border-opacity-10 table-responsive">

                <table class="table table-dark table-hover align-middle m-0">
                    <thead>
                        <tr class="text-secondary small text-uppercase tracking-wider">
                            <th scope="col" style="width: 80px;">Img</th>
                            <th scope="col">Título</th>
                            <th scope="col" class="d-none d-lg-table-cell" style="width: 25%;">Descripción</th>
                            <th scope="col" class="text-center">Exclusivo</th>
                            <th scope="col" class="text-center">Lanzamiento</th>
                            <th scope="col">Plataforma</th>
                            <th scope="col" style="width: 20%;">Géneros</th>
                            <th scope="col">Precio</th>
                            <th scope="col" class="text-center" style="width: 160px;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($juegos as $j) { ?>
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <td>
                                    <div style="width: 60px; height: 40px; background-color: #000;" class="rounded overflow-hidden d-flex align-items-center justify-content-center">
                                        <img src="../img/covers/<?= $j->getImg() ?>" alt="Portada de <?= $j->getTitulo() ?>" class="img-fluid" style="object-fit: contain; max-height: 100%;">
                                    </div>
                                </td>

                                <td class="fw-bold text-white"><?= $j->getTitulo() ?></td>

                                <td class="text-white-50 small text-truncate d-none d-lg-table-cell" style="max-width: 180px;" title="<?= $j->getDescripcion() ?>">
                                    <?= $j->getDescripcion() ?>
                                </td>

                                <td class="text-center">
                                    <span class="badge <?= $j->getExclusivo_de_ps() ? 'bg-warning text-dark' : 'bg-secondary text-white-50' ?> bg-opacity-75" style="font-size: 0.75rem;">
                                        <?= $j->getExclusivo_de_ps() ? 'Sí' : 'No' ?>
                                    </span>
                                </td>

                                <td class="text-center text-white-50 small"><?= $j->getLanzamiento() ?></td>

                                <td>
                                    <span class="badge bg-dark border border-secondary border-opacity-25 text-warning" style="font-size: 0.7rem;">
                                        <?= $j->getPlataforma()->getNombre() ?>
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex flex-wrap gap-1 align-items-center">
                                        <?php foreach ($j->getGeneros() as $GEN) { ?>
                                            <span class="badge bg-secondary bg-opacity-25 text-white border border-secondary border-opacity-50" style="font-size: 0.7rem; padding: 0.35em 0.65em;">
                                                <?= $GEN->getNombre() ?>
                                            </span>
                                        <?php } ?>
                                    </div>
                                </td>

                                <td class="fw-bold text-white text-nowrap">
                                    <?= $j->precio_formateado() ?>
                                </td>

                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="index.php?view=edit_juego&id=<?= $j->getId() ?>" role="button" class="btn btn-sm btn-warning fw-semibold px-2" style="border-radius: 6px; font-size: 0.8rem;">Editar</a>
                                        <a href="index.php?view=delete_juego&id=<?= $j->getId() ?>" role="button" class="btn btn-sm btn-danger fw-semibold px-2" style="border-radius: 6px; font-size: 0.8rem;">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

            <div class="mt-4 text-center">
                <a href="index.php?view=add_juego" class="btn btn-primary fw-bold px-4 py-2" style="border-radius: 8px;">
                    Cargar nuevo juego
                </a>
            </div>
        </div>
    </div>
</div>