<?php
require 'vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];


    $producto = new ameri\Producto;
    $categoria = new ameri\Categoria;

    $info_producto = $producto->mostrar();
    $info_categoria = $categoria->mostrar();



    /*
 print '<pre>';
 print $info_categoria['nombre'];
*/

    /*
 print '<pre>';
 print_r($info_producto);
*/

    /*
    foreach ($info_producto as $productos) {
        //if ($resultadop['categoria_id']=$resultadoc['id'])
        print '<pre>';
        print_r($productos);
    }
*/

    if (!$info_producto && $info_categoria)
        header('Location: index.php');
} else {
    header('Location: index.php');
}


/*
foreach ($info_producto as $productos) {
    //if ($resultadop['categoria_id']=$resultadoc['id'])
    print '<pre>';
    print $productos[5];
    print $productos['0'];
}
*/

/*
 print '<pre>';

 if($resultadop['categoria_id'] ==$id)
 {
     print $resultadop;
 }
 die;
 */

?>

<!--filtros-categorias-->
<section id="productos" class="productos-section">

    <div class="container">

        <?php
        $cantidad_categorias = count($info_categoria);

        if ($cantidad_categorias > 0) {
            //$cont_categorias=0;
        ?>

            <div class="row justify-content-center">

                <div class="col-lg-2 col-md-4 filtros py-md-4 my-md-5 text-center formulario ws">

                    <h6 class="fw-700">Filtrar por categoria</h6>

                    <br>
                    <div class="btn-group-vertical btn-group-filtros" role="group" aria-label="Vertical button group">
                        <!--<button type="button" class="btn btn-filtro" role="button" data-filter="*">Mostrar todo</button>-->

                        <!--
                    <input type="hidden" name="id" value="<?php //print $resultadoc['id']
                                                            ?>">
                    <?php
                    ?>
                    -->

                        <?php

                        foreach ($info_categoria as $item_categoria) {
                        ?>
                            <button class="btn btn-filtro2 <?php if ($id == $item_categoria['id']) {
                                                                print 'active';
                                                            } ?>" role="button" data-bs-toggle="collapse" href="#categoria<?php print $item_categoria['id']; ?>" role="button" aria-expanded="<?php if ($id == $item_categoria['id'])
                                                                                                                                                                                                    print 'true';
                                                                                                                                                                                                else print 'false' ?>" aria-controls="categoria<?php print $item_categoria['id']; ?>" <?php if ($id == $item_categoria['id']) {
                                                                                                                                                                                                                                                                                            print 'checked';
                                                                                                                                                                                                                                                                                        } ?>><?php print $item_categoria['nombre']; ?></button>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="col-lg-10 col-md-8 text-center">

                    <div class="col-12">
                        <h2 class="section-title py-md-5 m-md-0">Productos disponibles</h5>
                    </div>


                    <div class="col-12 d-flex justify-content-evenly flex-wrap flex-row">

                        <?php
                        foreach ($info_producto as $item_producto) {
                        ?>

                            <div href="producto.php?id=<?php print $item_producto[0] ?>" class="col-lg-3 col-md-8 m-lg-4 collapse <?php if ($id == $item_producto['id']) {
                                                                                                                                        print 'show';
                                                                                                                                    } ?>" id="categoria<?php print $item_producto['id'] ?>">

                                <div class="formulario color-grey-bg ws align-self-center" id="colapseExample">
                                    <?php
                                    $imagen = 'upload/' . $item_producto['imagen'];
                                    if (file_exists($imagen)) {
                                    ?>

                                        <a href="producto.php?id=<?php print $item_producto[0] ?>">
                                            <img src="<?php print $imagen; ?>" class="p-md-3 img-fluid">
                                        </a>


                                    <?php } else { ?>
                                        Sin imagen
                                    <?php } ?>


                                    <div class="color col-lg-10 col-md-10 mx-auto d-flex justify-content-evenly py-md-2">

                                        <?php

                                        $colores = $item_producto['color'];
                                        $separada = '';
                                        $separador = ",";
                                        $separada = explode($separador, $colores);

                                        $count_colores = count($separada);

                                        for ($u = 0; $u < $count_colores; $u++) {
                                        ?>

                                            <div class="p-md-3 mx-md-1 btn btn-color" style="background-color: <?php print $separada[$u]; ?>;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print $separada[$u]; ?>">


                                            </div>
                                        <?php
                                        }
                                        ?>


                                    </div>
                                    <!-- !color -->

                                    <h5 class="pt-md-3 m-0 fw-700"><?php print $item_producto['nombre'] ?></h5>

                                    <h6 class="pt-md-1 m-0 fw-600"><?php print $item_producto['proveedor'] ?></h6>


                                    <?php


                                    $costo = $item_producto['precio'];

                                    $separada_costo = '';
                                    $separador = ",";
                                    $separada_costo = explode($separador, $costo);

                                    $count_costo = count($separada_costo);

                                    ?>
                                    <p class="fw-400 pt-md-3 pb-md-4 m-0">Desde $<?php print $separada_costo[0] ?></p>
                                    <?php

                                    ?>
                                </div>

                                <a class="btn btn-primary text-white my-md-4" href="producto.php?id=<?php print $item_producto[0] ?>" role="button">Ver más</a>

                                <!--
                                <a class="btn btn-secondary ms-md-3 ms-lg-1 my-md-4" href="carrito.php?id=<?php //print $item_producto[0] 
                                                                                                            ?>" role="button">Agregar al carrito</a>
                                    -->
                            </div>
                        <?php

                        }

                        ?>
                    </div>
                <?php
            }
                ?>


                </div>


            </div>

    </div>

</section>
<!--!filtros-categorias-->