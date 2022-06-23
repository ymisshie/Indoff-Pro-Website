<?php

require '../../../vendor/autoload.php';

$producto = new ameri\Producto_Evento;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['accion'] === 'Registrar') {

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

        if (empty($_POST['cantidad_producto'])) {
            exit('Completar cantidad 1');
        }

        if (empty($_POST['precio_producto'])) {
            exit('Completar precio 1');
        }

        if (empty($_POST['color_producto'])) {
            exit('Completar colores del producto');
        }

        $color = $_POST['color_producto'];

        $cantidad = $_POST['cantidad_producto'];
        $string_cantidad = implode(",", $cantidad);

        $precio = $_POST['precio_producto'];
        $string_precio = implode(",", $precio);

        $x = 0;

        $_params = array(
            'nombre' => $_POST['nombre_producto'],
            'descripcion' => $_POST['descripcion_producto'],
            'proveedor' => $_POST['proveedor_producto'],
            'evento_id' => $_POST['categoria_id_producto'],
            'imagen' => subirFoto(),
            'fecha' => date('Y-m-d'),
            'cantidad' => $string_cantidad,
            'precio' => $string_precio,
            'size' => $_POST['size_producto'],
            'impresion' => $_POST['impresion_producto'],
            'color' => $color
        );

        $rpt = $producto->registrar($_params);

        if ($rpt) {

            $message = "Se ha añadido un producto satisfactoriamente.";
            $estado = "alert-success";

            header("Location: index.php?id=" . $_params['evento_id']  . '&message=' . $message . '&estado=' . $estado);
        } else {
            $message = "Se ha producido un error al registrar el producto.";
            $estado = "alert-danger";

            header("Location: index.php?id=" . $_params['evento_id']  . '&message=' . $message . '&estado=' . $estado);
        }
    }

    if ($_POST['accion'] === 'Actualizar') {


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

        $color = $_POST['color_producto'];
        // $string_color = implode(",", $color);

        $cantidad = $_POST['cantidad_producto'];
        $string_cantidad = implode(",", $cantidad);

        $precio = $_POST['precio_producto'];
        $string_precio = implode(",", $precio);

        $_params = array(
            'nombre' => $_POST['nombre_producto'],
            'proveedor' => $_POST['proveedor_producto'],
            'descripcion' => $_POST['descripcion_producto'],
            'imagen' => subirFoto(),
            'evento_id' => $_POST['categoria_id_producto'],
            'fecha' => date('Y-m-d'),
            'cantidad' => $string_cantidad,
            'precio' => $string_precio,
            'size' => $_POST['size_producto'],
            'impresion' => $_POST['impresion_producto'],
            'color' => $color,
            'id' => $_POST['id'],
            'orden' => $_POST['orden_producto'],
        );

        if (!empty($_POST['imagen_temp']))
            $_params['imagen'] = $_POST['imagen_temp'];

        if (!empty($_FILES['imagen']['name']))
            $_params['imagen'] = subirFoto();

        $categoria_id = $_params['evento_id'];

        $rpt = $producto->actualizar($_params);

        if ($rpt) {
            $message = "Se ha actualizado un producto satisfactoriamente.";
            $estado = "alert-success";

            header("Location: index.php?id=" . $categoria_id . '&message=' . $message . '&estado=' . $estado);
        } else {
            $message = "Ha habido un error al actualizar el producto.";
            $estado = "alert-danger";

            header("Location: index.php?id=" . $categoria_id .  '&message=' . $message . '&estado=' . $estado);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $info_producto = $producto->mostrarPorId($id);

    $categoria_id = $info_producto['evento_id'];

    $rpt = $producto->eliminar($id);

    if ($rpt) {
        $message = "Se ha eliminado un producto satisfactoriamente.";
        $estado = "alert-success";

        header("Location: index.php?id=" . $categoria_id . '&message=' . $message . '&estado=' . $estado);
    } else {
        $message = "Ha habido un error al eliminar el producto.";
        $estado = "alert-danger";

        header("Location: index.php?id=" . $categoria_id . '&message=' . $message . '&estado=' . $estado);
    }
}

function subirFoto()
{

    $x = 0;
    $image_string = '';

    foreach ($_FILES['imagen']['name'] as $item) {

        $imagen_name = $_FILES['imagen']['name'][$x];
        $imagen_tmp_name = $_FILES['imagen']['tmp_name'][$x];

        $carpeta = __DIR__ . '../../../../upload/Productos-Eventos/';

        $archivo = $carpeta . $imagen_name;

        move_uploaded_file($imagen_tmp_name, $archivo);

        /*
        if (!empty($_POST['imagen_temp'])) {
            $image_string = $image_string . $_POST['imagen_temp'] . ',' . $imagen_name;
        } else {
            if ($image_string == '') {
                $image_string = $imagen_name . ',';
            } else {
                $image_string = $image_string . ',' . $imagen_name;
            }
        }
        */

        print '<pre>';

        if ($image_string == '') {
            $image_string = $imagen_name;

            if (!empty($_POST['imagen_temp'])) {
                //print $_POST['imagen_temp'];

                if ($imagen_name == '') {
                    $image_string = $_POST['imagen_temp'];
                } else {
                    $image_string = $_POST['imagen_temp'] . ',' . $imagen_name;
                }
            }
        } else {
            if ($image_string != '') {
                $image_string = $image_string . ',' . $imagen_name;
            }
        }

        $x++;
    }

    return $image_string;
}
