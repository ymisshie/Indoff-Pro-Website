<?php
$title = "Cotizaciones - Indoff Pro";
$pagina = "cotizaciones";

session_start();

require '../roots.php';

if (!isset($_SESSION['admin_info']) or empty($_SESSION['admin_info']))
    header('Location: ../index.php');

include('../header-admin.php');

require $root_vendor;

$info_productos = new ameri\Cotizaciones;
$info_cotizacion = new ameri\Cotcat;

$productos = $info_productos->mostrar();
$cotizacion = $info_cotizacion->mostrar();

?>


<section name="" class="">
    <div class="container">

        <div class="row mx-auto pb-5 justify-content-center table-responsive">

            <div class="col-md-12">
                <h2 class="pt-5 fw-700">Cotizaciones en espera</h2>

                <h6 class="text-muted">A continuación se presentan las cotizaciones solicitadas recientemente en Indoff Pro. Seleccione la cotización que desea ver, editar o enviar al cliente formalmente.</h6>
            </div>

            <div class="justify-content-center table-responsive py-md-4">
                <table class="table">
                    <thead>
                        <tr class="">
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Información de la cotización</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $x = 1;
                        $d = 0;
                        foreach ($cotizacion as $cot) { {

                                foreach ($productos as $conteo) {
                                    if ($conteo['cotcat_id'] == $cot['id']) {
                                        $d++;
                                    }
                                }

                                // print_r($cot);
                        ?>
                                <tr class="">


                                    <td scope="col" class="">
                                        <p class="m-0"><?php print $x; ?></p>
                                    </td>
                                    <td scope="col" class="">
                                        <p class="m-0 fw-600"><?php print $cot['info_usuario']; ?>
                                        </p>

                                        <?php

                                        $id_usuario = $cot['id_usuario'];
                                        $usuario = new ameri\Usuario;
                                        $info_usuario = $usuario->mostrarPorId($id_usuario);
                                        ?>
                                        <p class="m-0 text-muted"><?php print $info_usuario['nombre_login']; ?>
                                        </p>
                                        <p class="m-0 pt-2"><span><i class="fa-solid fa-envelope me-2"></i></span><?php print $info_usuario['email_user']; ?>
                                        </p>
                                        <p class="m-0"><span><i class="fa-solid fa-phone me-2"></i></span><?php print $info_usuario['phone_user']; ?>
                                        </p>
                                    </td>

                                    <td scope="col" class="">
                                        <p class="m-0">Realizada el <?php print $cot['fecha']; ?> </p>
                                        <p class="m-0">Contiene <?php print $d . ' productos'; ?> </p>
                                        <a href="cotizacion.php?id=<?php print $cot['id'] ?>" class="btn-secondary btn btn-sm my-1 w-75" role="button">Visualizar<i class="fa-solid fa-eye ps-2"></i></a>
                                    </td>
                                    <td scope="col" class="">
                                        <a href="pdf-cot.php?id=<?php print $cot['id'] ?>" class="btn-primary btn btn-sm w-50" role="button">Enviar<i class="fa-solid fa-share ps-2"></i></a>
                                        <a href="eliminar-cot.php?id=<?php print $cot['id'] ?>" class="btn-secondary btn btn-sm" role="button">Eliminar<i class="fa-solid fa-trash ps-2"></i></a>
                                    </td>

                                </tr>
                        <?php

                                $x++;
                            }
                        }


                        ?>


                    </tbody>
                </table>
            </div>

        </div>
</section>


<?php

include('../footer-admin.php');
