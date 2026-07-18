<?php
$items = Carrito::get_carrito();
?>

<h1 class="text-center fs-2 my-5 text-white">Carrito de Compras</h1>

<div class="container my-4 text-white vh-100">

    <?php if (count($items)) { ?>

        <form action="admin/actions/update_items_acc.php" method="POST">

            <div class="p-4 rounded-3 border border-secondary border-opacity-25 table-responsive shadow-lg" style="background-color: #121212 !important;">

                <table class="table table-dark table-hover align-middle m-0">

                    <thead>
                        <tr>
                            <th scope="col" width="15%">Imagen</th>
                            <th scope="col">Datos del producto</th>
                            <th scope="col" width="15%">Cantidad</th>
                            <th class="text-end" scope="col" width="15%">Precio Unitario</th>
                            <th class="text-end" scope="col" width="15%">Subtotal</th>
                            <th class="text-end pe-3" scope="col" width="10%"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($items as $id => $item) {  ?>
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <td><img src="img/covers/<?= $item['portada'] ?>" alt="Imagen ilustrativa de <?= $item['portada'] ?>" class="img-fluid rounded shadow-sm"></td>

                                <td class="align-middle">
                                    <h2 class="h5 text-white"><?= $item['producto'] ?></h2>
                                </td>

                                <td class="align-middle">
                                    <label for="q_<?= $id ?>" class="visually-hidden">Cantidad</label>
                                    <input type="number" class="form-control text-center bg-dark text-white border-secondary border-opacity-50 mx-auto mx-md-0" value="<?= $item['cantidad'] ?>" id="q_<?= $id ?>" name="q[<?= $id ?>]" min="1" style="max-width: 80px; border-radius: 6px;">
                                </td>

                                <td class="text-end align-middle">
                                    <p class="h5 py-3 text-white-50">$<?= number_format($item['precio'], 2, ",", ".") ?></p>
                                </td>

                                <td class="text-end align-middle">
                                    <p class="h5 py-3 text-white fw-bold">$ <?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?></p>
                                </td>

                                <td class="text-end align-middle pe-3">
                                    <a href="admin/actions/remove_items_acc.php?id=<?= $id ?>" class="btn btn-sm btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>

                        <tr style="border-top: 2px solid rgba(255,255,255,0.1);">
                            <td colspan="4" class="text-end align-middle">
                                <h2 class="h5 py-3 text-secondary">Total: </h2>
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3 text-primary fw-bold">$<?= number_format(Carrito::precio_total(), 2, ",", ".") ?></p>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>

                </table>

            </div>

            <div class="d-flex flex-wrap justify-content-end gap-2 mt-4">
                <a href="admin/actions/clear_items_acc.php" role="button" class="btn btn-outline-danger px-3" style="border-radius: 6px;">Vaciar Carrito</a>
                <a href="index.php?view=juegos" role="button" class="btn btn-outline-light px-3" style="border-radius: 6px;">Seguir comprando</a>
                <input type="submit" value="Actualizar Cantidades" class="btn btn-warning fw-bold px-3" style="border-radius: 6px;">
                <a href="index.php?view=finalizar_pago" role="button" class="btn btn-primary fw-bold px-4 shadow-sm" style="border-radius: 6px;">Finalizar compra</a>
            </div>

        </form>

    <?php } else { ?>

        <div class="vh-100">


            <div class="p-5 text-center rounded-3 border border-secondary border-opacity-25" style="background-color: #121212;">
                <h2 class="text-center text-danger mb-5">Su carrito esta vacío.</h2>
            </div>

        </div>

    <?php } ?>

</div>