<section>
    <div class="container" id="form-registro-c">
        <div class="row justify-content-center">
        <h2 class="section-title m-0 mt-5 mb-3">Añadir categoria</h2>
            <div class="col-8 color-grey-bg p-3 my-4 text-center">
            <form method="POST" action="acciones_c.php" enctype="multipart/form-data" >
                    <div class="form-group text-start">
                        <label class="col-form-label">Nombre de la categoria</label>
                        <input class="form-control" name="nombre_categoria" type="text" placeholder="" required>
                    </div>
                    <div class="form-group text-start">
                        <label class="col-form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion_categoria" id="" type="text" placeholder="" required></textarea>
                    </div>
                    <div class="col-12 form-group text-start">
                        <label class="col-form-label">Imagen</label>
                        <input name="imagen" type="file" required">
                    </div>
                    
                    <input type="submit" name="accion" class="btn btn-success my-4" 
                    value="Registrar">
                    <a href="dashboard.php" class="btn btn-danger my-4" role="buttton">Cancelar</a>

                    </form>
            </div>
        </div>
    </div>
</section>