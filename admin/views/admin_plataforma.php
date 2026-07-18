<?php
$plataformas = Plataforma::plataforma_completa();

?>

<div class="container p-4">
    <h1 class="mb-3 fw-bold text-white fs-3 mt-4">Administración de Plataformas</h1>

    <div class="row">
        <div class="col-12 mb-3">
            <?= Alerta::get_alertas(); ?>
        </div>
    </div>
    <hr class="border border w-50 mb-5">
    <h2 class="visually-hidden">Listado completo de plataformas registradas</h2>

    <div class="row g-4 vh-100 ">
        <div class="col-12">
            <div class="bg-dark p-4 rounded-3 border border-secondary border-opacity-10 table-responsive">

                <table class="table table-dark table-hover align-middle m-0">
                    <thead>
                        <tr class="text-secondary small text-uppercase tracking-wider">
                            <th scope="col" width="20%">Nombre</th>
                            <th scope="col" class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($plataformas as $p) { ?>
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <td class="fw-bold text-white"><?= $p->getNombre() ?></td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-end">
                                        <a href="index.php?view=edit_plataforma&id=<?= $p->getId() ?>" role="button" class="btn btn-sm btn-warning fw-semibold px-3" style="border-radius: 6px;">Editar</a>
                                        <a href="index.php?view=delete_plataforma&id=<?= $p->getId() ?>" role="button" class="btn btn-sm btn-danger fw-semibold px-3" style="border-radius: 6px;">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

            <div class="mt-4 text-center">
                <a href="index.php?view=add_plataforma" class="btn btn-primary fw-bold px-4 py-2" style="border-radius: 8px;">
                    Cargar nueva plataforma
                </a>
            </div>
        </div>
    </div>
</div>