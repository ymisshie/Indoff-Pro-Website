<section class="fondo1">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5 align-self-center p-5">
                <div class="px-lg-2 py-4">
                    <h1 class="fw-800 color-red">Promocione su marca con Indoff Pro</h1>
                    <h5 class="py-4 fw-600 lh-10">Un Premio, Reconocimiento o un simple gesto de Identidad, ayudan a que los empleados se sientan parte de la empresa.</h5>
                    <a class="btn btn-primary mt-3 w-50" href="form-register.php" role="button">Registrarse ahora </a>
                    <a class="btn btn-secondary mt-3 px-5 ms-4 text-white" href="categorias.php?id=1" role="button">Ver productos</a>
                </div>
            </div>

            <div class="col-md-7 p-5">

                <div class="d-flex flex-wrap justify-content-evenly">

                    <?php
                    require 'vendor/autoload.php';
                    $categoria = new ameri\Categoria;
                    $info_categoria = $categoria->mostrarOrden();
                    $cantidad = count($info_categoria);

                    if ($cantidad > 0) {
                        for ($x = 0; $x < $cantidad; $x++) {
                            $item = $info_categoria[$x];
                    ?>
                            <div class="col-md-4 col-6">
                                <a class="card categorias mb-4 me-4" href="categorias.php?id=<?php print $item['id'] ?>">
                                    <?php
                                    $imagen = 'upload/' . $item['imagen'];
                                    if (file_exists($imagen)) {
                                    ?>
                                        <img src="<?php print $imagen; ?>" class="card-img-top thumbnail" style="object-fit: cover;" alt="...">

                                    <?php } else { ?>
                                        <p>La imagen no se encuentra disponible</p> <?php } ?>

                                    <div class="card-body py-3">
                                        <h5 class="fw-700 px-2 mb-0"><?php print $item['nombre'] ?></h5>
                                    </div>
                                </a>
                            </div>
                        <?php }
                    } else { ?>
                        <h4>NO HAY REGISTROS</h4>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>