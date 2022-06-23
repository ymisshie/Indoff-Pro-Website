<?php
$title = "Cotizaciones";
$pagina = "cotizaciones";

//Variables de navegacion
include('../roots.php');

include('../../header.php');

require $root_vendor;

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


if ($user_existe > 1 || $admin_existe > 1) {

    $usuarios = new ameri\Usuario;

    $info_usuarios = $usuarios->mostrar();


    foreach ($info_usuarios as $user) {

        if ($user['nombre_login'] == $_SESSION['user_info']['nombre_login']) {
            $id_usuario = $user['id'];
            $active_user = $usuarios->mostrarPorId($id_usuario);
        }
    }

?>

    <section class="">
        <div class="container">
            <div class="row justify-content-between text-center p-5">

                <div class="col-8">
                    <h3 class="section-title text-start pb-2">Cotizaciones en proceso</h3>
                    <div class="col-12">
                        <?php

                        $info_productos = new ameri\Cotizaciones;
                        $info_cotizacion = new ameri\Cotcat;

                        $productos = $info_productos->mostrar();
                        $cotizacion = $info_cotizacion->mostrar();

                        ?>

                        <p class="text-start py-4 color-grey2">Estimado usuario, las siguientes cotizaciones están siendo procesadas. <br>Al finalizar, se le notificará por correo sobre el envio de la información en un formato formal.</p>

                        <div class="row mx-auto pb-5 justify-content-center table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center color-grey3-bg">
                                        <th scope="col">No.</th>
                                        <th scope="col">Fecha de solicitud</th>
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
                                            if ($cot['id_usuario'] == $_SESSION['user_info']['id']) {
                                    ?>
                                                <tr>

                                                    <td scope="col" class="text-center"><?php print $x; ?></td>

                                                    <td scope="col" class="text-center"><span><?php print $cot['fecha']; ?> </span></td>
                                                    <td scope="col" class="text-center">Procesando</td>

                                                    <td scope="col" class="text-center">
                                                        <a href="cotizacion.php?id=<?php print $cot['id'] ?>" class="btn btn-primary py-1 my-2 btn-sm ss text-center" role="button">Visualizar<i class="ms-2 fa-solid fa-eye"></i></a>

                                                        <button type="button" onclick="eliminarCot()" id="numElimCot" name="<?php print $cot['id']; ?>" class="btn btn-secondary ms-2 py-1 my-2 btn-sm ss text-center" data-bs-toggle="modal" data-bs-target="#eliminarCotizacion">Cancelar cotización<i class="ms-2 fa-solid fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                        <?php
                                                $x++;
                                            }
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
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-3 p-0 align-self-center">
                    <div class="formulario ws">
                        <div>
                            <i class="fas fa-user display-1 px-5 pt-5  pb-3 color-grey"></i>
                            <p class="fw-500"><?php print $active_user['nombre_login']; ?></p>
                            <h5 class="fw-700 py-4"><?php print $active_user['nombre_usuario'];
                                                    print ' ';
                                                    print $active_user['apellido_usuario']; ?></h5>
                        </div>

                        <div class="py-4">
                            <div class="d-flex justify-content-center">
                                <i class="fas fa-envelope color-purple fs-1-2 me-2"></i>
                                <p><?php print $active_user['email_user']; ?></p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <i class="fa-solid fa-phone color-purple fs-1-2 me-2"></i>
                                <p><?php print $active_user['phone_user']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>

    <div class="modal fade" id="eliminarCotizacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="section-title pt-3" id="exampleModalLabel">Confirmación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pt-0">
                    <p class="color-grey2">¿Está seguro de que desea cancelar el pocesamiento de está cotización? Al aceptar ya no se le dará seguimiento por correo.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
                    <a id="btn-ecm" href="" class="btn btn-red btn-sm">Cancelar cotizacion</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function eliminarCot() {
            var buttonName = event.target.name;
            console.log(buttonName);

            buttonName = '../../eliminar-cot.php?id=' + buttonName;

            document.getElementById("btn-ecm").setAttribute("href", buttonName)
        }
    </script>



<?php
} else {
    include('../../notfound.php');
}

include('../../footer.php');

?>