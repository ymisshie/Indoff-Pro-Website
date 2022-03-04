<?php
$title = "Registro Usuario - Indoff Pro";
$pagina = "registro-user";
?>

<?php
//include header.php file
include('header.php');
// rest of your code
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<section class="py-5" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.3)), url(assets/suscribir.jpg);">
  <form class="container formulario ws py-4 px-5" name="formulario" action="register-user.php" method="post" onsubmit="validateMyForm(event);">
    <h2 class="text-center section-title pt-4 pb-5"> Crear una cuenta </h2>
    <div class="row mb-4">
      <div class="col-5 mx-auto">
        <div class="form-outline">
          <h5 class="form-label required py-2">First name</h5>
          <input type="text" name="first_name_user" id="name" required class="form-control2" />
        </div>
      </div>
      <div class="col-5  mx-auto">
        <div class="form-outline">
          <h5 class="form-label required py-2">Last name</h5>
          <input type="text" name="last_name_user" required class="form-control2" />
        </div>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-5  mx-auto">
        <div class="form-outline">
          <h5 class="form-label required py-2">User name</h5>
          <input type="text" name="nombre_login" required class="form-control2" />
        </div>
      </div>
      <div class="col-5  mx-auto">
        <div class="form-outline">
          <h5 class="form-label required py-2">Email address</h5>
          <input type="email" name="email_user" id="email" required class="form-control2" />
        </div>
      </div>
    </div>

    <div class="row mb-4">
      <div class="col-5 mx-auto">
        <div class="form-outline">
          <h5 class="form-label required py-2">Password</h5>
          <input type="password" name="pwd_user" id="pwd_user" required class="form-control2" onchange="contraInvalida();" />
        </div>
      </div>
      <div class="col-5 mx-auto">
        <div class="form-outline ">
          <h5 class="form-label required py-2">Confirm password</h5>
          <input type="password" name="pwd2_user" oninput="mismaContra();" onchange="diferenteContra();" id="pwd2_user" required class="form-control2" />
        </div>
      </div>
    </div>
    <p id="pwd_validar" class="text-danger col-5" style="margin-left: 3rem; margin-top: -1rem;"> </p>

    <p id="pwd_verificar" class="text-center"> </p>

    <div class="g-recaptcha  align-self-center d-flex justify-content-center mt-5" data-sitekey="6LcpJ7MeAAAAACSFJlj_r4u4screB6eJewNXYdqi"></div>
    <!-- Checkbox -->
    <div class="form-check d-flex justify-content-center">

      <button type="submit" class="btn btn-primary btn-lg my-5 py-2 text-center w-50" name="accion" value="Registrar"> Registrarse </button>
    </div>

    <!-- Submit button -->
  </form>
</section>


<script>
  function mismaContra() {
    var pwd1 = document.getElementById('pwd2_user').value;
    var pwd2 = document.getElementById('pwd_user').value;
    if (pwd2 == pwd1) {
      document.getElementById('pwd_verificar').textContent = "Contraseñas son iguales";
    }
  }

  function diferenteContra() {
    var pwd2 = document.getElementById('pwd2_user').value;
    var pwd1 = document.getElementById('pwd_user').value;
    if (pwd2 != pwd1) {
      document.getElementById('pwd_verificar').textContent = "Las contraseñas no coinciden";
      return true;
    }
  }

  function contraInvalida() {
    var pwd = document.getElementById('pwd_user').value;
    var respuesta = "La contraseña debe tener mínimo ";
    var length_respuesta = respuesta.length;
    if (pwd.length < 8) {
      respuesta += "8 caracteres, ";
    }
    if (!/\d/g.test(pwd)) {
      respuesta += "un número, ";
    }
    if (!/[A-Z]/.test(pwd)) {
      respuesta += "una mayúscula, ";
    }
    if (!/[a-z]/g.test(pwd)) {
      respuesta += "una minúscula, ";
    }
    if (!/[^a-zA-Z0-9]+/g.test(pwd)) {
      respuesta += "un caracter especial, ";
    }
    if (respuesta.length == length_respuesta) {
      respuesta = "Contraseña correcta";
    } else {
      respuesta = respuesta.substr(0, respuesta.length - 2)
    }
    document.getElementById('pwd_validar').textContent = respuesta;
  }

  function validateMyForm(event) {
    if (diferenteContra()) {
      event.preventDefault();
      alert("validation failed false");
      returnToPreviousPage();
      //return false;
    }

    // alert("validations passed");
    document.forms['formulario'].submit();
    return true;
  }
</script>

<?php
//include header.php file
include('footer.php');
// rest of your code
?>