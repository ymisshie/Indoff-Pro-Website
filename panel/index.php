<?php
$title = "Admin Login";
$page_name = "admin-login";

require 'roots.php';
include($root_header);

if (isset($_SESSION['admin_info'])) {
    header('Location: dashboard.php');
} else {

    if (isset($_SESSION['user_info'])) {
        $_SESSION['user_info'] = array();
        session_destroy();
    }
?>
    <section>
        <div class="container-fluid">

            <div class="row">

                <div class="col-6 p-5">
                    <div class="col-7 mx-auto">
                        <form id="form-login-admin" action="login-admin.php" method="POST">


                            <div class="row">
                                <div class="col-12 mx-auto">
                                    <div class="col-2 bg-purple text-center card-icon">
                                        <i class="fa-solid fa-lock fs-2 text-white p-2 py-3"></i>
                                    </div>
                                    <h2 class="pt-4 pb-3 fw-700 text-red m-0">Admin Dashboard Log In</h2>
                                    <p class="m-0 fw-600">Por favor ingrese las credenciales correctas para entrar al panel de administrador.</p>
                                </div>
                            </div>

                            <div class="row pt-4">

                                <?php
                                if (!empty($_SESSION['message'])) {
                                ?>
                                    <div class="col-12 alert alert-danger mx-auto alert-dismissible fade show" id="liveAlertPlaceholder" role="alert">

                                        <?php
                                        print($_SESSION['message']);
                                        unset($_SESSION['message']); ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                <?php
                                } ?>

                            </div>

                            <div class="row pb-3">
                                <div class="col-12 d-flex">
                                    <span class="me-4 fas fa-user align-self-center"></span>
                                    <div class="form-floating w-100">
                                        <input oninput="validateUser()" type="text" class="form-control bg-light" id="floatinguser" name="admin_user" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                                if (isset($_GET['admin_user'])) {
                                                                                                                                                                                                    print $_GET['admin_user'];
                                                                                                                                                                                                } ?>" required>
                                        <label for="floatinguser" class="fw-600 text-muted">Nombre de usuario <span class="text-danger">*</span></label>

                                        <div id="user-valid">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row pb-3">
                                <div class="col-12 d-flex">
                                    <span class="me-4 fas fa-key align-self-center"></span>
                                    <div class="form-floating w-100">
                                        <input oninput="validatePassword()" type="password" class="form-control bg-light" id="floatingpassword" name="admin_password" placeholder="Contraseña" value="<?php
                                                                                                                                                                                                        if (isset($_GET['admin_password'])) {
                                                                                                                                                                                                            print $_GET['admin_password'];
                                                                                                                                                                                                        } ?>" required>
                                        <label for="floatingpassword" class="fw-600 text-muted">Contraseña <span class="text-danger">*</span></label>
                                        <div id="password-valid">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 pt-2 pb-4">
                                    <div class="g-recaptcha align-self-center d-flex justify-content-center " data-sitekey="6Ld_7SEgAAAAALLdeLmdLRe1IiHIVsA204Vqkelk" data-callback="recaptchaCallback"></div>
                                </div>

                                <button type="submit" id="submit" value="Submit" class="btn btn-primary w-100 disabled">Iniciar sesión</button>
                            </div>


                        </form>
                    </div>
                </div>

                <div class="col-6 bg-red">
                    <div class="p-5">
                    </div>
                </div>

            </div>
    </section>

    <script>
        function validateUser() {
            var user_input_value = document.getElementById("floatinguser").value;
            var user_input = document.getElementById("floatinguser");
            var message_user = document.getElementById("user-valid");

            if (user_input_value.length == 0) {
                message_user.innerHTML = 'Por favor ingrese el nombre de usuario';
                message_user.className = "invalid-tooltip";

                user_input.className = "form-control bg-light is-invalid"
            }

            if (user_input_value.length > 0) {
                message_user.innerHTML = "";
                message_user.className = "";
                user_input.className = "form-control bg-light is-valid"
            }


        }

        function validatePassword() {

            var user_input_value = document.getElementById("floatinguser").value;
            var user_input = document.getElementById("floatinguser");

            var password_input_value = document.getElementById("floatingpassword").value;
            var password_input = document.getElementById("floatingpassword");
            var message_password = document.getElementById("password-valid");

            if (password_input_value.length == 0) {
                message_password.innerHTML = 'Por favor ingrese la contraseña';
                message_password.className = "invalid-tooltip";

                password_input.className = "form-control bg-light is-invalid"
            }

            if (password_input_value.length > 0) {
                message_password.innerHTML = "";
                message_password.className = "";
                password_input.className = "form-control bg-light is-valid"
            }

            /*
            if (user_input_value.length > 0 && password_input_value.length > 0) {
                submit.className = "btn btn-primary w-100";
            }
            */

        }

        function recaptchaCallback() {
            submit.className = "btn btn-primary w-100";
        };
    </script>



<?php
    require '../footer.php';
}
?>