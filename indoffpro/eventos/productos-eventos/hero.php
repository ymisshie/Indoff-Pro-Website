<?php
$title = "Producto";
$pagina = "producto";

//Variables de navegacion
include('../../roots.php');

include('../../../header.php');

require $root_vendor;

if (isset($_SESSION['cantidad_carrito'])) {
    $cantidad = $_SESSION['cantidad_carrito'];
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $producto = new ameri\Producto_Evento;
    $categoria = new ameri\Evento;
    $info_producto = $producto->mostrarPorId($id);
    $info_producto2 = $producto->mostrar();
    $info_categoria = $categoria->mostrarOrden6();

    if (!$info_producto) {
        header('Location: index.php');
    }

    $user_existe = 0;
    $admin_existe = 0;
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
    } ?>


    <section class="secondary">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars text-white"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <!--NAVBAR-->
                    <ul class="navbar-nav my-3 my-md-0 mx-auto">

                        <?php
                        foreach ($info_categoria as $item_cat) {
                        ?>

                            <li class="mt-md-0 nav-item pe-md-4">
                                <a class="px-3 px-md-3 nav-link <?php if ($id == $item_cat['id']) {
                                                                    echo "active";
                                                                } ?>" aria-current="page" href="<?php print $root_categorias . '?id=' . $item_cat['id']; ?>"><?php print $item_cat['nombre']; ?></a>
                            </li>

                        <?php
                        }
                        ?>

                    </ul>

                </div>
            </div>
        </nav>
    </section>

    <section>
        <div class="container">
            <div id="liveAlertPlaceholder"></div>
        </div>
    </section>

    <!--product-hero-->
    <section id="producto" class="producto-hero">
        <div class="container">
            <div class="row justify-content-evenly">
                <!--IMAGEN DEL PRODUCTO-->
                <div class="p-0 col-12 col-lg-4 text-center producto-img">
                    <?php
                    $imagen = $root_upload_productos_kits . $info_producto['imagen'];
                    if (file_exists($imagen)) {
                    ?>
                        <img src="<?php print $imagen; ?>" class="img-fluid producto-img align-self-center">
                    <?php
                    } else { ?>
                        Sin imagen
                    <?php } ?>
                </div>
                <!--!IMAGEN DEL PRODUCTO-->

                <!--INFO DEL PRODUCTO-->
                <form class="py-5 px-5 col-12 col-lg-8 justify-content-between d-flex" method="POST" action="../../carrito/acciones-pe.php" enctype="multipart/form-data">
                    <div class="col-md-8 pe-5">
                        <input type="hidden" name="id_producto" value="<?php print $info_producto['id'] ?>">
                        <input type="hidden" name="nombre_producto" value="<?php print $info_producto['nombre'] ?>">
                        <input type="hidden" name="descripcion_producto" value="<?php print $info_producto['descripcion'] ?>">
                        <input type="hidden" name="proveedor_producto" value="<?php print $info_producto['proveedor'] ?>">
                        <input type="hidden" name="usuario_nombre" value="<?php if ($user_existe > 1) {
                                                                                print $_SESSION['user_info']['nombre_login'];
                                                                            } ?>">
                        <input type="hidden" name="info_usuario" value="<?php if ($user_existe > 1) {
                                                                            print $_SESSION['user_info']['nombre_usuario'];
                                                                            print ' ';
                                                                            print $_SESSION['user_info']['apellido_usuario'];
                                                                        } ?>">
                        <input type="hidden" name="id_usuario" value="<?php if ($user_existe > 1) {
                                                                            print $_SESSION['user_info']['id'];
                                                                        } ?>">


                        <h2 class="fw-700 text-red"><?php print $info_producto['nombre'] ?>
                        </h2>
                        <h6 class="fw-700"> <?php print $info_producto['proveedor'] ?></h6>
                        <p class="py-2 fw-400"><?php print $info_producto['descripcion'] ?></p>

                        <!-- color -->
                        <div class="d-flex">
                            <div class="col-6 col-lg-7 pt-3">
                                <h6 class="fw-700 m-0">Color</h6>
                                <div class="color col-md-8 col-lg-10 d-flex pt-3">
                                    <?php
                                    $colores = $info_producto['color'];
                                    $separada = '';
                                    $separador = ",";
                                    $separada = explode($separador, $colores);

                                    $count_colores = count($separada);

                                    for ($u = 0; $u < $count_colores; $u++) {
                                    ?>
                                        <button type="button" class="btn btn-color p-3 me-3" onclick="color_selected()" name="<?php print $separada[$u]; ?>" style="background-color: <?php print $separada[$u]; ?>;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?php print $separada[$u]; ?>"></button>
                                    <?php
                                    } ?>
                                </div>
                            </div>

                            <div class="col-5 col-lg-3 pt-3">
                                <h6 class="fw-700 m-0">Seleccionado</h6>
                                <div class="col-12 d-flex pt-3 pb-2">
                                    <button type="button" class="btn btn-color p-3 w-100" id="mostrarColor" style="background-color: <?php print $separada[0]; ?>;  border-radius: 1em;" href="#"></button>
                                </div>
                                <small class="d-flex form-text text-disbabled m-0" id="mostrarColorNombre" name="colorescogido"><?php print $separada[0]; ?></small>
                                <input type="hidden" name="color_producto" id="color_producto" value="<?php print $separada[0]; ?>">
                            </div>

                        </div>

                        <!--Cantidades-->

                        <?php
                        $opciones = $info_producto['opciones'];
                        $precio = $info_producto['precio'];
                        //  print $precio;
                        $cantidad = $info_producto['cantidad'];
                        //   print $cantidad;
                        $separada_opciones = '';
                        $separada_precio = '';
                        $separada_cantidad = '';
                        $separador = ",";
                        $separada_opciones = explode($separador, $opciones);

                        $separada_precio = explode($separador, $precio);

                        $separada_cantidad = explode($separador, $cantidad);
                        $count_opciones = count($separada_opciones);

                        if ($count_opciones > 1) {
                        ?>
                            <div class="col-12 py-3 select-cantidades">
                                <h5 class="w-700 m-0 pt-3 pb-4">Seleccione la cantidad</h6>
                                    <div class="col-12 d-flex flex-wrap">
                                        <?php
                                        $o = 1;
                                        foreach ($separada_opciones as $opciones_producto) {
                                        ?>
                                            <div class="text-center col-lg-4 px-2 py-1">
                                                <h5 class="fw-700 pt-1"><?php print $opciones_producto ?></h5>
                                                <select class="qty-dropdown form-select" id="selectOpciones<?php print $o; ?>_producto" name="selectOpciones<?php print $o; ?>_producto" onchange="cambiarPrecio()" required>
                                                    <option value="">Unidades</option>
                                                    <?php $x = 0;
                                                    foreach ($separada_precio as $precios_producto) {
                                                        if ($precios_producto != '') {
                                                    ?>

                                                            <option value="<?php print $separada_cantidad[$x];
                                                                            print ',';
                                                                            print $precios_producto;
                                                                            print ',';
                                                                            print $opciones_producto ?>"><?php print $separada_cantidad[$x]; ?></option>

                                                    <?php
                                                            $x++;
                                                        }
                                                    } ?>
                                                </select>


                                                <h6 class="text-start ps-2 pt-2">Unidades: <span class="color-red fw-700" id="cantidad<?php print $o; ?>_producto" name="cantidad<?php print $o; ?>_producto"></span></h6>
                                                <h6 class="text-start ps-2">Costo: <span class="color-red fw-700" id="precioSelect<?php print $o; ?>_producto" name="precioSelect<?php print $o; ?>_producto"></span></h6>
                                                <h6 class="text-start ps-2">C/Unidad: <span class="color-red fw-700" id="precioIndividual<?php print $o; ?>_producto" name="precioIndividual<?php print $o; ?>_producto"></span></h6>
                                            </div>
                                        <?php
                                            $o++;
                                        } ?>
                                    </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-12 pb-3 select-cantidades">
                                <h6 class="fw-700 m-0 pt-2 pb-4">Seleccione la cantidad</h6>

                                <div class="d-flex">
                                    <div class="col-7 pe-5">
                                        <select class="qty-dropdown form-select" id="selectOpciones1_producto" name="selectOpciones1_producto" onchange="cambiarPrecio()" required>
                                            <option value="">Unidades</option>
                                            <?php $x = 0;
                                            foreach ($separada_precio as $precios_producto) {
                                                if ($precios_producto != '') {
                                            ?>
                                                    <option class="py-2" value="<?php print $separada_cantidad[$x];
                                                                                print ',';
                                                                                print $precios_producto;
                                                                                print ','; ?>"><?php print $separada_cantidad[$x] ?></option>
                                            <?php
                                                    $x++;
                                                }
                                            } ?>
                                        </select>
                                        <input type="hidden" name="selectOpciones2_producto" value="">
                                        <input type="hidden" name="selectOpciones3_producto" value="">
                                        <input type="hidden" name="selectOpciones4_producto" value="">
                                        <input type="hidden" name="selectOpciones5_producto" value="">
                                        <input type="hidden" name="selectOpciones6_producto" value="">
                                        <input type="hidden" name="selectOpciones7_producto" value="">
                                        <input type="hidden" name="selectOpciones8_producto" value="">
                                        <input type="hidden" name="selectOpciones9_producto" value="">
                                        <input type="hidden" name="selectOpciones10_producto" value="">
                                    </div>
                                    <div class="col-3">
                                        <h6 class="text-start">Unidades: <span class="color-purple fw-700 fs-1-2" id="cantidad1_producto" name="cantidad1_producto"></span></h6>
                                        <h6 class="text-start">Costo: <span class="color-purple fw-700 fs-1-2" id="precioSelect1_producto" name="precioSelect1_producto"></span></h6>
                                        <h6 class="text-start">C/Unidad: <span class="color-purple fw-700 fs-1-2" id="precioIndividual1_producto" name="precioIndividual1_producto"></span></h6>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>
                    </div>

                    <div class="border bg-light col-md-4 ws bg px-4 formulario py-5 align-self-start">
                        <h5 class="pb-3 fw-700">Resumen de la cotización</h5>
                        <h6 class="mb-4 color-black fw-600">Total: <span id="precioTotal" class="fw-700 color-purple fs-1-5"></span></h6>
                        <?php
                        if ($user_existe > 1 || $admin_existe > 1) {
                        ?>
                            <input role="button" type="submit" name="accion" value="Agregar al carrito" class="btn btn-primary w-100" onclick="cambiarCarrito(<?php print $cantidad ?>)">
                            <!--<small class="d-flex form-text pt-4 text-disbabled m-0" style="font-style: italic;">Esta cotización es provisional. Al enviarla recibirá una copia al correo y uno de nuestros agentes se contactará para darle seguimiento.</small>-->
                        <?php
                        } else {
                        ?>
                            <a href="<?php print $root_login; ?>" class="btn btn-primary w-100">Iniciar sesión</a>
                            <a href="<?php print $root_register; ?>" class="btn btn-secondary w-100 mt-3">Registrarse</a>
                        <?php
                        } ?>

                    </div>

                </form>

            </div>

        </div>

    </section>

    <!--!product-hero-->

<?php

    include('../../../footer.php');
} else {
    header('Location: index.php');
}


?>