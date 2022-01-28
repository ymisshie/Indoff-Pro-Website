<?php
require 'vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $producto_evento = new ameri\Producto_Evento;
    $info_producto_evento = $producto_evento->mostrarPorId($id);


    if (!$info_producto_evento)
        header('Location: index.php');
} else {
    header('Location: index.php');
}

?>

<!--product-hero-->
<section id="producto" class="pt-4 pb-3 producto-hero">
    <div class="container">
        <div class="row">
            <input type="hidden" name="id" value="<?php print $info_producto_evento['id'] ?>">

            <div class="col-5 p-0 text-center">
                <?php
                $imagen = 'upload/' . $info_producto_evento['imagen'];
                if (file_exists($imagen)) {
                ?>
                    <img src="<?php print $imagen; ?>" class="img-fluid">

                <?php } else { ?>
                    Sin imagen
                <?php } ?>
            </div>
            <div class="col-6 ps-4">
                <h4 class="section-title text-start m-0"><?php print $info_producto_evento['nombre'] ?>
                </h4>
                <h6 class="py-2 font-size-09"><?php print $info_producto_evento['proveedor'] ?></h6>
                <div class="d-flex pb-3 rating">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </div>
                    <a href="#preguntas-reviews-section" class="px-2 font-size-09">100 ratings y 45 preguntas contestadas</a>

                </div>

                <p class="font-size-09"><?php print $info_producto_evento['descripcion'] ?></p>


                <!-- color -->
                <div class="color col-9">
                    <h6 class="subtitle pb-1">Color</h6>
                    <div class="d-flex justify-content-between mb-3">
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
                        <div class="color-aqua-bg rounded-circle btn btn-color">
                        </div>
                        <div class="color-aqua-bg rounded-circle btn btn-color">
                        </div>
                        <div class="color-aqua-bg rounded-circle btn btn-color">
                        </div>
                    </div>
                </div>

                <!-- !color -->
                <h6 class="subtitle pb-1">Cantidad por medidas</h6>
                <!-- product qty section -->
                <div class="cantidad col-12 py-2 d-flex justify-content-between font-size-0.7">
                    <div class=" text-center mx-3">
                        <h6 class="font-poppins"><?php print $info_producto_evento['op1'] ?></h6>
                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                    </div>
                    <div class=" text-center mx-3">
                        <h6 class="font-poppins"><?php print $info_producto_evento['op2'] ?></h6>
                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                    </div>
                    <div class=" text-center mx-3">
                        <h6 class="font-poppins"><?php print $info_producto_evento['op3'] ?></h6>
                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                    </div>
                    <div class=" text-center mx-3">
                        <h6 class="font-poppins"><?php print $info_producto_evento['op4'] ?></h6>
                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                    </div>
                    <div class=" text-center mx-3">
                        <h6 class="font-poppins"><?php print $info_producto_evento['op5'] ?></h6>
                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                    </div>
                    <div class=" text-center mx-3">
                        <h6 class="font-poppins"><?php print $info_producto_evento['op6'] ?></h6>
                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                    </div>
                    <div class=" text-center mx-3">
                        <h6 class="font-poppins"><?php print $info_producto_evento['op7'] ?></h6>
                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                    </div>

                </div>

                <div class="col-12 pt-3 d-flex">
                    <div class="col-5">
                        <p class="precio-info m-0 font-size-09">Cantidad total: 72</p>
                        <p class="precio-info m-0">$110/Unidad</p>
                        <h5 class="precio-info precio-total py-3">Precio: $7,900</h5>
                    </div>
                    <div class="col-7 text-center">
                        <div class="col-8 d-flex pb-3">
                            <span><i class="fas fa-shipping-fast font-size-2 pt-2"></i></span>
                            <p class="px-3 text-start m-0 mb-2 font-size-09">Envio estimado para el lunes 13 de diciembre</p>
                        </div>
                        <div class="div d-flex btn-compras">
                            <button type="submit" class="btn btn-primary">Comprar</button>
                            <button type="submit" class="btn btn-secondary mx-4">Agregar al carrito</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--!product-hero-->