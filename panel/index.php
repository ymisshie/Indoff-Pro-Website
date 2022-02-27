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

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 col-11">
            <div class="formulario ws color-white-bg">
                <div class="text-center">
                    <h4 class="fw-700 pt-4">Admin Login</h4>
                </div>
                <div class="p-3">
                    <form action="login-admin.php" method="post">
                        <div class="form-group">
                            <div class="input-field">
                                <span class="far fa-user p-2 color-red"></span>
                                <input type="text" placeholder="Username or Email" required name="nombre_admin">
                            </div>
                        </div>
                        <div class="form-group py-2">
                            <div class="input-field">
                                <span class="fas fa-lock p-2 color-red"></span>
                                <input type="password" placeholder="Enter your Password" required name="clave_admin">
                                <!-- <button class="btn bg-white text-muted">
                                    <span class="far fa-eye-slash"></span>
                                </button> -->
                            </div>
                        </div>
                        <!-- <div class="form-inline">
                            <a href="form-register-admin.php" id="createaccount" class="font-weight-bold">Create admin account</a>
                            <a href="#" id="forgot" class="font-weight-bold float-end">Forgot password?</a>
                        </div> -->
                        <div>
                            <?php
                            session_start();
                            if (!empty($_SESSION['message'])) {
                                echo '<p class="message text-center mt-2" > ' . $_SESSION['message'] . '</p>';
                                unset($_SESSION['message']);
                            }
                            ?>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mt-2 text-center"> Login </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</header>
<!--!start #header-->

<!--start #main-site-->
<!-- <main id="main-site"> -->

</body>

</html>