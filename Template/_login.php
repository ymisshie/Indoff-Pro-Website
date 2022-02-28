
<section id="login">
    <div class="container pb-5">
        <div class="row justify-content-center text-center">
           
            <h2 class="section-title py-5">Iniciar Sesión</h2>
            
            <div class="col-4 formulario ws px-5 py-4 text-center">
                <form action="login-user.php" method="post">
                    <div class="form-group text-start py-2">
                        <h5 for="inputUsuarioLogin" class="col-2 py-2 fw-600">Usuario</h5>
                        <input class="form-control" name="nombre_usuario" type="text" placeholder="Nombre de usuario" aria-label="default input example" id="inputUsuarioLogin" required>
                    </div>
                    <div class="form-group text-start py-2">
                        <h5 for="inputPasswordLogin" class="col-2 py-2 fw-600">Password</h5>
                        <input class="form-control" name="clave_usuario" type="password" placeholder="Contraseña" aria-label="default input example" id="inputPasswordLogin" required>
                    </div>
                    <?php
                    //echo $mensaje2;
                    ?>
                    <button type="submit" value="Submit" class="btn btn-primary my-4 ">Iniciar sesión</button>
                    <a href="form-register.php" class="my-4 btn ms-3 btn-secondary"> Crear Cuenta </a>
                </form>
            </div>
        </div>
    </div>
</section>