<?php

$alerta = $_SESSION['alerta_contacto'] ?? null;

unset($_SESSION['alerta_contacto']);
?>

<div class="container my-5 text-white">
  
    <h1 class="text-center fs-2 my-5 fw-bold" style="letter-spacing: -0.5px;">Contacto</h1>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

          
            <p class="text-center text-white-50 mb-5 fs-5" style="line-height: 1.6;">
                ¿Tenés alguna duda sobre algún juego del catálogo, querés hacernos una pregunta sobre los envíos o dejarnos una sugerencia? Comunicate con nosotros completando el siguiente formulario y te responderemos a la brevedad.
            </p>

      
            <?php if ($alerta) { ?>
                <div class="alert alert-<?= $alerta['tipo'] ?> alert-dismissible fade show border-0 shadow mb-4 text-white bg-<?= $alerta['tipo'] ?> bg-opacity-10" role="alert" style="border: 1px solid rgba(255,255,255,0.1) !important;">
                    <?= $alerta['mensaje'] ?>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

         
            <form action="admin/actions/contacto_acc.php" method="POST" class="p-4 p-md-5 rounded-3 border border-secondary border-opacity-25 shadow-lg" style="background-color: #121212 !important;">

                <div class="mb-3">
                    <label for="nombre" class="form-label text-secondary small text-uppercase fw-bold">Nombre Completo</label>
                    <input type="text" class="form-control bg-dark text-white border-secondary border-opacity-50" id="nombre" name="nombre" placeholder="Ej: Lean" required style="border-radius: 6px;">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label text-secondary small text-uppercase fw-bold">Correo Electrónico</label>
                    <input type="email" class="form-control bg-dark text-white border-secondary border-opacity-50" id="email" name="email" placeholder="nombre@correo.com" required style="border-radius: 6px;">
                </div>

                <div class="mb-4">
                    <label for="mensaje" class="form-label text-secondary small text-uppercase fw-bold">Mensaje / Consulta</label>
                    <textarea class="form-control bg-dark text-white border-secondary border-opacity-50" id="mensaje" name="mensaje" rows="5" placeholder="Escribí tu consulta acá..." required style="border-radius: 6px; resize: none;"></textarea>
                </div>


                <div class="mt-4 d-flex justify-content-center">
                    <button type="submit" class="btn btn-sm btn-primary fw-bold px-4 text-uppercase" style="border-radius: 6px;">Enviar Mensaje</button>
                </div>

            </form>
        </div>
    </div>
</div>