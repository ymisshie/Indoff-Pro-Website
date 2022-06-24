<?php
$title = "Confirmación de cuenta";
$pagina = "confirmation-user";

include('../roots.php');

include('../../header.php');

require $root_vendor;

if (isset($_GET['vkey'])) {
    $verification_key = $_GET['vkey'];

    $usuario = new ameri\Usuario;

    $resultado = $usuario->verificarVkeyUser($verification_key);

    if (isset($resultado['verification_key'])) {
        $verificado_resp = $usuario->updateVerificado($verification_key);
        if ($verificado_resp) {
            $message = "Su cuenta ha sido verificada con éxito, inicie sesión para comenzar a navegar.";
        }
    } else {
        $message = "El enlace es inválido o la cuenta ya ha sido verificada.";
    } ?>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 p-5">
                    <div class="col-9 mx-auto">
                        <div class="col-2 card-icon">
                            <i class="bg-purple fa-solid fa-circle-check fs-2 text-white p-3 card-icon"></i>
                        </div>

                        <h1 class="py-4 text-red fw-700 m-0">Verificación de cuenta</h1>
                        <h5 class="fw-600"><?php echo $message; ?></h5>
                        <div class="col pt-4">
                            <a href="<?php print $root_login; ?>" class="btn btn-primary w-50">Iniciar sesión</a>
                            <a href="<?php print $root_index; ?>" class="btn btn-secondary ms-3">Regresar a inicio</a>
                        </div>
                    </div>
                </div>
                <div class="col-6 bg-red">

                </div>
            </div>
    </section>

<?php
    include('../../footer.php');
}
?>