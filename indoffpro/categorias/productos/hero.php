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

    $producto = new ameri\Producto;
    $categoria = new ameri\Categoria;
    $info_producto = $producto->mostrarPorId($id);
    $info_producto2 = $producto->mostrar();
    $kit = new ameri\Kits;
    $info_categoria = $categoria->mostrarOrden();

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
        <nav class="navbar navbar-expand-md navbar-light bg-light">
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
                                <a class="text-darkblue px-3 px-md-3 nav-link <?php if ($id == $item_cat['id']) {
                                                                                    echo "active";
                                                                                } ?>" aria-current="page" href="<?php print $root_categorias . '?id=' . $item_cat['id']; ?>"><?php print $item_cat['nombre']; ?></a>
                            </li>

                        <?php
                        } ?>
                        <li class="mt-md-0 nav-item pe-md-4">
                            <a class="text-darkblue px-3 px-md-3 nav-link <?php if ($id == 6) {
                                                                                echo "active";
                                                                            } ?>" aria-current="page" href="<?php print $root_categorias . '?id=6'; ?>"><?php print $info_kit[0]['nombre']; ?></a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </section>

    <!--product-hero-->
    <section id="producto" class="producto-hero">
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                <!--IMAGEN DEL PRODUCTO-->
                <div class="col-4 align-self-center">
                    <?php
                    $imagen = $info_producto['imagen'];
                    $separada_imagen = '';

                    $separador = ",";
                    $separada_imagen = explode($separador, $imagen);

                    $count_imagen = count($separada_imagen);

                    if ($count_imagen == 1) {

                        $image = '../../../upload/Productos/' . $info_producto['imagen'];

                        if (file_exists($image) && $image != '') {
                    ?>
                            <div>
                                <img src="<?php print $image; ?>" class="img-fluid">
                            </div>

                        <?php
                        }
                    } elseif ($count_imagen > 1) {

                        ?>

                        <div id="carouselId" class="carousel slide w-100 carousel-dark" data-bs-ride="carousel">

                            <div class="carousel-inner h-100" role="listbox">

                                <?php

                                for ($ca = 0; $ca < $count_imagen; $ca++) {
                                    $image = '../../../upload/Productos/' . $separada_imagen[$ca];

                                    if (file_exists($image) && $separada_imagen[$ca] != '') {
                                ?>
                                        <div class="h-100 carousel-item <?php if ($ca == 1) {
                                                                            print 'active';
                                                                        } ?>">
                                            <img src="<?php print $image; ?>" class="p-5 carousel-img h-100 w-100 d-block">
                                        </div>
                            <?php
                                    } else {
                                        print 'Imagen no disponible.';
                                    }
                                }
                            } ?>

                            </div>
                            <button class=" carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                </div>
                <!--!IMAGEN DEL PRODUCTO-->

                <!--INFO DEL PRODUCTO-->
                <form class="p-5 col-8 justify-content-between d-flex" method="POST" action="../../carrito/acciones-p.php" enctype="multipart/form-data">
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


                        <h1 class="fw-700 text-red"><?php print $info_producto['nombre'] ?>
                        </h1>
                        <h6 class="fw-700"> <?php print $info_producto['proveedor'] ?></h6>
                        <p class="py-2 fw-400"><?php print $info_producto['descripcion'] ?></p>
                        <p class="text-blue fw-600 m-0 pb-2">Área de impresión: <span class="fw-400 text-darkblue"><?php print $info_producto['impresion'] ?></span></p>
                        <p class="text-blue fw-600">Dimensiones del producto: <span class="fw-400 text-darkblue"><?php print $info_producto['size'] ?></span></p>

                        <!-- color -->
                        <div class="d-flex">
                            <div class="col-6 col-lg-7 pt-3">
                                <h6 class="fw-700 m-0">Seleccione el color</h6>

                                <?php
                                $color = $info_producto['color'];
                                $separada_color = '';
                                $separador = ",";
                                $separada_color = explode($separador, $color);
                                $count_color = count($separada_color);
                                ?>

                                <div class="color col-md-8 col-lg-10  pt-3">
                                    <select name="color_producto" class="form-control" required>
                                        <?php
                                        for ($ca = 0; $ca < $count_color; $ca++) {
                                        ?>
                                            <option value="<?php print $separada_color[$ca]; ?>"><?php print $separada_color[$ca]; ?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--Cantidades-->

                        <?php
                        $precio = $info_producto['precio'];
                        $cantidad = $info_producto['cantidad'];

                        $separada_precio = '';
                        $separada_cantidad = '';
                        $separador = ",";

                        $separada_precio = explode($separador, $precio);
                        $separada_cantidad = explode($separador, $cantidad);


                        ?>
                        <div class="col-12 pb-3 select-cantidades">
                            <h6 class="fw-700 m-0 pt-4 pb-4">Seleccione la cantidad</h6>

                            <div class="d-flex">
                                <div class="col-5 pe-5">
                                    <select class="form-select form-control" id="selectOpciones1_producto" name="selectOpciones1_producto" onchange="cambiarPrecio()" required>
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
                                </div>
                                <div class="col-4">
                                    <h6 class="text-start">Unidades: <span class="text-purple fw-700 fs-1-5" id="cantidad1_producto" name="cantidad1_producto"></span></h6>
                                    <h6 class="text-start">Costo: <span class="text-purple fw-700 fs-1-5" id="precioSelect1_producto" name="precioSelect1_producto"></span></h6>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="rounded form-card col-md-4 ws bg px-4 formulario py-5 align-self-start">
                        <h5 class="pb-3 fw-700">Resumen del pedido</h5>
                        <h6 class="mb-4 color-black fw-600">Total: <span id="precioTotal" class="fw-700 color-purple fs-1-5"></span></h6>
                        <?php
                        if ($user_existe > 1) {
                        ?>
                            <input role="button" type="submit" name="accion" value="Agregar al carrito" class="btn btn-primary w-100" onclick="cambiarCarrito(<?php print $cantidad ?>)">
                            <!--<small class="d-flex form-text pt-4 text-disbabled m-0" style="font-style: italic;">Esta cotización es provisional. Al enviarla recibirá una copia al correo y uno de nuestros agentes se contactará para darle seguimiento.</small>-->
                        <?php
                        } elseif ($admin_existe > 1) {
                        ?>
                            <a href="<?php print $root_login; ?>" class="btn btn-primary w-100">Iniciar sesión</a>
                            <a href="<?php print $root_register; ?>" class="btn btn-secondary w-100 mt-3">Registrarse</a>
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