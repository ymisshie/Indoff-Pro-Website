<!--categorias-->
<section id="categorias">
    <div class="container">

        <div class="row justify-content-center">
            
            <h2 class="section-title m-0 mt-5 mb-3">Categorias actuales</h2>
            <div class="text-center mb-3">
                <a class="btn btn-primary" href="form-registrar-c.php" role="button">Nuevo</a>
            </div>

            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th scope="col-2">#</th>
                        <th scope="col-3">Nombre</th>
                        <th scope="col-3">Descripción</th>
                        <th scope="col-3">Imagen</th>
                        <th scope="col-3">Fecha</th>
                    </tr>
                </thead>
                
                <tbody>

                <?php
                
                require 'vendor/autoload.php';
                $categoria = new ameri\Categoria;

                $info_categoria=$categoria->mostrar();

                /*
                print '<pre>';
                print_r($info_producto);
                
                die;
                */

                $cantidad=count($info_categoria);

                if($cantidad>0){
                    $c=0;
                    for($x =0; $x<$cantidad; $x++){
                        $c++;
                        $item= $info_categoria[$x];
                ?>

        <tr class="text-center">

                        <td scope="col"><?php print $c ?></td>
                        <td scope="col"><?php print $item['nombre'] ?></td>
                        <td scope="col"><?php print $item['descripcion'] ?></td>
                        <td scope="col" class="text-center">
                            <?php 
                            $imagen='upload/' .$item['imagen'];
                            if(file_exists($imagen)){
                            ?>
                            <img src="<?php print $imagen;?>" width="100">

                            <?php } else {?>
                                Sin imagen
                            <?php }?>
                        <td scope="col"><?php print $item['fecha'] ?></td>
                        <td class="col-3 text-center">
                            <a href="acciones_c.php?id=<?php print $item['id']?>" class="btn-danger btn-sm" role="button">Eliminar</a>
                            <a href="form-actualizar-c.php?id=<?php print $item['id']?>" class="btn-success btn-sm" role="button">Editar</a>
                            <a href="form-productos-dashboard.php" class="btn-warning btn-sm text_white" role="button">Ver productos</a>
                        </td>
                        </tr>
                                  <?php
                    }
                }else{
                ?>
 <tr>
                        <td colspan="5">
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