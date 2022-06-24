<?php
$title = "Cotizaciones";
$pagina = "cotizaciones";

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
        $id = $_SESSION['user_info']['username'];
    }
}


if ($user_existe > 1 || $admin_existe > 1) {

    $usuarios = new ameri\Usuario;

    $info_usuarios = $usuarios->mostrar();


    foreach ($info_usuarios as $user) {

        if ($user['username'] == $_SESSION['user_info']['username']) {
            $id_usuario = $user['id'];
            $active_user = $usuarios->mostrarPorId($id_usuario);
        }
    }

?>

    <section>
        <div class="container">
            <div class="row py-5">
                <div class="col">
                    <h1 class="fw-700 text-red m-0">Cotizaciones en proceso</h1>
                    <?php
                    $info_productos = new ameri\Cotizaciones;
                    $info_cotizacion = new ameri\Cotcat;

                    $productos = $info_productos->mostrar();
                    $cotizacion = $info_cotizacion->mostrar();

                    ?>

                    <p>Las siguientes cotizaciones están siendo procesadas. Al finalizar, recibirá por correo la información completa.</p>
                </div>
            </div>

            <div class="justify-content-center table-responsive py-md-4 text-muted">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="col-1">No.</th>
                            <th scope="col" class="col-1">Fecha de solicitud</th>
                            <th scope="col" class="col-2">Estado</th>
                            <th scope="col" class="col-3"></th>
                        </tr>
                    </thead>

                    <tbody class="form-card">

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