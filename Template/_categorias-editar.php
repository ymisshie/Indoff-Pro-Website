<?php

require '../../vendor/autoload.php';
$categoria = new ameri\Categoria;

$info_categoria = $categoria->mostrar();


$cantidad = count($info_categoria);

?>

<!--categorias-->
<section id="categorias">
    <div class="container-fluid pb-5">

        <div class="row justify-content-center">
            <div class="col-12">


                <h2 class="section-title pt-5 text-center"> <?php
                                                            print $cantidad;

                                                            if ($cantidad == 1) {

                                                                print ' Categoria registrada';
                                                            } else {
                                                                print ' Categorias registradas';
                                                            }

                                                            ?>
                </h2>
            </div>
            <div class="py-3 text-center">
                <a class="btn btn-primary " href="form-registrar-c.php" role="button">Agregar nuevo <i class="fas fa-plus ms-2 me-1"></i></a>
            </div>
        </div>

        <div class="justify-content-center table-responsive">
            <table class="table table-hover my-4">
                <thead>
                    <tr class="text-center color-purple-bg color-white">
                        <th scope="col">ID</th>
                        <th scope="col">Orden</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <?php

                    if ($cantidad > 0) {
                        $c = 0;
                        for ($x = 0; $x < $cantidad; $x++) {
                            $c++;
                            $item = $info_categoria[$x];
                    ?>

                            <tr class="text-center align-items-center">
                                <td scope="col" class="fw-600"><?php print $c  ?></td>
                                <td>

                                    <select id="orden_categorias" name="orden_categorias">
                                        <option value="1" disabled="disabled" <?php if ($item['orden'] == 1) print "selected" ?>> 1 </option>
                                        <option value="2" disabled="disabled" <?php if ($item['orden'] == 2) print "selected" ?>>2</option>
                                        <option value="3" disabled="disabled" <?php if ($item['orden'] == 3) print "selected" ?>>3</option>
                                        <option value="4" disabled="disabled" <?php if ($item['orden'] == 4) print "selected" ?>> 4 </option>
                                        <option value="5" disabled="disabled" <?php if ($item['orden'] == 5) print "selected" ?>> 5 </option>
                                        <option value="6" disabled="disabled" <?php if ($item['orden'] == 6) print "selected" ?>> 6 </option>
                                        <option value="7" disabled="disabled" <?php if ($item['orden'] > 6) print "selected" ?>> x </option>
                                    </select>

                                </td>
                                <td scope="col" class="text-center">
                                    <?php
                                    $imagen = '../../upload/Categorias/' . $item['imagen'];
                                    if (file_exists($imagen)) {
                                    ?>
                                        <img src="<?php print $imagen; ?>" height="100px">

                                    <?php } else { ?>
                                        Sin imagen
                                    <?php } ?>
                                </td>
                                <td scope="col" class="fw-600"><?php print $item['nombre'] ?>
                                    <br>
                                    <a href="../productos/index.php?id=<?php print $item['id'] ?>" class="btn btn-sm btn-secondary my-2" role="button">Ver productos</a>
                                </td>
                                <td scope="col" class="text-start fs-07"><?php print $item['descripcion'] ?></td>
                                <td scope="col"><?php print $item['fecha'] ?></td>
                                <td scope="col" class="text-center">
                                    <a href="form-actualizar-c.php?id=<?php print $item['id'] ?>" class="btn-secondary btn btn-sm mx-3 my-4 color-purple-bg " role="button">Editar<i class="far fa-edit ms-lg-2 me-lg-1"></i></a>
                                    <a href="../acciones_c.php?id=<?php print $item['id'] ?>" class="btn-primary btn btn-sm my-4" role="button">Eliminar<i class="far fa-trash-alt ms-lg-2 me-lg-1"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7" class="">
                                <div class="text-center py-2">
                                    <i class="text-center display-1 fa-solid fa-folder-open"></i>
                                    <p class="fw-00 py-2 mb-0">No hay categorias registradas todavia</p>
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


<script>

</script>
<!--!categorias-->