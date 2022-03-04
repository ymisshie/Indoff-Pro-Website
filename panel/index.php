<?php
$title = "Admin Indoff Pro";
$pagina = "inicio";
$root_styles = '<link rel="stylesheet" href="../style.css">';

?>

<?php
//include header.php file
include('../Template/_header-login.php');
// rest of your code
?>

<section id="login" class="vh-100 py-5 color-grey3-bg">
    <div class="container py-5">
        <div class="row justify-content-center py-4">
            <div class="col-6 formulario ws px-5 py-4 text-center ">
                <form action="login-admin.php" method="post"">
                    <h2 class=" section-title py-3">Admin Log In</h2>
                    <div class="form-group text-start py-2">
                        <div class="input-field form-control2">
                            <span class="far fa-user p-2 color-red"></span>
                            <input type="text" class="" placeholder="Username or Email" required name="nombre_admin">
                        </div>
                    </div>
                    <div class="form-group text-start py-2">
                        <div class="input-field form-control2">
                            <span class="fas fa-lock p-2 color-red"></span>
                            <input type="password" placeholder="Enter your Password" required name="clave_admin">
                            <!-- <button class="btn bg-white text-muted">
                                    <span class="far fa-eye-slash"></span>
                                </button> -->
                        </div>
                    </div>
                    <?php
                    //echo $mensaje2;
                    ?>
                    <div>
                        <?php
                        session_start();
                        if (!empty($_SESSION['message_admin'])) {
                            echo '<p class="message text-center mt-2" > ' . $_SESSION['message_admin'] . '</p>';
                            unset($_SESSION['message_admin']);
                        }
                        ?>
                    </div>


                    <button type="submit" value="Submit" class="btn btn-primary btn-lg my-4 py-2 w-100">Iniciar sesión</button>
                    <div class="col-12 align-items-center mx-auto py-2">
                        <h6 class="mb-0">¿No tiene una cuenta? <span><a href="form-register.php" class="color-red btn ss btn-link2"> Crear Cuenta </a>
                            </span></h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
