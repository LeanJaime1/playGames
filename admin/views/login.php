<div class="row my-5 justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="col-12 col-md-6 col-lg-4">
        
        <div class="p-4 p-md-5 rounded-3 shadow-lg" style="background-color: #0f172a; border: 1px solid rgba(255, 255, 255, 0.05);">
            
            <h1 class="text-center mb-1 fw-bold text-white fs-2">Iniciar Sesión</h1>
            
            <p class="text-center mb-4 text-white-50 small text-uppercase tracking-wider">Usuarios administradores</p>

            <div class="mb-4">
                <?= Alerta::get_alertas(); ?>
            </div>

            <form action="actions/auth_login.php" method="POST">
                
                <div class="mb-3">
                    <label for="username" class="form-label text-white-50 small text-uppercase tracking-wider fw-semibold">Nombre de Usuario</label>
                    <input type="text" 
                           class="form-control bg-dark text-white border-secondary border-opacity-25 py-2.5" 
                           id="username" 
                           name="username" 
                           style="border-radius: 8px; font-size: 0.95rem;"
                           required>
                </div>

                <div class="mb-4">
                    <label for="pass" class="form-label text-white-50 small text-uppercase tracking-wider fw-semibold">Password</label>
                    <input type="password" 
                           class="form-control bg-dark text-white border-secondary border-opacity-25 py-2.5" 
                           id="pass" 
                           name="pass" 
                           style="border-radius: 8px; font-size: 0.95rem;"
                           required>
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold py-2.5 shadow-lg" style="border-radius: 8px; letter-spacing: 0.5px;">
                    Entrar al Sistema
                </button>

            </form>
        </div>

    </div>
</div>