<?php
require '../../vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];
    $evento = new ameri\Evento;

    $resultado = $evento->mostrarPorId($id);

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

<section class="color-grey-bg pb-5">

    <div class="container pb-5" id="form-registro-e">
        <div class="row justify-content-center">
            <h3 class="pt-md-5 fw-700 pb-lg-3 pb-md-4 text-center">Actualizar: <?php print $resultado['nombre'] ?></h3>
        </div>

        <div class="row justify-content-center pb-5">
            <div class="col-md-9 col-lg-6 ws formulario p-md-3 my-md-4 text-center px-md-5 ">
                <form method="POST" action="../acciones-e.php" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php print $resultado['id'] ?>">

                    <div class="form-group text-start py-md-2">
                        <h6 class="col-form-label fw-600">Nombre del evento</h6>
                        <input value="<?php print $resultado['nombre'] ?>" class="form-control" name="nombre_evento" type="text" required>
                    </div>
                    <div class="form-group text-start py-md-2">
                        <label class="col-form-label fw-600">Descripción</label>
                        <textarea class="form-control" name="descripcion_evento" id="" type="text" placeholder="" required><?php print $resultado['descripcion'] ?> </textarea>
                    </div>
                    <div class="form-group text-start py-md-2">
                        <h6 class="col-form-label fw-600">Imagen</h6>
                        <input name="imagen" type="file">
                        <input type="hidden" name="imagen_temp" value="<?php print $resultado['imagen'] ?>">
                    </div>

                    <input type="submit" name="accion" class="btn btn-secondary my-lg-4" value="Actualizar">
                    <a href="index.php" type="submit" class="btn btn-primary my-lg-4 mx-lg-4" role="button">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</section>