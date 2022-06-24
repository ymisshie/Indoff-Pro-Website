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

      <div class="col-7 p-5">

        <div class="col-9 mx-auto">

          <form id="form-register-user" action="acciones.php" method="POST">

            <div class="col-12">

              <div class="row">
                <div class="col">
                  <div class="col-2 card-icon">
                    <i class="bg-purple fa-solid fa-user-plus fs-2 text-white p-3 card-icon"></i>
                  </div>
                  <h2 class="py-4 fw-700 text-red m-0">Registro</h2>
                </div>
              </div>

              <!--Alert-->
              <div class="row pb-3">
                <div class="col">
                  <?php
                  if (!empty($_GET['message'])) {
                  ?>
                    <div class="col-12 alert alert-danger mx-auto alert-dismissible fade show" id="liveAlertPlaceholder" role="alert">

                      <?php
                      print($_GET['message']);
                      unset($_GET['message']);

                      ?>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                  <?php
                  }
                  ?>
                </div>
              </div>

              <div class="row pb-3">

                <!--NAME-->
                <div class="col-4 d-flex mx-auto" id="name-input">
                  <span class="me-4 fas fa-user align-self-center"></span>
                  <div class="form-floating w-100">
                    <input oninput="validateName()" onkeydown="return /[a-z\s]/i.test(event.key)" type="text" class="form-control bg-light" id="floatingname" name="name_user" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                                                      if (isset($_GET['admin_user'])) {
                                                                                                                                                                                                                        print $_GET['admin_user'];
                                                                                                                                                                                                                      } ?>" required>
                    <label for="floatingname" class="fw-600 text-muted">Nombre(s) <span class="text-danger">*</span></label>

                    <div id="name-valid">
                    </div>
                  </div>
                </div>

                <!--LASTNAME-->
                <div class="col-4 mx-auto" id="lastname-input">
                  <div class="form-floating w-100">
                    <input oninput="validateLastname()" onkeydown="return /[a-z]/i.test(event.key)" type="text" class="form-control bg-light" id="floatinglastname" name="lastname_user" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                                                                if (isset($_GET['admin_user'])) {
                                                                                                                                                                                                                                  print $_GET['admin_user'];
                                                                                                                                                                                                                                } ?>" required>
                    <label for="floatinglastname" class="fw-600 text-muted">Apellido(s) <span class="text-danger">*</span></label>

                    <div id="lastname-valid">
                    </div>
                  </div>

                </div>

                <!--USERNAME-->
                <div class="col-4 d-flex mx-auto" id="username-input">
                  <div class="form-floating w-100">
                    <input oninput="validateUsername()" onkeydown="return  /^[a-z0-9_]+$/i.test(event.key)" type="text" class="form-control bg-light" id="floatingusername" name="username" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                                                                    if (isset($_GET['admin_user'])) {
                                                                                                                                                                                                                                      print $_GET['admin_user'];
                                                                                                                                                                                                                                    } ?>" required>
                    <label for="floatingusername" class="fw-600 text-muted">Username <span class="text-danger">*</span></label>

                    <div id="username-valid">
                    </div>
                  </div>
                </div>

              </div>

              <div class="row pb-3">

                <!--PHONE-->
                <div class="col-6 d-flex mx-auto" id="phone-input">
                  <span class="me-4 fas fa-phone align-self-center"></span>
                  <div class="form-floating w-100">
                    <input oninput="validatePhone()" type="number" class="form-control bg-light" id="floatingphone" name="phone_user" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                              if (isset($_GET['admin_user'])) {
                                                                                                                                                                                print $_GET['admin_user'];
                                                                                                                                                                              } ?>" required>
                    <label for="floatingphone" class="fw-600 text-muted">Phone <span class="text-danger">*</span></label>

                    <div id="phone-valid">
                    </div>
                  </div>
                </div>

                <!--EMAIL-->
                <div class="col-6 d-flex mx-auto" id="email-input">
                  <span class="me-4 fas fa-envelope align-self-center"></span>
                  <div class="form-floating w-100">
                    <input oninput="validateEmail()" onkeydown="return  /^[a-z0-9_@\.\-]+$/i.test(event.key)" type=" email" class="form-control bg-light" id="floatingemail" name="email_user" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                                                                      if (isset($_GET['admin_user'])) {
                                                                                                                                                                                                                                        print $_GET['admin_user'];
                                                                                                                                                                                                                                      } ?>" required>
                    <label for="floatingemail" class="fw-600 text-muted">Email <span class="text-danger">*</span></label>

                    <div id="email-valid">
                    </div>
                  </div>
                </div>

              </div>

              <div class="row pb-3">

                <!--PASSWORD 1-->
                <div class="col-6 d-flex mx-auto" id="password-input">
                  <span class="me-4 fas fa-key align-self-center"></span>
                  <div class="form-floating w-100">
                    <input oninput="validatePwd1()" onkeydown="return  /^[a-z0-9@!#]+$/i.test(event.key)" type="password" class="form-control bg-light" id="floatingpassword1" name="password_user" placeholder="Nombre de usuario" value="<?php
                                                                                                                                                                                                                                            if (isset($_GET['admin_user'])) {
                                                                                                                                                                                                                                              print $_GET['admin_user'];
                                                                                                                                                                                                                                            } ?>" required>
                    <label for="floatingpassword1" class="fw-600 text-muted">Contraseña <span class="text-danger">*</span></label>

                    <div id="password1-valid">
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

                    <div id="password2-valid">
                    </div>
                  </div>

                </div>

              </div>

              <div class="row">
                <div class="col pt-2 pb-4">
                  <div class="g-recaptcha align-self-center d-flex justify-content-center " data-sitekey="6Ld_7SEgAAAAALLdeLmdLRe1IiHIVsA204Vqkelk" data-callback="recaptchaCallback"></div>
                </div>
              </div>

              <div class="row">
                <div class="col-12 p-0">
                  <button type="submit" id="submit" name="accion" value="Registrar" class="btn btn-primary w-100 disabled">Registrar</button>
                </div>
              </div>

            </div>

          </form>

        </div>
      </div>

      <div class="col-5 bg-red">
        <div class="col-12 p-5">
        </div>
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
    var message_name = document.getElementById("name-valid");

    if (name_input_value.length == 0) {
      message_name.innerHTML = 'Por favor ingrese su nombre';
      message_name.className = "invalid-tooltip";

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
    var message_lastname = document.getElementById("lastname-valid");

    if (lastname_input_value.length == 0) {
      message_lastname.innerHTML = 'Por favor ingrese su apelldo';
      message_lastname.className = "invalid-tooltip";

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
    var message_username = document.getElementById("username-valid");

    if (username_input_value.length == 0) {
      message_username.innerHTML = 'Por favor ingrese un nombre de usuario';
      message_username.className = "invalid-tooltip";

      username_input.className = "form-control bg-light is-invalid"
    }

    if (username_input_value.length > 0) {
      message_username.innerHTML = "Se permite que contenga algún número (0-9) o guión bajo (_). Longitud de almenos";
      message_username.className = "valid-tooltip";
      username_input.className = "form-control bg-light is-valid"
    }

    if (username_input_value.length > 2) {
      message_username.innerHTML = "";
      message_username.className = "";
      username_input.className = "form-control bg-light is-valid"
    }
  }

  function validatePhone() {
    var phone_input_value = document.getElementById("floatingphone").value;
    var phone_input = document.getElementById("floatingphone");
    var message_phone = document.getElementById("phone-valid");

    if (phone_input_value.length == 0) {
      message_phone.innerHTML = 'Por favor ingrese un número de teléfono';
      message_phone.className = "invalid-tooltip";

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
    var message_email = document.getElementById("email-valid");

    if (email_input_value.length == 0) {
      message_email.innerHTML = 'Por favor ingrese su correo electrónico';
      message_email.className = "invalid-tooltip";

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
    var message_pwd1 = document.getElementById("password1-valid");

    var pwd2_input_value = document.getElementById("floatingpassword2").value;
    var pwd2_input = document.getElementById("floatingpassword2");
    var message_pwd2 = document.getElementById("password2-valid");

    if (pwd1_input_value.length == 0) {
      message_pwd1.innerHTML = 'Debe contener al menos 8 caractéres, un número (0-9), una mayuscula (A-Z) o caractér especial (!@#)';
      message_pwd1.className = "invalid-tooltip";

      pwd1_input.className = "form-control bg-light is-invalid";


    } else {

      if (pwd1_input_value.length > 2 || pwd1_input_value.length < 8) {
        message_pwd1.innerHTML = 'Debe tener minimo 8 caractéres';
        message_pwd1.className = "invalid-tooltip";

        pwd1_input.className = "form-control bg-light is-invalid";
      }

      if (pwd1_input_value.length > 7) {
        message_pwd1.innerHTML = "";
        message_pwd1.className = "";
        pwd1_input.className = "form-control bg-light is-valid";

      }

      if (!/[A-Z]/.test(pwd1_input_value)) {
        message_pwd1.innerHTML = 'Hace falta una mayúscula';
        message_pwd1.className = "invalid-tooltip";

        pwd1_input.className = "form-control bg-light is-invalid";
      }


      if (!/[^a-zA-Z0-9]+/g.test(pwd1_input_value)) {
        message_pwd1.innerHTML = 'Hace falta un caractér especial';
        message_pwd1.className = "invalid-tooltip";

        pwd1_input.className = "form-control bg-light is-invalid";
      }
    }

  }

  function validatePwd2() {
    var pwd2_input_value = document.getElementById("floatingpassword2").value;
    var pwd2_input = document.getElementById("floatingpassword2");
    var message_pwd2 = document.getElementById("password2-valid");

    var pwd1_input_value = document.getElementById("floatingpassword1").value;
    var pwd1_input = document.getElementById("floatingpassword1");
    var message_pwd1 = document.getElementById("password1-valid");

    if (pwd2_input_value.length == 0) {
      message_pwd2.innerHTML = 'Por favor confirme la contraseña';
      message_pwd2.className = "invalid-tooltip";

      pwd2_input.className = "form-control bg-light is-invalid";

      if (pwd2_input_value == pwd1_input_value) {
        message_pwd2.innerHTML = 'Las contraseñas coinciden';
        message_pwd2.className = "valid-tooltip";
        pwd2_input.className = "form-control bg-light is-valid";
      }
    } else {
      if (pwd2_input_value.length > 2 || pwd2_input_value.length < 8) {
        message_pwd2.innerHTML = 'Debe tener minimo 8 caractéres';
        message_pwd2.className = "invalid-tooltip";

        pwd2_input.className = "form-control bg-light is-invalid";

        if (pwd2_input_value == pwd1_input_value) {
          message_pwd2.innerHTML = 'Las contraseñas coinciden';
          message_pwd2.className = "valid-tooltip";
          pwd2_input.className = "form-control bg-light is-valid";
        }
      }

      if (!/[A-Z]/.test(pwd2_input_value)) {
        message_pwd2.innerHTML = 'Hace falta una mayúscula';
        message_pwd2.className = "invalid-tooltip";

        pwd2_input.className = "form-control bg-light is-invalid";
      }

      if (!/[^a-zA-Z0-9]+/g.test(pwd2_input_value)) {
        message_pwd2.innerHTML = 'Hace falta un caractér especial';
        message_pwd2.className = "invalid-tooltip";

        pwd2_input.className = "form-control bg-light is-invalid";
      }

      if (pwd2_input_value.length > 7) {

        if (pwd2_input_value == pwd1_input_value) {
          message_pwd2.innerHTML = 'Las contraseñas coinciden';
          message_pwd2.className = "valid-tooltip";
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