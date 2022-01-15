<?php

//ACTIVAR SESIONES EN PHP


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    require 'vendor/autoload.php';

    $producto = new ameri\Producto;
    $resultado = $producto->mostrarPorId($id);


    if (!$resultado)
        header('Location: index.php');

    agregarProducto($resultado, $id);


    if (isset($_SESSION['carrito'])) { //SI EL CARRITO EXISTE
        //SI EL PELICULA EXISTE EN EL CARRITO
        if (array_key_exists($id, $_SESSION['carrito'])) {
            actualizarProducto($id);
        } else {
            //  SI EL CARRITO NO EXISTE EN EL CARRITO
            agregarProducto($resultado, $id);
        }
    } else {
        //  SI EL CARRITO NO EXISTE
        agregarProducto($resultado, $id);
    }

    /*
    print '<pre>';
    print_r($_SESSION['carrito']);
*/
}

?>


<!--carrito-section-->
<section id="carrito" class="py-4 carrito-section">
    <div class="container-fluid w-75">
        <h2 class="section-title text-start m-0 py-4">Shopping Cart</h2>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-9">
                <!-- cart item -->

                <?php
                if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {

                    foreach ($_SESSION['carrito'] as $indice => $value) {
                ?>
                        <div class="row py-3 mt-3 producto-carrito">
                            <div class="col-2 color-grey-bg">
                            <?php
                                    $imagen = 'upload/' . $value['imagen'];
                                    if (file_exists($imagen)) {
                                    ?>
                                        <img src="<?php print $imagen; ?>" class="img-fluid">

                                    <?php } else { ?>
                                        Sin imagen
                                    <?php } ?>

                            </div>
                            <div class="col-8">
                                <h5 class="section-title text-start m-0"><?php print $value['nombre']?>
                                </h5>
                                <h6 class="py-2 font-size-09"><?php print $value['proveedor']?></h6>
                                <!-- product rating -->
                                <div class="d-flex pb-3 rating">
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                    <a href="#preguntas-reviews-section" class="px-2 font-size-09">100 ratings y 45
                                        preguntas contestadas</a>

                                </div>
                                <!--  !product rating-->

                                <!-- product qty -->

                                <div class="cantidad col-12 py-2 d-flex justify-content-between font-size-0.7">
                                    <div class=" text-center mx-3">
                                        <h6 class="font-poppins">XS</h6>
                                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                                    </div>
                                    <div class=" text-center mx-3">
                                        <h6 class="font-poppins">S</h6>
                                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                                    </div>
                                    <div class=" text-center mx-3">
                                        <h6 class="font-poppins">M</h6>
                                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                                    </div>
                                    <div class=" text-center mx-3">
                                        <h6 class="font-poppins">L</h6>
                                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                                    </div>
                                    <div class=" text-center mx-3">
                                        <h6 class="font-poppins">XL</h6>
                                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                                    </div>
                                    <div class=" text-center mx-3">
                                        <h6 class="font-poppins">2XL</h6>
                                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                                    </div>
                                    <div class=" text-center mx-3">
                                        <h6 class="font-poppins">3XL</h6>
                                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                                    </div>

                                </div>

                                <div class="d-flex pt-2">
                                    <button type="submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                    <button type="submit" class="btn font-baloo text-danger">Save for Later</button>
                                </div>
                                <!-- !product qty -->

                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 text-danger font-baloo">
                                    $<span class="product_price">152</span>
                                </div>
                            </div>
                        </div>

                    <?php
                    }
                } else {
                    ?>
                    <div class="row py-3 mt-3 producto-carrito">

                        <h5 class="section-title text-start m-0">No hay productos en el carrito.
                        </h5>

                    </div>
                <?php
                }
                ?>
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