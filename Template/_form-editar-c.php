<?php
require '../../vendor/autoload.php';


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

<section class="color-grey-bg pb-5">

    <div class="container pb-5" id="form-registro-c">
        <div class="row justify-content-center">
            <h3 class="pt-5 fw-800 pb-2 text-center">Actualizar: <?php print $resultado['nombre'] ?></h3>
        </div>

        <div class="row justify-content-center pb-5">

            <form class="col-11 col-lg-10 ws formulario p-3 my-4 text-center px-5 d-flex" method="POST" action="../acciones_c.php" enctype="multipart/form-data">
                <div class="col-6 col-lg-7">

                    <input type="hidden" name="id" value="<?php print $resultado['id'] ?>">

                    <div class="form-group text-start py-md-2">
                        <h6 class="col-form-label fw-600">Nombre de la categoria</h6>
                        <input value="<?php print $resultado['nombre'] ?>" class="form-control" name="nombre_categoria" type="text" required>
                    </div>
                    <div class="form-group text-start py-md-2">
                        <label class="col-form-label fw-600">Descripción</label>
                        <textarea class="form-control" name="descripcion_categoria" id="" type="text" placeholder="" required><?php print $resultado['descripcion'] ?> </textarea>
                    </div>
                    <div class="form-group text-start py-md-2 col-6">
                        <h6 class="col-form-label fw-600">Orden</h6>
                        <select name="orden_categorias" class="orden_categorias form-control">
                            <?php

                            if ($resultado['id'] > 1 && $resultado['id'] < 7) {

                            ?>
                                <option value="1" <?php if ($resultado['id'] == 1) print "selected" ?>> 1 </option>
                                <option value="2" <?php if ($resultado['id'] == 2) print "selected" ?>>2</option>
                                <option value="3" <?php if ($resultado['id'] == 3) print "selected" ?>>3</option>
                                <option value="4" <?php if ($resultado['id'] == 4) print "selected" ?>> 4 </option>
                                <option value="5" <?php if ($resultado['id'] == 5) print "selected" ?>> 5 </option>
                                <option value="6" <?php if ($resultado['id'] == 6) print "selected" ?>> 6 </option>
                            <?php

                            } else { ?>

                                <option value="1" <?php if ($resultado['orden'] == 1) print "selected" ?>> 1 </option>
                                <option value="2" <?php if ($resultado['orden'] == 2) print "selected" ?>>2</option>
                                <option value="3" <?php if ($resultado['orden'] == 3) print "selected" ?>>3</option>
                                <option value="4" <?php if ($resultado['orden'] == 4) print "selected" ?>> 4 </option>
                                <option value="5" <?php if ($resultado['orden'] == 5) print "selected" ?>> 5 </option>
                                <option value="6" <?php if ($resultado['orden'] == 6) print "selected" ?>> 6 </option>
                                <option value="7" <?php if ($resultado['id'] > 6) print "selected" ?>> No mostrar </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group text-start py-md-2">
                        <h6 class="col-form-label fw-600">Imagen</h6>
                        <input name="imagen" accept="image/*" onchange="loadImg()" type="file">
                        <input type="hidden" name="imagen_temp" value="<?php print $resultado['imagen'] ?>">
                    </div>

                </div>
                <div class="col-6 col-lg-5 ps-5">
                    <div class="col-12">
                        <?php
                        $imagen = '../../upload/Categorias/' . $resultado['imagen'];

                        if (file_exists($imagen)) {

                        ?>
                            <img src="<?php print $imagen; ?>" class="mt-3 img-fluid" id="frame" />

                        <?php } else { ?>
                            <p>La imagen no se encuentra disponible</p> <?php } ?>

                        <small class="d-flex form-text text-disbabled pt-2">Previsualización de la imagen.</small>
                    </div>

                    <input type="submit" name="accion" class="btn btn-secondary my-lg-4" value="Actualizar">
                    <a href="index.php" type="submit" class="btn btn-primary my-lg-4 mx-lg-4" role="button">Cancelar</a>

                </div>
            </form>
        </div>
    </div>

</section>