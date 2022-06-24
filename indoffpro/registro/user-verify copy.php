<?php

if (isset($_GET['vkey'])) {

    $verification_key = $_GET['vkey'];
    require $root_vendor;

    $usuario = new ameri\Usuario;

    // print($verification_key);
    $resultado = $usuario->verificarVkeyUser($verification_key);
    // print_r($resultado);
    if (isset($resultado['verification_key'])) {
        $verificado_resp = $usuario->updateVerificado($verification_key);
        if ($verificado_resp) {
            $mensaje = "Su cuenta ha sido verificada con éxito.";
            $mensaje1 = "Puede cerrar esta página y volver a Indoff Pro";
            $icono = "fas fa-badge-check";
        }
    } else {
        $mensaje = "Enlace inválido o la cuenta ya ha sido verificada.";
        $mensaje1 = "Puede cerrar esta página y volver a Indoff Pro.";
        $icono = "fa-solid fa-circle-check";
    }
} else {
    die("Something failed");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verificación de email</title>

    <!--BOOTSTRAP CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/18bf3390f6.js" crossorigin="anonymous"></script>
    <!--CUSTOM CSS FILE-->
    <link rel="stylesheet" href="styles_login1.css">
    <link rel="stylesheet" href="style.css">

    <?php
    // require functions.php file
    require('functions.php');
    ?>

</head>

<body>

    <!--start #header-->
    <header id="header-login" class="color-red-bg">
        <section>
            <div class="container-fluid">
                <div class="row text-center justify-content-center">
                    <div class="col-1 py-3">
                        <a class="" style="width: 4em;" href="index.php"> <img src="assets/logo.png" class="img-fluid p-2" alt="Logo Indoff Pro"></a>
                    </div>
                    <div class="col-2 align-self-center">
                        <a class="text-start nav-link text-white fs-1-2 p-0" aria-current="page" href="index.php"><span><i class="fas fa-arrow-circle-left color-aqua fs-1-2 pe-3"></i></span>Regresar a Indoff Pro</a>
                    </div>
                </div>
            </div>
        </section>
    </header>

    <body>

        <section class="">
            <form class="px-5 pb-5 text-center" action="login-user.php" method="post">
                <h3 class="section-title pt-5 pb-3 col-8 mx-auto "><?php echo $mensaje; ?></h3>
                <h6><?php print $mensaje1; ?></h6>

                <i class="<?php print $icono; ?> color-purple display-1 mt-4"></i>

                <div class="d-flex col-5 mx-auto text-center justify-content-center">
                    <a href="index.php" class="btn btn-secondary my-5 py-2 text-center w-75">Home Indoff Pro</a>
                </div>
            </form>

        </section>