<?php

require '../../vendor/autoload.php';

$producto_carrito = new ameri\Carrito;
$producto = new ameri\Producto_Evento;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['accion'] === 'Agregar al carrito') {

        $id = $_POST['id_producto'];

        $info_producto = $producto->mostrarPorId($id);

        print '<pre>';
        print_r($_POST);

        $cantidad_selected = $_POST['selectOpciones1_producto'];
        $string_cantidad = explode(",", $cantidad_selected);

        $cantidad = $string_cantidad[0];
        $precio = $string_cantidad[1];

        $_params = array(
            'info_usuario' => $_POST['info_usuario'],
            'id_usuario' => $_POST['id_usuario'],
            'usuarios_id' => $_POST['usuario_nombre'],
            'producto_id' => $_POST['id_producto'],
            'nombre' => $info_producto['nombre'],
            'proveedor' => $info_producto['proveedor'],
            'descripcion' => $info_producto['descripcion'],
            'imagen' => $info_producto['imagen'],
            'fecha' => date('Y-m-d'),
            'opciones' => "",
            'cantidad' => $cantidad,
            'precio' => $precio,
            'size' => $info_producto['size'],
            'color' => $_POST['color_producto'],
            'categoria' => 'evento'
        );


        print_r($_params);
        $rpt = $producto_carrito->agregar($_params);

        if ($rpt) {
            //cuando se el registro se de de forma correcta se direccina a
            header("Location: index.php");
        } else {
            print 'Error al registrar un producto';
        }
    }
}
