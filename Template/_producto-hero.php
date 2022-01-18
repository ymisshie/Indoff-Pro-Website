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
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <input type="hidden" name="id" value="<?php print $info_producto['id'] ?>">

            <div class="col-lg-5 p-0 text-center">
                <?php
                $imagen = 'upload/' . $info_producto['imagen'];
                if (file_exists($imagen)) {
                ?>
                    <img src="<?php print $imagen; ?>" class="img-fluid">

                <?php } else { ?>
                    Sin imagen
                <?php } ?>
            </div>

            <div class="col-lg-7 px-lg-5">
                <h4 class="section-title pt-lg-5"><?php print $info_producto['nombre'] ?>
                </h4>
                <h6 class="fw-500"> <?php print $info_producto['proveedor'] ?></h6>
                <p class="py-lg-3 m-0"><?php print $info_producto['descripcion'] ?></p>

                <!-- color -->
                <div class="color col py-lg-3">
                    <h6 class="fs-1-2 fw-600 m-0">Color</h6>
                    <div class="d-flex py-lg-3">
                        <div class="color-aqua-bg p-lg-3 me-lg-4 btn btn-color">
                        </div>
                        <div class="color-aqua-bg p-lg-3 me-lg-4 btn btn-color">
                        </div>
                        <div class="color-aqua-bg p-lg-3 me-lg-4 btn btn-color">
                        </div>
                        <div class="color-aqua-bg p-lg-3 me-lg-4 btn btn-color">
                        </div>
                        <div class="color-aqua-bg p-lg-3 me-lg-4 btn btn-color">
                        </div>
                    </div>
                </div>

                <!-- !color -->
                <h6 class="fs-1-2 fw-600 m-0">Cantidad</h6>
                <!-- product qty section -->
                <div class="cantidad col py-lg-2 d-flex">


                    <!--
                    <div class=" text-center mx-3">
                        <h6 class="font-poppins"><?php print $info_producto['op2'] ?></h6>
                        <input id="qtyS" class="qty-dropdown" type="number" name="qtyS" value="0">
                    </div>

                -->

                </div>

                <div class="col-12 pt-3 d-flex">
                    <div class="col-5">
                        <p class="precio-info m-0 font-size-09">Cantidad total: 72</p>
                        <p class="precio-info m-0">$110/Unidad</p>
                        <h5 class="precio-info precio-total py-lg-3 fw-600">Precio: $7,900</h5>
                    </div>
                    <div class="col-lg-7 text-center">

                        <!--
                        <div class="col-8 d-flex pb-3">
                            <span><i class="fas fa-shipping-fast font-size-2 pt-2"></i></span>
                            <p class="px-3 text-start m-0 mb-2 font-size-09">Envio estimado para el lunes 13 de diciembre</p>
                        </div>
                -->
                        <div class="div d-flex btn-compras">
                            <button type="submit" class="btn btn-primary">Comprar</button>
                            <button type="submit" class="btn btn-secondary mx-lg-4">Agregar al carrito</button>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--!product-hero-->