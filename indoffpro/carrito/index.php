<?php
$title = "Carrito";
$pagina = "carrito";

//Variables de navegacion
include('../roots.php');
include('../../header.php');

require $root_vendor;

$info_carrito = new ameri\Carrito;

$id = $_SESSION['user_info']['username'];
$carrito = $info_carrito->mostrar();

$cantidad_carrito = 0;

foreach ($carrito as $item_carrito) {
    if ($item_carrito['id_usuario'] == $id) {
        $cantidad_carrito++;
    }
}

$_SESSION['cantidad_carrito'] = $cantidad_carrito;


if (isset($_SESSION['user_info'])) {

    if ($cantidad_carrito == 0) {
?>


        <section id="categorias">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-12 mt-5 d-flex">
                        <div class="col-md-12">
                            <div>
                                <div class="d-flex">
                                    <h1 class="fw-700 mb-0 align-self-center text-red">Carrito</h1>
                                </div>
                                <p class=""><?php print $cantidad_carrito . ' productos'; ?></p>
                            </div>


                            <div class="form-card rounded p-5 my-4 text-center">

                                <i class="fa-solid fa-shopping-bag fs-5 text-center me-3"></i>
                                <h5 class="m-0 py-4 fw-600">Actualmente no hay productos en el carrito.</h5>

                                <a class="btn btn-primary" href="../categorias/productos/index.php?id=1" role="button">Agregar productos<i class="fas fa-plus ms-2"></i></a>
                            </div>

                        </div>

                    </div>
                </div>

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
                                <a class="btn btn-link color-red py-1 align-self-end mb-4 me-4 ss ms-auto" href="eliminar-carrito.php?username=<?php print $_SESSION['user_info']['username']; ?>" role="button">Vaciar carrito</a>
                            </div>
                        </div>
                        <div class="row px-5 justify-content-between pb-5">
                            <div class="col-md-9 pe-5">
                                <div class="justify-content-center table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr class="text-start color-grey3-bg ">
                                                <th scope="col"></th>
                                                <th scope="col">Información</th>
                                                <th scope="col">Color</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">Tanaño</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($carrito as $producto) {
                                                if ($id == $producto['id_usuario']) {

                                                    /*
                                            print '<pre>';
                                            print_r ($producto);
                                            */
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
                                                                Imágen no disponible
                                                            <?php }
                                                            ?>
                                                        </td>
                                                        <td scope="col" class="fw-700 color-purple"><?php print $producto['nombre'] ?></a></span><br><span class="fw-600 color-black"><?php print $producto['proveedor'] ?></span> </td>
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

                                                        <td scope="col" class="fw-500">
                                                            <p class="m-0"><?php print $producto['size']; ?></p>
                                                        </td>


                                                        <td scope="col" class="">
                                                            <a href="eliminar-carrito.php?id=<?php print $producto['id'] ?>" class="btn-secondary ss w-100 btn btn-sm py-1 my-1 text-center" role="button">Eliminar</a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }



                                            /*PARA MOSTRAR EL TOTAL*/

                                            $total = 0;
                                            foreach ($carrito as $producto) {
                                                if ($id == $producto['id_usuario']) {
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

                            <div class="col-12 col-md-3 ws formulario bg-light border px-4">
                                <h5 class="pt-4 fw-700" id="precioTotal">Resumen de la orden</h5>

                                <h6 class="my-4 fw-600"><?php echo 'Productos: ' . $cantidad_carrito ?></h6>
                                <h5 class="mb-4 fw-600">Total: <span class="color-purple fs-1-2">$</span><span class="color-purple fs-1-2"><?php echo $total ?></span></h5>

                                <button type="button" onclick="eliminarCot()" id="numElimCot" name="<?php print $cot['id']; ?>" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#eliminarCotizacion">Procesar cotización</button>

                                <small class="d-flex form-text py-4 text-disbabled m-0" style="font-style: italic;">Esta cotización es provisional. Al enviarla recibirá una copia al correo y uno de nuestros agentes se contactará para darle seguimiento.</small>
                            </div>

                        </div>


                    </div>
                </section>

                <div class="modal fade" id="eliminarCotizacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="section-title pt-3" id="exampleModalLabel">Confirmación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body pt-0">
                                <p class="color-grey2 fw-600">¿Está seguro de que desea enviar su solicitud de cotización?</p>
                                <p class="color-grey2">Al finalizar, se le notificará por correo sobre el envio de la información en un formato formal.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                                <a id="btn-ecm" href="funciones_cot.php?id=<?php print $_SESSION['user_info']['username']; ?>" class="btn btn-primary btn-sm">Enviar cotizacion</a>
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

    //include footer.php file
    include('../../footer.php')
        ?>