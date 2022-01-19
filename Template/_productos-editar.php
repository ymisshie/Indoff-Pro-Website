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

        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="section-title pt-lg-5 text-center">Categorias actuales</h2>
            </div>
            <div class="col-lg-4 py-lg-3 text-center">
                <a class="btn btn-primary " href="form-registrar-p.php" role="button">Agregar nuevo <i class="fas fa-plus ms-lg-2 me-lg-1"></i></a>
            </div>
        </div>

        <div class="row justify-content-center">

            <table class="table table-hover my-lg-4">
                <thead>
                    <tr class="text-center color-red-bg color-white">
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
                        <th scope="col" class="col-2">Nombre</th>
                        <th scope="col" class="col-2">Descripción</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Opciones</th>
                        <th scope="col">Colores</th>
                        <th scope="col">Peso y tamaño</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    <?php

                    $cantidad_categorias = count($info_categoria);

                    if ($cantidad_categorias > 0) {
                        //$cont_categorias=0;

                        $c = 1;
                        foreach ($info_producto as $item_producto) {
                            if ($id == $item_producto['id']) {
                    ?>

                                <tr class="text-center">
                                    <td scope="col" class="fw-600"><?php print $c ?></td>
                                    <td scope="col" class="text-center">
                                        <?php
                                        $imagen = 'upload/' . $item_producto['imagen'];
                                        if (file_exists($imagen)) {
                                        ?>
                                            <img src="<?php print $imagen; ?>" height="100px">

                                        <?php
                                        } else { ?>
                                            Sin imagen
                                        <?php } ?>

                                    </td>
                                    <td scope="col" class="fw-600"><?php print $item_producto['nombre'] ?>
                                        <br>
                                        <p class="fw-400 py-lg-1"> <?php print $item_producto['proveedor'] ?></p>
                                        <a href="form-actualizar-p.php?id=<?php print $item_producto[0] ?>" class="btn-secondary btn btn-sm mx-lg-3 my-lg-4" role="button">Editar<i class="far fa-edit ms-lg-2 me-lg-1"></i></a>
                                    </td>
                                    <td scope="col" class="fs-07 text-start"><?php print $item_producto['descripcion'] ?></td>
                                    <td scope="col"><?php print $item_producto['fecha'] ?></td>

                                    <td scope="col"><?php print $item_producto['fecha'] ?></td>
                                    <td scope="col"><?php print $item_producto['fecha'] ?></td>

                                    <td scope="col"><?php print $item_producto['fecha'] ?></td>

                                    <td class="col text-center">
                                        <a href="acciones_p.php?id=<?php print $item_producto[0] ?>" class="btn-primary btn btn-sm my-lg-5" role="button">Eliminar<i class="far fa-trash-alt ms-lg-2 me-lg-1"></i></a>
                                    </td>
                                </tr>
                        <?php

                                $c++;
                            }
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="9">
                                Sin registros
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