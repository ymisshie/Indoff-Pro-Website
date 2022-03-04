<?php

$title = "Cotización | Indoff Pro";
$pagina = "cotizacion";


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $info_productos = new ameri\Cotizaciones;
    $info_cotizacion = new ameri\Cotcat;

    $infocotcat= $info_cotizacion -> mostrar();

    foreach($infocotcat as $item)
    {
        if($item['id']==$id)
        {
            $fecha =$item['fecha'];
        }
    }

    $pp = $info_productos->mostrar();


    //$cotizacion = $info_cotizacion->mostrarPorId();
}

?>

<?php
$root_functions = '../functions.php';
$root_inicio = 'href="dashboard.php"';
$root_styles = '<link rel="stylesheet" href="../style2.css">';
$root_categorias = 'href="categorias/index.php"';
$root_dashboard = 'href="dashboard.php"';
$root_productos = 'href="productos/index.php"';
$root_eventos = 'href="eventos/index.php"';
$root_eventos_productos = 'href="productos-eventos/index.php"';
$root_pedidos = 'href="pedidos/index.php"';
$root_logout = 'href="index.php"';
$root_vendor = '../vendor/autoload.php';
$root_cerrar_sesion = 'cerrar-sesion.php';
$root_productos_eventos_header = '';
$root_indoffpro = 'href="../index.php"';
?>

<?php
//include header.php file
include('../Template/_header-admin.php')

?>






<?php
//include header.php file
include('footer-admin.php')
?>  
