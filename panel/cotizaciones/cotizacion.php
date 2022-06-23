<?php
$title = "Cotización";
$pagina = "cotizacion";

session_start();

require '../roots.php';


if (!isset($_SESSION['admin_info']) or empty($_SESSION['admin_info']))
    header('Location: ../index.php');
else {

    include('../header-admin.php');

    require $root_vendor;

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $info_usuario = new ameri\Usuario;
        $usuario = $info_usuario->mostrar();

        $info_productos = new ameri\Cotizaciones;
        $info_cotizacion = new ameri\Cotcat;

        $infocotcat = $info_cotizacion->mostrarPorId($id);
        $infopro = $info_productos->mostrar();
        /*
        print '<pre>';
        print_r($infocotcat);
        */
        $nombre_usuario = $infocotcat['info_usuario'];
        $fecha = $infocotcat['fecha'];
    } ?>
    <section class="color-grey-bg py-3">

        <div class="container p-2 color-white-bg p-5 ws formulario">
            <div class="row">
                <div class="d-flex align-items-center justify-content-between p-0">
                    <a href="index.php" class="btn btn-link color-purple pb-5"><i class="fa-solid fa-circle-arrow-left"></i> Regresar</a>
                </div>
                <h3 class="fw-700 text-start pb-2">Cotización en proceso</h3>
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
                            <th scope="col">Área de impresión</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        foreach ($infopro as $producto) {
                            if ($producto['cotcat_id'] == $id) {
                        ?>
                                <tr class="">

                                    <td scope="col" class="fw-600"><?php
                                                                    if ($producto['categoria'] == 'categoria') {
                                                                        $imagen = '../../upload/Productos/' . $producto['imagen'];
                                                                    } elseif ($producto['categoria'] == 'evento') {
                                                                        $imagen = '../../upload/Productos-eventos/' . $producto['imagen'];
                                                                    } elseif ($producto['categoria'] == 'kit') {
                                                                        $imagen = '../../upload/Productos-kits/' . $producto['imagen'];
                                                                    }

                                                                    if (file_exists($imagen)) {
                                                                    ?>
                                            <img src="<?php print $imagen; ?>" width="100px">

                                        <?php
                                                                    } else { ?>
                                            Sin imagen
                                        <?php } ?>
                                    </td>
                                    <td scope="col" class="fw-700"><span class="color-purple"><?php print $producto['nombre'] ?></span><br><span class="fw-600 color-black"><?php print $producto['proveedor'] ?></span> <br><span class="fw-400 color-black"><?php print $producto['descripcion'] ?></span></td>
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
                                            <div class="text-center fw-700 color-purple"><?php

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
                                            <div class="text-center fw-700 color-purple"><?php

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


                            <?php
                            }
                        } ?>


                    </tbody>
                </table>
            </div>


        </div>
    </section>

<?php
}
?>