<?php


function agregarProducto($info_producto, $id, $cantidad = 1)
{
    $_SESSION['carrito'][$id]= array(
        'id'=>$info_producto['id'],
        'nombre'=>$info_producto['nombre'],
        'imagen'=>$info_producto['imagen'],
        'precio'=>$info_producto['precio'],
        'cantidad'=>1
    );
}

function actualizarProducto($id, $cantidad = FALSE)
{
    if ($cantidad)
        $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    else
        $_SESSION['carrito'][$id]['cantidad'] += 1;
}

function calcularTotal()
{
}

function cantidadProductos()
{
}
