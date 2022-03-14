<section class="color-grey-bg pb-5">

    <div class="container-fluid  pb-5" id="form-registro-c">
        <div class="row justify-content-center">
            <h3 class="pt-5 fw-800 pb-2 text-center">Añadir nueva categoria</h3>
        </div>

        <div class="row justify-content-center pb-5 ">

            <form class="col-11 col-lg-10 ws formulario p-3 my-4 text-center px-5 d-flex" method="POST" action="../acciones_c.php" enctype="multipart/form-data">

                <div class="col-6 col-lg-7">
                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Nombre de la categoria <span class="color-red">*</span></h6>
                        <input class="form-control" name="nombre_categoria" type="text" required>
                    </div>

                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Descripción <span class="color-red">*</span></h6>
                        <textarea class="form-control" name="descripcion_categoria" type="text" required></textarea>
                    </div>
                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Imagen <span class="color-red">*</span></h6>

                        <div class="col-12">
                            <input name="imagen" accept="image/*" onchange="loadImg()" type="file" required>
                        </div>

                    </div>
                </div>

                <div class="col-6 col-lg-5 ps-5">
                    <div class="col-12">
                        <img class="mt-3 img-fluid" id="frame" />
                        <small class="d-flex form-text text-disbabled pt-2">Previsualización de la imagen.</small>
                    </div>

                    <input type="submit" name="accion" class="btn btn-secondary my-4" value="Registrar">
                    <a href="index.php" class="btn btn-primary my-4 mx-3" role="buttton">Cancelar</a>
                </div>
            </form>

        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function loadImg() {
        $('#frame').attr('src', URL.createObjectURL(event.target.files[0]));
    }
</script>