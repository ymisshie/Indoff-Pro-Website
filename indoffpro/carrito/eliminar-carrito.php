<?php

require '../../vendor/autoload.php';

$producto_carrito = new ameri\Carrito;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $id= $_GET['id'];
   
    $rpt = $producto_carrito->eliminar($id);

    print_r ($rpt);

    if ($rpt) {
        //cuando se el registro se de de forma correcta se direccina a
        header('Location: index.php');
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $nombre= $_GET['nombre_login'];

    $rpt = $producto_carrito->eliminarPorUsuario($nombre);

    if ($rpt) {
        //cuando se el registro se de de forma correcta se direccina a
        header('Location: index.php');
    }
}

?>