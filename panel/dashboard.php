<?php
$title = "Admin Dashboard";
$page_name = "dashboard";

require 'roots.php';
include('header-admin.php');

if (!isset($_SESSION['admin_info']) or empty($_SESSION['admin_info'])) {
    header('Location: index.php');
} else {

    require($root_vendor);

    $eventos = new ameri\Evento;
    $categorias = new ameri\Categoria;
    $kits = new ameri\Kits;
    $cotizaciones = new ameri\Cotcat;

    $info_eventos = $eventos->mostrar();
    $info_categorias = $categorias->mostrar();
    $info_kits = $kits->mostrar();
    $info_cotizaciones = $cotizaciones->mostrar();

    $cantidade = count($info_eventos);
    $cantidadca = count($info_categorias);
    $cantidadkits = count($info_kits);
    $cantidadco = count($info_cotizaciones); ?>

    <section class="dashboard">

        <div class="container">

            <div class="row py-5">
                <div class="col">
                    <h1 class="fw-700 mb-0 text-red">Admin Dashboard</h1>
                    <p class="fw-500">A continuación se presentan las categorias que se pueden editar dentro del sitio.</p>
                </div>
            </div>

            <div class="row">

                <a class="categorias text-dark col-3" href="<?php print $root_categorias; ?>">
                    <div class="dashboard-card bg-light rounded p-4">
                        <i class="fa-solid fa-shirt bg-aqua text-purple fs-1-5 rounded p-2 py-3"></i>
                        <h4 class="pt-4 fw-700 text-purple">Categorias y productos destacados</h4>

                        <p class="pb-4 fs-07 text-muted"><?php print $cantidadca; ?> categorias</p>
                        <p class="text-muted">Añadir o editar las categorias y productos activos.</p>
                        <div class="col-12 text-end">
                            <i class="go-arrow p-2 rounded-circle fa-solid fa-arrow-right text-purple fs-1-5 mb-0"></i>
                        </div>
                    </div>
                </a>

                <a class="eventos text-dark col-3" href="<?php print $root_eventos; ?>">
                    <div class="dashboard-card bg-light rounded p-4">
                        <i class="fa-solid fa-calendar bg-aqua text-purple fs-1-5 rounded p-2 py-3"></i>
                        <h4 class="pt-4 fw-700 text-purple">Eventos y productos de eventos</h4>
                        <p class="pb-4 fs-07 text-muted"><?php print $cantidade; ?> eventos</p>
                        <p class="text-muted">Añadir o editar los eventos y productos activos.</p>
                        <div class="col-12 text-end">
                            <i class="go-arrow p-2 rounded-circle fa-solid fa-arrow-right text-purple fs-1-5 mb-0"></i>
                        </div>
                    </div>
                </a>

                <a class="kits text-dark col-3" href="<?php print $root_productos_kits; ?>">
                    <div class="dashboard-card bg-light rounded p-4">
                        <i class="fa-solid fa-bag-shopping bg-aqua text-purple fs-1-5 rounded p-2 py-3"></i>
                        <h4 class="pt-4 fw-700 text-purple">Kits y productos personalizados</h4>
                        <p class="pb-4 fs-07 text-muted"><?php print $cantidadkits; ?> kits</p>
                        <p class="text-muted">Añadir o editar los kits y productos dentro de ellos.</p>
                        <div class="col-12 text-end">
                            <i class="go-arrow p-2 rounded-circle fa-solid fa-arrow-right text-purple fs-1-5 mb-0"></i>
                        </div>
                    </div>
                </a>

                <a class="cotizaciones text-dark col-3" href="<?php print $root_cotizaciones; ?>">
                    <div class="dashboard-card bg-blue rounded p-4">
                        <i class="fa-solid fa-file-invoice bg-aqua text-blue fs-1-5 rounded p-2 py-3"></i>
                        <h4 class="pt-4 fw-700 text-white">Administración de cotizaciones</h4>
                        <p class="pb-4 fs-07 text-white"><?php print $cantidadco; ?> cotizaciones</p>
                        <p class="text-white">Ver, editar y enviar las cotizaciones solicitadas.</p>
                        <div class="col-12 text-end">
                            <i class="go-arrow p-2 rounded-circle fa-solid fa-arrow-right text-white fs-1-5 mb-0"></i>
                        </div>
                    </div>
                </a>

            </div>

        </div>

    </section>

<?php
    include('footer-admin.php');
}
?>