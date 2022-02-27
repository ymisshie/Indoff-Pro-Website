<section class="color-grey-bg pb-5">

    <div class="container pb-5" id="form-registro-c">
        <div class="row justify-content-center">
            <h3 class="pt-5 fw-700 pb-3 text-center">Añadir categoria</h3>
        </div>

        <div class="row justify-content-center pb-5">
            <div class=" col-10 col-md-9 col-lg-6 ws formulario p-3 my-4 text-center px-5 ">
                <form method="POST" action="../acciones_c.php" enctype="multipart/form-data">

                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Nombre de la categoria</h6>
                        <input class="form-control" name="nombre_categoria" type="text" required>
                    </div>

                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Descripción</h6>
                        <textarea class="form-control" name="descripcion_categoria" type="text" required></textarea>
                    </div>
                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Imagen</h6>
                        <input name="imagen" ctype="file" required">
                    </div>

                    <input type="submit" name="accion" class="btn btn-secondary my-4" value="Registrar">
                    <a href="index.php" class="btn btn-primary my-4 mx-3" role="buttton">Cancelar</a>

                </form>
            </div>
        </div>
    </div>
</section>