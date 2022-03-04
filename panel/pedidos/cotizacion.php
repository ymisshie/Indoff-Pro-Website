<?php

require '../../vendor/autoload.php';

$title = "Cotización | Indoff Pro";
$pagina = "cotizacion";

session_start();

if (!isset($_SESSION['admin_info']) or empty($_SESSION['admin_info']))
    header('Location: ../index.php');

?>

<?php
$root_functions = '../../functions.php';
$root_inicio = 'href="../dashboard.php"';
$root_styles = '<link rel="stylesheet" href="../../style.css">';
$root_categorias = 'href="../categorias/index.php"';
$root_dashboard = 'href="../dashboard.php"';
$root_productos = 'href="../productos/index.php"';
$root_eventos = 'href="../eventos/index.php"';
$root_eventos_productos = 'href="../productos-eventos/index.php"';
$root_pedidos = 'href="index.php"';
$root_logout = 'href="../index.php"';
$root_vendor = '../../vendor/autoload.php';
$root_productos_eventos_header = '../';
$root_cerrar_sesion = '../cerrar-sesion.php';
$root_indoffpro = 'href="../../index.php"';
?>


<?php
//include header.php file
include('../../Template/_header-admin.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $info_usuario = new ameri\Usuario;
    $usuario = $info_usuario->mostrar();


    $info_productos = new ameri\Cotizaciones;
    $info_cotizacion = new ameri\Cotcat;

    $infocotcat = $info_cotizacion->mostrar();

    //  print_r($infocotcat);

    foreach ($infocotcat as $item) {
        if ($item['id'] == $id) {
            $nombre_usuario = $item['info_usuario'];
            $fecha = $item['fecha'];
        }

    
        $pp = $info_productos->mostrar();

        //$cotizacion = $info_cotizacion->mostrarPorId();
    }
}

?>


<!--carrito-section-->


<section name="" class="color-grey3-bg py-5">
    <div class="container ws p-5 color-white-bg">
        <div class="row pb-5">

            <div class="col-12 d-flex justify-content-between">
                <div class="">
                    <p class="align-self-center fw-500 color-red font-gentium navbar-brand pt-5 pb-0">Indoff Pro</p>
                </div>
                <div class="align-self-center">
                    <h3 class="fw-700">Productos Promocionales e incentivos</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <h5 class="fw-700">FECHA: <span class="fw-500"><?php print $fecha; ?></span>
                </h5>
                <h5 class="fw-700 mb-0">CLIENTE: <span class="fw-500"><?php  print $nombre_usuario;?></span>
                </h5>
            </div>

            <div class="col-8 text-end">
                <div class="">
                    <p class="fw-700 mb-0">Officina general: <span class="fw-500">11816 Lackland Road St. Louis, MO, USA 63146</span>
                    </p>
                    <p class="fw-700 mb-0">TEL: <span class="fw-500">(001-314) 997-1122</span>
                    </p>
                    <p class="fw-700 mb-0">SUCURSAL TIJUANA: <span class="fw-500">Privada Bugambilias #20209, Tijuana, BC, CP 22216</span>
                    </p>
                    <p class="fw-700 mb-0">TEL: <span class="fw-500">664-6-25-1111</span> <span class="fw-700">FAX:</span> <span class="fw-500">
                            664-6-25-1114</span>
                    </p>
                </div>
            </div>

        </div>

        <div class="row mx-auto py-5 justify-content-center table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center color-grey3-bg ">
                        <th scope="col"></th>
                        <th scope="col">Información del producto</th>
                        <th scope="col">Color</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Tanaño</th>
                        <th scope="col">Peso</th>

                    </tr>
                </thead>


                <tbody>

                    <?php


                    foreach ($pp as $producto) {




                    ?>
                        <tr class="">

                            <td scope="col" class="fw-600"><?php
                                                            $imagen = '../../upload/' . $producto['imagen'];
                                                            if (file_exists($imagen)) {
                                                            ?>
                                    <img src="<?php print $imagen; ?>" width="100px">

                                <?php
                                                            } else { ?>
                                    Sin imagen
                                <?php } ?>
                            </td>
                            <td scope="col" class="fw-700"><span><a href="producto.php?id=<?php print $producto['id']; ?>" class="color-red"><?php print $producto['nombre'] ?></a></span><br><span class="fw-600 color-black"><?php print $producto['proveedor'] ?></span> <br><span class="fw-400 color-black"><?php print $producto['descripcion'] ?></span></td>
                            <td scope="col" class="text-center fw-400" style="text-transform: capitalize;">
                                <div class="d-flex justify-content-center">
                                    <?php

                                    $colores = $producto['color'];
                                    $separada = '';
                                    $separador = ",";
                                    $separada = explode($separador, $colores);

                                    $count_colores = count($separada);

                                    for ($u = 0; $u < $count_colores; $u++) {
                                    ?>
                                        <div class="col-1 p-3 rounded-circle mx-1 my-1" style="background-color: <?php print $separada[$u]; ?>;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print $separada[$u]; ?>">
                                        </div>
                                    <?php
                                    } ?>
                                </div>
                                <?php print $producto['color'] ?>
                            </td>
                            <td scope="col" class="fw-600">
                                <?php

                                $cantidad = $producto['cantidad'];
                                $costo = $producto['precio'];
                                $separada_cantidad = '';
                                $separada_costo = '';
                                $separador = ",";
                                $separada_cantidad = explode($separador, $cantidad);
                                $separada_costo = explode($separador, $costo);

                                $count_cantidad = count($separada_cantidad);
                                $count_costo = count($separada_costo);

                                for ($ca = 0; $ca < $count_cantidad; $ca++) {
                                ?>
                                    <div class="text-center fw-700 color-red"><?php

                                                                                if ($separada_cantidad[$ca] == "") {
                                                                                } else {
                                                                                    print $separada_cantidad[$ca]; ?>
                                            <span class="fw-500 color-black">
                                                <?php
                                                                                    if ($separada_cantidad[$ca] == 1) {
                                                                                        print ' unidad';
                                                                                    } elseif ($separada_cantidad[$ca] > 1) {
                                                                                        print ' unidades';
                                                                                    } ?>
                                            </span>
                                        <?php
                                                                                } ?>
                                    </div>
                                <?php
                                } ?>
                            </td>
                            <td scope="col" class="fw-600" id="costo_producto">
                                <?php

                                $cantidad = $producto['cantidad'];
                                $costo = $producto['precio'];
                                $separada_cantidad = '';
                                $separada_costo = '';
                                $separador = ",";
                                $separada_cantidad = explode($separador, $cantidad);
                                $separada_costo = explode($separador, $costo);

                                $count_cantidad = count($separada_cantidad);
                                $count_costo = count($separada_costo);

                                for ($ca = 0; $ca < $count_cantidad; $ca++) {
                                ?>
                                    <div class="text-center fw-700 color-red"><?php

                                                                                if ($separada_costo[$ca] == "") {
                                                                                } else {
                                                                                    if ($separada_costo[$ca] == 1) {
                                                                                        print '$';
                                                                                    } elseif ($separada_costo[$ca] > 1) {
                                                                                        print ' $';
                                                                                    }
                                                                                    $integer = (int)$separada_costo[$ca];
                                                                                    $integer = number_format($integer, 2, '.', '.');
                                                                                    print $integer;
                                                                                } ?>
                                    </div>
                                <?php
                                } ?>
                            </td>

                            <td scope="col" class="fw-500 text-center"> <?php

                                                                        if ($producto['size'] != '') {
                                                                            print $producto['size'];
                                                                        } else {
                                                                            print 'N/A';
                                                                        } ?></td>


                            <td scope="col" class="fw-500 text-center"><?php

                                                                        if ($producto['peso'] != '') {
                                                                            print $producto['peso'];
                                                                        } else {
                                                                            print 'N/A';
                                                                        } ?></td>



                        </tr>
                    <?php

                    }

                    ?>


                </tbody>
            </table>
        </div>

        <div class="row">
            <h5 class="fw-700 py-3">Términos y condicioness</h5>
            <ol class="list-group pb-5">
                <li class="list-group-item">
                    La orden de compra no requiere anticipo.
                </li>
                <li class="list-group-item">
                    15 días para el pago.
                </li>
            </ol>

            <h5 class="text-center py-2" style="font-style: italic;">Gracias por preferir Indoff, especialistas en promocionales e incentivos.</h5>
            <h5 class="text-center pt-5 color-red fw-700 pb-2">Lic. Ana Gallegos</h5>
            <h6 class="text-center color-black fw-600 pb-2">Manager Communications</h6>
            <p class="text-disbaled pt-4 text-center" style="font-style: italic;">Esta cotización es provisional. Al enviarse será revisada y se le dará seguimiento por correo en los próximos días hábiles.</p>

        </div>

    </div>
</section>