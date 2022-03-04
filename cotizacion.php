<?php

require 'vendor/autoload.php';

include('header.php');

/*
$diassemana = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$fecha = $diassemana[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
*/


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $info_productos = new ameri\Cotizaciones;
    $info_cotizacion = new ameri\Cotcat;

    $infocotcat= $info_cotizacion -> mostrar();

    foreach($infocotcat as $item)
    {
        if($item['id']==$id)
        {
            $fecha =$item['fecha'];
        }
    }

    $pp = $info_productos->mostrar();


    //$cotizacion = $info_cotizacion->mostrarPorId();
}
?>

<!--carrito-section-->


<section name="" class="color-grey3-bg py-5">
    <div class="container ws p-5 color-white-bg">
        <div class="row pb-5">

            <div class="col-12 d-flex justify-content-between">
                <div class="">
                    <p class="align-self-center fw-500 color-red font-gentium navbar-brand pt-5 pb-0">Indoff Pro</p>
                </div>
                <div class="align-self-center">
                    <h3 class="fw-700">Productos Promocionales e incentivos</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <h5 class="fw-700">FECHA: <span class="fw-500"><?php print $fecha; ?></span>
                </h5>
                <h5 class="fw-700 mb-0">CLIENTE: <span class="fw-500"><?php print $_SESSION['user_info']['nombre_usuario'] . ' ' . $_SESSION['user_info']['apellido_usuario']; ?></span>
                </h5>
            </div>

            <div class="col-8 text-end">
                <div class="">
                    <p class="fw-700 mb-0">Officina general: <span class="fw-500">11816 Lackland Road St. Louis, MO, USA 63146</span>
                    </p>
                    <p class="fw-700 mb-0">TEL: <span class="fw-500">(001-314) 997-1122</span>
                    </p>
                    <p class="fw-700 mb-0">SUCURSAL TIJUANA: <span class="fw-500">Privada Bugambilias #20209, Tijuana, BC, CP 22216</span>
                    </p>
                    <p class="fw-700 mb-0">TEL: <span class="fw-500">664-6-25-1111</span> <span class="fw-700">FAX:</span> <span class="fw-500">
                            664-6-25-1114</span>
                    </p>
                </div>
            </div>

        </div>

        <div class="row mx-auto py-5 justify-content-center table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center color-grey3-bg ">
                        <th scope="col"></th>
                        <th scope="col">Información del producto</th>
                        <th scope="col">Color</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Tanaño</th>
                        <th scope="col">Peso</th>

                    </tr>
                </thead>


                <tbody>

                    <?php


                    foreach ($pp as $producto) {

                        if ($id == $producto['cotcat_id']) {

                           
                    ?>
                            <tr class="">

                                <td scope="col" class="fw-600"><?php
                                                                $imagen = 'upload/' . $producto['imagen'];
                                                                if (file_exists($imagen)) {
                                                                ?>
                                        <img src="<?php print $imagen; ?>" width="100px">

                                    <?php
                                                                } else { ?>
                                        Sin imagen
                                    <?php } ?>
                                </td>
                                <td scope="col" class="fw-700"><span><a href="producto.php?id=<?php print $producto['id']; ?>" class="color-red"><?php print $producto['nombre'] ?></a></span><br><span class="fw-600 color-black"><?php print $producto['proveedor'] ?></span> <br><span class="fw-400 color-black"><?php print $producto['descripcion'] ?></span></td>
                                <td scope="col" class="text-center fw-400" style="text-transform: capitalize;">
                                    <div class="d-flex justify-content-center">
                                        <?php

                                        $colores = $producto['color'];
                                        $separada = '';
                                        $separador = ",";
                                        $separada = explode($separador, $colores);

                                        $count_colores = count($separada);

                                        for ($u = 0; $u < $count_colores; $u++) {
                                        ?>
                                            <div class="col-1 p-3 rounded-circle mx-1 my-1" style="background-color: <?php print $separada[$u]; ?>;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print $separada[$u]; ?>">
                                            </div>
                                        <?php
                                        } ?>
                                    </div>
                                    <?php print $producto['color'] ?>
                                </td>
                                <td scope="col" class="fw-600">
                                    <?php

                                    $cantidad = $producto['cantidad'];
                                    $costo = $producto['precio'];
                                    $separada_cantidad = '';
                                    $separada_costo = '';
                                    $separador = ",";
                                    $separada_cantidad = explode($separador, $cantidad);
                                    $separada_costo = explode($separador, $costo);

                                    $count_cantidad = count($separada_cantidad);
                                    $count_costo = count($separada_costo);

                                    for ($ca = 0; $ca < $count_cantidad; $ca++) {
                                    ?>
                                        <div class="text-center fw-700 color-red"><?php

                                                                                    if ($separada_cantidad[$ca] == "") {
                                                                                    } else {
                                                                                        print $separada_cantidad[$ca]; ?>
                                                <span class="fw-500 color-black">
                                                    <?php
                                                                                        if ($separada_cantidad[$ca] == 1) {
                                                                                            print ' unidad';
                                                                                        } elseif ($separada_cantidad[$ca] > 1) {
                                                                                            print ' unidades';
                                                                                        } ?>
                                                </span>
                                            <?php
                                                                                    } ?>
                                        </div>
                                    <?php
                                    } ?>
                                </td>
                                <td scope="col" class="fw-600" id="costo_producto">
                                    <?php

                                    $cantidad = $producto['cantidad'];
                                    $costo = $producto['precio'];
                                    $separada_cantidad = '';
                                    $separada_costo = '';
                                    $separador = ",";
                                    $separada_cantidad = explode($separador, $cantidad);
                                    $separada_costo = explode($separador, $costo);

                                    $count_cantidad = count($separada_cantidad);
                                    $count_costo = count($separada_costo);

                                    for ($ca = 0; $ca < $count_cantidad; $ca++) {
                                    ?>
                                        <div class="text-center fw-700 color-red"><?php

                                                                                    if ($separada_costo[$ca] == "") {
                                                                                    } else {
                                                                                        if ($separada_costo[$ca] == 1) {
                                                                                            print '$';
                                                                                        } elseif ($separada_costo[$ca] > 1) {
                                                                                            print ' $';
                                                                                        }
                                                                                        $integer = (int)$separada_costo[$ca];
                                                                                        $integer = number_format($integer, 2, '.', '.');
                                                                                        print $integer;
                                                                                    } ?>
                                        </div>
                                    <?php
                                    } ?>
                                </td>

                                <td scope="col" class="fw-500 text-center"> <?php

                                                                            if ($producto['size'] != '') {
                                                                                print $producto['size'];
                                                                            } else {
                                                                                print 'N/A';
                                                                            } ?></td>


                                <td scope="col" class="fw-500 text-center"><?php

                                                                            if ($producto['peso'] != '') {
                                                                                print $producto['peso'];
                                                                            } else {
                                                                                print 'N/A';
                                                                            } ?></td>



                            </tr>
                    <?php
                        }
                    }

                    ?>


                </tbody>
            </table>
        </div>

        <div class="row">
            <h5 class="fw-700 py-3">Términos y condicioness</h5>
            <ol class="list-group pb-5">
                <li class="list-group-item">
                    La orden de compra no requiere anticipo.
                </li>
                <li class="list-group-item">
                    15 días para el pago.
                </li>
            </ol>

            <h5 class="text-center py-2" style="font-style: italic;">Gracias por preferir Indoff, especialistas en promocionales e incentivos.</h5>
            <h5 class="text-center pt-5 color-red fw-700 pb-2">Lic. Ana Gallegos</h5>
            <h6 class="text-center color-black fw-600 pb-2">Manager Communications</h6>
            <p class="text-disbaled pt-4 text-center" style="font-style: italic;">Esta cotización es provisional. Al enviarse será revisada y se le dará seguimiento por correo en los próximos días hábiles.</p>

        </div>

    </div>
</section>

<!--
<section class="py-5 color-grey3-bg">
    <form class="container formulario ws py-4 px-5" form method="POST" action="correo.php" enctype="multipart/form-data" name="" onsubmit="validateMyForm(event);">
        <h2 class="text-center section-title pt-4 pb-3">Envio de cotización</h2>
        <p class="text-center py-3 col-lg-7 col-9 mx-auto">Este formulario contiene los datos de usuario y enviará una copia a su correo de la información de los productos seleccionados.</p>
        <div class="row w-75 mx-auto mb-4">
            <div class="col-12 mx-auto pb-3">
                <div class="form-outline">
                    <h5 class="form-label required py-2">Nombre</h5>
                    <input type="text" value="<?php print $_SESSION['user_info']['nombre'] ?>" name="first_name_user" id="name" required class="form-control2" />
                </div>
            </div>
            <div class="col-12  mx-auto pb-3">
                <div class="form-outline">
                    <h5 class="form-label required py-2">Apellido</h5>
                    <input type="text" value="<?php print $_SESSION['user_info']['apellido'] ?>" name="last_name_user" required class="form-control2" />
                </div>
            </div>


            <input type="hidden" name="nombre_login" value="<?php print $_SESSION['user_info']['nombre_login'] ?>" required class="form-control2" />

            <div class="col-12  mx-auto pb-3">
                <div class="form-outline">
                    <input type="hidden" name="asunto" value="Indoff Pro | Cotización Productos Promocionales"><br>

                    <h5 class="form-label required py-2">Email address</h5>
                    <input type="email" name="email_user" value="<?php print $_SESSION['user_info']['email_user'] ?>" id="email" required class="form-control2" />
                </div>
            </div>
        </div>

        <p id="pwd_validar" class="text-danger col-5" style="margin-left: 3rem; margin-top: -1rem;"> </p>

        <p id="pwd_verificar" class="text-center"> </p>

        <div class="form-check d-flex justify-content-center">
            <input type="submit" class="btn btn-primary btn-lg my-5 py-2 text-center w-50" name="accion" value="Enviar"></input>

            <a type="buttom" href="carrito.php" class="btn btn-secondary btn-lg my-5 py-2 text-center ms-5 w-25" name="accion" value="Registrar"> Cancelar </a>
        </div>


    </form>
</section>
                -->
<?php
include('footer.php');
?>