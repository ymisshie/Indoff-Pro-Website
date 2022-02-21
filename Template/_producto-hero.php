<?php
require 'vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];


    $producto = new ameri\Producto;
    $info_producto = $producto->mostrarPorId($id);


    if (!$info_producto)
        header('Location: index.php');
} else {
    header('Location: index.php');
}

?>


<!--product-hero-->
<section id="producto" class="producto-hero">

    <div class="container-fluid">

        <div class="row px-md-5 py-md-5 p-lg-3 justify-content-center">

            <!--IMAGEN DEL PRODUCTO-->
            <div class="col-md-12 col-lg-3 p-md-3 text-center">
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
            <form class="col-md-8 col-lg-5 px-md-4 px-lg-5" method="POST" action="../acciones-carrito.php" enctype="multipart/form-data">

                <input type="hidden" name="id_producto" value="<?php print $info_producto['id'] ?>">

                <h4 class="section-title pt-md-4"><?php print $info_producto['nombre'] ?>
                </h4>
                <h6 class="fw-600 py-md-1 color-red"> <?php print $info_producto['proveedor'] ?></h6>
                <p class="py-md-2"><?php print $info_producto['descripcion'] ?></p>

                <!-- color -->
                <div class="d-flex">
                    <div class="col-md-7 col-lg-7  py-md-3">
                        <h6 class="fs-1-2 fw-600 m-0">Color</h6>
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

                    <div class="col-md-5 col-lg-5 py-md-3">
                        <h6 class="fs-1-2 fw-600 m-0">Color seleccionado</h6>
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
                <div class="col-md-12 col-lg-12 py-md-3 select-cantidades">
                    <h6 class="fs-1-2 fw-600 m-0 py-md-3">Seleccione la cantidad</h6>

                    <!--select cantidades 1
                    <div class="d-flex">
                        <div class="col-lg-6 color-grey-bg formulario">
                            <div class="text-center col p-md-2">
                                <select name="" id="" class="qty-dropdown">
                                    <option value="">Unidades</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 px-md-4">
                            <h5>Precio</h5>
                            <h6>C/u</h6>
                        </div>

                    </div>-->

                    <!--select cantidades 1+-->

                    <div class="col-lg-12 d-flex flex-wrap">
                        <div class="text-center col-lg-4 px-md-3 py-md-1 color-grey3-bg formulario">
                            <h5 class="fw-600 pt-md-1">xs</h5>
                            <select class="qty-dropdown" id="cantidad_producto" name="cantidad_producto[]" onchange="cambiarPrecio()">
                                <option value="">Unidades</option>
                                <option value="100, 20">100 unidades</option>
                            </select>
                            <h6 class="text-start ps-md-2 pt-md-2" id="precioselect1_producto">Costo:</h6>
                            <h6 class="text-start ps-md-2" id="precioIndividual1">C/Unidad</h6>
                        </div>
                        <div class="text-center col-lg-4 px-md-3 py-md-1 color-grey3-bg formulario">
                            <h5 class="fw-600 pt-md-1">m</h5>
                            <select class="qty-dropdown" id="cantidad_producto" name="cantidad_producto[]" onchange="cambiarPrecio()">
                                <option value="">Unidades</option>
                                <option value="400, 30">200 unidades</option>
                            </select>
                            <h6 class="text-start ps-md-2 pt-md-2" id="precioselect2_producto">Costo:</h6>
                            <h6 class="text-start ps-md-2" id="precioIndividual2">C/Unidad</h6>
                        </div>
                     
                    </div>



                </div>

            </form>

        </div>

    </div>

</section>
<!--!product-hero-->