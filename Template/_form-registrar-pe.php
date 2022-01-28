<?php
require '../../vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];
//     $producto_evento = new ameri\Producto_Evento;

//     $resultado = $producto_evento->mostrarPorId($id);
//     print_r($resultado);

//     if (!$resultado)
//         header('Location: ../eventos/index.php');

//     /*
//  print '<pre>';
//  print_r($resultado);
//  die;
//  */
} else {
    header('Location: ../eveneots/index.php');
}
?>
<section>
    <div class="container" id="form-registro-p">
        <div class="row justify-content-center">
            <h2 class="section-title m-0 mt-5 mb-3">Añadir producto</h2>
            <div class="col-9 color-grey-bg p-3 mt-4 mb-4 text-center">
                <form method="POST" action="../acciones-pe.php" enctype="multipart/form-data">
                    <div class="form-group text-start">
                        <h6 class="col-form-label">Nombre del producto</h6>
                        <input class="form-control" name="nombre_producto_evento" type="text" placeholder="" required>
                    </div>

                    <div class="form-group text-start">
                        <h6 class="col-form-label">Nombre del proveedor</h6>
                        <input class="form-control" name="proveedor_producto_evento" type="text" placeholder="" required>
                    </div>


                    <div class="form-group text-start">
                        <h6 class="col-form-label">Descripción</h6>
                        <textarea class="form-control" name="descripcion_producto_evento" id="" type="text" placeholder="" required></textarea>
                    </div>

                    <div class="col-12 form-group text-start">
                        <h6 class="col-form-label">Imagen</h6>
                        <input name="imagen" type="file" required>
                    </div>

                    
                    <div class="col-12 form-group text-start">
                        <h6 class="col-form-label">Evento</h6>
                        <select class="form-control mb-4" name="evento_id_producto" required>
                            <option value="">Seleccione un Evento</option>
                            <?php
                            require '../../vendor/autoload.php';
                            $evento = new ameri\Evento;
                            $info_evento = $evento->mostrar();
                            $cantidad = count($info_evento);
                            for ($x = 0; $x < $cantidad; $x++) {
                                $item = $info_evento[$x];
                                
                            ?>
                                <option value="<?php print $item['id'] ?>"<?php print $id == $item['id'] ? 'selected' : '' ?>><?php print $item['nombre'] ?></option>
                            <?php

                            }
                            ?>

                        </select>
                    </div>

                    <div class="cantidad col-12 py-4 d-flex justify-content-between font-size-0.7">
                        <div class="text-center mx-3">
                            <h6 class="font-poppins">Opción 1</h6>
                            <input id="op1" class="form-control" type="text" name="op1_producto_evento" value="" required>
                        </div>
                        <div class="text-center mx-3">
                            <h6 class="font-poppins">Opción 2</h6>
                            <input id="op2" class="form-control" type="text" name="op2_producto_evento" value="">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 3</h6>
                            <input id="op3" class="form-control" type="text" name="op3_producto_evento" value="">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 4</h6>
                            <input id="op4" class="form-control" type="text" name="op4_producto_evento" value="">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 5</h6>
                            <input id="op5" class="form-control" type="text" name="op5_producto_evento" value="">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 6</h6>
                            <input id="op6" class="form-control" type="text" name="op6_producto_evento" value="">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 7</h6>
                            <input id="op7" class="form-control" type="textF" name="op7_producto_evento" value="">
                        </div>

                    </div>

                    <div class="cantidad col-12 pb-4 d-flex justify-content-between font-size-0.7">
                        <div class=" mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 1</h5> <input class="form-control" name="q1_producto_evento" type="text" placeholder="0.00" required>
                        </div>
                        <div class=" mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 2</h5> <input class="form-control" name="q2_producto_evento" type="text" placeholder="0.00">
                        </div>
                        <div class="mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 3</h5> <input class="form-control" name="q3_producto_evento" type="text" placeholder="0.00">
                        </div>
                        <div class="  mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 4</h5>
                            <input class="form-control" name="q4_producto_evento" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 5</h5>
                            <input class="form-control" name="q5_producto_evento" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 6</h5>
                            <input class="form-control" name="q6_producto_evento" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 7</h5>
                            <input class="form-control" name="q7_producto_evento" type="text" placeholder="0.00">
                        </div>
                    </div>

                    <div class="cantidad col-12 pb-4 d-flex justify-content-between font-size-0.7">
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 1</h6> <input class="form-control" name="precio_producto1_evento" type="text" placeholder="0.00" required>

                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 2</h6> <input class="form-control" name="precio_producto2_evento" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 3</h6> <input class="form-control" name="precio_producto3_evento" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 4</h6>
                            <input class="form-control" name="precio_producto4_evento" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 5</h6>
                            <input class="form-control" name="precio_producto5_evento" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 6</h6>
                            <input class="form-control" name="precio_producto6_evento" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 7</h6>
                            <input class="form-control" name="precio_producto7_evento" type="text" placeholder="0.00">
                        </div>
                    </div>

            

                    <div class="form-group text-start">
                        <h6 class="col-form-label">Tamaño</h6>
                        <input class="form-control" name="size_producto_evento" type="text" placeholder="" >
                    </div>

                    <div class="form-group text-start">
                        <h6 class="col-form-label">Peso</h6>
                        <input class="form-control" name="peso_producto_evento" type="text" placeholder="">
                    </div>

                    <div class="form-group text-start">
                        <h6 class="col-form-label">Color</h6>
                        <input class="form-control" name="color_producto_evento" type="text" placeholder="">
                    </div>


                    <input type="submit" name="accion" class="btn btn-success my-4" value="Registrar">
                    <!-- <a href="../eventos/index.php" class="btn btn-danger my-4" role="buttton">Cancelar</a> -->
                    <a href="index.php?id=<?php print $id ?>" class="btn btn-danger my-4" role="buttton">Cancelar </a>
                    

                </form>
            </div>
        </div>
    </div>
</section>