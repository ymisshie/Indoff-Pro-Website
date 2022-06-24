<?php
$title = "Login";
$pagina = "login";

include('../roots.php');

include('../../header.php');

require $root_vendor;

// session_start();
// print_r($_SESSION);


if (isset($_SESSION)) {
    if (isset($_SESSION['admin_info'])) {
        if ($_SESSION['admin_info']) {
            $_SESSION['admin_info'] = array();
            session_destroy();
        }
    }
    if (isset($_SESSION['user_info'])) {
        if ($_SESSION['user_info']) {
            $_SESSION['user_info'] = array();
            session_destroy();
        }
    }
}

if (isset($_GET['to']) && isset($_GET['vkey'])) {
    $to = $_GET['to'];
    $vkey = $_GET['vkey'];
}
?>

<section>
    <div class="container-fluid">

        <div class="row">

            <div class="col-6 p-5">

                <form id="form-login-admin" action="acciones.php" method="POST">

                    <div class="col-8 mx-auto p-4">

                        <div class="row">
                            <div class="col">
                                <div class="col-2 card-icon">
                                    <i class="bg-purple fa-solid fa-user fs-2 text-white p-3 card-icon"></i>
                                </div>
                                <h2 class="py-4 fw-700 text-red m-0">Log In</h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <?php
                                if (!empty($_GET['message'])) {
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" id="liveAlertPlaceholder" role="alert">
                                        <?php
                                        if ($_GET['message'] == 'La cuenta aún no ha sido verificada.') {
                                        ?>
                                            <a class="btn btn-link p-0 text-white fw-500" href="confirmation.php?to=<?php print $to . '&vkey=' . $vkey; ?>"><?php print($_GET['message']); ?></a>
                                        <?php
                                        } else {
                                        ?>
                                            <p class="text-white fw-500 m-0"><?php print($_GET['message']); ?></p>

                                        <?php   }
                                        unset($_GET['message']);
                                        ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>

                                <?php
                                } ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col d-flex mx-auto" id="user-input">
                                <span class="me-4 fas fa-user align-self-center"></span>
                                <div class="form-floating w-100">
                                    <input oninput="validateUser()" type="text" class="form-control bg-light" id="floatinguser" name="username" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                        if (isset($_GET['username'])) {
                                                                                                                                                                                            print $_GET['username'];
                                                                                                                                                                                        } ?>" required>
                                    <label for="floatinguser" class="fw-600 text-muted">Nombre de usuario <span class="text-danger">*</span></label>

                                    <div class="" id="user-valid">
                                        <p class="" id="user-message"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-flex mx-auto" id="password-input">
                                <span class="me-4 fas fa-key align-self-center"></span>
                                <div class="form-floating w-100">
                                    <input oninput="validatePassword()" type="password" class="form-control bg-light" id="floatingpassword" name="user_password" placeholder="Contraseña" value="<?php
                                                                                                                                                                                                    if (isset($_GET['user_password'])) {
                                                                                                                                                                                                        print $_GET['user_password'];
                                                                                                                                                                                                    } ?>" required>
                                    <label for="floatingpassword" class="fw-600 text-muted">Contraseña <span class="text-danger">*</span></label>
                                    <div class="" id="password-valid">
                                        <p class="" id="password-message"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col">
                                <button type="submit" value="login" name="accion" class="btn btn-primary w-100">Iniciar sesión</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>

            <div class="col-6 bg-red">
                <div class="p-5">
                </div>
            </div>

        </div>
</section>

<script>
    //LOGIN ADMIN

    function validateUser() {
        var user_input_value = document.getElementById("floatinguser").value;
        var user_input = document.getElementById("floatinguser");
        var message_user = document.getElementById("user-message");

        if (user_input_value.length == 0) {
            message_user.innerHTML = 'Por favor ingrese el nombre de usuario';
            message_user.className = "text-red m-0 pt-1 pb-2 fw-500";

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
        var message_password = document.getElementById("password-message");

        if (password_input_value.length == 0) {
            message_password.innerHTML = 'Por favor ingrese el nombre de usuario';
            message_password.className = "text-red m-0 pt-1 pb-2 fw-500";

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
</script>

<?php
//include footer.php file
include('../../footer.php')
?>