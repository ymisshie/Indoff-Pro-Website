<?php
require 'vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $producto_evento = new ameri\Producto_Evento;
    $evento = new ameri\Evento;
    $info_producto_evento = $producto_evento->mostrar();
    $info_evento = $evento->mostrarPorId($id);
    


    if (!$info_producto_evento)
        header('Location: index.php');
} else {
    header('Location: index.php');
}

?>

<section> 
    <?php

    $cantidad_eventos = count($info_evento);

    if ($cantidad_eventos > 0) {
        //print_r($info_evento);
        //$cont_categorias=0;

        $c = 1;
        foreach ($info_producto_evento as $item_producto_evento) {
            if ($id == $item_producto_evento['evento_id']) 
            { //print_r($id);
                //print_r($item_producto_evento);
    ?>
        
        <article class="pb-3 pt-3" style="background-color: #eee;">
            <div class="container py-1">
                <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card text-black">
                    <!-- <i class="fab fa-lg pt-3 pb-1 px-3">Indoff</i> -->
                    <?php
                        $imagen = 'upload/' . $item_producto_evento['imagen'];
                        if (file_exists($imagen)) {
                        ?>
                            <img src="<?php print $imagen; ?>" class="card-img-top">

                        <?php
                        } else { ?>
                            Sin imagen
                    <?php } ?>
                    <div class="card-body">
                        <div class="text-center">
                        <h5 class="card-title"><?php print $item_producto_evento['nombre'] ?></h5>
                        <p class="text-muted mb-4"><?php print $item_producto_evento['descripcion'] ?></p>
                        </div>
                        <div>
                        <?php
                            if (strlen($item_producto_evento['op1']) > 0)
                            {
                            ?>
                                <div class="d-flex justify-content-between">
                                    <span><?php print $item_producto_evento['op1'] ?></span><span>Cantidad: <?php print $item_producto_evento['q1'] ?></span><span>Precio: $<?php print $item_producto_evento['precio1'] ?></span>
                                </div>
                            <?php
                        } 
                        ?>
                        <?php
                            if (strlen($item_producto_evento['op2']) > 0) 
                            {
                            ?>
                                <div class="d-flex justify-content-between">
                                    <span><?php print $item_producto_evento['op2'] ?></span><span>Cantidad: <?php print $item_producto_evento['q2'] ?></span><span>Precio: $<?php print $item_producto_evento['precio2'] ?></span>
                                </div>
                            <?php
                        } 
                        ?>
                        <?php
                            if (strlen($item_producto_evento['op3']) > 0)
                            {
                            ?>
                                <div class="d-flex justify-content-between">
                                    <span><?php print $item_producto_evento['op3'] ?></span><span>Cantidad: <?php print $item_producto_evento['q3'] ?></span><span>Precio: $<?php print $item_producto_evento['precio3'] ?></span>
                                </div>
                            <?php
                        } 
                        ?>
                        <?php
                            if (strlen($item_producto_evento['op4']) > 0) 
                            {
                            ?>  
                            
                                <div class="d-flex justify-content-between">
                                    <span><?php print $item_producto_evento['op4'] ?></span><span>Cantidad: <?php print $item_producto_evento['q4'] ?></span><span>Precio: $<?php print $item_producto_evento['precio4'] ?></span>
                                </div>
                            <?php
                        } 
                        ?>
                        <?php
                            if (strlen($item_producto_evento['op5']) > 0) 
                            {
                            ?>
                                <div class="d-flex justify-content-between">
                                    <span><?php print $item_producto_evento['op5'] ?></span><span>Cantidad: <?php print $item_producto_evento['q5'] ?></span><span>Precio: $<?php print $item_producto_evento['precio5'] ?></span>
                                </div>
                            <?php
                        } 
                        ?>
                        <?php
                            if (strlen($item_producto_evento['op6']) > 0) 
                            {
                            ?>
                                <div class="d-flex justify-content-between">
                                    <span><?php print $item_producto_evento['op6'] ?></span><span>Cantidad: <?php print $item_producto_evento['q6'] ?></span><span>Precio: $<?php print $item_producto_evento['precio6'] ?></span>
                                </div>
                            <?php
                        } 
                        ?>
                        <?php
                            if (strlen($item_producto_evento['op7']) >0)
                            {
                            ?>
                                <div class="d-flex justify-content-between">
                                    <span><?php print $item_producto_evento['op7'] ?></span><span>Cantidad: <?php print $item_producto_evento['q7'] ?></span><span>Precio: $<?php print $item_producto_evento['precio7'] ?></span>
                                </div>
                            <?php
                        } 
                        ?>

                        <div class="d-flex justify-content-between">
                            <span>Tamaño</span><span><?php print $item_producto_evento['size'] ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Peso</span><span><?php print $item_producto_evento['peso'] ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Color</span><span><?php print $item_producto_evento['color'] ?></span>
                        </div>
                        </div>
                        <div class="d-flex justify-content-between total font-weight-bold mt-4">
                        <button type="button" class="btn btn-primary btn-lg btn-block">Agregar al carrito</button>
                        <button type="button" class="btn btn-primary btn-lg btn-block">Comprar</button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </article>

    <?php

            $c++;
            }
        }
    } 
    else {
        ?>
            <h4 text-black>NO HAY PRODUCTOS </h4>
    <?php
    }
    ?>

</section>
