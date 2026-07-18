<?php
$userID = $_SESSION['loggedIn']['id'] ?? FALSE;
$compras = Compra::compras_x_idUsuario($userID);
?>

<div class="container my-5 text-white vh-100">
    <h1 class="text-center fs-2 my-5 fw-bold" style="letter-spacing: -0.5px;">Panel de Usuario</h1>

    <div class="p-4 rounded-3 border border-secondary border-opacity-25 shadow-lg mb-4" style="background-color: #121212 !important;">

        <div class="mb-4">
            <?= Alerta::get_alertas(); ?>
        </div>

        <div class="row">
            <div class="col-12">

                <h2 class="fs-4 mb-4 fw-bold text-start text-secondary text-uppercase tracking-wider">Historial de compras</h2>

                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle m-0">
                        <thead>
                            <tr class="border-bottom border-secondary border-opacity-25 text-secondary small text-uppercase">
                                <th scope="col" width="20%">Fecha</th>
                                <th scope="col">Detalle de Productos</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!empty($compras)) { ?>
                                <?php foreach ($compras as $C) { ?>
                                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                        <td class="align-middle">
                                            <p class="h5 m-0 text-white-50 fw-semibold"><?= $C['fecha'] ?></p>
                                        </td>
                                        <td class="align-middle">
                                            <p class="m-0 text-white fs-6"><?= $C['detalle'] ?></p>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="2" class="text-center py-4 text-white-50 fst-italic">
                                        No registrás ninguna compra en tu cuenta todavía.
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>