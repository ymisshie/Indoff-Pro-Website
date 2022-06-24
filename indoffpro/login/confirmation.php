<?php
$title = "Confirmación Usuario - Indoff Pro";
$pagina = "confirmation-user";

include('../roots.php');
include('../../header.php');


if (isset($_GET['to']) && isset($_GET['vkey'])) {
    $to = $_GET['to'];
    $vkey = $_GET['vkey'];
}
?>

<section>
    <div class="container-fluid">
        <form class="" action="acciones.php" method="post">
            <div class="row">
                <div class="col-6 bg-red">
                </div>
                <div class="col-6">
                    <div class="col-9 mx-auto p-5">
                        <div class="col-2 card-icon">
                            <i class="bg-purple fa-solid fa-envelope-open-text fs-2 text-white p-3 card-icon"></i>
                        </div>

                        <?php
                        if (isset($_GET['message'])) {
                        ?>
                            <h1 class="py-4 fw-700 text-red m-0">Mensaje enviado</h1>

                            <!--Alert-->
                            <div class="row pb-3">
                                <div class="col">

                                    <div class="col-12 alert alert-danger mx-auto alert-dismissible fade show" id="liveAlertPlaceholder" role="alert">

                                        <?php
                                        print($_GET['message']);
                                        unset($_GET['message']);

                                        ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>


                                </div>
                            </div>

                        <?php
                        } else {
                        ?>
                            <h1 class="py-4 fw-700 text-red m-0">Registro exitoso</h1>

                        <?php
                        }
                        ?>
                        <h5 class="fw-600">Ha recibido un mensaje de verificación en su correo. Para comenzar a utilizar su cuenta, por favor confirme el enlace en el correo enviado.</h5>
                        <h5 class="py-3 fw-600">¡Gracias!</h5>

                        <input type="hidden" value="<?php print $to; ?>" name="to">
                        <input type="hidden" value="<?php print $vkey; ?>" name="vkey">

                        <button type="submit" class="btn btn-secondary text-center w-50" name="accion" value="Volver a enviar">Volver a enviar</button>
                        <a href="<?php echo $root_login; ?>" class="btn btn-primary ms-3">Iniciar sesión</a>
                    </div>
                </div>
            </div>
        </form>

    </div>
</section>


<?php
//include header.php file
include('../../footer.php');
// rest of your code
?>