<?php
require '../../vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];
    $producto_evento = new ameri\Producto_Evento;

    $resultado = $producto_evento->mostrarPorId($id);

    if (!$resultado)
        header('Location: ../eventos/index.php');

    /*
 print '<pre>';
 print_r($resultado);
 die;
 */
} else {
    header('Location: ../eveneots/index.php');
}
?>

<section>
    <div class="container" id="form-registro-pe">
        <h2 class="section-title text-start m-0 mt-5 mb-3">Añadir producto</h2>
        <div class="row justify-content-center p-3 mt-4 mb-4 color-grey-bg ">

            <div class="col-8 text-center">
                <form method="POST" action="../acciones-pe.php" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php print $resultado['id'] ?>">

                    <div class="form-group text-start">
                        <label class="col-form-label">Nombre del producto</label>
                        <input value="<?php print $resultado['nombre'] ?>" class="form-control" name="nombre_producto_evento" type="text" placeholder="" required>
                    </div>
                    <div class="form-group text-start">
                        <label class="col-form-label">Nombre del proveedor</label>
                        <input class="form-control" name="proveedor_producto_evento" id="" type="text" placeholder="" required value="<?php print $resultado['proveedor']?> ">
                    </div>
                    <div class="form-group text-start">
                        <label class="col-form-label">Descripción</label>
                        <textarea class="form-control" name="descripcion_producto_evento" id="" type="text" placeholder="" required> <?php print $resultado['descripcion'] ?> </textarea>
                    </div>
                    
                    <div class="col-12 form-group text-start">
                        <label class="col-form-label">Imagen</label>
                        <input name="imagen" type="file">
                        <input type="hidden" name="imagen_temp" value="<?php print $resultado['imagen'] ?>">
                    </div>

                    <div class="col-12 form-group text-start">
                        <label class="col-form-label">Evento</label>
                        <select class="form-control" name="evento_id_producto" required>
                            <option value="">Seleccione un evento</option>
                            <?php
                            require '../../vendor/autoload.php';
                            $evento = new ameri\Evento;
                            $info_evento = $evento->mostrar();
                            $cantidad = count($info_evento);
                            for ($x = 0; $x < $cantidad; $x++) {
                                $item = $info_evento[$x];
                            ?>
                                <option value="<?php print $item['id'] ?>" <?php print $resultado['evento_id'] == $item['id'] ? 'selected' : '' ?>><?php print $item['nombre'] ?></option>
                            <?php

                            }
                            ?>
                        </select>
                    </div>

                    <div class="cantidad col-12 py-4 d-flex justify-content-between font-size-0.7">
                        <div class="text-center mx-3">
                            <h6 class="font-poppins">Opción 1</h6>
                            <input id="op1" class="form-control" type="text" value="<?php print $resultado['op1'] ?> " name="op1_producto_evento" required> 
                        </div>
                        <div class="text-center mx-3">
                            <h6 class="font-poppins">Opción 2</h6>
                            <input id="op2" class="form-control" type="text" name="op2_producto_evento" value="<?php print $resultado['op2'] ?> " required>
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 3</h6>
                            <input id="op3" class="form-control" type="text" name="op3_producto_evento" value="<?php print $resultado['op3'] ?> "required>
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 4</h6>
                            <input id="op4" class="form-control" type="text" name="op4_producto_evento" value="<?php print $resultado['op4'] ?> " value="" required>
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 5</h6>
                            <input id="op5" class="form-control" type="text" name="op5_producto_evento" value="<?php print $resultado['op5'] ?> " required>
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 6</h6>
                            <input id="op6" class="form-control" type="text" name="op6_producto_evento" value="<?php print $resultado['op6'] ?> " required>
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 7</h6>
                            <input id="op7" class="form-control" type="textF" name="op7_producto_evento" value="<?php print $resultado['op7'] ?> " required>
                        </div>

                    </div>


                    <div class="cantidad col-12 pb-4 d-flex justify-content-between font-size-0.7">
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad</h5> <input class="form-control" name="q1_producto_evento" type="text" value="<?php print $resultado['q1'] ?>" required>
                        </div>
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad</h5> <input class="form-control" name="q2_producto_evento" type="text" value="<?php print $resultado['q2'] ?>" required>
                        </div>
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad</h5> <input class="form-control" name="q3_producto_evento" type="text" value="<?php print $resultado['q3'] ?>" required>
                        </div>
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad</h5>
                            <input class="form-control" name="q4_producto_evento" type="text" value="<?php print $resultado['q4'] ?>" required>
                        </div>
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad</h5>
                            <input class="form-control" name="q5_producto_evento" type="text" value="<?php print $resultado['q5'] ?>" required>
                        </div>
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad</h5>
                            <input class="form-control" name="q6_producto_evento" type="text" value="<?php print $resultado['q6'] ?>" required>
                        </div>
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad</h5>
                            <input class="form-control" name="q7_producto_evento" type="text" value="<?php print $resultado['q7'] ?>" required>
                        </div>
                    </div>

                    <div class="cantidad col-12 pb-4 d-flex justify-content-between font-size-0.7">
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 1</h6> <input class="form-control" name="precio_producto1_evento" type="text" value="<?php print $resultado['precio1'] ?>" required>
                        
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 2</h6> <input class="form-control" name="precio_producto2_evento" type="text" value="<?php print $resultado['precio2'] ?>" required>
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 3</h6> <input class="form-control" name="precio_producto3_evento" type="text"  value="<?php print $resultado['precio3'] ?>"  required>
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 4</h6>
                            <input class="form-control" name="precio_producto4_evento" type="text"  value="<?php print $resultado['precio4'] ?>"  required>
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 5</h6>
                            <input class="form-control" name="precio_producto5_evento" type="text"  value="<?php print $resultado['precio5'] ?>"  required>
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 6</h6>
                            <input class="form-control" name="precio_producto6_evento" type="text"  value="<?php print $resultado['precio6'] ?>"  required>
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 7</h6>
                            <input class="form-control" name="precio_producto7_evento" type="text"  value="<?php print $resultado['precio7'] ?>" 
                            required>
                        </div>
                    </div>
                    <div class="form-group text-start">
                        <h6 class="col-form-label">Tamaño</h6>
                        <input class="form-control" name="size_producto_evento" type="text" value="<?php print $resultado['size'] ?> " required >
                    </div>

                    <div class="form-group text-start">
                        <h6 class="col-form-label">Peso</h6>
                        <input class="form-control" name="peso_producto_evento" type="text" value="<?php print $resultado['peso'] ?> " required>
                    </div>

                    <div class="form-group text-start">
                        <h6 class="col-form-label">Color</h6>
                        <input class="form-control" name="color_producto_evento" type="text" value="<?php print $resultado['color'] ?> " required>
                    </div>
                    
            <!-- </div> -->

            <input type="submit" name="accion" class="btn btn-success my-4" value="Actualizar">
            <a href="index.php?id=<?php print $resultado['evento_id'] ?>" class="btn btn-danger my-4" role="buttton">Cancelar </a>

            <!--
                    <input type="submit" name="accion" class="btn btn-success my-4" 
                    value="Registrar">
                    <a href="dashboard.php" class="btn btn-danger my-4" role="buttton">Cancelar</a>
-->
            </form>
        </div>
    </div>

    </div>
</section>