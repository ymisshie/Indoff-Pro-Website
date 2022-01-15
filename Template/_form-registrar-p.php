<section>
    <div class="container" id="form-registro-p">
        <div class="row justify-content-center">
            <h2 class="section-title m-0 mt-5 mb-3">Añadir producto</h2>
            <div class="col-9 color-grey-bg p-3 mt-4 mb-4 text-center">
                <form method="POST" action="acciones_p.php" enctype="multipart/form-data">
                    <div class="form-group text-start">
                        <h6 class="col-form-label">Nombre del producto</h6>
                        <input class="form-control" name="nombre_producto" type="text" placeholder="" required>
                    </div>

                    <div class="form-group text-start">
                        <h6 class="col-form-label">Nombre del proveedor</h6>
                        <input class="form-control" name="proveedor_producto" type="text" placeholder="" required>
                    </div>


                    <div class="form-group text-start">
                        <h6 class="col-form-label">Descripción</h6>
                        <textarea class="form-control" name="descripcion_producto" id="" type="text" placeholder="" required></textarea>
                    </div>

                    <div class="col-12 form-group text-start">
                        <h6 class="col-form-label">Imagen</h6>
                        <input name="imagen" type="file" required">
                    </div>

                    
                    <div class="col-12 form-group text-start">
                        <h6 class="col-form-label">Categoria</h6>
                        <select class="form-control mb-4" name="categoria_id_producto" required>
                            <option value="">Seleccione una Categoria</option>
                            <?php
                            require 'vendor/autoload.php';
                            $categoria = new ameri\Categoria;
                            $info_categoria = $categoria->mostrar();
                            $cantidad = count($info_categoria);
                            for ($x = 0; $x < $cantidad; $x++) {
                                $item = $info_categoria[$x];
                            ?>
                                <option value="<?php print $item['id'] ?>"><?php print $item['nombre'] ?></option>
                            <?php

                            }
                            ?>

                        </select>
                    </div>

                    <div class="cantidad col-12 py-4 d-flex justify-content-between font-size-0.7">
                        <div class="text-center mx-3">
                            <h6 class="font-poppins">Opción 1</h6>
                            <input id="op1" class="form-control" type="text" name="op1_producto" value="" required>
                        </div>
                        <div class="text-center mx-3">
                            <h6 class="font-poppins">Opción 2</h6>
                            <input id="op2" class="form-control" type="text" name="op2_producto" value="">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 3</h6>
                            <input id="op3" class="form-control" type="text" name="op3_producto" value="">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 4</h6>
                            <input id="op4" class="form-control" type="text" name="op4_producto" value="">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 5</h6>
                            <input id="op5" class="form-control" type="text" name="op5_producto" value="">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 6</h6>
                            <input id="op6" class="form-control" type="text" name="op6_producto" value="">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="font-poppins">Opción 7</h6>
                            <input id="op7" class="form-control" type="textF" name="op7_producto" value="">
                        </div>

                    </div>

                    <div class="cantidad col-12 pb-4 d-flex justify-content-between font-size-0.7">
                        <div class=" mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 1</h5> <input class="form-control" name="q1_producto" type="text" placeholder="0.00" required>
                        </div>
                        <div class=" mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 2</h5> <input class="form-control" name="q2_producto" type="text" placeholder="0.00">
                        </div>
                        <div class="mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 3</h5> <input class="form-control" name="q3_producto" type="text" placeholder="0.00">
                        </div>
                        <div class="  mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 4</h5>
                            <input class="form-control" name="q4_producto" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 5</h5>
                            <input class="form-control" name="q5_producto" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 6</h5>
                            <input class="form-control" name="q6_producto" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h5 class="col-form-label font-poppins">Cantidad 7</h5>
                            <input class="form-control" name="q7_producto" type="text" placeholder="0.00">
                        </div>
                    </div>

                    <div class="cantidad col-12 pb-4 d-flex justify-content-between font-size-0.7">
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 1</h6> <input class="form-control" name="precio_producto1" type="text" placeholder="0.00" required>

                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 2</h6> <input class="form-control" name="precio_producto2" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 3</h6> <input class="form-control" name="precio_producto3" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 4</h6>
                            <input class="form-control" name="precio_producto4" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 5</h6>
                            <input class="form-control" name="precio_producto5" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 6</h6>
                            <input class="form-control" name="precio_producto6" type="text" placeholder="0.00">
                        </div>
                        <div class=" text-center mx-3">
                            <h6 class="col-form-label font-poppins">Precio 7</h6>
                            <input class="form-control" name="precio_producto7" type="text" placeholder="0.00">
                        </div>
                    </div>

            

                    <div class="form-group text-start">
                        <h6 class="col-form-label">Tamaño</h6>
                        <input class="form-control" name="size_producto" type="text" placeholder="" >
                    </div>

                    <div class="form-group text-start">
                        <h6 class="col-form-label">Peso</h6>
                        <input class="form-control" name="proveedor_producto" type="text" placeholder="">
                    </div>


                    <input type="submit" name="accion" class="btn btn-success my-4" value="Registrar">
                    <a href="dashboard.php" class="btn btn-danger my-4" role="buttton">Cancelar</a>

                </form>
            </div>
        </div>
    </div>
</section>