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

<div class="container mt-5">
    <div class="row">
        <div class="offset-md-2 col-lg-5 col-md-7 offset-lg-4 offset-md-3">
            <div class="panel border bg-white">
                <div class="mb-3 text-center">
                    <h3 class="pt-3 font-weight-bold">Admin Login</h3>
                </div>
                <div class="panel-body p-3">
                    <form action="login-admin.php" method="post">
                        <div class="form-group py-2">
                            <div class="input-field">
                                <span class="far fa-user p-2"></span>
                                <input type="text" placeholder="Username or Email" required name="nombre_admin">
                            </div>
                        </div>
                        <div class="form-group py-2 pb-2">
                            <div class="input-field">
                                <span class="fas fa-lock p-2"></span>
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
                                if(!empty($_SESSION['message'])) {
                                    echo '<p class="message text-center mt-2" > '.$_SESSION['message'].'</p>';
                                    unset($_SESSION['message']);
                                }
                            ?>
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-secondary btn-lg mt-3 text-center"> Login </button>
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