<!--categorias-->
<section id="categorias">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="section-title pt-lg-5 text-center">Categorias actuales</h2>
            </div>
            <div class="col-lg-4 py-lg-3 text-center">
                <a class="btn btn-primary " href="form-registrar-c.php" role="button">Agregar nuevo <i class="fas fa-plus ms-lg-2 me-lg-1"></i></a>
            </div>
        </div>

        <div class="row justify-content-center">
            <table class="table  table-hover my-lg-4">
                <thead>
                    <tr class="text-center color-red-bg color-white">
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <?php

                    require 'vendor/autoload.php';
                    $categoria = new ameri\Categoria;

                    $info_categoria = $categoria->mostrar();

                    /*
                print '<pre>';
                print_r($info_producto);
                
                die;
                */

                    $cantidad = count($info_categoria);

                    if ($cantidad > 0) {
                        $c = 0;
                        for ($x = 0; $x < $cantidad; $x++) {
                            $c++;
                            $item = $info_categoria[$x];
                    ?>

                            <tr class="text-center align-items-center">
                                <td scope="col" class="fw-600"><?php print $c  ?></td>
                                <td scope="col" class="text-center">
                                    <?php
                                    $imagen = 'upload/' . $item['imagen'];
                                    if (file_exists($imagen)) {
                                    ?>
                                        <img src="<?php print $imagen; ?>" height="100px">

                                    <?php } else { ?>
                                        Sin imagen
                                    <?php } ?>
                                </td>
                                <td scope="col" class="fw-600"><?php print $item['nombre'] ?>
                                    <br>
                                    <a href="productos-dashboard.php?id=<?php print $item['id'] ?>" class="btn btn-sm btn-secondary my-lg-2" role="button">Ver productos</a>
                                </td>
                                <td scope="col" class="text-start fs-07"><?php print $item['descripcion'] ?></td>
                                <td scope="col"><?php print $item['fecha'] ?></td>
                                <td scope="col" class="text-center">
                                    <a href="form-actualizar-c.php?id=<?php print $item['id'] ?>" class="btn-secondary btn btn-sm mx-lg-3 my-lg-4" role="button">Editar<i class="far fa-edit ms-lg-2 me-lg-1"></i></a>
                                    <a href="acciones_c.php?id=<?php print $item['id'] ?>" class="btn-primary btn btn-sm my-lg-4" role="button">Eliminar<i class="far fa-trash-alt ms-lg-2 me-lg-1"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="6">
                                Sin registro
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