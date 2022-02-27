<?php

//ACTIVAR SESIONES EN PHP

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];

    require 'vendor/autoload.php';

    $producto = new ameri\Producto;
    $info_producto = $producto->mostrarPorId($id);

    if (!$info_producto) {
        header('Location: index.php');
    }

    if (isset($_SESSION['carrito'])) {
        //si el producto existe en el carrito
        if (array_key_exists($id, $_SESSION['carrito'])) {
            actualizarProducto($id, $info_producto);
        }
        //si el producto no existe en el carrito
        else {
            agregarProducto($info_producto, $id);
        }
    }
    //si el carrito no existe
    else {
        agregarProducto($info_producto, $id);
    }
}
?>

<!--carrito-section-->
<section id="carrito" class="carrito-section">
    <div class="container">
        <h2 class="section-title py-md-5">Cotizaciones pendientes</h2>
    </div>
</section>
<!--!carrito-section-->