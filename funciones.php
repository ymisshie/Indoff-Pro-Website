<?php

require 'vendor/autoload.php';


if (isset($_REQUEST["accion"])) {
    if ($_POST['accion'] === 'Realizar cotización') {

        $id = $_REQUEST['id_producto'];

        $producto = new ameri\Producto;
        $info_producto = $producto->mostrarPorId($id);

        print '<pre>';
        print_r($_POST);
        
        $nombre = $_REQUEST['nombre_producto'];
        $descripcion = $_REQUEST['descripcion_producto'];
        $proveedor = $_REQUEST['proveedor_producto'];
        $opcion1 = $_REQUEST['selectOpciones1_producto'];

        
        $_SESSION["carrito"][$id] = array(
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'proveedor' => $proveedor,
            'imagen' => $info_producto['imagen'],
            'opcion1' => $_POST['selectOpciones1_producto'],
            'opcion2' => $_POST['selectOpciones2_producto'],
            'opcion3' => $_POST['selectOpciones3_producto'],
            'opcion4' => $_POST['selectOpciones4_producto'],
            'opcion5' => $_POST['selectOpciones5_producto'],
            'opcion6' => $_POST['selectOpciones6_producto'],
            'opcion7' => $_POST['selectOpciones7_producto'],
            'opcion8' => $_POST['selectOpciones8_producto'],
            'opcion9' => $_POST['selectOpciones9_producto'],
            'opcion10' => $_POST['selectOpciones10_producto'],
            'size' => $info_producto['size'],
            'peso' => $info_producto['peso'],
            'color' => $_POST['color_selected']
        );
        
    }
}
/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['accion'] === 'Realizar cotización') {
        print '<pre>';
        print_r($_POST);

        function agregarProducto($id, $info_producto)
        {

            $_SESSION['cart'][$id] = array(
                'id' => $info_producto['id'],
                'nombre' => $info_producto['nombre'],
                'descripcion' => $info_producto['descripcion'],
                'proveedor' => $info_producto['proveedor'],
                'imagen' => $info_producto['imagen'],
                'opcion1' => $_POST['selectOpciones1_producto'],
                'opcion2' => $_POST['selectOpciones2_producto'],
                'opcion3' => $_POST['selectOpciones3_producto'],
                'opcion4' => $_POST['selectOpciones4_producto'],
                'opcion5' => $_POST['selectOpciones5_producto'],
                'opcion6' => $_POST['selectOpciones6_producto'],
                'opcion7' => $_POST['selectOpciones7_producto'],
                'opcion8' => $_POST['selectOpciones8_producto'],
                'opcion9' => $_POST['selectOpciones9_producto'],
                'opcion10' => $_POST['selectOpciones10_producto'],
                'size' => $info_producto['size'],
                'peso' => $info_producto['peso'],
                'color' => $_POST['color_selected']
            );
            
            print '<pre>';
            print_r($_SESSION['cart']);
        }
        //cuando se el registro se de de forma correcta se direccina a 

    }
}
*/

/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['accion'] === 'Realizar cotización') {
        print '<pre>';
        print_r($_POST);

        function actualizarProducto($id, $info_producto)
        {

            $_SESSION['cart'][$id] = array(
                'id' => $info_producto['id'],
                'nombre' => $info_producto['nombre'],
                'descripcion' => $info_producto['descripcion'],
                'proveedor' => $info_producto['proveedor'],
                'imagen' => $info_producto['imagen'],
                'opcion1' => $_POST['selectOpciones1_producto'],
                'opcion2' => $_POST['selectOpciones2_producto'],
                'opcion3' => $_POST['selectOpciones3_producto'],
                'opcion4' => $_POST['selectOpciones4_producto'],
                'opcion5' => $_POST['selectOpciones5_producto'],
                'opcion6' => $_POST['selectOpciones6_producto'],
                'opcion7' => $_POST['selectOpciones7_producto'],
                'opcion8' => $_POST['selectOpciones8_producto'],
                'opcion9' => $_POST['selectOpciones9_producto'],
                'opcion10' => $_POST['selectOpciones10_producto'],
                'size' => $info_producto['size'],
                'peso' => $info_producto['peso'],
                'color' => $_POST['color_selected']
            );
            print '<pre>';
            print_r($_SESSION['cart']);
        }
        //cuando se el registro se de de forma correcta se direccina a 

    }
}
*/