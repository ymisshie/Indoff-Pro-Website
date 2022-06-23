<?php

require '../../vendor/autoload.php';

$user_existe = 0;
$admin_existe = 0;

if ($_SESSION) {
    if ((isset($_SESSION['user_info']))) {
        $user_existe++;
        if ($_SESSION['user_info']) {
            $user_existe++;
        }
    }
    if ((isset($_SESSION['admin_info']))) {
        $admin_existe++;
        if ($_SESSION['admin_info']) {
            $admin_existe++;
        }
    }
    if ($user_existe > 1) {
        $id = $_SESSION['user_info']['nombre_login'];
    }
}


if ($admin_existe > 1) {

    $info_productos = new ameri\Cotizaciones;
    $info_cotizacion = new ameri\Cotcat;
    $usuarios = new ameri\Usuario;

    $productos = $info_productos->mostrar();
    $cotizacion = $info_cotizacion->mostrar();
    $users = $usuarios->mostrar();

?>
    <section class="">
        <div class="container">
            <div class="row justify-content-between text-center p-5">

                <div class="col-12">
                    <h3 class="section-title text-start pb-5">Cotizaciones solicitadas</h3>
                    <div class="col-12">

                        <div class="row mx-auto pb-5 table-responsive">
                            <table class="table text-start">
                                <thead>
                                    <tr class="scolor-grey3-bg">
                                        <th scope="col">No.</th>
                                        <th scope="col">Información</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php

                                    $x = 1;

                                    $countcot = count($cotizacion);


                                    // print $countcot;
                                    if ($countcot > 0) {
                                        foreach ($cotizacion as $cot) {



                                    ?>
                                            <tr>

                                                <td scope="col" class=""><?php print $x; ?></td>

                                                <td scope="col" class="">
                                                    <?php
                                                    foreach ($users as $user) {

                                                        if ($user['nombre_login'] == $cot['usuarios_id']) {
                                                            $id_u = $user['id'];
                                                    ?>
                                                            <p class="fw-600 mb-0 color-purple-bg ns text-center py-1 color-white mt-2 mb-3 etiqueta-evento">Solicitado por: <span class="fw-400"><?php print $cot['info_usuario']; ?></span></p>
                                                            <p class="fw-600 mb-0">Username: <span class="fw-400"><?php print $user['nombre_login']; ?></span></p>
                                                            <p class="fw-600 mb-0">Email: <span class="fw-400"><?php print $user['email_user']; ?></span></p>
                                                            <p class="fw-600 mb-0">Phone: <span class="fw-400"><?php print $user['phone_user']; ?></span></p>
                                                    <?php

                                                        }
                                                    }
                                                    ?>
                                                    
                                                </td>

                                                <td scope="col" class=""><span><?php print $cot['fecha']; ?> </span></td>
                                                <td scope="col" class="">Procesando</td>

                                                <td scope="col" class="">
                                                    <a href="cotizacion.php?id=<?php print $cot['id'] ?>" class="btn btn-primary py-1 my-2 btn-sm ss text-center" role="button">Visualizar<i class="ms-2 fa-solid fa-eye"></i></a>
                                                    <a href="pdf-cot.php?id=<?php print $cot['id'] ?>" class="btn btn-secondary py-1 ms-2  my-2 btn-sm ss text-center" role="button">Enviar al cliente <i class="fas fa-paper-plane ms-2"></i></a>
                                                    <button type="button" onclick="eliminarCot()" id="numElimCot" name="<?php print $cot['id']; ?>" class="btn btn-red ms-2 py-1 my-2 btn-sm ss text-center" data-bs-toggle="modal" data-bs-target="#eliminarCotizacion">Eliminar cotización<i class="ms-2 fa-solid fa-trash"></i></button>

                                               
                                                </td>
                                            </tr>
                                        <?php
                                            $x++;
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="7" class="">
                                                <div class="text-center py-2">
                                                    <i class="text-center display-6 color-grey2 fa-solid fa-folder-open"></i>
                                                    <p class="fw-00 py-2 mb-0 color-grey2">Aún no hay cotizaciones solicitadas.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
    </section>

<?php
}
?>