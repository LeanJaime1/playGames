<h1 class="text-white text-center mt-5">Creación de Género</h1>
<div class="row justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-lg-6 col-xl-5"> <form class="row g-3" action="actions/add_genero_acc.php" method="POST">

            <div class="col-12 mb-3">
                <label for="nombre" class="form-label text-white fw-bold">Nombre del Género</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Survival Horror" required>
            </div>

            <div class="col-12 text-center mt-4"> 
                <button type="submit" class="btn btn-primary px-5 py-2 fw-bold text-uppercase">Cargar Género</button>
            </div>

        </form>
    </div>
</div>