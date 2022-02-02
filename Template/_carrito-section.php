<?php

//ACTIVAR SESIONES EN PHP

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];
    require 'vendor/autoload.php';
    $producto = new ameri\Producto;
    $info_producto = $producto->mostrarPorId($id);

    if (!$info_producto) {
        header('Location: index.php');
    }

    agregarProducto($info_producto, $id);


    //si el carrito existe
    if (isset($_SESSION['carrito'])) {

        //si el producto existe en el carrito
        if (array_key_exists($id, $_SESSION['carrito'])) {
            actualizarProducto($id);
        }
        //si el producto no existe en el carrito
        else {
            agregarProducto($info_producto, $id);
        }
    }

    //si el carrito no existe
    else {
        agregarProducto($info_producto, $id);
    }


    print '<pre>';
    print_r($_SESSION['carrito']);
    die;
}
?>


<!--carrito-section-->
<section id="carrito" class="carrito-section">
    <div class="container">
        <h2 class="section-title text-start m-0 py-md-5">Carrito</h2>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-md-9">
                <!-- cart item -->

                <div class="row formulario ws p-md-3">
                    <div class="col-md-3 col-lg-2 color-grey-bg align-self-center">
                        <?php
                        $imagen = 'upload/' . $info_producto['imagen'];
                        if (file_exists($imagen)) {
                        ?>
                            <img src="<?php print $imagen; ?>" class="img-fluid">

                        <?php } else { ?>
                            Sin imagen
                        <?php } ?>

                    </div>
                    <div class="col-md-8">
                        <h5 class="section-title pt-md-4 pb-md-0"><?php print $info_producto['nombre'] ?>
                        </h5>
                        <h6 class="fw-500"><?php print $info_producto['proveedor'] ?></h6>


                        <p class="">Color: </p>



                        <div class="d-flex pt-md-2">
                            <a href="acciones_p.php?id=<?php print $item_producto[0] ?>" class="btn-primary btn btn-sm my-md-1" role="button">Eliminar<i class="far fa-trash-alt ms-md-2 me-md-1"></i></a>
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price">152</span>
                        </div>
                    </div>
                </div>

                <!--
                    <div class="row py-3 mt-3 producto-carrito">

                        <h5 class="section-title text-start m-0">No hay productos en el carrito.
                        </h5>

                    </div>
                                    -->
            </div>

            <!-- subtotal section-->
            <div class="col-3 py-2">
                <div class="sub-total text-center mt-2 border">
                    <h6 class="text-success py-3"><i class="fas fa-check"></i> Su orden es elegible para ENVIO GRATIS</h6>
                    <div class="border-top py-4">
                        <h5 class="">Subtotal (2 articulos):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price">152.00</span>
                            </span> </h5>
                        <button type="submit" class="btn btn-primary mt-3">Checkout</button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>

        <!--  !shopping cart items   -->
    </div>
</section>
<!--!carrito-section-->