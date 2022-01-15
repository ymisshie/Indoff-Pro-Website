
<!--categorias-->
<section id="categorias" class="categorias-section">
    <div class="container">

        <div class="row justify-content-center categorias1">
            <h2 class="section-title py-5">Buscar por Categoria</h2>

                            <?php
                            require 'vendor/autoload.php';
                            $categoria = new ameri\Categoria;
                            $info_categoria = $categoria->mostrar();
                            $cantidad = count($info_categoria);

                            if($cantidad > 0)
                            {
                              for($x =0; $x < $cantidad; $x++)
                              {
                                $item = $info_categoria[$x];
                          ?>
                          <div class="col-3 mx-4">
                <a class="card categorias" href="categorias.php?id=<?php print $item['id']?>">
                    

                    <?php 
                            $imagen='upload/' .$item['imagen'];
                            if(file_exists($imagen)){
                            ?>
                    
                            <img src="<?php print $imagen;?>" class="card-img-top" style="height: 11em;" alt="...">

                            <?php } else {?>
                                Sin imagen
                            <?php }?>

                    <div class="card-body">
                        <h5 class="card-title"><?php print $item['nombre']?></h5>
                        <p class="card-text"><?php print $item['descripcion']?></p>
                    </div>
                </a>
            </div>
            <?php }
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?>
              
        </div>
<!--
        <div class="row justify-content-center categorias2">

            <div class="col-3 mx-4">
                <a class="card categorias" href="categorias.php">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Categoria</h5>
                        <p class="card-text">Descripcion de categoria 1.</p>
                    </div>
                </a>
            </div>

            <div class="col-3 mx-4">
                <a class="card categorias" href="categorias.php">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Categoria</h5>
                        <p class="card-text">Descripcion de categoria 1.</p>
                    </div>
                </a>
            </div>

            <div class="col-3 mx-4">
                <a class="card categorias" href="categorias.php">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Categoria</h5>
                        <p class="card-text">Descripcion de categoria 1.</p>
                    </div>
                </a>
            </div>

        </div>
            -->
    </div>
    </div>

</section>
<!--!categorias-->