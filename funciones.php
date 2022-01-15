<?php

function agregarProducto($resultado, $id, $cantidad = 1){
    $_SESSION['carrito'][$id] = array(
        'id' => $resultado['id'],
        'nombre' => $resultado['nombre'],
        'imagen' => $resultado['imagen'],
        'precio' => $resultado['precio'],
        'cantidad' => $cantidad
    );

}

function actualizarProducto($id,$cantidad = FALSE){

    if($cantidad)
    $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
else
    $_SESSION['carrito'][$id]['cantidad']+=1;
}

function calcularTotal()
{


}

function cantidadProductos()
{}
