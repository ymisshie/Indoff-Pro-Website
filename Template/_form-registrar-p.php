<section>
    <div class="container" id="form-registro-p">
        <div class="row justify-content-center">
            <h2 class="section-title pt-lg-5 text-center">Añadir categoria</h2>

            <!--
            <div class="col-lg-4 py-lg-3 text-center">
                <a class="btn btn-primary " href="dashboard.php" role="button">Regresar <i class="fas fa-undo ms-lg-2 me-lg-1"></i></a>
            </div>
-->
        </div>

        <div class="row justify-content-center">
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
                        <input id="qty1" class="qty-dropdown" type="number" name="qtyS" value="0" required>
                    </div>




                    <div class="form-group text-start">
                        <h6 class="col-form-label">Tamaño</h6>
                        <input class="form-control" name="size_producto" type="text" placeholder="">
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