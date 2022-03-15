<?php

require '../../vendor/autoload.php';

$title = "Cotización | Indoff Pro";
$pagina = "cotizacion";

session_start();

if (!isset($_SESSION['admin_info']) or empty($_SESSION['admin_info'])) {
    header('Location: ../index.php');
}
else{
    $root_logo = '../../assets/logo.png';
    $root_logo2 = '../../assets/logo2.png';
    $root_functions = '../../functions.php';
    $root_inicio = 'href="../dashboard.php"';
    $root_styles = '<link rel="stylesheet" href="../../style.css">';
    $root_categorias = 'href="../categorias/index.php"';
    $root_dashboard = 'href="../dashboard.php"';
    $root_productos = 'href="../productos/index.php"';
    $root_eventos = 'href="../eventos/index.php"';
    $root_eventos_productos = 'href="../productos-eventos/index.php"';
    $root_pedidos = 'href="index.php"';
    $root_logout = 'href="../index.php"';
    $root_vendor = '../../vendor/autoload.php';
    $root_productos_eventos_header = '../';
    $root_cerrar_sesion = '../cerrar-sesion.php';
    $root_indoffpro = 'href="../../index.php"';

    //include header.php file
    include('../../Template/_header-admin.php');

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $info_usuario = new ameri\Usuario;
        $usuario = $info_usuario->mostrar();


        $info_productos = new ameri\Cotizaciones;
        $info_cotizacion = new ameri\Cotcat;

        $infocotcat = $info_cotizacion->mostrar();

        //  print_r($infocotcat);

        foreach ($infocotcat as $item) {
            if ($item['id'] == $id) {
                $nombre_usuario = $item['info_usuario'];
                $fecha = $item['fecha'];
            }

            $pp = $info_productos->mostrar();

            //$cotizacion = $info_cotizacion->mostrarPorId();
        }

        $foreach = '';
        $imagen = '';
        $coloresc = '';
        $cantidadc = '';
        $precioc = '';
        $ifc = '';
        $p = '';

        $sizec = '';

        $peso = '';

        foreach ($pp as $producto) {
            $foreach = $foreach . '<tr>
        <td scope="col" class="fw-600">';

            $imagen = '../../upload/Productos/' . $producto['imagen'] . '<img src="' . $imagen . '" width="100px">';


            $foreach = $foreach . $imagen;
            $foreach = $foreach . '
        </td>
        <td scope="col" class="fw-700"> <span class="color-purple">' . $producto['nombre'] . '</span><br><span class="fw-600 color-black">' . $producto['proveedor'] . '</span> <br><span class="fw-400 color-black">' . $producto['descripcion'] . '</span></td>
        <td scope="col" class="text-center fw-400" style="text-transform: capitalize;">
            <div class="d-flex justify-content-center">';

            $colores = $producto['color'];
            $separada = '';
            $separador = ",";
            $separada = explode($separador, $colores);

            $count_colores = count($separada);

            for ($u = 0; $u < $count_colores; $u++) {
                $coloresc = '<div class="col-1 p-3 rounded-circle mx-1 my-1" style="background-color:';
                $coloresc = $coloresc . $separada[$u];
                $coloresc = $coloresc . '"data-bs-toggle="tooltip" data-bs-placement="top" title="';
                $coloresc = $coloresc . $separada[$u] . '">
                    </div>';
            }


            $coloresc = $coloresc . '</div>';

            $coloresc = $coloresc . $producto['color'] . '</td><td scope="col" class="fw-600">';

            $foreach = $foreach . $coloresc;

            $cantidad = $producto['cantidad'];
            $separada_cantidad = '';
            $separada_costo = '';
            $separador = ",";
            $separada_cantidad = explode($separador, $cantidad);

            $count_cantidad = count($separada_cantidad);

            for ($ca = 0; $ca < $count_cantidad; $ca++) {
                $cantidadc = $cantidadc . '<div class="text-center fw-700 color-purple">';

                $foreach = $foreach . $cantidadc;
                if ($separada_cantidad[$ca] == "") {
                } else {
                    $ifc = $separada_cantidad[$ca];

                    $ifc = $ifc . '<span class="fw-500 color-black">';

                    if ($separada_cantidad[$ca] == 1) {
                        $ifc = $ifc . ' unidad';
                    } elseif ($separada_cantidad[$ca] > 1) {
                        $ifc = $ifc . ' unidades';
                    }

                    $foreach = $foreach . $ifc;
                    $foreach = $foreach . '                                       
                        </span>
                    <?php';
                }

                $foreach = $foreach . '
                </div>';
            }

            $foreach = $foreach . '
        </td>
        <td scope="col" class="fw-600" id="costo_producto">';


            $costo = $producto['precio'];
            $separada_costo = '';
            $separador = ",";
            $separada_costo = explode($separador, $costo);

            $count_costo = count($separada_costo);

            for ($pa = 0; $pa < $count_cantidad; $pa++) {
                $precioc = '
                <div class="text-center fw-700 color-purple">';
                if ($separada_costo[$pa] == "") {
                } else {
                    if ($separada_costo[$pa] == 1) {
                        $precioc = $precioc . '$';
                    } elseif ($separada_costo[$pa] > 1) {
                        $precioc = $precioc . ' $';
                    }
                    $integer = (int)$separada_costo[$pa];
                    $integer = number_format($integer, 2, '.', '.');
                    $precioc = $precioc . $integer;
                }

                $foreach = $foreach . $precioc;
                $foreach = $foreach.'</div>';
            }

    
            $foreach = $foreach . '
        </td>

        <td scope="col" class="fw-500 text-center">';

            if ($producto['size'] != '') {
                $sizec = $producto['size'];
            } else {
                $sizec = 'N/A';
            }
            $foreach = $foreach . $sizec;

            $foreach = $foreach . '
                                                    </td>

        <td scope="col" class="fw-500 text-center">';


            if ($producto['peso'] != '') {
                $pesoc = $producto['peso'];
            } else {
                $pesoc =  'N/A';
            }

            $foreach = $foreach . $pesoc;


            $foreach = $foreach . '</td>
    </tr>';
        }

        $html = '
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
  
<sectionid="content" class="color-grey3-bg py-5">
    <div class="container ws p-5 color-white-bg">
        <div class="row pb-5">

            <div class="col-12 d-flex justify-content-between">

                <img src="' . $root_logo2 . '"class="img-fluid navbar-brand p-1" alt="Logo Indoff Pro">

                <div class="align-self-center">
                    <h3 class="color-red fw-700">Productos Promocionales e incentivos</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <h6 class="fw-700">FECHA: <span class="fw-500">' . $fecha . '</span>
                </h6>
                <h6 class="fw-700 mb-0">CLIENTE: <span class="fw-500">' . $nombre_usuario . '</span>
                </h6>
            </div>

            <div class="col-8 text-end">
                <div class="">
                    <p class="fw-700 mb-0">Officina general: <span class="fw-500">11816 Lackland Road St. Louis, MO, USA 63146</span>
                    </p>
                    <p class="fw-700 mb-0">TEL: <span class="fw-500">(001-314) 997-1122</span>
                    </p>
                    <p class="fw-700 mb-0">SUCURSAL TIJUANA: <span class="fw-500">Privada Bugambilias #20209, Tijuana, BC, CP 22216</span>
                    </p>
                    <p class="fw-700 mb-0">TEL: <span class="fw-500">664-6-25-1111</span> <span class="fw-700">FAX:</span> <span class="fw-500">
                            664-6-25-1114</span>
                    </p>
                </div>
            </div>

        </div>

        <div class="row mx-auto py-5 justify-content-center table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center color-grey3-bg ">
                        <th scope="col"></th>
                        <th scope="col">Información del producto</th>
                        <th scope="col">Color</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Tanaño</th>
                        <th scope="col">Peso</th>

                    </tr>
                </thead>


                <tbody>' . $foreach . '
                </tbody>
            </table>
        </div>

        <div class="row">
            <h5 class="fw-700 py-3">Términos y condicioness</h5>
            <ol class="list-group pb-5">
                <li class="list-group-item">
                    La orden de compra no requiere anticipo.
                </li>
                <li class="list-group-item">
                    15 días para el pago.
                </li>
            </ol>

            <h5 class="text-center py-2" style="font-style: italic;">Gracias por preferir Indoff, especialistas en promocionales e incentivos.</h5>
            <h5 class="text-center pt-5 color-red fw-700 pb-2">Lic. Ana Gallegos</h5>
            <h6 class="text-center color-black fw-600 pb-2">Manager Communications</h6>
            <p class="text-disbaled pt-4 text-center" style="font-style: italic;">Esta cotización es provisional. Al enviarse será revisada y se le dará seguimiento por correo en los próximos días hábiles.</p>

        </div>

    </div>
</section>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
</html>
';
    }
}
use Dompdf\Dompdf;
$dompdf=new Dompdf();
$dompdf->load_html($html);
$dompdf->render();
$f;
$l;

$dompdf->stream("Cotizacion.pdf", array('Attachement'=>'0'));
