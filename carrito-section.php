<?php

require $root_vendor;

$info_carrito = new ameri\Carrito;

$id = $_SESSION['user_info']['nombre_login'];
//print $id;

$carrito = $info_carrito->mostrar();

$cantidad_carrito = 0;

foreach ($carrito as $item_carrito) {
    if ($item_carrito['usuarios_id'] == $id) {
        $cantidad_carrito++;
    }
}

$_SESSION['cantidad_carrito'] = $cantidad_carrito;


if (isset($_SESSION['user_info'])) {

    if ($cantidad_carrito == 0) {
?>
        <!--carrito-section-->
        <section class="carrito-section fondo1">
            <div class="container">
                <div class="row justify-content-center text-center">

                    <h3 class="section-title pt-5">Carrito vacio</h3>
                    <div class="col">
                        <a class="btn btn-third my-4 ss ms-auto" href="categorias.php?id=1" role="button">Ver productos</a>
                    </div>
                    <div class="col-12 pb-5">
                        <span><i class="fas fa-cart-plus color-grey2 py-5" style="font-size: 15em;"></i></span>
                    </div>

                </div>
            </div>
        </section>
        <!--!carrito-section-->
    <?php
    } else {
    ?>
        <!--carrito-section-->
        <section id="carrito" class="carrito-section fondo1">
            <div class="container-fluid px-5">
                <div class="row px-5">
                    <div class="col-9 d-flex">
                        <h3 class="section-title py-5"><?php echo $cantidad_carrito;
                                                        if ($cantidad_carrito == 1) {
                                                            print ' Producto ';
                                                        } else {
                                                            print ' Productos ';
                                                        } ?>en el carrito</h3>
                        <a class="btn btn-link color-red py-1 align-self-end mb-4 me-4 ss ms-auto" href="eliminar-carrito.php?nombre_login=<?php print $_SESSION['user_info']['nombre_login']; ?>" role="button">Vaciar carrito</a>
                    </div>
                </div>
                <div class="row px-5 justify-content-between pb-5">
                    <div class="col-md-9 pe-5">
                        <div class="justify-content-center table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-start color-grey3-bg ">
                                        <th scope="col"></th>
                                        <th scope="col">Informaci??n del producto</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Tana??o</th>
                                        <th scope="col">Peso</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($carrito as $producto) {
                                        if ($id == $producto['usuarios_id']) {

                                            /*
                                            print '<pre>';
                                            print_r ($producto);
                                            */
                                    ?>
                                            <tr class="">

                                                <td scope="col" class="fw-600"><?php
                                                                                $imagen = $root_upload_productos . $producto['imagen'];
                                                                                if (file_exists($imagen)) {
                                                                                ?>
                                                        <img src="<?php print $imagen; ?>" width="100px">

                                                    <?php
                                                                                } else { ?>
                                                        Im??gen no disponible
                                                    <?php } ?>
                                                </td>
                                                <td scope="col" class="fw-700 color-purple"><?php print $producto['nombre'] ?></a></span><br><span class="fw-600 color-black"><?php print $producto['proveedor'] ?></span> <br><span class="fw-400 color-black"><?php print $producto['descripcion'] ?></span></td>
                                                <td scope="col" class="fw-400" style="text-transform: capitalize;">
                                                    <div class="d-flex">
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
                                                    <?php //print $producto['color'] 
                                                    ?>
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
                                                        <div class="fw-700 color-purple"><?php

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
                                                        <div class="sfw-700 color-purple"><?php

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

                                                <td scope="col" class="fw-500"> <?php

                                                                                if ($producto['size'] != '') {
                                                                                    print $producto['size'];
                                                                                } else {
                                                                                    print 'N/A';
                                                                                } ?></td>


                                                <td scope="col" class="fw-500"><?php

                                                                                if ($producto['peso'] != '') {
                                                                                    print $producto['peso'];
                                                                                } else {
                                                                                    print 'N/A';
                                                                                } ?></td>


                                                <td scope="col" class="">
                                                    <a href="eliminar-carrito.php?id=<?php print $producto['id'] ?>" class="btn-red ss w-100 btn btn-sm py-1 my-1 text-center" role="button">Eliminar</a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }



                                    /*PARA MOSTRAR EL TOTAL*/

                                    $total = 0;
                                    foreach ($carrito as $producto) {
                                        if ($id == $producto['usuarios_id']) {
                                            $costo = $producto['precio'];

                                            $separada_costo = '';
                                            $separador = ",";

                                            $separada_costo = explode($separador, $costo);

                                            foreach ($separada_costo as $precio) {
                                                $precio = (int)$precio;
                                                $precio = number_format($precio, 2, '.', '.');

                                                $total = $total + $precio;
                                            }
                                        }
                                    } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 ws formulario px-4">
                        <h5 class="pt-4 fw-700" id="precioTotal">Resumen de la orden</h5>

                        <h6 class="my-4 fw-600"><?php echo 'Productos: ' . $cantidad_carrito ?></h6>
                        <h5 class="mb-4 fw-600">Total: <span class="color-purple fs-1-2">$</span><span class="color-purple fs-1-2"><?php echo $total ?></span></h5>

                        <button type="button" onclick="eliminarCot()" id="numElimCot" name="<?php print $cot['id']; ?>" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#eliminarCotizacion">Procesar cotizaci??n</button>

                        <small class="d-flex form-text py-4 text-disbabled m-0" style="font-style: italic;">Esta cotizaci??n es provisional. Al enviarla recibir?? una copia al correo y uno de nuestros agentes se contactar?? para darle seguimiento.</small>
                    </div>

                </div>


            </div>
        </section>

        <div class="modal fade" id="eliminarCotizacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="section-title pt-3" id="exampleModalLabel">Confirmaci??n</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-0">
                        <p class="color-grey2 fw-600">??Est?? seguro de que desea enviar su solicitud de cotizaci??n?</p>
                        <p class="color-grey2">Al finalizar, se le notificar?? por correo sobre el envio de la informaci??n en un formato formal.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                        <a id="btn-ecm" href="funciones_cot.php?id=<?php print $_SESSION['user_info']['nombre_login']; ?>" class="btn btn-red btn-sm">Enviar cotizacion</a>
                    </div>
                </div>
            </div>
        </div>


    <?php
    }

    ?>
    <!--!carrito-section-->
<?php

} else {
    header('location: categorias.php');
}
?>