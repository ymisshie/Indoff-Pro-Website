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

                <div class="col-2 filtros py-5">


                    <div class="btn-group-vertical btn-group-filtros" role="group" aria-label="Vertical button group">
                        <!--<button type="button" class="btn btn-filtro" role="button" data-filter="*">Mostrar todo</button>-->
                        <button class="btn btn-filtro disabled">Filtrar por categoria</button>

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

                    <div class="col-12">
                        <h2 class="section-title py-5 m-0">Productos</h5>
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
                                        <img src="<?php print $imagen; ?>" class="py-3 img-fluid">

                                    <?php } else { ?>
                                        Sin imagen
                                    <?php } ?>

                                    <div class="color col-lg-9 mx-auto d-flex justify-content-between py-lg-1">
                                        <div class="color-aqua-bg rounded-circle btn btn-color">
                                        </div>
                                        <div class="color-aqua-bg rounded-circle btn btn-color">
                                        </div>
                                        <div class="color-aqua-bg rounded-circle btn btn-color">
                                        </div>
                                        <div class="color-aqua-bg rounded-circle btn btn-color">
                                        </div>
                                        <div class="color-aqua-bg rounded-circle btn btn-color">
                                        </div>

                                    </div>
                                    <!-- !color -->

                                    <h5 class="pt-3 m-0"><?php print $item_producto['nombre'] ?></h5>

                                    <p class="py-2 m-0"><?php print $item_producto['proveedor'] ?></>
                                    <div class="col-lg-0 mx-auto d-flex py-lg-1 justify-content-center text-center">

                                        <div class="rating text-warning font-size-12">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                        </div>

                                        <p class="px-2 m-0">(45 reviews)</p>

                                    </div>

                                    <h6 class="pt-lg-3 pb-4 m-0">Desde $<?php print $item_producto['precio1'] ?></h6>

                                </div>

                                <a class="btn btn-warning text-white my-4" href="producto.php?id=<?php print $item_producto[0]?>" role="button">Ver</a>
                                <a class="btn btn-danger my-4" href="carrito.php?id=<?php print $item_producto[0]?>" role="button">Agregar al carrito</a>

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