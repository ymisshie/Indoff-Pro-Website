
<section id="login">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h2 class="section-title mb-4">Iniciar Sesión</h2>
            <div class="col-4 color-grey-bg p-3 text-center">
                <form action="login-user.php" method="post">
                    <div class="form-group text-start">
                        <label for="inputUsuarioLogin" class="col-sm-2 col-form-label">Usuario</label>
                        <input class="form-control" name="nombre_usuario" type="text" placeholder="Nombre de usuario" aria-label="default input example" id="inputUsuarioLogin" required>
                    </div>
                    <div class="form-group text-start">
                        <label for="inputPasswordLogin" class="col-sm-2 col-form-label">Password</label>
                        <input class="form-control" name="clave_usuario" type="password" placeholder="Contraseña" aria-label="default input example" id="inputPasswordLogin" required>
                    </div>
                    <?php
                    //echo $mensaje2;
                    ?>
                    <button type="submit" value="Submit" class="btn btn-primary mt-4 mb-3">Iniciar sesión</button>

                    <br>
                    <a href="form-register.php" class="mt-5"> Crear Cuenta </a>
                </form>
            </div>
        </div>
    </div>
</section>