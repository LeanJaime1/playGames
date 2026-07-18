<?php
$items = Carrito::get_carrito();
?>

<div class="container my-5 text-white vh-100">
    <h1 class="text-center fs-2 my-5 fw-bold" style="letter-spacing: -0.5px;">Finalizar Pago</h1>

    <div class="p-4 p-md-5 rounded-3 border border-secondary border-opacity-25 shadow-lg mb-4" style="background-color: #121212 !important;">

        <div class="row">
            <div class="col-12">

                <section class="mb-5 pb-4 border-bottom border-secondary border-opacity-10">
                    <h2 class="fs-5 mb-3 fw-bold text-secondary text-uppercase tracking-wider">Datos de Usuario</h2>
                    <p class="h5 text-white">
                        <span class="text-white-50 fw-normal">Nombre de usuario:</span> 
                        <?= $_SESSION['loggedIn']['nombre_completo'] ?? '' ?>
                    </p>
                </section>

                <section class="mb-4">
                    <h2 class="fs-5 mb-4 fw-bold text-secondary text-uppercase tracking-wider">Resumen del Pedido</h2>
                    
                    <div class="table-responsive">
                        <table class="table table-dark table-hover align-middle m-0">
                            <thead>
                                <tr class="border-bottom border-secondary border-opacity-25 text-secondary small text-uppercase">
                                    <th scope="col">Datos del producto</th>
                                    <th scope="col" width="15%">Cantidad</th>
                                    <th scope="col" class="text-end" width="15%">Precio unitario</th>
                                    <th scope="col" class="text-end" width="15%">Subtotal</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($items as $key => $item) { ?>
                                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                        <td class="align-middle">
                                            <h3 class="h6 m-0 fw-semibold text-white"><?= $item['producto'] ?></h3>
                                        </td>

                                        <td class="align-middle">
                                            <p class="m-0 text-white-50 fs-6"><?= $item['cantidad'] ?></p>
                                        </td>

                                        <td class="text-end align-middle">
                                            <p class="m-0 text-white-50 fs-6">$<?= number_format($item['precio'], 2, ",", ".") ?></p>
                                        </td>

                                        <td class="text-end align-middle">
                                            <p class="m-0 text-white fs-6 fw-semibold">$<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?></p>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <tr class="border-top border-secondary border-opacity-25">
                                    <td colspan="3" class="text-end border-0">
                                        <h4 class="fs-5 m-0 fw-bold text-secondary text-uppercase tracking-wider pt-3">Total:</h4>
                                    </td>
                                    <td class="text-end border-0">
                                        <p class="fs-4 m-0 fw-bold text-primary pt-2">$<?= number_format(Carrito::precio_total(), 2, ",", ".") ?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <div class="mt-5 d-flex justify-content-center">
                    <a href="admin/actions/checkout_acc.php" role="button" class="btn btn-primary fw-bold px-5 py-2.5 text-uppercase shadow" style="border-radius: 6px; letter-spacing: 0.5px;">
                        Confirmar y Pagar
                    </a>
                </div>

            </div>
        </div>

    </div>
</div>