<?php
$title = "Registro Usuario - Indoff Pro";
$pagina = "registro-user";
?>

<?php
//include header.php file
include('header.php');
   // rest of your code
?>

<h1 class="logo text-center mt-4"> Create an account </h1>

<form class="container mt-4" name = "formulario"action="register-user.php" method="post"  onsubmit="validateMyForm(event);">
  <div class="row mb-4">
    <div class="col-5  mx-auto">
      <div class="form-outline">
        <label class="form-label required">First name</label>
        <input type="text" name="first_name_user" id="name" required  class="form-control" />
      </div>
    </div>
    <div class="col-5  mx-auto">
      <div class="form-outline">
        <label class="form-label required">Last name</label>
        <input type="text" name="last_name_user" required class="form-control" />
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-5  mx-auto">
      <div class="form-outline">
        <label class="form-label required">User name</label>
        <input type="text" name="nombre_login" required class="form-control" />
      </div>
    </div>
    <div class="col-5  mx-auto">
      <div class="form-outline">
        <label class="form-label required">Email address</label>
        <input type="email" name="email_user" id="email" required class="form-control" />
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-5  mx-auto">
      <div class="form-outline">
        <label class="form-label required">Password</label>
        <input type="password" name="pwd_user" id="pwd_user" required class="form-control" onchange="contraInvalida();" />
      </div>
    </div>
    <div class="col-5  mx-auto">
      <div class="form-outline">
        <label class="form-label required">Confirm password</label>
        <input type="password" name="pwd2_user" oninput="mismaContra();" onchange="diferenteContra();" id="pwd2_user" required class="form-control" />
      </div>
    </div>
  </div>
  <p id="pwd_validar" class="text-danger col-5" style="margin-left: 3rem; margin-top: -1rem;"> </p>

  <p id="pwd_verificar" class="text-center">  </p>

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <button type="submit" class="btn btn-secondary btn-lg mt-3 text-center" name="accion" value="Registrar"> Create </button>
  </div>

  <!-- Submit button -->
</form>

<script>
    function mismaContra(){
      var pwd1 = document.getElementById('pwd2_user').value;
      var pwd2 = document.getElementById('pwd_user').value;
      if (pwd2 == pwd1){
        document.getElementById('pwd_verificar').textContent = "Las contraseñas son iguales";
      }
    }
    function diferenteContra(){
      var pwd2 = document.getElementById('pwd2_user').value;
      var pwd1 = document.getElementById('pwd_user').value;
      if (pwd2 != pwd1){
        document.getElementById('pwd_verificar').textContent = "Las contraseñas no coinciden";
        return true;
      }      
    }

    function contraInvalida(){
      var pwd = document.getElementById('pwd_user').value;
      var respuesta = "La contraseña tiene que tener mínimo ";
      var length_respuesta = respuesta.length;
      if (pwd.length < 8){
        respuesta += "8 caracteres, ";
      }
      if (!/\d/g.test(pwd)){
        respuesta += "un número, ";
      }
      if (!/[A-Z]/.test(pwd)){
        respuesta += "una mayúscula, ";
      }
      if (!/[a-z]/g.test(pwd)){
        respuesta += "una minúscula, ";
      }
      if (!/[^a-zA-Z0-9]+/g.test(pwd)){
        respuesta += "un caracter especial, ";
      }
      if (respuesta.length == length_respuesta){
        respuesta="Contraseña correcta";
      }
      else{
        respuesta= respuesta.substr(0, respuesta.length-2)
      }
      document.getElementById('pwd_validar').textContent = respuesta;
    }

    function validateMyForm(event)
    {
      if(diferenteContra())
      { 
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

