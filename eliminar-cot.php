<?php
require 'vendor/autoload.php';

$pro_cot = new ameri\Cotizaciones;
$cots = new ameri\Cotcat;


if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id = $_GET['id'];

    $info_cot = $pro_cot->mostrar();
    $cot = $cots->mostrarPorId($id);

    print '<pre>';
    print_r($cot);

    foreach ($info_cot as $pcot) {
        if ($pcot['cotcat_id'] == $id) {
            $idp = $pcot['id'];
            $rpt = $pro_cot->eliminar($idp);
        }
    }

    $rpt = $cots->eliminar($id);

    if ($rpt) {
        header('Location: indoffpro/cotizaciones/index.php');
    }
}
