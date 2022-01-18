<?php
require 'vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];
    $categoria = new ameri\Categoria;

    $resultado = $categoria->mostrarPorId($id);

    if (!$resultado)
        header('Location: dashboard.php');

    /*
 print '<pre>';
 print_r($resultado);
 die;
 */
} else {

    header('Location: dashboard.php');
}
?>


<section>
    <div class="container" id="form-actualizar-c">
        <div class="row justify-content-center">
            <h2 class="section-title pt-lg-5 text-center">Actualizar: <?php print $resultado['nombre'] ?></h2>

            <!--
            <div class="col-lg-4 py-lg-3 text-center">
                <a class="btn btn-primary " href="dashboard.php" role="button">Regresar <i class="fas fa-undo ms-lg-2 me-lg-1"></i></a>
            </div>
-->
        </div>
        <div class="row justify-content-center">
            <div class="col-6 formulario p-lg-3 my-lg-4 text-center px-lg-5">
                <form method="POST" action="acciones_c.php" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php print $resultado['id'] ?>">

                    <div class="form-group text-start py-lg-2">
                        <h6 class="col-form-label fw-600">Nombre de la categoria</h6>
                        <input value="<?php print $resultado['nombre'] ?>" class="form-control" name="nombre_categoria" type="text" required>
                    </div>
                    <div class="form-group text-start py-lg-2">
                        <label class="col-form-label fw-600">Descripción</label>
                        <textarea class="form-control" name="descripcion_categoria" id="" type="text" placeholder="" required><?php print $resultado['descripcion'] ?> </textarea>
                    </div>
                    <div class="form-group text-start py-lg-2">
                        <h6 class="col-form-label fw-600">Imagen</h6>
                        <input name="imagen" type="file">
                        <input type="hidden" name="imagen_temp" value="<?php print $resultado['imagen'] ?>">
                    </div>

                    <input type="submit" name="accion" class="btn btn-secondary my-lg-4" value="Actualizar">
                    <a href="dashboard.php" type="submit" class="btn btn-primary my-lg-4 mx-lg-4" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</section>