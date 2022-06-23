<?php
$title = "Confirmación Usuario - Indoff Pro";
$pagina = "confirmation-user";

include('../roots.php');
include('../../header.php');


if (isset($_GET['to'])) {

    $cadena = $_GET['to'];
    $separador = ",";
    $separada = explode($separador, $cadena);

    $to = $separada[0];
    $vkey = $separada[1];
}
?>

<section class="">
    <form class="px-5 text-center" action="../login/login-validation.php" method="post">
        <h2 class="fw-700 pt-5 pb-3 col-8 mx-auto ">Se ha enviado un correo de confirmación</h2>
        <h6>Por favor confirme su cuenta entrando al link enviado por correo para comenzar utilizarla. Gracias.</h6>

        <i class="fas fa-envelope-open-text color-purple display-1 mt-4"></i>

        <div class="d-flex col-5 mx-auto">

            <input type="hidden" name="email_user" value="<?php echo $to; ?>">
            <input type="hidden" name="vkey" value="<?php echo $vkey; ?>">
            <a href="<?php echo $root_login; ?>" class="btn btn-primary my-5 py-2 me-4 text-center w-75">Login</a>
            <button type="submit" class="btn btn-secondary my-5 py-2 text-center w-50" name="accion" value="Volver a enviar"> Enviar de nuevo </button>
        </div>
    </form>

</section>


<?php
//include header.php file
include('../../footer.php');
// rest of your code
?>