<?php
require '../../vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];


    $producto = new ameri\Producto;
    $categoria = new ameri\Categoria;

    $info_producto = $producto->mostrar();
    $info_categoria = $categoria->mostrarPorId($id);

    $cantidad_productos = 0;

    //para ver cuantos productos corresponden a la categoria
    foreach ($info_producto as $productos) {

        if ($productos['id'] == $info_categoria['id']) {
            $cantidad_productos++;
        }
    }
}


?>

<!--categorias-->
<section id="categorias" class="categorias-section">
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="section-title pt-5 text-center">

                    <?php
                    print $cantidad_productos;

                    if ($cantidad_productos == 1) {

                        print ' Producto registrado en ';
                    } else {
                        print ' Productos registrados en ';
                    }

                    print $info_categoria['nombre'];
                    
                    ?>
                </h2>
            </div>
            <div class="py-3 text-center">
                <a class="btn btn-primary" href="form-registrar-p.php?id=<?php print $info_categoria['id'] ?>" role="button">Agregar nuevo <i class="fas fa-plus ms-md-2 me-md-1"></i></a>
            </div>
        </div>

        <div class="justify-content-center table-responsive">
            <table class="col-md-3 table table-hover my-4">
                <thead>
                    <tr class="text-center color-aqua-bg color-white">
                        <th scope="col" class="col-md-1 col-lg-1">ID</th>
                        <th scope="col" class="col-md-1 col-lg-1">Orden</th>
                        <th scope="col" class="col-md-1 col-lg-1">Imagen</th>
                        <th scope="col" class="col-md-1 col-lg-1">Información</th>

                        <!--
                        <th scope="col" class="col-md-1 col-lg-1">Variaciones</th>
                -->
                        <th scope="col" class="col-md-1 col-lg-1">Cant. y costo</th>
                        <th scope="col" class="col-md-1 col-lg-1">Colores</th>
                        <th scope="col" class="col-md-1 col-lg-1">Peso y tamaño</th>
                        <th scope="col" class="col-md-1 col-lg-1">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <?php


                    if ($cantidad_productos > 0) {
                        //$cont_categorias=0;

                        $c = 1;
                        foreach ($info_producto as $item_producto) {
                            if ($id == $item_producto['id']) {
                    ?>

                                <tr class="text-center">
                                    <td scope="col" class="fw-600"><?php print $c ?></td>
                                    <td>

                                        <select id="orden_productos" name="orden_productos" disabled>
                                            <option value="1" <?php if ($item_producto['orden'] == 1) print "selected" ?>> 1 </option>
                                            <option value="2" <?php if ($item_producto['orden'] == 2) print "selected" ?>>2</option>
                                            <option value="3" <?php if ($item_producto['orden'] == 3) print "selected" ?>>3</option>
                                            <option value="4" <?php if ($item_producto['orden'] == 4) print "selected" ?>> 4 </option>
                                            <option value="5" <?php if ($item_producto['orden'] == 5) print "selected" ?>> 5 </option>
                                            <option value="6" <?php if ($item_producto['orden'] == 6) print "selected" ?>> 6 </option>
                                            <option value="7" <?php if ($item_producto['orden'] > 6) print "selected" ?>> No mostrar </option>
                                        </select>
                                        <a href="form-actualizar-c.php?id=<?php print $item['id'] ?>" class="btn-link ss color-purple ps-2">Cambiar</a>
                                    </td>

                                    <td scope="col" class="text-center">
                                        <?php
                                        $imagen = '../../upload/Productos/' . $item_producto['imagen'];
                                        if (file_exists($imagen)) {
                                        ?>
                                            <img src="<?php print $imagen; ?>" width="100px">

                                        <?php
                                        } else { ?>
                                            Sin imagen
                                        <?php } ?>

                                    </td>

                                    <td scope="col" class="fw-700"><?php print $item_producto['nombre'] ?>
                                        <br>
                                        <p class="fw-500 pt-1"> <?php print $item_producto['proveedor'] ?></p>

                                        <a href="form-actualizar-p.php?id=<?php print $item_producto[0] ?>" class="btn-secondary btn btn-sm mx-3 mb-4" role="button">Editar<i class="far fa-edit ms-md-2 me-md-1"></i></a>

                                        <p class="fw-400 fs-09 "><?php print $item_producto['descripcion'] ?></p>


                                    </td>





                                    <td scope="col" class="fs-09 text-start">

                                        <?php

                                        $cantidad = $item_producto['cantidad'];
                                        $costo = $item_producto['precio'];
                                        $separada_cantidad = '';
                                        $separada_costo = '';
                                        $separador = ",";
                                        $separada_cantidad = explode($separador, $cantidad);
                                        $separada_costo = explode($separador, $costo);

                                        $count_cantidad = count($separada_cantidad);
                                        $count_costo = count($separada_costo);

                                        for ($ca = 0; $ca < $count_cantidad; $ca++) {

                                        ?>

                                            <div class="text-center"><?php

                                                                        if ($separada_cantidad[$ca] == "") {
                                                                        } else {
                                                                            print $separada_cantidad[$ca];
                                                                            if ($separada_cantidad[$ca] == 1) {
                                                                                print ' pieza, a $';
                                                                            } elseif ($separada_cantidad[$ca] > 1) {
                                                                                print ' piezas, a $';
                                                                            }
                                                                            print $separada_costo[$ca];
                                                                        }
                                                                        ?>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </td>

                                    <td scope="col" class="fs-07 text-start">

                                        <div class="d-flex justify-content-center">


                                            <?php

                                            $colores = $item_producto['color'];
                                            $separada = '';
                                            $separador = ",";
                                            $separada = explode($separador, $colores);

                                            $count_colores = count($separada);

                                            for ($u = 0; $u < $count_colores; $u++) {
                                            ?>

                                                <div class="col-1 p-3 rounded-circle mx-1 my-1" style="background-color: <?php print $separada[$u]; ?>;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print $separada[$u]; ?>">


                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>


                                    </td>

                                    <td scope="col" class="fs-09">
                                        <?php

                                        if ($item_producto['size'] == '' && $item_producto['peso'] == '') {
                                            print 'No hay tamaño ni peso registrado.';
                                        } else if ($item_producto['size'] != '' && $item_producto['size'] != '') {
                                            print $item_producto['size'];
                                            print ', ';
                                            print $item_producto['peso'];
                                        } else if ($item_producto['size'] == '') {
                                            print 'No hay tamaño registrado.';
                                        } else if ($item_producto['peso'] == '') {
                                            print 'No hay peso registrado.';
                                        }


                                        ?>
                                    </td>



                                    <td class="col text-center">
                                        <a href="../acciones_p.php?id=<?php print $item_producto[0] ?>" class="btn-primary btn btn-sm my-md-1" role="button">Eliminar<i class="far fa-trash-alt ms-md-2 me-md-1"></i></a>
                                    </td>
                                </tr>
                        <?php

                                $c++;
                            }
                        }
                    } else if ($cantidad_productos == 0) {
                        ?>
                        <tr>
                            <td colspan="8" class="">
                                <div class="text-center py-2">
                                    <i class="text-center display-1 fa-solid fa-folder-open"></i>
                                    <p class="fw-00 py-2 mb-0">No hay productos registradas todavia</p>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>

</section>
<!--!categorias-->