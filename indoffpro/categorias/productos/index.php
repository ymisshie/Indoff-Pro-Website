<?php
$title = "Productos";
$pagina = "productos";

//Variables de navegacion
include('../../roots.php');

include('../../../header.php');

require $root_vendor;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $producto = new ameri\Producto;
    $categoria = new ameri\Categoria;

    $pkit = new ameri\Productos_Kits;
    $kit = new ameri\Kits;

    $info_producto = $producto->mostrarOrden();
    $info_producto2 = $producto->mostrar();
    $info_categoria = $categoria->mostrarOrden();
    $info_kit = $kit->mostrar();
    $info_pkit = $pkit->mostrarOrden();

    if ($info_producto && $info_categoria)

        $cantidad_categorias = count($info_categoria);


    //$cont_categorias=0;<
    $info_categoria_elegida = $categoria->mostrarPorIdOrden($id); ?>

    <section class="secondary">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container p-0">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars text-white"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <!--NAVBAR-->
                    <ul class="navbar-nav my-3 my-md-0 mx-auto">

                        <?php
                        foreach ($info_categoria as $item_cat) {
                        ?>

                            <li class="mt-md-0 nav-item pe-md-4">
                                <a class="text-darkblue px-3 px-md-3 nav-link <?php if ($id == $item_cat['id']) {
                                                                                    echo "active";
                                                                                } ?>" aria-current="page" href="<?php print $root_categorias . '?id=' . $item_cat['id']; ?>"><?php print $item_cat['nombre']; ?></a>
                            </li>

                        <?php
                        }
                        ?>
                        <li class="mt-md-0 nav-item pe-md-4">
                            <a class="text-darkblue px-3 px-md-3 nav-link <?php if ($id == 6) {
                                                                                echo "active";
                                                                            } ?>" aria-current="page" href="<?php print $root_categorias . '?id=6'; ?>"><?php print $info_kit[0]['nombre']; ?></a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </section>



    <?php
    if ($id < 6) {
    ?>
        <section class="categorias-filtro pb-5">
            <div class="container">
                <div class="row justify-content-center mb-4">
                    <div class="col-12">
                        <h1 class="pt-5 fw-700 text-red"><?php print $info_categoria_elegida['nombre']; ?></h1>
                        <h6 class="lh-22"><?php print $info_categoria_elegida['descripcion'] ?></h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 p-0 justify-content-evenly d-flex flex-wrap flex-row">
                        <?php

                        foreach ($info_producto as $item_producto) {
                            if ($item_producto[5] == $info_categoria_elegida['id']) {
                        ?>
                                <div class="card col-lg-3 col-6 form-card rounded">
                                    <a class="ws align-items-center mx-3 mb-4" href="<?php echo $root_productos; ?>?id=<?php print $item_producto[0] ?>">
                                        <div class="align-self-center text-center">
                                            <?php
                                            $imagen = $item_producto['imagen'];
                                            $separada_imagen = '';

                                            $separador = ",";
                                            $separada_imagen = explode($separador, $imagen);

                                            $count_imagen = count($separada_imagen);

                                            if ($count_imagen == 1) {

                                                $image = '../../../upload/Productos/' . $item_producto['imagen'];

                                                if (file_exists($image) && $image != '') {
                                            ?>
                                                    <div>
                                                        <img src="<?php print $image; ?>" class="img-fluid">
                                                    </div>

                                                <?php
                                                }
                                            } elseif ($count_imagen > 1) {

                                                ?>

                                                <div id="carouselId" class="carousel slide w-100 carousel-dark" data-bs-ride="carousel">

                                                    <div class="carousel-inner h-100" role="listbox">

                                                        <?php

                                                        for ($ca = 0; $ca < $count_imagen; $ca++) {
                                                            $image = '../../../upload/Productos/' . $separada_imagen[$ca];

                                                            if (file_exists($image) && $separada_imagen[$ca] != '') {
                                                        ?>
                                                                <div class="h-100 carousel-item <?php if ($ca == 1) {
                                                                                                    print 'active';
                                                                                                } ?>">
                                                                    <img src="<?php print $image; ?>" class="p-4 carousel-img h-100 w-100 d-block">
                                                                </div>
                                                    <?php
                                                            } else {
                                                                print 'Imagen no disponible.';
                                                            }
                                                        }
                                                    } ?>

                                                    </div>
                                                    <button class=" carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Previous</span>
                                                    </button>
                                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Next</span>
                                                    </button>
                                                </div>
                                        </div>
                                        <div class="px-3 card-body text-darkblue px-1 align-self-center">
                                            <h5 class="text-purple m-0 fw-700"><?php print $item_producto['nombre'] ?></h5>
                                            <div class="color col-lg-8 col-10 col-md-10 d-flex py-1">
                                                <p><?php print $item_producto['color']; ?></p>
                                            </div>
                                            <?php
                                            $costo = $item_producto['precio'];
                                            $cantidad = $item_producto['cantidad'];

                                            $separada_costo = '';
                                            $separada_cantidad = '';
                                            $separador = ",";
                                            $separada_costo = explode($separador, $costo);
                                            $separada_cantidad = explode($separador, $cantidad);
                                            $count_costo = count($separada_costo);
                                            $count_cantidad = count($separada_cantidad); ?>
                                            <div>
                                                <p class="text-start fw-400 m-0">Desde <span class="fw-700 text-blue"><?php print "$";
                                                                                                                        print $separada_costo[0] ?></span></p>
                                                <p class="text-start fw-400 m-auto m-0">Cantidad mínima: <span class="fw-700 text-blue"><?php print $separada_cantidad[0] ?></span></p>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                        <?php
                            }
                        }
                        ?>


                    </div>
        </section>
    <?php
    } elseif ($id == 6) {
    ?>
        <section class="categorias-filtro pb-5">
            <div class="container">
                <div class="row justify-content-center mb-4">
                    <div class="col-12">
                        <h1 class="pt-5 fw-700 text-red">Reclutamiento, Retención y Reconocimiento</h1>
                        <h6 class="lh-22"><?php print $info_kit[0]['descripcion'] ?></h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 p-0 justify-content-evenly d-flex flex-wrap flex-row">
                        <?php

                        foreach ($info_pkit as $item_producto) {
                        ?>
                            <div class="card form-card rounded col-lg-3 col-6">
                                <a class="ws align-items-center mx-3 mb-4" href="<?php echo 'hero-kits.php'; ?>?id=<?php print $item_producto[0] ?>">
                                    <div class="align-self-center text-center">
                                        <?php
                                        $imagen = $item_producto['imagen'];
                                        $separada_imagen = '';

                                        $separador = ",";
                                        $separada_imagen = explode($separador, $imagen);

                                        $count_imagen = count($separada_imagen);

                                        if ($count_imagen == 1) {

                                            $image = '../../../upload/Productos-Kits/' . $item_producto['imagen'];

                                            if (file_exists($image) && $image != '') {
                                        ?>
                                                <div>
                                                    <img src="<?php print $image; ?>" class="img-fluid">
                                                </div>

                                            <?php
                                            }
                                        } elseif ($count_imagen > 1) {

                                            ?>

                                            <div id="carouselId" class="carousel slide w-100 carousel-dark" data-bs-ride="carousel">

                                                <div class="carousel-inner h-100" role="listbox">

                                                    <?php

                                                    for ($ca = 0; $ca < $count_imagen; $ca++) {
                                                        $image = '../../../upload/Productos-Kits/' . $separada_imagen[$ca];

                                                        if (file_exists($image) && $separada_imagen[$ca] != '') {
                                                    ?>
                                                            <div class="h-100 carousel-item <?php if ($ca == 1) {
                                                                                                print 'active';
                                                                                            } ?>">
                                                                <img src="<?php print $image; ?>" class="p-4 carousel-img h-100 w-100 d-block">
                                                            </div>
                                                <?php
                                                        } else {
                                                            print 'Imagen no disponible.';
                                                        }
                                                    }
                                                } ?>

                                                </div>
                                                <button class=" carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </button>
                                                <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </button>
                                            </div>
                                    </div>
                                    <div class="px-3 card-body text-darkblue px-1 align-self-center">
                                        <h5 class="text-purple m-0 fw-700"><?php print $item_producto['nombre'] ?></h5>
                                        <div class="color py-1">
                                            <p><?php print $item_producto['color']; ?></p>
                                        </div>
                                        <?php
                                        $costo = $item_producto['precio'];
                                        $cantidad = $item_producto['cantidad'];

                                        $separada_costo = '';
                                        $separada_cantidad = '';
                                        $separador = ",";
                                        $separada_costo = explode($separador, $costo);
                                        $separada_cantidad = explode($separador, $cantidad);
                                        $count_costo = count($separada_costo);
                                        $count_cantidad = count($separada_cantidad); ?>
                                        <div class="">
                                            <p class="text-start fw-400 m-0">Desde <span class="fw-700 text-blue"><?php print "$";
                                                                                                                    print $separada_costo[0] ?></span></p>
                                            <p class="text-start fw-400 m-auto m-0">Cantidad mínima: <span class="fw-700 text-blue"><?php print $separada_cantidad[0] ?></span></p>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        <?php

                        }
                        ?>


                    </div>
        </section>

        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <img src="../../../assets/banner.jpg" class="img-fluid" alt="Banner Tres Rs">
                    </div>
                </div>
            </div>
        </section>

<?php
    }
    include('../../../footer.php');
} else {
    header('Location: index.php');
}
