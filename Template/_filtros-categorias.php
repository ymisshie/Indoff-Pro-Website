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

                <div class="col-lg-2 filtros py-lg-5 text-center">

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

                <div class="col-10 text-center">

                    <div class="col">
                        <h2 class="section-title py-lg-5 m-lg-0">Productos disponibles</h5>
                    </div>


                    <div class="col-12 d-flex justify-content-evenly flex-wrap flex-row">

                        <?php
                        foreach ($info_producto as $item_producto) {
                        ?>
                            <div class="col-3 m-4 collapse <?php if ($id == $item_producto['id']) {
                                                                print 'show';
                                                            } ?>" id="categoria<?php print $item_producto['id'] ?>">

                                <div class="producto-ficha align-self-center" id="colapseExample">
                                    <?php
                                    $imagen = 'upload/' . $item_producto['imagen'];
                                    if (file_exists($imagen)) {
                                    ?>

                                        <a href="producto.php?id=<?php print $item_producto[0] ?>"> 
                                            <img src="<?php print $imagen; ?>" class="py-lg-3 img-fluid">
                                        </a>


                                    <?php } else { ?>
                                        Sin imagen
                                    <?php } ?>

                                    <div class="color col-lg-10 mx-auto d-flex justify-content-between py-lg-2">
                                        <div class="color-aqua-bg p-lg-3 mx-lg-1 btn btn-color">
                                        </div>
                                        <div class="color-aqua-bg p-lg-3 mx-lg-1 btn btn-color">
                                        </div>
                                        <div class="color-aqua-bg p-lg-3 mx-lg-1 btn btn-color">
                                        </div>
                                        <div class="color-aqua-bg p-lg-3 mx-lg-1 btn btn-color">
                                        </div>
                                        <div class="color-aqua-bg p-lg-3 mx-lg-1 btn btn-color">
                                        </div>

                                    </div>
                                    <!-- !color -->

                                    <h5 class="pt-lg-3 m-0 fw-700"><?php print $item_producto['nombre'] ?></h5>

                                    <h6 class="pt-lg-1 m-0 fw-500"><?php print $item_producto['proveedor'] ?></h6>

                                    <p class="pt-lg-3 pb-lg-4 m-0">Desde $<?php print $item_producto['precio1'] ?></p>

                                </div>

                                <a class="btn btn-primary text-white my-lg-4" href="producto.php?id=<?php print $item_producto[0] ?>" role="button">Ver más</a>
                                <a class="btn btn-secondary my-lg-4" href="carrito.php?id=<?php print $item_producto[0] ?>" role="button">Agregar al carrito</a>

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