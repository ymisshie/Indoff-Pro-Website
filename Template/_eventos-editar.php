<?php

require '../../vendor/autoload.php';
$evento = new ameri\Evento;

$info_evento = $evento->mostrar();

$cantidad = count($info_evento);

?>




<!--categorias-->
<section id="categorias">
    <div class="container-fluid px-md-5">

        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="section-title pt-md-5 text-center"><?php
                                                                print $cantidad;

                                                                if ($cantidad == 1) {

                                                                    print ' Evento registrada';
                                                                } else {
                                                                    print ' Eventos registradas';
                                                                }

                                                                ?></h2>
            </div>
            <div class="col-md-4 py-md-3 py-lg-3 text-center">
                <a class="btn btn-primary " href="form-registrar-e.php" role="button">Agregar nuevo <i class="fas fa-plus ms-lg-2 me-lg-1"></i></a>
            </div>
        </div>

        <div class="row justify-content-center">
            <table class="table table-hover my-md-4">
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

                    if ($cantidad > 0) {
                        $c = 0;
                        for ($x = 0; $x < $cantidad; $x++) {
                            $c++;
                            $item = $info_evento[$x];
                    ?>

                            <tr class="text-center align-items-center">
                                <td scope="col" class="fw-600"><?php print $c  ?></td>
                                <td scope="col" class="text-center">
                                    <?php
                                    $imagen = '../../upload/' . $item['imagen'];
                                    if (file_exists($imagen)) {
                                    ?>
                                        <img src="<?php print $imagen; ?>" height="100px">

                                    <?php } else { ?>
                                        Sin imagen
                                    <?php } ?>
                                </td>
                                <td scope="col" class="fw-600"><?php print $item['nombre'] ?>
                                    <br>
                                    <a href="../productos-eventos/index.php?id=<?php print $item['id'] ?>" class="btn btn-sm btn-secondary my-md-2" role="button">Ver productos</a>
                                </td>
                                <td scope="col" class="text-start fs-07"><?php print $item['descripcion'] ?></td>
                                <td scope="col"><?php print $item['fecha'] ?></td>
                                <td scope="col" class="text-center">
                                    <a href="form-editar-e.php?id=<?php print $item['id'] ?>" class="btn-secondary btn btn-sm mx-lg-3 my-lg-4 my-md-3 color-purple-bg " role="button">Editar<i class="far fa-edit ms-lg-2 me-lg-1"></i></a>
                                    <a href="../acciones-e.php?id=<?php print $item['id'] ?>" class="btn-primary btn btn-sm my-lg-4" role="button">Eliminar<i class="far fa-trash-alt ms-lg-2 me-lg-1"></i></a>
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