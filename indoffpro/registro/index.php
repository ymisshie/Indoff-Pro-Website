<?php
$title = "Registro";
$pagina = "registro";

include('../roots.php');

include('../../header.php');

require $root_vendor;
?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<section>
  <div class="container-fluid">

    <div class="row justify-content-center">
      <div class="col-5 bg-red">
        <div class="col-12 p-5">
        </div>
      </div>
      <div class="col-7 px-5 login-admin">

        <form id="form-register-user" action="register-user.php" method="POST">

          <div class="col-12">

            <div class="row">
              <div class="col-12 text-center mx-auto">
                <i class="fs-2 pb-3 fa-regular fa-circle-user text-purple"></i>
                <h2 class="fw-700">Registro</h2>
              </div>
            </div>

            <div class="row pt-4 px-5">

              <?php
              if (!empty($_SESSION['message'])) {
              ?>
                <div class="col-6 alert alert-danger mx-auto alert-dismissible fade show" id="liveAlertPlaceholder" role="alert">

                  <?php
                  print($_SESSION['message']);
                  unset($_SESSION['message']);

                  ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

              <?php
              }
              ?>

              <div class="row">

                <!--NAME-->
                <div class="col-6 d-flex mx-auto" id="name-input">
                  <span class="me-4 fas fa-user text-purple align-self-center"></span>
                  <div class="form-floating w-100">
                    <input oninput="validateName()" onkeydown="return /[a-z]/i.test(event.key)" type="text" class="form-control bg-light" id="floatingname" name="name_user" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                                                    if (isset($_GET['admin_user'])) {
                                                                                                                                                                                                                      print $_GET['admin_user'];
                                                                                                                                                                                                                    } ?>" required>
                    <label for="floatingname" class="fw-600 text-muted">Nombre(s) <span class="text-danger">*</span></label>

                    <div class="" id="name-valid">
                      <p class="" id="name-message"></p>
                    </div>
                  </div>
                </div>

                <!--LASTNAME-->
                <div class="col-6 mx-auto" id="lastname-input">
                  <div class="form-floating w-100">
                    <input oninput="validateLastname()" onkeydown="return /[a-z]/i.test(event.key)" type="text" class="form-control bg-light" id="floatinglastname" name="lastname_user" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                                                                if (isset($_GET['admin_user'])) {
                                                                                                                                                                                                                                  print $_GET['admin_user'];
                                                                                                                                                                                                                                } ?>" required>
                    <label for="floatinglastname" class="fw-600 text-muted">Apellido(s) <span class="text-danger">*</span></label>

                    <div class="" id="lastname-valid">
                      <p class="" id="lastname-message"></p>
                    </div>
                  </div>

                </div>

              </div>

              <div class="row">

                <!--USERNAME-->
                <div class="col d-flex mx-auto" id="username-input">
                  <span class="me-4 fas fa-at text-purple align-self-center"></span>
                  <div class="form-floating w-100">
                    <input oninput="validateUsername()" onkeydown="return  /^[a-z0-9_]+$/i.test(event.key)" type="text" class="form-control bg-light" id="floatingusername" name="username" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                                                                    if (isset($_GET['admin_user'])) {
                                                                                                                                                                                                                                      print $_GET['admin_user'];
                                                                                                                                                                                                                                    } ?>" required>
                    <label for="floatingusername" class="fw-600 text-muted">Username <span class="text-danger">*</span></label>

                    <div class="" id="username-valid">
                      <p class="text-muted m-0 pt-1 pb-2 fw-500" id="username-message">Se permite que contenga algún número (0-9) o guión bajo (_)</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">

                <!--PHONE-->
                <div class="col-6 d-flex mx-auto" id="phone-input">
                  <span class="me-4 fas fa-phone text-purple align-self-center"></span>
                  <div class="form-floating w-100">
                    <input oninput="validatePhone()" type="number" class="form-control bg-light" id="floatingphone" name="phone_user" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                              if (isset($_GET['admin_user'])) {
                                                                                                                                                                                print $_GET['admin_user'];
                                                                                                                                                                              } ?>" required>
                    <label for="floatingphone" class="fw-600 text-muted">Phone <span class="text-danger">*</span></label>

                    <div class="" id="phone-valid">
                      <p class="" id="phone-message"></p>
                    </div>
                  </div>
                </div>

                <!--EMAIL-->
                <div class="col-6 d-flex mx-auto" id="email-input">
                  <span class="me-4 fas fa-envelope text-purple align-self-center"></span>
                  <div class="form-floating w-100">
                    <input oninput="validateEmail()" onkeydown="return  /^[a-z0-9_@\.\-]+$/i.test(event.key)" type=" email" class="form-control bg-light" id="floatingemail" name="email_user" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                                                                      if (isset($_GET['admin_user'])) {
                                                                                                                                                                                                                                        print $_GET['admin_user'];
                                                                                                                                                                                                                                      } ?>" required>
                    <label for="floatingemail" class="fw-600 text-muted">Email <span class="text-danger">*</span></label>

                    <div class="" id="email-valid">
                      <p class="" id="email-message"></p>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row">

                <!--PASSWORD 1-->
                <div class="col-6 d-flex mx-auto" id="password-input">
                  <span class="me-4 fas fa-key text-purple align-self-center"></span>
                  <div class="form-floating w-100">
                    <input oninput="validatePwd1()" onkeydown="return  /^[a-z0-9@!#]+$/i.test(event.key)" type="password" class="form-control bg-light" id="floatingpassword1" name="password_user" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                                                                            if (isset($_GET['admin_user'])) {
                                                                                                                                                                                                                                              print $_GET['admin_user'];
                                                                                                                                                                                                                                            } ?>" required>
                    <label for="floatingpassword1" class="fw-600 text-muted">Contraseña <span class="text-danger">*</span></label>

                    <div class="" id="password1-valid">
                      <p class="" id="password1-message"></p>
                    </div>
                  </div>
                </div>
                <!--PASSWORD 2-->
                <div class="col-6 mx-auto" id="password2-input">
                  <div class="form-floating w-100">
                    <input oninput="validatePwd2()" type="password" class="form-control bg-light" id="floatingpassword2" name="password2_user" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                      if (isset($_GET['admin_user'])) {
                                                                                                                                                                                        print $_GET['admin_user'];
                                                                                                                                                                                      } ?>" required>
                    <label for="floatinglastname" class="fw-600 text-muted">Confirme su contraseña <span class="text-danger">*</span></label>

                    <div class="" id="password2-valid">
                      <p class="" id="password2-message"></p>
                    </div>
                  </div>

                </div>

                <p class="fs-09 ps-5 ms-1 text-muted fw-500">De al menos 8 caractéres, un número (0-9), una mayuscula (A-Z) o caractér especial (!@#)</p>

              </div>



              <div class="col pt-2 pb-4">
                <div class="g-recaptcha align-self-center d-flex justify-content-center " data-sitekey="6Ld_7SEgAAAAALLdeLmdLRe1IiHIVsA204Vqkelk" data-callback="recaptchaCallback"></div>
              </div>
            </div>

          </div>

          <div class="row justify-content-center">
            <div class="col-6 p-0">
              <button type="submit" id="submit" name="accion" value="Registrar" class="btn btn-primary w-100 disabled">Registrar</button>
            </div>
          </div>

        </form>
      </div>

    </div>
</section>



<script>
  function mismaContra() {
    var pwd1 = document.getElementById('pwd2_user').value;
    var pwd2 = document.getElementById('pwd_user').value;
    if (pwd2 == pwd1 && pwd2.length > 0 && pwd2.length > 0) {
      document.getElementById('pwd_validar3').textContent = "Las contraseñas son iguales";
      document.getElementById('pwd_validar3').className = "align-self-center text-success mb-0";
      document.getElementById('validp3').className = "align-self-center text-success fas fa-check me-3";
      document.getElementById('validp2').className = "align-self-center color-red  me-3";

    }
  }

  function diferenteContra() {
    var pwd2 = document.getElementById('pwd2_user').value;
    var pwd1 = document.getElementById('pwd_user').value;
    if (pwd2.length > 0) {
      if (pwd2 != pwd1) {
        document.getElementById('pwd_verificar').textContent = "Las contraseñas no coinciden";
        document.getElementById('pwd_verificar').className = "align-self-center color-red mb-0";
        document.getElementById('validp2').className = "align-self-center color-red fas fa-exclamation me-3";
        return true;
      }
    }

    if (pwd2.length == 0) {
      document.getElementById('validp2').className = "align-self-center color-red  me-3";

    }

    if (pwd2 == pwd1 && pwd2.length > 0 && pwd2.length > 0) {
      document.getElementById('pwd_verificar').textContent = "";
      document.getElementById('pwd_verificar').className = "align-self-center color-red mb-0";
      document.getElementById('pwd_validar3').textContent = "Las contraseñas son iguales";
      document.getElementById('pwd_validar3').className = "align-self-center text-success mb-0";
      document.getElementById('validp3').className = "align-self-center text-success fas fa-check me-3";
    } else {
      document.getElementById('pwd_verificar').textContent = "";
      document.getElementById('pwd_validar3').textContent = "";
      document.getElementById('validp3').className = "align-self-center color-red me-3";

    }
  }


  function contraInvalida() {
    var pwd = document.getElementById('pwd_user').value;
    var respuesta = "La contraseña debe contener mínimo ";
    var length_respuesta = respuesta.length;
    if (pwd.length < 8) {
      respuesta += "8 caracteres, ";
      document.getElementById('pwd_validar').textContent = respuesta;
      document.getElementById('pwd_validar').className = 'align-self-center color-red mb-0';
      document.getElementById('validp1').className = 'align-self-center color-red fas fa-exclamation me-3';
    }
    if (!/\d/g.test(pwd)) {
      respuesta += "un número, ";
      document.getElementById('pwd_validar').textContent = respuesta;
      document.getElementById('pwd_validar').className = 'align-self-center color-red mb-0';
      document.getElementById('validp1').className = 'align-self-center color-red fas fa-exclamation me-3';

    }
    if (!/[A-Z]/.test(pwd)) {
      respuesta += "una mayúscula, ";
      document.getElementById('pwd_validar').textContent = respuesta;
      document.getElementById('pwd_validar').className = 'align-self-center color-red mb-0';
      document.getElementById('validp1').className = 'align-self-center color-red fas fa-exclamation me-3';
    }

    /*
    if (!/[a-z]/g.test(pwd)) {
      respuesta += "una minúscula, ";
      document.getElementById('pwd_validar').textContent = respuesta;
      document.getElementById('pwd_validar').className = 'align-self-center color-red mb-0';
      document.getElementById('validp1').className = 'align-self-center color-red fas fa-exclamation me-3';
    }
    */

    if (!/[^a-zA-Z0-9]+/g.test(pwd)) {
      respuesta += "un caracter especial !@#, ";
      document.getElementById('pwd_validar').textContent = respuesta;
      document.getElementById('pwd_validar').className = 'align-self-center color-red mb-0';
      document.getElementById('validp1').className = 'align-self-center color-red fas fa-exclamation me-3';
    }

    if (respuesta.length == length_respuesta) {
      respuesta = "Contraseña válida";
    } else {
      respuesta = respuesta.substr(0, respuesta.length - 2)
    }

    if (respuesta == "Contraseña válida") {
      document.getElementById('pwd_validar').textContent = respuesta;
      document.getElementById('pwd_validar').className = 'align-self-center text-success mb-0';
      document.getElementById('validp1').className = 'align-self-center text-success fas fa-check me-3';
      return false;
    }
    return true;
  }

  function validateMyForm(event) {
    if (diferenteContra() || contraInvalida()) {
      event.preventDefault();
      alert("Contraseña no válida");
      returnToPreviousPage();
      //return false;
    }

    // alert("validations passed");
    document.forms['formulario'].submit();
    return true;
  }

  function validateName() {
    var name_input_value = document.getElementById("floatingname").value;
    var name_input = document.getElementById("floatingname");
    var message_name = document.getElementById("name-message");

    if (name_input_value.length == 0) {
      message_name.innerHTML = 'Por favor ingrese su nombre';
      message_name.className = "text-red m-0 pt-1 pb-2 fw-500";

      name_input.className = "form-control bg-light is-invalid"
    }

    if (name_input_value.length > 0) {
      message_name.innerHTML = "";
      message_name.className = "";
      name_input.className = "form-control bg-light is-valid"
    }
  }


  function validateLastname() {
    var lastname_input_value = document.getElementById("floatinglastname").value;
    var lastname_input = document.getElementById("floatinglastname");
    var message_lastname = document.getElementById("lastname-message");

    if (lastname_input_value.length == 0) {
      message_lastname.innerHTML = 'Por favor ingrese su apelldo';
      message_lastname.className = "text-red m-0 pt-1 pb-2 fw-500";

      lastname_input.className = "form-control bg-light is-invalid"
    }

    if (lastname_input_value.length > 0) {
      message_lastname.innerHTML = "";
      message_lastname.className = "";
      lastname_input.className = "form-control bg-light is-valid"
    }
  }

  function validateUsername() {
    var username_input_value = document.getElementById("floatingusername").value;
    var username_input = document.getElementById("floatingusername");
    var message_username = document.getElementById("username-message");

    if (username_input_value.length == 0) {
      message_username.innerHTML = 'Por favor ingrese un nombre de usuario';
      message_username.className = "text-red m-0 pt-1 pb-2 fw-500";

      username_input.className = "form-control bg-light is-invalid"
    }

    if (username_input_value.length > 0) {
      message_username.innerHTML = "Se permite que contenga algún número (0-9) o guión bajo (_)";
      message_username.className = "text-muted m-0 pt-1 pb-2 fw-500";
      username_input.className = "form-control bg-light is-valid"
    }
  }

  function validatePhone() {
    var phone_input_value = document.getElementById("floatingphone").value;
    var phone_input = document.getElementById("floatingphone");
    var message_phone = document.getElementById("phone-message");

    if (phone_input_value.length == 0) {
      message_phone.innerHTML = 'Por favor ingrese un número de teléfono';
      message_phone.className = "text-red m-0 pt-1 pb-2 fw-500";

      phone_input.className = "form-control bg-light is-invalid"
    }

    if (phone_input_value.length > 0) {
      message_phone.innerHTML = "";
      message_phone.className = "";
      phone_input.className = "form-control bg-light is-valid"
    }
  }

  function validateEmail() {
    var email_input_value = document.getElementById("floatingemail").value;
    var email_input = document.getElementById("floatingemail");
    var message_email = document.getElementById("email-message");

    if (email_input_value.length == 0) {
      message_email.innerHTML = 'Por favor ingrese su correo electrónico';
      message_email.className = "text-red m-0 pt-1 pb-2 fw-500";

      email_input.className = "form-control bg-light is-invalid"
    }

    if (email_input_value.length > 0) {
      message_email.innerHTML = "";
      message_email.className = "";
      email_input.className = "form-control bg-light is-valid"
    }
  }

  function validatePwd1() {
    var pwd1_input_value = document.getElementById("floatingpassword1").value;
    var pwd1_input = document.getElementById("floatingpassword1");
    var message_pwd1 = document.getElementById("password1-message");

    var pwd2_input_value = document.getElementById("floatingpassword2").value;
    var pwd2_input = document.getElementById("floatingpassword2");
    var message_pwd2 = document.getElementById("password2-message");

    if (pwd1_input_value.length == 0) {
      message_pwd1.innerHTML = 'Por favor ingrese una contraseña';
      message_pwd1.className = "text-red m-0 pt-1 pb-2 fw-500";

      pwd1_input.className = "form-control bg-light is-invalid";


    } else {

      if (pwd1_input_value.length > 2 || pwd1_input_value.length < 8) {
        message_pwd1.innerHTML = 'Debe tener minimo 8 caractéres';
        message_pwd1.className = "text-red m-0 pt-1 pb-2 fw-500";

        pwd1_input.className = "form-control bg-light is-invalid";
      }

      if (pwd1_input_value.length > 7) {
        message_pwd1.innerHTML = "";
        message_pwd1.className = "";
        pwd1_input.className = "form-control bg-light is-valid";

      }

      if (!/[A-Z]/.test(pwd1_input_value)) {
        message_pwd1.innerHTML = 'Hace falta una mayúscula';
        message_pwd1.className = "text-red m-0 pt-1 pb-2 fw-500";

        pwd1_input.className = "form-control bg-light is-invalid";
      }


      if (!/[^a-zA-Z0-9]+/g.test(pwd1_input_value)) {
        message_pwd1.innerHTML = 'Hace falta un caractér especial';
        message_pwd1.className = "text-red m-0 pt-1 pb-2 fw-500";

        pwd1_input.className = "form-control bg-light is-invalid";
      }
    }

  }

  function validatePwd2() {
    var pwd2_input_value = document.getElementById("floatingpassword2").value;
    var pwd2_input = document.getElementById("floatingpassword2");
    var message_pwd2 = document.getElementById("password2-message");

    var pwd1_input_value = document.getElementById("floatingpassword1").value;
    var pwd1_input = document.getElementById("floatingpassword1");
    var message_pwd1 = document.getElementById("password1-message");

    if (pwd2_input_value.length == 0) {
      message_pwd2.innerHTML = 'Por favor confirme la contraseña';
      message_pwd2.className = "text-red m-0 pt-1 pb-2 fw-500";

      pwd2_input.className = "form-control bg-light is-invalid";

      if (pwd2_input_value == pwd1_input_value) {
        message_pwd2.innerHTML = 'Las contraseñas coinciden';
        message_pwd2.className = "text-success m-0 pt-1 pb-2 fw-500";
        pwd2_input.className = "form-control bg-light is-valid";
      }
    } else {
      if (pwd2_input_value.length > 2 || pwd2_input_value.length < 8) {
        message_pwd2.innerHTML = 'Debe tener minimo 8 caractéres';
        message_pwd2.className = "text-red m-0 pt-1 pb-2 fw-500";

        pwd2_input.className = "form-control bg-light is-invalid";

        if (pwd2_input_value == pwd1_input_value) {
          message_pwd2.innerHTML = 'Las contraseñas coinciden';
          message_pwd2.className = "text-success m-0 pt-1 pb-2 fw-500";
          pwd2_input.className = "form-control bg-light is-valid";
        }
      }

      if (!/[A-Z]/.test(pwd2_input_value)) {
        message_pwd1.innerHTML = 'Hace falta una mayúscula';
        message_pwd1.className = "text-red m-0 pt-1 pb-2 fw-500";

        pwd1_input.className = "form-control bg-light is-invalid";
      }

      if (!/[^a-zA-Z0-9]+/g.test(pwd2_input_value)) {
        message_pwd1.innerHTML = 'Hace falta un caractér especial';
        message_pwd1.className = "text-red m-0 pt-1 pb-2 fw-500";

        pwd1_input.className = "form-control bg-light is-invalid";
      }

      if (pwd2_input_value.length > 7) {

        if (pwd2_input_value == pwd1_input_value) {
          message_pwd2.innerHTML = 'Las contraseñas coinciden';
          message_pwd2.className = "text-success m-0 pt-1 pb-2 fw-500";
          pwd2_input.className = "form-control bg-light is-valid";
        }
      }
    }

  }

  function recaptchaCallback() {
    submit.className = "btn btn-primary w-100";
  };
</script>

<?php
//include header.php file
include('../../footer.php');
// rest of your code
?>