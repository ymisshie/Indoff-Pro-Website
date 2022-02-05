<?php

require '../vendor/autoload.php';

$producto = new ameri\Producto;

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

        if (empty($_POST['cantidad_producto'])) {
            exit('Completar cantidad 1');
        }


        if (empty($_POST['precio_producto'])) {
            exit('Completar precio 1');
        }


        if (empty($_POST['color_producto'])) {
            exit('Completar colores del producto');
        }

        /*
        $color = $_POST['color_producto'];
        $color_array = implode(",", $color);
        //echo $color_array;

        $cantidad = $_POST['cantidad_producto'];
        $cantidad_array = implode(",", $cantidad);
        //echo $color_array;

        $precio = $_POST['precio_producto'];
        $precio_array = implode(",", $precio);
*/

        $color = $_POST['color_producto'];
        $string_color = implode(",", $color);

        $cantidad = $_POST['cantidad_producto'];
        $string_cantidad = implode(",", $cantidad);

        $precio = $_POST['precio_producto'];
        $string_precio = implode(",", $precio);
        /*
        echo "The array is converted to the string.";
        echo "\n";
        echo "The string is $string_color";
        die;
        */

        $_params = array(
            'nombre' => $_POST['nombre_producto'],
            'descripcion' => $_POST['descripcion_producto'],
            'proveedor' => $_POST['proveedor_producto'],
            'categoria_id' => $_POST['categoria_id_producto'],
            'imagen' => subirFoto(),
            'fecha' => date('Y-m-d'),
            'opciones' => $_POST['opciones_producto'],
            'cantidad' => $string_cantidad,
            'precio' => $string_precio,
            'size' => $_POST['size_producto'],
            'peso' => $_POST['peso_producto'],
            'color' => $string_color
        );

        $rpt = $producto->registrar($_params);

        if ($rpt) {


            //cuando se el registro se de de forma correcta se direccina a
            header("Location: productos/index.php?id=".$_params['categoria_id']);
        } else {
            print 'Error al registrar un producto';
        }
    }


    if ($_POST['accion'] === 'Actualizar') {
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

        if (empty($_POST['cantidad_producto'])) {
            exit('Completar cantidad 1');
        }


        if (empty($_POST['precio_producto'])) {
            exit('Completar precio 1');
        }


        if (empty($_POST['color_producto'])) {
            exit('Completar colores del producto');
        }

        /*
        $color = $_POST['color_producto'];
        $color_array = implode(",", $color);
        //echo $color_array;

        $cantidad = $_POST['cantidad_producto'];
        $cantidad_array = implode(",", $cantidad);
        //echo $color_array;

        $precio = $_POST['precio_producto'];
        $precio_array = implode(",", $precio);
*/

        $color = $_POST['color_producto'];
        $string_color = implode(",", $color);

        $cantidad = $_POST['cantidad_producto'];
        $string_cantidad = implode(",", $cantidad);

        $precio = $_POST['precio_producto'];
        $string_precio = implode(",", $precio);
        /*
        echo "The array is converted to the string.";
        echo "\n";
        echo "The string is $string_color";
        die;
        */

        $_params = array(

            'nombre' => $_POST['nombre_producto'],
            'descripcion' => $_POST['descripcion_producto'],
            'proveedor' => $_POST['proveedor_producto'],
            'categoria_id' => $_POST['categoria_id_producto'],
            'imagen' => subirFoto(),
            'fecha' => date('Y-m-d'),
            'opciones' => $_POST['opciones_producto'],
            'cantidad' => $string_cantidad,
            'precio' => $string_precio,
            'size' => $_POST['size_producto'],
            'peso' => $_POST['peso_producto'],
            'color' => $string_color,
            'id' => $_POST['id'],


        );
        //die;

        if (!empty($_POST['imagen_temp']))
            $_params['imagen'] = $_POST['imagen_temp'];

        if (!empty($_FILES['imagen']['name']))
            $_params['imagen'] = subirFoto();

        $rpt = $producto->actualizar($_params);

        if ($rpt)

            //cuando se el registro se de de forma correcta se direccina a 
            header("Location: productos/index.php?id=".$_params['categoria_id']);

        else
            print 'Error al actualizar un producto';
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $rpt = $producto->eliminar($id);

    if ($rpt)

        //cuando se el registro se de de forma correcta se direccina a 
        header("Location:  productos/index.php");

    else
        print 'Error al eliminar una categoria';
}


function subirFoto()
{

    $carpeta = __DIR__ . '/../upload/';

    $archivo = $carpeta . $_FILES['imagen']['name'];

    move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo);

    return $_FILES['imagen']['name'];
}
