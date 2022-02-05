<!--categorias-->
<section id="categorias" class="categorias-section">
    <div class="container">

        <div class="row justify-content-center text-center categorias-fichas">
            <h2 class="section-title py-md-5">Encontrar por Categoria</h2>

            <?php
            require 'vendor/autoload.php';
            $categoria = new ameri\Categoria;
            $info_categoria = $categoria->mostrar();
            $cantidad = count($info_categoria);

            if ($cantidad > 0) {
                for ($x = 0; $x < $cantidad; $x++) {
                    $item = $info_categoria[$x];
            ?>
                    <div class="col-lg-3 col-md-6 px-md-3 mx-lg-5">
                        <a class="card categorias mb-md-5" href="categorias.php?id=<?php print $item['id'] ?>">


                            <?php
                            $imagen = 'upload/' . $item['imagen'];
                            if (file_exists($imagen)) {
                            ?>

                                <img src="<?php print $imagen; ?>" class="card-img-top" style="height: 11em;" alt="...">

                            <?php } else { ?>
                                Sin imagen
                            <?php } ?>

                            <div class="card-body">
                                <h5 class="fw-700"><?php print $item['nombre'] ?></h5>
                                <p class="fw-500 m-lg-0"><?php print $item['descripcion'] ?></p>
                            </div>
                        </a>
                    </div>
                <?php }
            } else { ?>
                <h4>NO HAY REGISTROS</h4>

            <?php } ?>

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