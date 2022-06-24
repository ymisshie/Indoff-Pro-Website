<?php
$title = "Eventos";
$pagina = "eventos";

include('../roots.php');

include('../../header.php');

require $root_vendor;

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

<section class="index-eventos">
    <div class="container-fluid">
        <div class="row justify-content-center py-5">


            <div class="col-7 d-flex my-5 flex-wrap justify-content-evenly">

                <?php
                $categoria = new ameri\Evento;
                $producto = new ameri\Producto_Evento;

                $info_categoria = $categoria->mostrarOrden6();
                $info_producto = $producto->mostrarOrden();

                $cantidad = count($info_categoria);

                if ($cantidad > 0) {

                    for ($x = 0; $x < $cantidad; $x++) {
                        $item = $info_categoria[$x];

                        $p = 1; ?>
                        <div class="col-4 align-self-center">
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
                                                                            if ($item['id'] == 6) {
                                                                                print 'background-color: #6607eb;';
                                                                            }

                                                                            ?>" href="<?php print $root_productos_eventos; ?>?id=<?php print $item['id'] ?>">
                                <?php
                                $imagen = '../../upload/Eventos/' . $item['imagen'];
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
                } else { ?>
                    <h5 class="align-self-center">Lo sentimos, esta sección no está disponible ahora.</h5>
                <?php } ?>

            </div>


            <div class="col-4 p-5 align-self-center py-5">
                <div>
                    <h1 class="fw-800 text-red fs-3-5">Productos para toda ocasión</h1>
                    <h5 class="fw-600 py-4">Indoff Promocionales tiene un detalle para cada temporada. Observa la variedad que existe para brindar el regalo ideal.</h5>

                    <a class="btn btn-primary mt-2 mt-md-0 me-3 w-50" href="<?php if ($user_existe > 1 || $admin_existe > 1) {
                                                                                echo $root_contacto;
                                                                            } else {
                                                                                print $root_register;
                                                                            } ?>" role="button"><?php if ($user_existe > 1 || $admin_existe > 1) {
                                                                                                    echo 'Contacto';
                                                                                                } else {
                                                                                                    print 'Registrarse';
                                                                                                } ?></a>
                    <a class="mt-2 mt-md-0 btn btn-secondary" href="<?php print $root_productos_eventos; ?>?id=1" role="button">Ver productos</a>

                </div>
            </div>
        </div>
</section>

<?php
include('../../footer.php')
?>