<?php
require 'vendor/autoload.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];


    $producto = new ameri\Producto;
    $categoria = new ameri\Categoria;

    $info_producto = $producto->mostrarOrden();
    $info_categoria = $categoria->mostrarOrden();

    if (!$info_producto && $info_categoria)
        header('Location: index.php');
} else {
    header('Location: index.php');
}

?>


<?php
$cantidad_categorias = count($info_categoria);

if ($cantidad_categorias > 0) {
    //$cont_categorias=0;<
    $info_categoria_elegida = $categoria->mostrarPorIdOrden($id);
?>

    <!--navbar-->
    <section>
        <nav class="navbar secondary-navbar color-grey3-bg py-md-1 navbar-expand-lg fw-600 px-lg-5 px-md-3">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fas fa-bars text-white m-0"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <?php
                        foreach ($info_categoria as $categorias) {
                        ?>
                            <li class="nav-item px-md-4">
                                <a class="nav-link color-black <?php if ($categorias['id'] == $id) {
                                                                    print 'active';
                                                                } ?>" aria-current="page" href="categorias.php?id=<?php print $categorias['id']; ?>"><?php print $categorias['nombre']; ?></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <!--!navbar-->

    <!--filtros-categorias-->
    <section class="categorias-filtro">
        <div class="container pb-5">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h1 class="fw-800 pt-5" id="nombreCategoria"><?php print $info_categoria_elegida['nombre']; ?></h1>
                    <h6 class="pt-3 pb-4 fw-400" id="descripcionCategoria"><?php print $info_categoria_elegida['descripcion'] ?></h6>
                </div>
            </div>

            <div class="row justify-content-evenly d-flex flex-wrap flex-row text-center">

                <?php
                foreach ($info_producto as $item_producto) {

                    if ($item_producto[5] == $info_categoria_elegida['id']) {
                ?>

                        <div class="col-lg-4 col-6 col-md-6 pb-5 justify-content-evenly">
                            <a class="card formulario ws align-self-center" href="producto.php?id=<?php print $item_producto[0] ?>">
                                <?php
                                $imagen = 'upload/' . $item_producto['imagen'];
                                if (file_exists($imagen)) {
                                ?>

                                    <img src="<?php print $imagen; ?>" class="py-3 img-fluid thumbnail-producto" style="object-fit:contain;">

                                <?php } else { ?>
                                    Sin imagen
                                <?php } ?>

                                <div class="card-body color-black px-4">
                                    <div class="color col-lg-8 col-10 col-md-10 mx-auto d-flex justify-content-evenly py-2">
                                        <?php
                                        $colores = $item_producto['color'];
                                        $separada = '';
                                        $separador = ",";
                                        $separada = explode($separador, $colores);

                                        $count_colores = count($separada);

                                        for ($u = 0; $u < $count_colores; $u++) {
                                        ?>

                                            <div class="p-2 mx-1 btn btn-color" style="background-color: <?php print $separada[$u]; ?>;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print $separada[$u]; ?>">

                                            </div>
                                        <?php
                                        }
                                        ?>


                                    </div>

                                    <h2 class="text-start pt-3 m-0 fw-800"><?php print $item_producto['nombre'] ?></h2>

                                    <?php
                                    $costo = $item_producto['precio'];
                                    $cantidad = $item_producto['cantidad'];

                                    $separada_costo = '';
                                    $separada_cantidad = '';
                                    $separador = ",";
                                    $separada_costo = explode($separador, $costo);
                                    $separada_cantidad = explode($separador, $cantidad);
                                    $count_costo = count($separada_costo);
                                    $count_cantidad = count($separada_cantidad);
                                    ?>
                                    <div class="col d-flex pt-3">
                                        <h5 class="text-start fw-400 m-0">Desde <span class="fw-500"><?php print "$";
                                                                                                            print $separada_costo[0] ?></span></h5>
                                        <h5 class="text-start fw-400 m-auto m-0">Cantidad mín: <span class="fw-500"><?php print $separada_cantidad[0] ?></span></p>
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
    <!--!filtros-categorias-->
<?php
}
?>