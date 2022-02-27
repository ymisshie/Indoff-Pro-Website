<?php
require 'vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $producto = new ameri\Producto;
    $info_producto = $producto->mostrarPorId($id);
    $categoria = new ameri\Categoria;
    $info_categoria = $categoria->mostrar();

    if (!$info_producto)
        header('Location: index.php');
} else {
    header('Location: index.php');
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

<!--product-hero-->
<section id="producto" class="producto-hero">

    <div class="container-fluid">

        <div class="row justify-content-center">
            <!--IMAGEN DEL PRODUCTO-->
            <div class="col-md-12 col-lg-4 text-center ">
                <?php
                $imagen = 'upload/' . $info_producto['imagen'];
                if (file_exists($imagen)) {
                ?>
                    <img src="<?php print $imagen; ?>" class="img-fluid">

                <?php } else { ?>
                    Sin imagen
                <?php } ?>
            </div>
            <!--!IMAGEN DEL PRODUCTO-->

            <!--INFO DEL PRODUCTO-->
            <form class="col-md-8 col-lg-5 px-md-4 px-lg-5 ws" method="POST" action="../acciones-carrito.php" enctype="multipart/form-data">

                <input type="hidden" name="id_producto" value="<?php print $info_producto['id'] ?>">

                <h4 class="section-title pt-md-4"><?php print $info_producto['nombre'] ?>
                </h4>
                <h6 class="fw-600 py-md-1 color-red"> <?php print $info_producto['proveedor'] ?></h6>
                <p class="py-md-2 fw-400"><?php print $info_producto['descripcion'] ?></p>

                <!-- color -->
                <div class="d-flex">
                    <div class="col-md-7 col-lg-7 py-md-3">
                        <h6 class="fs-1-2 fw-700 m-0">Color</h6>
                        <div class="color col-md-10 d-flex py-md-2">

                            <?php
                            $colores = $info_producto['color'];
                            $separada = '';
                            $separador = ",";
                            $separada = explode($separador, $colores);

                            $count_colores = count($separada);

                            for ($u = 0; $u < $count_colores; $u++) {
                            ?>

                                <button type="button" class="btn btn-color p-md-3 py-md-3 me-md-3" onclick="color_selected()" name="<?php print $separada[$u]; ?>" style="background-color: <?php print $separada[$u];  ?>;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php //print $separada[$u];
                                                                                                                                                                                                                                                                                        ?>"></button>
                            <?php
                            }
                            ?>
                        </div>
                    </div>

                    <div class="col-md-5 col-lg-3 py-md-3">
                        <h6 class="fs-1-2 fw-600 m-0">Seleccionado</h6>
                        <div class="color col-md-12 d-flex py-md-2">

                            <burron type="button" class="btn btn-color p-md-3 py-md-3" id="mostrarColor" style="background-color: <?php print $separada[0]; ?>; 
                            border-radius: 1em;
                            width:100%;
                            " href="#"></button>

                        </div>
                        <small class="d-flex form-text text-disbabled m-0" id="mostrarColorNombre" name="color_selected"><?php print $separada[0]; ?></small>
                    </div>

                </div>

                <!--Cantidades-->

                <?php
                $opciones = $info_producto['opciones'];
                $precio = $info_producto['precio'];
                $cantidad = $info_producto['cantidad'];
                $separada_opciones = '';
                $separada_precio = '';
                $separada_cantidad = '';
                $separador = ",";
                $separada_opciones = explode($separador, $opciones);
                $separada_precio = explode($separador, $precio);
                $separada_cantidad = explode($separador, $cantidad);
                $count_opciones = count($separada_opciones);
                ?>
                <div class="col-md-12 col-lg-12 py-md-3 select-cantidades">
                    <h6 class="fs-1-2 fw-600 m-0 pt-md-3 pb-md-4">Seleccione la cantidad</h6>
                    <div class="col-lg-12 d-flex flex-wrap">
                        <?php
                        foreach ($separada_opciones as $opciones_producto) {
                            $o = 0;
                        ?>
                            <div class="text-center col-lg-4 px-md-2 py-md-1">
                                <h5 class="fw-600 pt-md-1"><?php print $opciones_producto ?></h5>
                                <select class="qty-dropdown" id="cantidad_producto" name="cantidad_producto[]" onchange="cambiarPrecio()">
                                    <option value="">Unidades</option>
                                    <?php $x = 0;
                                    foreach ($separada_precio as $precios_producto) {

                                        if ($precios_producto != '') {
                                    ?>
                                            <option value="<?php print $separada_cantidad[$x];
                                                            print ',';
                                                            print $precios_producto; ?>"><?php print $separada_cantidad[$x]; ?></option>
                                    <?php
                                            $x++;
                                        }
                                    }

                                    ?>
                                </select>
                                <h6 class="text-start ps-md-2 pt-md-2" id="cantidad<?php print $o; ?>_producto">Unidades:</h6>
                                <h6 class="text-start ps-md-2" id="precioselect<?php print $o; ?>_producto">Costo:</h6>
                                <h6 class="text-start ps-md-2" id="precioIndividual<?php print $o; ?>">C/Unidad</h6>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <?php
                ?>
            </form>

            <div class="col-lg-2 color-grey3-bg">
                nn
            </div>

        </div>

    </div>

</section>
<!--!product-hero-->