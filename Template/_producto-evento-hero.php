<?php
require 'vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];


    $producto = new ameri\Producto_Evento;
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

        <div class="row px-md-5 py-md-5 p-lg-3 justify-content-center" method="POST" action="acciones_p.php" enctype="multipart/form-data">

            <input type="hidden" name="id_producto" value="<?php print $info_producto['id'] ?>">

            <!--IMAGEN DEL PRODUCTO-->
            <div class="col-md-12 col-lg-4 text-center align-self-center">
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
            <div class="col-md-7 col-lg-5 px-md-4 px-lg-5">
                <h4 class="section-title pt-md-4"><?php print $info_producto['nombre'] ?>
                </h4>
                <h6 class="fw-600 py-md-1 color-red"> <?php print $info_producto['proveedor'] ?></h6>
                <p class="py-md-2"><?php print $info_producto['descripcion'] ?></p>

                <!-- color -->
                <div class="color col-12 py-md-3">
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

                            <div class="p-md-3 p-lg-3 py-lg-3 me-md-3 btn btn-color" style="background-color: <?php print $separada[$u]; ?>;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print $separada[$u]; ?>">
                            </div>
                        <?php
                        }
                        ?>


                    </div>
                    <!-- !color -->

                </div>

                <div class="color col-12 py-md-3">
                    <h6 class="fs-1-2 fw-600 m-0">Unidades</h6>
                    <p class="py-md-2 col-md-8 col-lg-12">Seleccione la cantidad y costo por variación de producto.</p>

                    <?php
                    $opciones = $info_producto['opciones'];
                    $separada = '';
                    $separador = ",";


                    $cantidad = $info_producto['cantidad'];
                    $costo = $info_producto['precio'];
                    $separada_cantidad = '';
                    $separada_costo = '';
                    $separador = ",";
                    $separada_cantidad = explode($separador, $cantidad);
                    $separada_costo = explode($separador, $costo);

                    $count_cantidad = count($separada_cantidad);

                    $count_costo = count($separada_costo);
                    ?>
                    <!--CANTIDAD Y COSTO-->
                    <div class="color-grey-bg 
                    <?php
                    if ($opciones != '') {
                        print 'col-md-11 col-lg-12';
                    } else if ($opciones == '') {
                        print 'col-md-9';
                    }
                    ?>
                    
                    formulario d-flex flex-wrap py-md-2 mt-md-3 p-md-2">



                        <?php

                        if ($opciones != '') {
                            $separada = explode($separador, $opciones);

                            $count_opciones = count($separada);

                            for ($o = 0; $o < $count_opciones; $o++) {
                        ?>
                                <div class="col-md-12 col-lg-6 text-center">
                                    <h5 class="fw-500"><?php if ($separada[$o] != '') {
                                                            print $separada[$o];
                                                        } ?></h5>

                                    <select class="col-md-12 qty-dropdown" name="cantidadcosto_producto" id="cantidadcosto_producto" onchange="cambiarPrecio()">
                                        <option value="" class="fw-600">
                                            Unidades, C/u, Total
                                        </option>


                                        <?php
                                        for ($ca = 0; $ca < $count_cantidad; $ca++) {
                                            $int_cantidad = intval($separada_cantidad[$ca]);
                                            $int_costo = intval($separada_costo[$ca]);
                                            $costounidad = $int_costo / $int_cantidad; ?>

                                            <option value="<?php
                                                            print $separada_cantidad[$ca];
                                                            print ',';
                                                            print $separada_costo[$ca]; ?>"><?php
                                                                                            print $int_cantidad;
                                                                                            print ', $';
                                                                                            print number_format($costounidad, 2);
                                                                                            print ', $';
                                                                                            print $int_costo; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>

                            <?php
                            }
                        } else {
                            ?>
                            <select class="col-md-12 me-auto qty-dropdown" name="cantidadcosto_producto" id="cantidadcosto_producto" onchange="cambiarPrecio()">
                                <option value="" class="fw-600">
                                    Unidades, C/u, Total
                                </option>

                                <?php
                                for ($ca = 0; $ca < $count_cantidad; $ca++) {
                                    $int_cantidad = intval($separada_cantidad[$ca]);
                                    $int_costo = intval($separada_costo[$ca]);
                                    $costounidad = $int_costo / $int_cantidad; ?>

                                    <option value="<?php
                                                    print $separada_cantidad[$ca];
                                                    print ',';
                                                    print $separada_costo[$ca]; ?>"><?php
                                                                                    print $int_cantidad;
                                                                                    print ', $';
                                                                                    print number_format($costounidad, 2);
                                                                                    print ', $';
                                                                                    print $int_costo; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        <?php
                        }
                        ?>

                    </div>
                    <!--!CANTIDAD Y COSTO-->


                </div>


            </div>
            <!--!INFO DEL PRODUCTO-->
            <div class="col-md-5 col-lg-2 align-self-md-center">
                <div class="formulario ws color-grey-bg px-md-4 py-md-5">

                    <h4 class="py-md-3 fw-700" id="precio_dinamico">Costo total: $<?php print number_format($separada_costo[0], 2) ?></h4>
                    <p class="m-0 fw-500" id="cantidad_dinamica">Cantidad total: <?php print $separada_cantidad[0] ?> Unidades</p>
                    <p class="m-0 fw-500" id="costounidad_dinamico">$<?php print number_format((number_format($separada_costo[0])) / (number_format($separada_cantidad[0])), 2) ?>/Unidad</p>

                    <!--
<a href="productos-dashboard.php?id=<?php //print $info_categoria['id'] 
                                    ?>" class="btn btn-primary my-md-4 mx-md-4" role="buttton">Cancelar</a>
    -->

                </div>

                <!-- <input type="submit" name="accion" href="acciones_p.php?id=<?php print $info_categoria['id'] ?>" class="btn btn-lg btn-primary mt-md-5" value="Solicitar cotización"> -->

            </div>
        </div>


</section>
<!--!product-hero-->