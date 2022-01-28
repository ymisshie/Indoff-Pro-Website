<?php
require '../../vendor/autoload.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $producto_evento = new ameri\Producto_Evento;
    $evento = new ameri\Evento;

    $info_producto_evento = $producto_evento->mostrar();
    $info_evento = $evento->mostrarPorId($id);
    // print_r($info_evento);
    //print_r($info_producto_evento);


    if (!$info_producto_evento && $info_evento)
        header('Location: index.php');
} 
else {
    header('Location: index.php');
} 
?>

<!-- ?php
$id = $_GET['id'];

    $producto_evento = new ameri\Producto_Evento;
    $evento = new ameri\Evento;

    $info_producto_evento = $producto_evento->mostrar();
    $info_evento = $evento->mostrarPorId($id);
?> -->

<!--productos-eventos-->
<section id="eventos" class="eventos-section">
    <div class="container">

        <div class="row justify-content-center eventos1">
            <h2 class="section-title m-0 mt-5 mb-3"><?php print $info_evento['nombre']?> actuales</h2>
            <div class="text-center mb-3">
                <a class="btn btn-primary" href="form-registrar-pe.php?id=<?php print $info_evento['id']?>" role="button">Agregar nuevo</a>
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

                    $cantidad_eventos = count($info_evento);

                    if ($cantidad_eventos > 0) {
                        //$cont_categorias=0;

                        $c = 1;
                        foreach ($info_producto_evento as $item_producto_evento) {
                            if ($id == $item_producto_evento['evento_id']) 
                            { //print_r($id);
                                //print_r($item_producto_evento);
                    ?>

                                <tr class="text-center">
                                    <td scope="col"><?php print $c ?></td>
                                    <td scope="col"><?php print $item_producto_evento['nombre'] ?></td>
                                    <td scope="col"><?php print $item_producto_evento['descripcion'] ?></td>
                                    <td scope="col"><?php print $item_producto_evento['proveedor'] ?></td>
                                    <td scope="col" class="text-center">
                                        <?php
                                        $imagen = '../../upload/' . $item_producto_evento['imagen'];
                                        if (file_exists($imagen)) {
                                        ?>
                                            <img src="<?php print $imagen; ?>" width="100">

                                        <?php
                                        } else { ?>
                                            Sin imagen
                                        <?php } ?>


                                        <!--  <td scope="col"><?php //print $item['categoria_id']
                                                                ?></td> -->
                                    <td scope="col"><?php print $item_producto_evento['fecha'] ?></td>

                                    <?php
                                    if ($item_producto_evento['op1'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto_evento['op1'] ?> <br> <?php print $item_producto_evento['q1'] ?>, <?php print $item_producto_evento['precio1'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>

                                    <?php
                                    if ($item_producto_evento['op2'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto_evento['op2'] ?> <br> <?php print $item_producto_evento['q2'] ?>, <?php print $item_producto_evento['precio2'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>

                                    <?php
                                    if ($item_producto_evento['op3'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto_evento['op3'] ?> <br> <?php print $item_producto_evento['q3'] ?>, <?php print $item_producto_evento['precio3'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>

                                    <?php
                                    if ($item_producto_evento['op4'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto_evento['op4'] ?> <br> <?php print $item_producto_evento['q4'] ?>, <?php print $item_producto_evento['precio4'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>
                            
                                    <?php
                                    if ($item_producto_evento['op5'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto_evento['op5'] ?> <br> <?php print $item_producto_evento['q5'] ?>, <?php print $item_producto_evento['precio5'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>

                                    <?php
                                    if ($item_producto_evento['op6'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto_evento['op6'] ?> <br> <?php print $item_producto_evento['q6'] ?>, <?php print $item_producto_evento['precio6'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>

                                    <?php
                                    if ($item_producto_evento['op7'] != '') 
                                    {
                                    ?>
                                        <td scope="col"><?php print $item_producto_evento['op7'] ?> <br> <?php print $item_producto_evento['q7'] ?>, <?php print $item_producto_evento['precio7'] ?></td>
                                    <?php
                                    } 
                                    else 
                                    {
                                    ?>
                                        <td scope="col">No hay registro</td>
                                    <?php } ?>
                               
                                    <td class="col text-center">
                                        <a href="../acciones-pe.php?id=<?php print $item_producto_evento[0] ?>" class="btn-danger btn-sm" role="button">Eliminar</a>
                                        <a href="form-editar-pe.php?id=<?php print $item_producto_evento[0] ?>" class="btn-success btn-sm" role="button">Editar</a>
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