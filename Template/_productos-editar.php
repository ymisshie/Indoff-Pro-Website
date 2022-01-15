<?php
require 'vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];


    $producto = new ameri\Producto;
    $categoria = new ameri\Categoria;

    $info_producto = $producto->mostrar();
    $info_categoria = $categoria->mostrarPorId($id);

    
    /*
 print '<pre>';
 print_r ($info_categoria);

die;
*/

    /*
 print '<pre>';
 print_r($info_producto);
*/

    /*
    foreach ($info_producto as $productos) {
        //if ($resultadop['categoria_id']=$resultadoc['id'])
        print '<pre>';
        print_r($productos);
    }
*/

    if (!$info_producto && $info_categoria)
        header('Location: index.php');
} else {
    header('Location: index.php');
}


/*
foreach ($info_producto as $productos) {
    //if ($resultadop['categoria_id']=$resultadoc['id'])
    print '<pre>';
    print $productos[5];
    print $productos['0'];
}
*/

/*
 print '<pre>';

 if($resultadop['categoria_id'] ==$id)
 {
     print $resultadop;
 }
 die;
 */

?>

<!--categorias-->
<section id="categorias" class="categorias-section">
    <div class="container">

        <div class="row justify-content-center categorias1">

            <h2 class="section-title m-0 mt-5 mb-3"><?php print $info_categoria['nombre']?> actuales</h2>
            <div class="text-center mb-3">
                <a class="btn btn-primary" href="form-registrar-p.php" role="button">Agregar nuevo</a>
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
<!--!categorias-->