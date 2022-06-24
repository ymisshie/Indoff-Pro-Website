<?php

require 'vendor/autoload.php';

$user_existe = 0;
$admin_existe = 0;

if ($_SESSION) {
    if ((isset($_SESSION['user_info']))) {
        $user_existe++;
        if ($_SESSION['user_info']) {
            $user_existe++;
        }
    }
    if ((isset($_SESSION['admin_info']))) {
        $admin_existe++;
        if ($_SESSION['admin_info']) {
            $admin_existe++;
        }
    }
    if ($user_existe > 1) {
        $id = $_SESSION['user_info']['username'];
    }
}
?>

<section>
    <div class="hero-index-section container-fluid py-4">
        <div class="row p-5 justify-content-between align-items-center">
            <div class="col-md-5 pe-5">
                <h1 class="fs-3-5 fw-800 text-red">Promocione su marca con Indoff Pro</h1>
                <h5 class="fw-600 py-md-4">Un premio, un reconocimiento o un simple gesto de identidad ayuda a que cada colaborador se sienta parte de una empresa.</h5>

                <?php
                if ($user_existe > 1 || $admin_existe > 1) {
                ?>
                    <button href="<?php print $root_registro; ?>" class="btn btn-primary w-50 me-3">Registrarse</button>
                    <button href="indoffpro/categorias/productos/index.php?id=1" class="btn btn-secondary">Ver productos</button>

                <?php
                } else {
                ?>

                    <button href="<?php print $root_contacto; ?>" class="btn btn-primary w-50 me-3">Contacto</button>
                    <button href="indoffpro/categorias/productos/index.php?id=1" class="btn btn-secondary">Ver productos</button>

                <?php
                }
                ?>
            </div>
            <div class="col-md-7 px-0 d-flex flex-wrap justify-content-evenly">

                <?php
                $categoria = new ameri\Categoria;
                $producto = new ameri\Producto;
                $pkit = new ameri\Productos_Kits;
                $kit = new ameri\Kits;

                $info_categoria = $categoria->mostrarOrden();
                $info_producto = $producto->mostrarOrden();
                $info_kit = $kit->mostrar();

                $cantidad = count($info_categoria);

                if ($cantidad > 0) {

                    for ($x = 0; $x < $cantidad; $x++) {
                        $item = $info_categoria[$x];

                        $p = 1; ?>
                        <div class="col-4">
                            <a class="card card-categorias h-100" style="<?php
                                                                            if ($item['id'] == 1) {
                                                                                print 'background-color: #6607eb;';
                                                                            }
                                                                            if ($item['id'] == 2) {
                                                                                print 'background-color: #f8bc3a;';
                                                                            }
                                                                            if ($item['id'] == 3) {
                                                                                print 'background-color: #3eccca;';
                                                                            }
                                                                            if ($item['id'] == 4) {
                                                                                print 'background-color: #3eccca;';
                                                                            }
                                                                            if ($item['id'] == 5) {
                                                                                print 'background-color: #ef1440;';
                                                                            }

                                                                            ?>" href="<?php print $root_categorias; ?>?id=<?php print $item['id'] ?>">
                                <?php
                                $imagen = $root_upload_categorias . $item['imagen'];
                                if (file_exists($imagen)) {
                                ?>
                                    <img src="<?php print $imagen; ?>" class="card-img-top card-thumbnail py-3" style="object-fit: contain;" alt="Imágen de <?php print $item['nombre']; ?>">

                                <?php
                                } else { ?>
                                    <p>La imagen no se encuentra disponible</p> <?php } ?>

                                <div class="card-body pt-3">
                                    <h6 class="fw-700 mb-0"><?php print $item['nombre'] ?></h6>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>


                    <div class="col-4">
                        <a class="card card-kits h-100" style="<?php print 'background-color: #6607eb;';  ?>" href="<?php print $root_categorias; ?>?id=6">
                            <?php

                            $imagen = $root_upload_kits . $info_kit[0]['imagen'];

                            if (file_exists($imagen)) {
                            ?>
                                <img src="<?php print $imagen; ?>" class="card-img-top card-thumbnail py-3" style="object-fit: contain;" alt="Imágen de <?php print $item['nombre']; ?>">

                            <?php
                            } else { ?>
                                <p>La imagen no se encuentra disponible</p> <?php } ?>

                            <div class="card-body pt-3">
                                <h6 class="fw-700 mb-0"><?php print $info_kit[0]['nombre'] ?></h6>
                            </div>
                        </a>
                    </div>

                <?php

                } else { ?>
                    <h5 class="align-self-center">Lo sentimos, esta sección no está disponible ahora.</h5>
                <?php } ?>

            </div>
        </div>
</section>