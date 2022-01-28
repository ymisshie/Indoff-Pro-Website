<!--eventos-->
<section id="eventos">
    <div class="container-fluid">

        <!-- <div class="row eventos-chart color-black-bg text-white"> -->
        <div class="row color-black-bg text-white">

            <?php
                require 'vendor/autoload.php';
                $evento = new ameri\Evento;
                $info_evento = $evento->mostrar();
                $cantidad = count($info_evento);

                if($cantidad > 0)
                {
                    for($x =0; $x < $cantidad; $x++)
                    {
                    $item = $info_evento[$x];
            ?>
            <div class="col-6 evento1 align-self-center mb-3 mt-5">
                <!-- <div class="col-4 mx-auto">
                    <h5 class="etiqueta1">Evento destacado</h5>
                </div> -->

                <div class="col-6 mx-auto text-center">
                    <h2 class="section-subtitle"><?php print $item['nombre']?></h2>
                    <?php 
                            $imagen='upload/' .$item['imagen'];
                            if(file_exists($imagen)){
                            ?>
                    
                            <img src="<?php print $imagen;?>" class="card-img-top mt-3 mb-3"  style="height: 11em; object-fit:contain" alt="...">

                            <?php } else {?>
                                Sin imagen
                            <?php }?>
                    <p class="section-description"><?php print $item['descripcion']?>
                    </p>
                    <a class="btn btn-secondary" href="producto_evento.php?id=<?php print $item['id']?>" role="button">Ver productos</a>
                </div>
            </div>
            <!-- <div class="col-6 evento1 align-self-center">
                <div class="col-4 mx-auto">
                    <h5 class="etiqueta1">Evento destacado</h5>
                </div>

                <div class="col-6 mx-auto text-center">
                    <h2 class="section-subtitle">Evento</h2>
                    <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus,
                        enim.
                    </p>
                    <a class="btn btn-secondary" href="#" role="button">Ver productos</a>
                </div>
            </div>

            <div class="col-6 evento1 align-self-center">
                <div class="col-4 mx-auto">
                    <h5 class="etiqueta2 color-white-bg">Próximo evento</h5>
                </div>

                <div class="col-6 mx-auto text-center">
                    <h2 class="section-subtitle">Evento</h2>
                    <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus,
                        enim.
                    </p>
                    <a class="btn btn-secondary-w" href="#" role="button">Ver productos</a>
                </div>
            </div> -->
            <?php }
            }else{?>
              <h4>NO HAY REGISTROS</h4>

          <?php }?>
        </div>

    </div>
    </div>
</section>
<!--!eventos-->