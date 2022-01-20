<?php

require 'vendor/autoload.php';

$producto = new ameri\Producto;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {




        if ($_POST['accion'] === 'Registrar') {
            print '<pre>';
            print_r($_POST);

            print_r($_FILES);

            if (empty($_POST['nombre_producto'])) {
                exit('Completar nombre');
            }

            if (empty($_POST['descripcion_producto'])) {
                exit('Completar descripción');
            }

            if (empty($_POST['proveedor_producto'])) {
                exit('Completar proveedor');
            }

            if (empty($_POST['categoria_id_producto'])) {
                exit('Seleccionar una categoria');
            }

            if (!is_numeric($_POST['categoria_id_producto'])) {
                exit('Seleccionar una categoria válida');
            }

            if (!is_numeric($_POST['q1_producto'])) {
                exit('Completar una cantidad 1 válida');
            }

            if (empty($_POST['p1_producto'])) {
                exit('Completar precio 1 válido');
            }

            if (!is_numeric($_POST['p1_producto'])) {
                exit('Completar precio 1 válido');
            }


            if (empty($_POST['color_producto'])) {
                exit('Completar colores del producto');
            }

            $color = $_POST['color_producto'];
            foreach ($color as $color_array) {
                echo $color_array;
            }


            /*
                    foreach ($_POST['color_producto'] as $selected)
                    {
                        echo $selected;
                    }
                    */

            $_params = array(
                'nombre' => $_POST['nombre_producto'],
                'descripcion' => $_POST['descripcion_producto'],
                'proveedor' => $_POST['proveedor_producto'],
                'categoria_id' => $_POST['categoria_id_producto'],
                'imagen' => subirFoto(),
                'fecha' => date('Y-m-d'),
                'op1' => $_POST['op1_producto'],
                'op2' => $_POST['op2_producto'],
                'op3' => $_POST['op3_producto'],
                'op4' => $_POST['op4_producto'],
                'op5' => $_POST['op5_producto'],
                'op6' => $_POST['op6_producto'],
                'op7' => $_POST['op7_producto'],
                'q1' => $_POST['q1_producto'],
                'q2' => $_POST['q2_producto'],
                'q3' => $_POST['q3_producto'],
                'q4' => $_POST['q4_producto'],
                'q5' => $_POST['q5_producto'],
                'q6' => $_POST['q6_producto'],
                'q7' => $_POST['q7_producto'],
                'precio1' => $_POST['p1_producto'],
                'precio2' => $_POST['p2_producto'],
                'precio3' => $_POST['p3_producto'],
                'precio4' => $_POST['p4_producto'],
                'precio5' => $_POST['p5_producto'],
                'precio6' => $_POST['p6_producto'],
                'precio7' => $_POST['p7_producto'],
                'size' => $_POST['size_producto'],
                'peso' => $_POST['peso_producto'],
                'color' => $_POST['color_producto']


            );



            $rpt = $producto->registrar($_params);

            if ($rpt) {


                //cuando se el registro se de de forma correcta se direccina a
                header('Location: productos-dashboard.php?id=$id');
            } else {
                print 'Error al registrar un producto';
            }
        }
    }

    if ($_POST['accion'] === 'Actualizar') {

        print '<pre>';
        print_r($_POST);

        print_r($_FILES);

        if (empty($_POST['nombre_producto']))
            exit('Completar nombre');

        if (empty($_POST['descripcion_producto']))
            exit('Completar descripción');

        if (empty($_POST['proveedor_producto']))
            exit('Completar proveedor');

        if (empty($_POST['categoria_id_producto']))
            exit('Seleccionar una categoria');

        if (!is_numeric($_POST['categoria_id_producto']))
            exit('Seleccionar una categoria válida');

        if (!is_numeric($_POST['q1_producto']))
            exit('Completar una cantidad 1 válida');

        if (empty($_POST['precio_producto1']))
            exit('Completar precio 1 válido');

        if (!is_numeric($_POST['precio_producto1']))
            exit('Completar precio 1 válido');

        if (!is_numeric($_POST['size_producto']))
            exit('Completar tamaño válido');

        if (empty($_POST['color_producto']))
            exit('Completar colores');


        $_params = array(

            'nombre' => $_POST['nombre_producto'],
            'proveedor' => $_POST['proveedor_producto'],
            'descripcion' => $_POST['descripcion_producto'],
            'categoria_id' => $_POST['categoria_id_producto'],
            'fecha' => date('Y-m-d'),
            'op1' => $_POST['op1_producto'],
            'op2' => $_POST['op2_producto'],
            'op3' => $_POST['op3_producto'],
            'op4' => $_POST['op4_producto'],
            'op5' => $_POST['op5_producto'],
            'op6' => $_POST['op6_producto'],
            'op7' => $_POST['op7_producto'],
            'q1' => $_POST['q1_producto'],
            'q2' => $_POST['q2_producto'],
            'q3' => $_POST['q3_producto'],
            'q4' => $_POST['q4_producto'],
            'q5' => $_POST['q5_producto'],
            'q6' => $_POST['q6_producto'],
            'q7' => $_POST['q7_producto'],
            'precio1' => $_POST['p1_producto'],
            'precio2' => $_POST['p2_producto'],
            'precio3' => $_POST['p3_producto'],
            'precio4' => $_POST['p4_producto'],
            'precio5' => $_POST['p5_producto'],
            'precio6' => $_POST['p6_producto'],
            'precio7' => $_POST['p7_producto'],
            'size' => $_POST['size_producto'],
            'peso' => $_POST['peso_producto'],
            'color' => $_POST['color_producto'],
            'id' => $_POST['id'],
        );


        if (!empty($_POST['imagen_temp']))
            $_params['imagen'] = $_POST['imagen_temp'];

        if (!empty($_FILES['imagen']['name']))
            $_params['imagen'] = subirFoto();

        $rpt = $producto->actualizar($_params);

        if ($rpt)

            //cuando se el registro se de de forma correcta se direccina a 
            header('Location: productos-dashboard.php');

        else
            print 'Error al actualizar un producto';
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $rpt = $producto->eliminar($id);

    if ($rpt)

        //cuando se el registro se de de forma correcta se direccina a 
        header('Location: dashboard.php');

    else
        print 'Error al eliminar una categoria';
}


function subirFoto()
{

    $carpeta = __DIR__ . '/upload/';

    $archivo = $carpeta . $_FILES['imagen']['name'];

    move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo);

    return $_FILES['imagen']['name'];
}
