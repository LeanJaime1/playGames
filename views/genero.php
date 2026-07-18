<?php
$genero_nombre = $_GET['gen'] ?? null;
$juegos_x_genero = Juego::catalogo_x_genero($genero_nombre);
$menu_juegos = Genero::menu_x_genero();
$menu_plataformas = Plataforma::menu_x_plataforma();

$genero_objeto = Genero::genero_x_id($genero_nombre); 
$genero_titulo = $genero_objeto ? $genero_objeto->getNombre() : 'Desconocido';
?>

<div class="container p-4">

    <h1 class="mb-3 fw-bold text-white fs-3 mt-4">Juegos de <span class="text-primary"><?= $genero_titulo ?></span></h1>
    <hr class="border border w-50">

    <div class="row g-4">

        <div class="col-12 d-md-none mb-2">
            <button class="btn btn-primary w-100 fw-bold d-flex align-items-center justify-content-center gap-2" type="button" data-bs-toggle="collapse" data-bs-target="#menuFiltrosDesplegable" aria-expanded="false" aria-controls="menuFiltrosDesplegable">
                <i class="bi bi-funnel-fill"></i> Filtrar Catálogo
            </button>
        </div>

        <aside class="col-12 col-md-3 collapse d-md-block text-white mb-4 mb-md-0" id="menuFiltrosDesplegable">
            <div class="bg-dark p-3 rounded-3 border border-secondary border-opacity-10">

                <h2 class="fw-bold fs-5 mb-4 border-bottom border-secondary border-opacity-25 pb-2 d-none d-md-block">Filtros</h2>

                <div class="pb-3 mb-3 border-bottom border-secondary border-opacity-25">
                    <p class="small fw-bold text-secondary text-uppercase mb-2">Destacados</p>
                    <ul class="list-unstyled small mb-0">
                        <li class="mb-2">
                            <a href="index.php?view=novedades" class="text-white-50 text-decoration-none d-flex align-items-center justify-content-between">
                                <span>Novedades / Lanzamientos</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="index.php?view=exclusivos" class="text-white-50 text-decoration-none d-flex align-items-center justify-content-between">
                                <span>Exclusivos de PlayStation</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="pb-3 mb-3 border-bottom border-secondary border-opacity-25">
                    <p class="small fw-bold text-secondary text-uppercase tracking-wider mb-2">Plataformas</p>
                    <ul class="list-unstyled small mb-0">
                        <?php foreach ($menu_plataformas as $p) { ?>
                            <li class="mb-2">
                                <a href="index.php?view=plataforma&plat=<?= $p['nombre'] ?>" class="text-white-50 text-decoration-none">
                                    <?= $p['nombre'] ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <div>
                    <p class="small fw-bold text-secondary text-uppercase tracking-wider mb-2">Género</p>
                    <ul class="list-unstyled small mb-0">
                        <?php foreach ($menu_juegos as $g) { ?>
                            <li class="mb-2"><a href="index.php?view=genero&gen=<?= $g['id'] ?>" class="text-white-50 text-decoration-none"><?= $g['nombre'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </aside>

        <main class="col-12 col-md-9">
            <div class="row g-4 justify-content-start">

                <?php if (!empty($juegos_x_genero)) { ?>
                    
                    <?php foreach ($juegos_x_genero as $juegos) { ?>
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm text-white" style="background-color: #0f172a; border-radius: 12px; transition: all 0.3s ease;">

                                <div class="ratio ratio-16x9 position-relative overflow-hidden" style="border-top-left-radius: 12px; border-top-right-radius: 12px; background-color: #000;">
                                    <img src="img/covers/<?= $juegos->getImg() ?>" class="w-100 h-100 opacity-25" style="object-fit: cover; filter: blur(8px); transform: scale(1.1);" alt="Imagen de <?= $juegos->getTitulo() ?>">
                                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center p-2">
                                        <img src="img/covers/<?= $juegos->getImg() ?>" class="img-fluid h-100" style="object-fit: contain;" alt="Imagen de <?= $juegos->getTitulo() ?>">
                                    </div>
                                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-start p-2" style="z-index: 3;">
                                        <span class="badge bg-dark bg-opacity-75 text-warning border border-secondary border-opacity-10 py-1 px-2" style="font-size: 0.65rem; font-weight: 600;">
                                            <?= $juegos->getPlataforma()->getNombre() ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="card-body d-flex flex-column p-3">
                                    <h3 class="card-title fw-bold text-white mb-1 fs-6" title="<?= $juegos->getTitulo() ?>">
                                        <?= $juegos->getTitulo() ?>
                                    </h3>
                                    <p class="text-secondary small fst-italic mb-3" style="font-size: 0.8rem;">
                                        <?= $juegos->getLanzamiento() ?>
                                    </p>
                                    <div class="mt-auto pt-2 border-top border-secondary border-opacity-10 d-flex align-items-center justify-content-between">
                                        <p class="fs-5 fw-bold m-0 text-white"><?= $juegos->precio_formateado() ?></p>
                                        <a href="index.php?view=producto&id=<?= $juegos->getId() ?>" class="btn btn-primary btn-sm fw-bold px-3" style="border-radius: 6px;">Ver más</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>

                <?php } else { ?>
                    <div class="col-12 text-center py-5">
                        <div class="p-5 rounded-3 border border-secondary border-opacity-10" style="background-color: #0f172a;">
                            <p class="text-white-50 m-0 fs-5">No se encontraron juegos en este género actualmente.</p>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </main>

    </div>
</div>