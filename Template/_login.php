<section id="login">
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="section-title">Accesos al panel</h2>
            <div class="col-4 color-grey-bg p-3 text-center">
                <form action="login.php" method="post">
                    <div class="form-group text-start">
                        <label for="inputUsuarioLogin" class="col-sm-2 col-form-label">Usuario</label>
                        <input class="form-control" name="nombre_usuario" type="text" placeholder="Nombre de usuario" aria-label="default input example" id="inputUsuarioLogin" required>
                    </div>
                    <div class="form-group text-start">
                        <label for="inputPasswordLogin" class="col-sm-2 col-form-label">Password</label>
                        <input class="form-control" name="clave_usuario" type="password" placeholder="Contraseña" aria-label="default input example" id="inputPasswordLogin" required>
                    </div>
                    <button type="submit" value="Submit" class="btn btn-primary my-4">Iniciar sesión</button>
                </form>
            </div>
        </div>
    </div>
</section>