<?php

require 'vendor/autoload.php';

$producto_carrito = new ameri\Carrito;
$producto = new ameri\Producto;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $id= $_GET['id'];

    $rpt = $producto_carrito->eliminar($id);

    if ($rpt) {
        //cuando se el registro se de de forma correcta se direccina a
        header('Location: carrito.php');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $nombre= $_GET['nombre_login'];

    $rpt = $producto_carrito->eliminarPorUsuario($nombre);

    if ($rpt) {
        //cuando se el registro se de de forma correcta se direccina a
        header('Location: carrito.php');
    }
}

?>