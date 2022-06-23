<?php
$title = "Productos kits";
$page_name = "productos-kits";

require '../../roots.php';
include('../../header-admin.php');

if (!isset($_SESSION['admin_info']) or empty($_SESSION['admin_info'])) {
    header('Location: ../index.php');
} else {
    require($root_vendor);

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $producto = new ameri\Productos_Kits;
        $categoria = new ameri\Kits;

        $info_producto = $producto->mostrar();
        $info_categoria = $categoria->mostrarPorId($id);

        $cantidad_productos = 0;

        foreach ($info_producto as $productos) {
            if ($productos['kits_id'] == $info_categoria['id']) {
                $cantidad_productos++;
            }
        }
    } ?>

    <section id="categorias">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 mt-5 d-flex">
                    <div class="col-md-12">
                        <div>
                            <div class="d-flex">
                                <a href="../index.php" class="btn align-self-center mb-0 p-0" role="button"> <i class="go-arrow-back me-2 fs-1-5 fa-solid fa-arrow-left text-red"></i>
                                </a>
                                <h2 class="fw-700 mb-0 align-self-center text-red">Kits</h2>

                            </div>

                            <p class=""><?php print $cantidad_productos . ' kits'; ?></p>
                        </div>

                        <?php
                        if ($cantidad_productos > 0) {
                        ?>
                            <div class="align-self-center">
                                <a class="btn btn-primary" href="form-registrar.php?id=<?php print $id; ?>&categoria=<?php print $info_categoria['nombre']; ?>" role="button">Agregar nuevo<i class="fas fa-plus ms-2"></i></a>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>

                <div>
                    <?php
                    if (!empty($_GET['message'])) {
                    ?>
                        <div class="col-12 alert <?php print $_GET['estado'] ?> form-card mx-auto alert-dismissible mt-4 fade show" id="liveAlertPlaceholder" role="alert">
                            <?php
                            if ($_GET['estado'] == 'alert-success') {
                            ?>
                                <span><i class="fa-solid fa-check pe-2"></i></span>
                            <?php
                            } elseif ($_GET['estado'] == 'alert-danger') {
                            ?>
                                <span><i class="fa-solid fa-exclamation pe-2"></i></span>
                            <?php
                            }
                            print($_GET['message']);
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>

            <?php

            if ($cantidad_productos > 0) {
                //$cont_categorias=0;

                $c = 1; ?>
                <div class="justify-content-center table-responsive py-md-4 text-muted">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="col-1">ID</th>
                                <th scope="col" class="col-1">Información</th>
                                <th scope="col" class="col-2">Imagen</th>
                                <th scope="col" class="col-3">Descripción</th>
                                <th scope="col" class="col-2">Cantidades/Costo</th>
                                <th scope="col" class="col-1">Color</th>
                                <th scope="col" class="col-2"></th>
                            </tr>
                        </thead>

                        <tbody class="form-card">

                            <?php
                            foreach ($info_producto as $item_producto) {
                                if ($id == $item_producto['kits_id']) {
                            ?>

                                    <tr>

                                        <td scope="col" class=""><?php print $c ?></td>

                                        <td scope="col" class="">
                                            <p class="m-0 fw-700 text-purple"><?php print $item_producto['nombre']; ?></p>
                                            <p class="m-0"><?php print $item_producto['proveedor']; ?></p>
                                        </td>

                                        <td scope="col" class="">
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
                                                        <img src="<?php print $image; ?>" class="img-thumbnail-table">
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
                                                                    <img src="<?php print $image; ?>" class="carousel-img h-100 w-100 d-block">
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

                                        </td>

                                        <td scope="col" class="">
                                            <div class="scroll-box p-2">
                                                <p> <?php print $item_producto['descripcion']; ?></p>
                                            </div>
                                        </td>

                                        <td scope="col" class="">
                                            <?php
                                            $cantidad = $item_producto['cantidad'];
                                            $costo = $item_producto['precio'];
                                            $separada_cantidad = '';
                                            $separada_costo = '';
                                            $separador = ",";
                                            $separada_cantidad = explode($separador, $cantidad);
                                            $separada_costo = explode($separador, $costo);

                                            $count_cantidad = count($separada_cantidad);
                                            $count_costo = count($separada_costo);
                                            ?>

                                            <table class="table costo text-center mb-0">
                                                <tbody>

                                                    <?php

                                                    for ($ca = 0; $ca < $count_cantidad; $ca++) {
                                                    ?>
                                                        <tr>
                                                            <td class="p-0" scope="col"><?php if ($separada_cantidad[$ca] != "") {
                                                                                            print $separada_cantidad[$ca];
                                                                                        } ?></td>
                                                            <td class="p-0" scope="col"><?php if ($separada_costo[$ca] != "") {
                                                                                            print '$' . $separada_costo[$ca] . ' USD';
                                                                                        } ?></td>


                                                        </tr>
                                                    <?php
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </td>

                                        <td scope="col">

                                            <?php
                                            $color = $item_producto['color'];
                                            $separada_color = '';
                                            $separador = ",";
                                            $separada_color = explode($separador, $color);
                                            $count_cantidad = count($separada_color);

                                            for ($ca = 0; $ca < $count_cantidad; $ca++) {
                                            ?>
                                                <p class="text-muted m-0">
                                                    <?php
                                                    print $separada_color[$ca];
                                                    ?>
                                                </p>

                                            <?php
                                            }
                                            ?>

                                        </td>

                                        <td class="col">
                                            <a href="form-editar.php?id=<?php print $item_producto['id'] ?>" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" title="Editar"><span><i class="me-3 fa-solid fa-edit btn btn-light p-3 rounded-circle text-darkblue"></i></span></a>
                                            <a href="acciones.php?id=<?php print $item_producto['id'] ?>" role=" button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" title="Eliiminar"><i class="fa-solid fa-trash-alt btn btn-light p-3 rounded-circle text-darkblue"></i></a>
                                        </td>
                                    </tr>
                        </tbody>
                    </table>
            <?php
                                    $c++;
                                }
                            }
                        } elseif ($cantidad_productos == 0) {
            ?>

            <div class="form-card rounded p-5 my-4">
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-folder-open fs-2 me-3 text-muted"></i>
                    <p class="m-0">Actualmente no hay categorias registradas.</p>
                </div>
                <a class="btn btn-primary mt-3" href="form-registrar.php?id=<?php print $id; ?>&categoria=<?php print $info_categoria['nombre']; ?>" role="button">Agregar nuevo<i class="fas fa-plus ms-2"></i></a>
            </div>

        <?php
                        } ?>

                </div>

        </div>


    </section>

<?php
}
include('../../footer-admin.php')
?>