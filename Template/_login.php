<section id="login" class="py-5" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.3)), url(assets/promo.jpg);">
    <div class="container py-5">
        <div class="row justify-content-center py-4">
            <div class="col-6 formulario ws px-5 py-4 text-center ">
                <form action="login-user.php" method="post">
                    <h2 class="section-title py-3">Log In</h2>
                    <div class="form-group text-start py-2">
                        <h5 for="inputUsuarioLogin" class="col-2 py-2 fw-600">Usuario</h5>
                        <input class="form-control2" name="nombre_usuario" type="text" placeholder="Nombre de usuario" aria-label="default input example" id="inputUsuarioLogin" required>
                    </div>
                    <div class="form-group text-start py-2">
                        <h5 for="inputPasswordLogin" class="col-2 py-2 fw-600">Password</h5>
                        <input class="form-control2" name="clave_usuario" type="password" placeholder="Contraseña" aria-label="default input example" id="inputPasswordLogin" required>
                    </div>
                    <?php
                    //echo $mensaje2;
                    ?>

                    <button type="submit" value="Submit" class="btn btn-primary btn-lg my-4 py-2 w-100">Iniciar sesión</button>
                    <div class="col-12 align-items-center mx-auto py-2">
                        <h6 class="mb-0">¿No tiene una cuenta? <span><a href="form-register.php" class="color-red btn ss btn-link2"> Crear Cuenta </a>
                            </span></h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>