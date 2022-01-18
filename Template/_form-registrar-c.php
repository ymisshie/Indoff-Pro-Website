<section>
    <div class="container" id="form-registro-c">
        <div class="row justify-content-center">
            <h2 class="section-title pt-lg-5 text-center">Añadir categoria</h2>

            <!--
            <div class="col-lg-4 py-lg-3 text-center">
                <a class="btn btn-primary " href="dashboard.php" role="button">Regresar <i class="fas fa-undo ms-lg-2 me-lg-1"></i></a>
            </div>
-->
        </div>

        <div class="row justify-content-center">
            <div class="col-6 formulario p-lg-3 my-lg-4 text-center px-lg-5">
                <form method="POST" action="acciones_c.php" enctype="multipart/form-data">

                    <div class="form-group text-start py-lg-2">
                        <h6 class="col-form-label fw-600">Nombre de la categoria</h6>
                        <input class="form-control" name="nombre_categoria" type="text" required>
                    </div>
                    <div class="form-group text-start py-lg-2">
                        <h6 class="col-form-label fw-600">Descripción</h6>
                        <textarea class="form-control" name="descripcion_categoria" type="text" required></textarea>
                    </div>
                    <div class="form-group text-start py-lg-2">
                        <h6 class="col-form-label fw-600">Imagen</h6>
                        <input name="imagen" type="file" required">
                    </div>
                </form>
                <input type="submit" name="accion" class="btn btn-secondary my-lg-4" value="Registrar">
                <a href="dashboard.php" class="btn btn-primary my-lg-4 mx-lg-4" role="buttton">Cancelar</a>


            </div>

            <!--
            <div class="col-lg-4 formulario p-lg-3 my-lg-4 mx-lg-5">

            </div>
-->
        </div>
    </div>
</section>