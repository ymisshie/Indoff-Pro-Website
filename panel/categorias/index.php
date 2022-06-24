<?php
$title = "Categorias";
$page_name = "categorias";

require '../roots.php';
include('../header-admin.php');

if (!isset($_SESSION['admin_info']) or empty($_SESSION['admin_info'])) {
    header('Location: ../index.php');
} else {

    require($root_vendor);

    $categoria = new ameri\Categoria;
    $info_categoria = $categoria->mostrar();

    $kit = new ameri\Kits;
    $info_kit = $kit->mostrar();

    $producto = new ameri\Producto;
    $info_productos = $producto->mostrar();

    $count_categorias = count($info_categoria);
    $count_kits = count($info_kit);

?>
    <section id="categorias">

        <div class="container">

            <div class="row">

                <div class="col-md-12 mt-5 d-flex">
                    <div class="col-md-12">
                        <div>
                            <div class="d-flex">
                                <a href="<?php print $root_dashboard; ?>" class="btn align-self-center mb-0 p-0" role="button"> <i class="go-arrow-back me-2 fs-1-5 fa-solid fa-arrow-left text-red"></i>
                                </a>
                                <h2 class="fw-700 text-red mb-0">Categorias</h2>
                            </div>
                            <p><?php print $count_categorias . ' categorias'; ?></p>
                        </div>

                        <?php

                        if ($count_categorias > 0) {
                        ?>
                            <div class="align-self-center">
                                <a class="btn btn-primary" href="form-registrar.php" role="button">Agregar nuevo <i class="fas fa-plus ms-2 me-1"></i></a>
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
                <?php

                if ($count_categorias > 0) {
                    $c = 0;
                ?>

                    <div class="justify-content-center table-responsive py-md-4 text-muted">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-1">ID</th>
                                    <th scope="col" class="col-3">Información</th>
                                    <th scope="col" class="col-2">Imagen</th>
                                    <th scope="col" class="col-4">Descripción</th>
                                    <th scope="col" class="col-2"></th>
                                </tr>
                            </thead>

                            <tbody class="form-card border-rounded text-muted">

                                <?php
                                for ($x = 0; $x < $count_categorias; $x++) {
                                    $c++;
                                    $item = $info_categoria[$x];
                                ?>
                                    <tr class="align-items-center">

                                        <td scope="col">
                                            <p><?php print $c; ?></p>
                                        </td>

                                        <td scope="col">
                                            <a role="button" href="productos/index.php?id=<?php print $item['id'] ?>" class="btn btn-light text-blue" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" title="Ver productos">
                                                <?php print $item['nombre']; ?> <span class="badge bg-purple ms-2 p-2">
                                                    <?php

                                                    $count_productos = 0;

                                                    foreach ($info_productos as $item_producto) {
                                                        if ($item_producto['categoria_id'] == $item['id']) {
                                                            $count_productos++;
                                                        }
                                                    }

                                                    print $count_productos;

                                                    ?>
                                                </span>
                                            </a>
                                        </td>

                                        <td scope="col" class="col-2">
                                            <?php
                                            $imagen = '../../upload/Categorias/' . $item['imagen'];
                                            if (file_exists($imagen)) {
                                            ?>
                                                <img src="<?php print $imagen; ?>" class="img-thumbnail-table" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" title="<?php print $item['imagen']; ?>">

                                            <?php
                                            } else { ?>
                                                Sin imagen
                                            <?php } ?>
                                        </td>

                                        <td scope="col" class="col-3">
                                            <div class="scroll-box p-2">
                                                <?php print $item['descripcion'] ?>
                                            </div>
                                        </td>

                                        <td scope="col">

                                            <a href="form-editar.php?id=<?php print $item['id']; ?>" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" title="Editar"><span><i class="me-3 fa-solid fa-edit btn btn-light p-3 rounded-circle text-darkblue"></i></span></a>
                                            <a href="acciones.php?id=<?php print $item['id']; ?>" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" title="Eliiminar"><i class="fa-solid fa-trash-alt btn btn-light p-3 rounded-circle text-darkblue"></i></a>

                                        </td>

                                    </tr>
                                <?php
                                }
                            }
                            if ($count_categorias > 0) {
                                ?>
                                <tr class="align-items-center">

                                    <td scope="col" class="">
                                        <p><?php print '6'; ?></p>
                                    </td>

                                    <td scope="col">
                                        <a role="button" href="../kits/productos?id=1" class="btn btn-light text-blue" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" title="Ver productos">
                                            <?php print $info_kit[0]['nombre']; ?> <span class="badge bg-purple ms-2 p-2">
                                                <?php

                                                $count_productos = 0;

                                                foreach ($info_productos as $item_producto) {
                                                    if ($item_producto['categoria_id'] == $info_kit[0]['id']) {
                                                        $count_productos++;
                                                    }
                                                }

                                                print $count_productos;

                                                ?>
                                            </span>
                                        </a>
                                    </td>

                                    <td scope="col" class="col-2">
                                        <?php
                                        $imagen = '../../upload/Kits/' . $info_kit[0]['imagen'];
                                        if (file_exists($imagen)) {
                                        ?>
                                            <img src="<?php print $imagen; ?>" class="img-thumbnail-table" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" title="<?php print $info_kit[0]['imagen']; ?>">
                                        <?php
                                        } else { ?>
                                            Sin imagen
                                        <?php } ?>
                                    </td>

                                    <td scope="col" class="col-3"><?php print $info_kit[0]['descripcion'] ?></td>

                                    <td scope="col">

                                        <a href="../kits/form-editar.php?id=<?php print $info_kit[0]['id']; ?>" role="button" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" title="Editar"><span><i class="fa-solid fa-edit btn btn-light p-3 rounded-circle text-darkblue"></i></span></a>

                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <?php

                    if ($count_categorias == 0) {
                    ?>
                        <div class="form-card rounded p-5 my-4">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-folder-open fs-2 me-3 pb-2"></i>
                                <p class="m-0">Actualmente no hay categorias registradas.</p>
                            </div>
                            <a class="btn btn-primary mt-3" href="form-registrar.php" role="button">Agregar nuevo <i class="fas fa-plus ms-2 me-1"></i></a>
                        </div>
                    <?php
                    } ?>

            </div>

    </section>

<?php
}
include('../footer-admin.php')
?>