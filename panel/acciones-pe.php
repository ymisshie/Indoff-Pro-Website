<?php

require '../vendor/autoload.php';

$producto_evento = new ameri\Producto_Evento;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if ($_POST['accion'] === 'Registrar') {
        //       print '<pre>';
        // print_r($_POST);

        // print_r($_FILES);

        if (empty($_POST['nombre_producto_evento']))
            exit('Completar titulo');

        if (empty($_POST['descripcion_producto_evento']))
            exit('Completar descripción del producto');

        if (empty($_POST['proveedor_producto_evento']))
            exit('Seleccionar un proveedor');

        if (empty($_POST['evento_id_producto']))
            exit('Seleccionar un eventoo');

        if (!is_numeric($_POST['evento_id_producto']))
            exit('Seleccionar un evento válido');

        if (empty($_POST['op1_producto_evento']))
            exit('Seleccionar una opción 1');

        if (!is_numeric($_POST['q1_producto_evento']))
            exit('Seleccionar una cantidad 1');

        if (empty($_POST['precio_producto1_evento']))
            exit('Completar precio 1');

        if (!is_numeric($_POST['precio_producto1_evento']))
            exit('Seleccionar un precio 1');

        if (empty($_POST['size_producto_evento']))
            exit('Seleccionar un tamaño');

        if (empty($_POST['peso_producto_evento']))
            exit('Seleccionar un peso');
            
        if (empty($_POST['color_producto_evento']))
            exit('Seleccionar un color');


        $_params = array(
            'nombre' => $_POST['nombre_producto_evento'],
            'proveedor' => $_POST['proveedor_producto_evento'],
            'descripcion' => $_POST['descripcion_producto_evento'],
            'imagen' => subirFoto(),
            'evento_id' => $_POST['evento_id_producto'],
            'fecha' => date('Y-m-d'),
            'op1' => $_POST['op1_producto_evento'],
            'op2' => $_POST['op2_producto_evento'],
            'op3' => $_POST['op3_producto_evento'],
            'op4' => $_POST['op4_producto_evento'],
            'op5' => $_POST['op5_producto_evento'],
            'op6' => $_POST['op6_producto_evento'],
            'op7' => $_POST['op7_producto_evento'],
            'q1' => $_POST['q1_producto_evento'],
            'q2' => $_POST['q2_producto_evento'],
            'q3' => $_POST['q3_producto_evento'],
            'q4' => $_POST['q4_producto_evento'],
            'q5' => $_POST['q5_producto_evento'],
            'q6' => $_POST['q6_producto_evento'],
            'q7' => $_POST['q7_producto_evento'],
            'precio1' => $_POST['precio_producto1_evento'],
            'precio2' => $_POST['precio_producto2_evento'],
            'precio3' => $_POST['precio_producto3_evento'],
            'precio4' => $_POST['precio_producto4_evento'],
            'precio5' => $_POST['precio_producto5_evento'],
            'precio6' => $_POST['precio_producto6_evento'],
            'precio7' => $_POST['precio_producto7_evento'],
            'size' => $_POST['size_producto_evento'],
            'peso' => $_POST['peso_producto_evento'],
            'color' => $_POST['color_producto_evento']
        );


        $rpt = $producto_evento->registrar($_params);

        if ($rpt)
            //cuando se el registro se de de forma correcta se direccina a 
           // header('Location: eventos/index.php');
           header("Location:  productos-eventos/index.php?id=".$_params['evento_id']);
            //header("Location:  ../productos-eventos/index.php?id=".$_POST['evento_id_producto_evento']);

        else
            print 'Error al registrar un producto';
    }


    if ($_POST['accion'] === 'Actualizar') {
        // print '<pre>';
        // print_r($_POST);

        // print_r($_FILES);

        if (empty($_POST['nombre_producto_evento']))
        exit('Completar titulo');

    if (empty($_POST['descripcion_producto_evento']))
        exit('Completar descripción del producto');

    if (empty($_POST['proveedor_producto_evento']))
        exit('Seleccionar un proveedor');

    if (empty($_POST['evento_id_producto']))
        exit('Seleccionar un evento');

    if (!is_numeric($_POST['evento_id_producto']))
        exit('Seleccionar un evento válido');

    if (empty($_POST['op1_producto_evento']))
        exit('Seleccionar una opción 1');

    if (!is_numeric($_POST['q1_producto_evento']))
        exit('Seleccionar una cantidad 1');

    if (empty($_POST['precio_producto1_evento']))
        exit('Completar precio 1');

    if (!is_numeric($_POST['precio_producto1_evento']))
        exit('Seleccionar un precio 1');


    if (empty($_POST['size_producto_evento']))
        exit('Seleccionar un proveedor');

    if (empty($_POST['peso_producto_evento']))
        exit('Seleccionar un proveedor');

        $_params = array(
            'nombre' => $_POST['nombre_producto_evento'],
            'proveedor' => $_POST['proveedor_producto_evento'],
            'descripcion' => $_POST['descripcion_producto_evento'],
            'evento_id' => $_POST['evento_id_producto'],
            'fecha' => date('Y-m-d'),
            'op1' => $_POST['op1_producto_evento'],
            'op2' => $_POST['op2_producto_evento'],
            'op3' => $_POST['op3_producto_evento'],
            'op4' => $_POST['op4_producto_evento'],
            'op5' => $_POST['op5_producto_evento'],
            'op6' => $_POST['op6_producto_evento'],
            'op7' => $_POST['op7_producto_evento'],
            'q1' => $_POST['q1_producto_evento'],
            'q2' => $_POST['q2_producto_evento'],
            'q3' => $_POST['q3_producto_evento'],
            'q4' => $_POST['q4_producto_evento'],
            'q5' => $_POST['q5_producto_evento'],
            'q6' => $_POST['q6_producto_evento'],
            'q7' => $_POST['q7_producto_evento'],
            'precio1' => $_POST['precio_producto1_evento'],
            'precio2' => $_POST['precio_producto2_evento'],
            'precio3' => $_POST['precio_producto3_evento'],
            'precio4' => $_POST['precio_producto4_evento'],
            'precio5' => $_POST['precio_producto5_evento'],
            'precio6' => $_POST['precio_producto6_evento'],
            'precio7' => $_POST['precio_producto7_evento'],
            'size' => $_POST['size_producto_evento'],
            'peso' => $_POST['peso_producto_evento'],
            'color' => $_POST['color_producto_evento'],
            'id' => $_POST['id'],
        );  

        if (!empty($_POST['imagen_temp']))
            $_params['imagen'] = $_POST['imagen_temp'];

        if (!empty($_FILES['imagen']['name']))
            $_params['imagen'] = subirFoto();

        $rpt = $producto_evento->actualizar($_params);

        if ($rpt)
            //cuando se el registro se de de forma correcta se direccina a 
            // header('Location: eventos/index.php');
            //header("Location:  ../productos-eventos/index.php?id=".$_POST['evento_id_producto_evento']);

            header("Location:  productos-eventos/index.php?id=".$_params['evento_id']);
        else
            print 'Error al actualizar un producto';
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $rpt = $producto_evento->eliminar($id);

    if ($rpt) 
        //cuando se el registro se de de forma correcta se direccina a 
        header('Location: eventos/index.php');
        //header("Location:  productos-eventos/index.php?id=".$_params['evento_id']);
    else
        print 'Error al eliminar un producto';
}

function subirFoto() {
    // Dir devuelve la ruta del proyecto donde está almacenado
    $carpeta = __DIR__.'/../upload/';
    $archivo = $carpeta.$_FILES['imagen']['name'];
    
    move_uploaded_file($_FILES['imagen']['tmp_name'],$archivo);

    return $_FILES['imagen']['name'];
}