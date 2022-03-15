<?php

// print '<pre>';
// print_r($_GET);
if(isset($_GET['vkey'])){

    $verification_key = $_GET['vkey'];
    require 'vendor/autoload.php';

    $usuario = new ameri\Usuario;

    // print($verification_key);
    $resultado = $usuario ->verificarVkeyUser($verification_key);
    // print_r($resultado);
    if(isset($resultado['verification_key'])){
        $verificado_resp = $usuario ->updateVerificado($verification_key);
        if($verificado_resp){
            $mensaje = "<h2 class='section-title col-8 mx-auto'>
            Cuenta verificada. Favor de cerrar la pestaña y no actualizar.
            </h2>";
        }
    }
    else{
        $mensaje = "<h2 class='section-title col-8 mx-auto'>
            Cuenta inválida o ya ha sido verificada. Puede cerrar la pestaña.
            </h2>";
    }
 }
else{
    die("Something failed");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verificación de Correo</title>

    <!--BOOTSTRAP CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <script src="https://kit.fontawesome.com/18bf3390f6.js" crossorigin="anonymous"></script>

    <!--CUSTOM CSS FILE-->
    <link rel="stylesheet" href="style.css">

    <link href="jquery.multiselect.css" rel="stylesheet" type="text/css">

</head>

<body>

    <!--start #header-->
    <header id="header" class="color-aqua-bg">
        <div class="d-flex justify-content-between px-md-5">
            <a class="align-self-centers navbar-brand px-lg-5 fw-500 text-white font-gentiumme-auto" href="index.php">Indoff Pro</a>
        </div>

        <!--pimary navigation-->
        
    </header>
    <!--!start #header-->

    <!--start #main-site-->
    <section class="py-5" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.3)), url(assets/suscribir.jpg);">
    <div class="formulario p-5 text-center">
        <?php echo $mensaje ?>
        <i class="fas fa-envelope-open-text fs-4 mt-4"></i>
    </div>
    </section>


