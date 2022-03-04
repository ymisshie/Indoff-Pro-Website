<?php
require 'vendor/autoload.php';
if (isset($_SESSION['cantidad_carrito'])) {
    $cantidad = $_SESSION['cantidad_carrito'];
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $producto = new ameri\Producto;
    $info_producto = $producto->mostrarPorId($id);
    $categoria = new ameri\Categoria;
    $info_categoria = $categoria->mostrar();

    if (!$info_producto)
        header('Location: index.php');
$user_existe = 0;
$admin_existe = 0;
if ((isset($_SESSION['user_info']))) {
    $user_existe ++;
    if($_SESSION['user_info']){
        $user_existe ++;
    }
}
if ((isset($_SESSION['admin_info']))) {
    $admin_existe ++;
    if($_SESSION['admin_info']){
        $admin_existe ++;
    }
}
?>
    <!--navbar-->
    <section>
        <nav class="navbar secondary-navbar color-grey3-bg py-md-1 navbar-expand-lg fw-600 px-lg-5 px-md-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars text-white m-0"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <?php
                        foreach ($info_categoria as $categorias) {
                        ?>
                            <li class="nav-item px-md-4">
                                <a class="nav-link color-black <?php if ($info_producto[5] == $categorias['id']) {
                                                                    print 'active';
                                                                } ?>" aria-current="page" href="categorias.php?id=<?php print $categorias['id']; ?>"><?php print $categorias['nombre']; ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!--!navbar-->

    <section>
        <div class="container">
            <div id="liveAlertPlaceholder"></div>
        </div>
    </section>


    <!--product-hero-->
    <section id="producto" class="producto-hero">

        <div class="container-fluid">

            <div class="row justify-content-evenly">
                <!--IMAGEN DEL PRODUCTO-->
                <div class="col-12 col-lg-4 text-center producto-img">
                    <?php
                    $imagen = 'upload/' . $info_producto['imagen'];
                    if (file_exists($imagen)) {
                    ?>
                        <img src="<?php print $imagen; ?>" class="img-fluid align-self-center" style="object-fit:contain;">

                    <?php } else { ?>
                        Sin imagen
                    <?php } ?>
                </div>
                <!--!IMAGEN DEL PRODUCTO-->

                <!--INFO DEL PRODUCTO-->
                <form class="color-grey3-bg py-5 px-5 col-12 col-lg-7 justify-content-evenly d-flex" method="POST" action="funciones.php" enctype="multipart/form-data">
                    <div class="col-md-8 col-8 col-lg-9">
                        <input type="hidden" name="id_producto" value="<?php print $info_producto['id'] ?>">
                        <input type="hidden" name="nombre_producto" value="<?php print $info_producto['nombre'] ?>">
                        <input type="hidden" name="descripcion_producto" value="<?php print $info_producto['descripcion'] ?>">
                        <input type="hidden" name="proveedor_producto" value="<?php print $info_producto['proveedor'] ?>">
                        <input type="hidden" name="usuario_nombre" value="<?php if (isset($_SESSION['user_info'])) if ($_SESSION['user_info']) print $_SESSION['user_info']['nombre_login'] ?>">
                        <input type="hidden" name="info_usuario" value="<?php if (isset($_SESSION['user_info'])) if ($_SESSION['user_info']) print $_SESSION['user_info']['nombre_usuario']; print ' ';  print $_SESSION['user_info']['apellido_usuario']; ?>">
                        <input type="hidden" name="id_usuario" value="<?php if (isset($_SESSION['user_info'])) if ($_SESSION['user_info']) print $_SESSION['user_info']['id']; ?>">


                        <h4 class="section-title pt-4"><?php print $info_producto['nombre'] ?>
                        </h4>
                        <h6 class="fw-600 py-1 color-red"> <?php print $info_producto['proveedor'] ?></h6>
                        <p class="py-2 fw-400"><?php print $info_producto['descripcion'] ?></p>

                        <!-- color -->
                        <div class="d-flex">
                            <div class="col-6 col-lg-7 py-3">
                                <h6 class="fs-1-2 fw-700 m-0">Color</h6>
                                <div class="color col-md-8 col-lg-10 d-flex pt-2">

                                    <?php
                                    $colores = $info_producto['color'];
                                    $separada = '';
                                    $separador = ",";
                                    $separada = explode($separador, $colores);

                                    $count_colores = count($separada);

                                    for ($u = 0; $u < $count_colores; $u++) {
                                    ?>

                                        <button type="button" class="btn btn-color p-3 py-3 me-3" onclick="color_selected()" name="<?php print $separada[$u]; ?>" style="background-color: <?php print $separada[$u];  ?>;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php //print $separada[$u];
                                                                                                                                                                                                                                                                                    ?>"></button>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-5 col-lg-3 pt-3">
                                <h6 class="fs-1-2 fw-600 m-0">Seleccionado</h6>
                                <div class="color col-12 d-flex py-2">

                                    <button type="button" class="btn btn-color p-3 py-3 w-100" id="mostrarColor" style="background-color: <?php print $separada[0]; ?>;  border-radius: 1em;" href="#"></button>

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
                                <h6 class="fs-1-2 fw-600 m-0 pt-3 pb-4">Seleccione la cantidad</h6>
                                <div class="col-12 d-flex flex-wrap">
                                    <?php
                                    $o = 1;
                                    foreach ($separada_opciones as $opciones_producto) {

                                    ?>
                                        <div class="text-center col-lg-4 px-2 py-1">
                                            <h5 class="fw-600 pt-1"><?php print $opciones_producto ?></h5>
                                            <select class="qty-dropdown" id="selectOpciones<?php print $o; ?>_producto" name="selectOpciones<?php print $o; ?>_producto" onchange="cambiarPrecio()" required>
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
                            <div class="col-12 py-3 select-cantidades">
                                <h6 class="fs-1-2 fw-600 m-0 pt-3 pb-4">Seleccione la cantidad</h6>
                                <div class="col-lg-12 d-flex flex-wrap">
                                    <div class="text-center col-lg-4 px-2 py-1">
                                        <select class="qty-dropdown" id="selectOpciones1_producto" name="selectOpciones1_producto" onchange="cambiarPrecio()" required>
                                            <option value="">Unidades</option>
                                            <?php $x = 0;
                                            foreach ($separada_precio as $precios_producto) {
                                                if ($precios_producto != '') {
                                            ?>
                                                    <option value="<?php print $separada_cantidad[$x];
                                                                    print ',';
                                                                    print $precios_producto;
                                                                    print ',';
                                                                    ?>"><?php print $separada_cantidad[$x] ?></option>
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


                                        <h5 class="text-start ps-2 pt-3">Unidades: <span class="color-red fw-700" id="cantidad1_producto" name="cantidad1_producto"></span></h5>
                                        <h5 class="text-start ps-2 pb-2">Costo: <span class="color-red fw-700" id="precioSelect1_producto" name="precioSelect1_producto"></span></h5>
                                        <h6 class="text-start ps-2">C/Unidad: <span class="color-red fw-700" id="precioIndividual1_producto" name="precioIndividual1_producto"></span></h6>
                                    </div>

                                </div>
                            </div>

                        <?php
                        }
                        ?>


                    </div>

                    <div class="col-4 col-lg-3 ws bg px-4 formulario">
                        <h5 class="py-5 fw-600">Resumen de cotización</h5>
                        <h5 class="mb-4 color-black fw-600">Total: <span id="precioTotal" class="fw-700 color-red"></span></h5>

                        <?php
                        if ($user_existe>1 || $admin_existe >1) {
                        ?>

                            <input role="button" type="submit" name="accion" value="Agregar al carrito" class="btn btn-primary w-100" onclick="cambiarCarrito(<?php print $cantidad ?>)">
                            <small class="d-flex form-text pt-4 text-disbabled m-0" style="font-style: italic;">Esta cotización es provisional. Al enviarla recibirá una copia al correo y uno de nuestros agentes se contactará para darle seguimiento.</small>
                        <?php

                        } 
                        else {
                            ?>
                                <a href="login.php" class="btn btn-primary w-100">Iniciar sesión</a>
                                <a href="register-user.php" class="btn btn-secondary w-100 mt-3">Registrarse</a>
    
                                <small class="d-flex form-text pt-4 text-disbabled m-0" style="font-style: italic;">Para poder guardar productos y realizar una cotización debe iniciar sesión o registrarse en Indoff Pro.</small>
    
                            <?php
                            }
                            ?>
                
                    </div>

                </form>

            </div>

        </div>

    </section>

    <!--!product-hero-->

<?php
} else {
    header('Location: index.php');
}

?>