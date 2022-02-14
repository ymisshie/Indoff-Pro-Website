<?php
require 'vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    $pe = new ameri\Producto_Evento;
    $evento = new ameri\Evento;

    $info_pe = $pe->mostrar();
    $info_evento = $evento->mostrar();

    if (!$info_pe && $info_evento)
        header('Location: index.php');
} else {
    header('Location: index.php');
}


?>

<section id="hero" class="color-black-bg">
    <?php


    foreach ($info_evento  as $item_evento) {
        if ($item_evento['id'] == $id) {

    ?>
            <div class="container-fluid py-md-5 " style="background-image: 
url(upload/<?php print $item_evento['imagen'] ?>);">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-4 col-md-8 text-white align-self-center">


                        <h1 class="hero-title  py-md-3 "><?php print $item_evento['nombre'] ?></h1>
                <?php
            }
        }
                ?>
                <h5 class="hero-description  py-md-3"><?php print $item_evento['descripcion'] ?></h5>
                <br>
                <a class="btn btn-primary me-lg-3" href="eventos.php" role="button">Ver eventos</a>
                <a class="btn btn-link  text-white" href="login.php" role="button">Registrarse ></a>
                    </div>
                </div>
            </div>
</section>