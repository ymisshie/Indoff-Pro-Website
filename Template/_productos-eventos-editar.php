<?php
require '../../vendor/autoload.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $producto_evento = new ameri\Producto_Evento;
    $evento = new ameri\Evento;

    $info_producto_evento = $producto_evento->mostrar();
    $info_evento = $evento->mostrarPorId($id);


    if (!$info_producto_evento && $info_evento)
        header('Location: index.php');
} else {
    header('Location: index.php');
} 
?>


<!--productos-eventos-->
<section id="eventos" class="eventos-section">
    <div class="container">

        <div class="row justify-content-center eventos1">

            <h2 class="section-title m-0 mt-5 mb-3"><?php print $info_evento['nombre']?> actuales</h2>
            <div class="text-center mb-3">
                <a class="btn btn-primary" href="form-registrar-pe.php" role="button">Agregar nuevo</a>
            </div>

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col-2">ID</th>
                        <th scope="col-3">Nombre</th>
                        <th scope="col-3">Descripción</th>
                        <th scope="col-3">Proveedor</th>
                        <th scope="col-3">Imagen</th>
                        <th scope="col-3">Fecha</th>
                        <th scope="col-3">1</th>
                        <th scope="col-3">2</th>
                        <th scope="col-3">3</th>
                        <th scope="col-3">4</th>
                        <th scope="col-3">5</th>
                        <th scope="col-3">6</th>
                        <th scope="col-3">7</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                    $cantidad_categorias = count($info_categoria);

                    if ($cantidad_categorias > 0) {
                        //$cont_categorias=0;

                        $c = 1;
                        foreach ($info_producto as $item_producto) {
                            if ($id == $item_producto['id']) 
                            {
                    ?>

                                <tr class="text-center">
                                    <td scope="col"><?php print $c ?></td>
                                    <td scope="col"><?php print $item_producto['nombre'] ?></td>
                                    <td scope="col"><?php print $item_producto['descripcion'] ?></td>
                                    <td scope="col"><?php print $item_producto['proveedor'] ?></td>
                                    <td scope="col" class="text-center">
                                        <?php
                                        $imagen = 'upload/' . $item_producto['imagen'];
                                        if (file_exists($imagen)) {
                                        ?>
                                            <img src="<?php print $imagen; ?>" width="100">

                                        <?php
                                        } else { ?>
                                            Sin imagen
                                        <?php } ?>


                                        <!--  <td scope="col"><?php //print $item['categoria_id']
                                                                ?></td> -->
                                    <td scope="col"><?php print $item_producto['fecha'] ?></td>

                                    <?php
                                    if ($item_producto['op1'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto['op1'] ?> <br> <?php print $item_producto['q1'] ?>, <?php print $item_producto['precio1'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>

                                    <?php
                                    if ($item_producto['op2'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto['op2'] ?> <br> <?php print $item_producto['q2'] ?>, <?php print $item_producto['precio2'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>

                                    <?php
                                    if ($item_producto['op3'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto['op3'] ?> <br> <?php print $item_producto['q3'] ?>, <?php print $item_producto['precio3'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>

                                    <?php
                                    if ($item_producto['op4'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto['op4'] ?> <br> <?php print $item_producto['q4'] ?>, <?php print $item_producto['precio4'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>
                            
                                    <?php
                                    if ($item_producto['op5'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto['op5'] ?> <br> <?php print $item_producto['q5'] ?>, <?php print $item_producto['precio5'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>

                                    <?php
                                    if ($item_producto['op6'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto['op6'] ?> <br> <?php print $item_producto['q6'] ?>, <?php print $item_producto['precio6'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>

                                    <?php
                                    if ($item_producto['op7'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto['op7'] ?> <br> <?php print $item_producto['q7'] ?>, <?php print $item_producto['precio7'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>
                               
                                    <td class="col text-center">
                                        <a href="acciones_p.php?id=<?php print $item_producto[0] ?>" class="btn-danger btn-sm" role="button">Eliminar</a>
                                        <a href="form-actualizar-p.php?id=<?php print $item_producto[0] ?>" class="btn-success btn-sm" role="button">Editar</a>
                                    </td>
                                </tr>
                        <?php

                                $c++;
                            }
                        }
                    } 
                else {
                        ?>
                        <tr>
                            <td colspan="13">
                                NO HAY REGISTROS
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
<!--!productos eventos-->