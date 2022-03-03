<?php

use ameri\Carrito;

require 'vendor/autoload.php';

$info_carrito = new ameri\Carrito;

$id = $_SESSION['user_info']['nombre_login'];
//print $id;

$carrito = $info_carrito->mostrarPorId($id);

print '<pre>';
print_r ($carrito);

$cantidad_carrito =0;

foreach ($carrito as $item_carrito=> $arreglo) 
{
}

if (!isset($_SESSION["user_info"])) {
?>
    <!--carrito-section-->
    <section class="carrito-section">
        <div class="container">
            <div class="row justify-content-center text-center">

                <h2 class="section-title pt-5">Carrito vacio</h2>
                <div class="col">
                    <a class="btn btn-primary my-4 btn-lg ss ms-auto" href="categorias.php?id=1" role="button">Ver productos</a>
                </div>
                <div class="col-12 pb-5">
                    <span><i class="fas fa-cart-plus py-5" style="font-size: 15em;"></i></span>
                </div>

            </div>
        </div>
    </section>
    <!--!carrito-section-->


    <?php
} else if (isset($_REQUEST["vaciar"])) {
    unset($_SESSION["user_info"]); { ?>

        <!--carrito-section-->
        <section class="carrito-section">
            <div class="container">
                <div class="row justify-content-center text-center">

                    <h2 class="section-title pt-5">Carrito vacio</h2>
                    <div class="col">
                        <a class="btn btn-primary my-4 btn-lg ss ms-auto" href="categorias.php?id=1" role="button">Ver productos</a>
                    </div>
                    <div class="col-12 pb-5">
                        <span><i class="fas fa-cart-plus py-5" style="font-size: 15em;"></i></span>
                    </div>

                </div>
            </div>
        </section>
        <!--!carrito-section-->

    <?php
    }
} else 
    if (isset($_SESSION['user_info'])) {

    ?>

    <!--carrito-section-->
    <section id="carrito" class="carrito-section">
        <div class="container-fluid px-5">
            <div class="row px-5">
                <div class="col-9 d-flex">
                    <h2 class="section-title py-5"><?php echo $cantidad_carrito ?> Productos en carrito</h2>
                    <a class="btn btn-link align-self-end mb-4 color-red ss ms-auto" href="carrito.php?vaciar=true" role="button">Vaciar carrito</a>
                </div>
            </div>

            <div class="row px-5 justify-content-between pb-5">

                <div class="col-md-9">
                    <div class="justify-content-center table-responsive">
                        <table class="table ">
                            <thead>
                                <tr class="text-center color-grey3-bg ">
                                    <th scope="col"></th>
                                    <th scope="col">Nobre</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Tanaño</th>
                                    <th scope="col">Peso</th>
                                </tr>
                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-12 col-md-2 ws formulario px-4">
                    <h5 class="pt-4 fw-600" id="precioTotal">Resumen de cotización</h5>

                    <h6 class="my-4 fw-600"><?php echo 'Productos: ' . $cantidad_carrito ?></h6>
                    <h5 class="mb-4 color-red fw-600">Total: <span><?php echo $total ?></span></h5>


                    <input type="submit" name="accion" class="btn btn-primary w-100" value="Enviar cotización"></a>

                    <a class="btn btn-secondary mt-3 w-100" href="login.php" role="button">Seguir viendo</a>
                    <small class="d-flex form-text py-4 text-disbabled m-0" style="font-style: italic;">Esta cotización es provisional. Al enviarla recibirá una copia al correo y uno de nuestros agentes se contactará para darle seguimiento.</small>
                </div>

            </div>


        </div>
    </section>
    <!--!carrito-section-->
<?php
} else {
    header('location: categorias.php');
}
?>