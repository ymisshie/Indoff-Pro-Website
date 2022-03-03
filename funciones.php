<?php

require 'vendor/autoload.php';

$producto_carrito = new ameri\Carrito;
$producto = new ameri\Producto;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['accion'] === 'Agregar al carrito') {
        
        $id = $_POST['id_producto'];

        $info_producto = $producto->mostrarPorId($id);

        print '<pre>';
        print_r($_POST);

        
        $cantidad_selected = $_POST['selectOpciones1_producto'];
        $string_cantidad = explode(",", $cantidad_selected);
      
        $cantidad=$string_cantidad[0];
        $precio=$string_cantidad[1];

        $_params = array(
            'usuarios_id' =>$_POST['usuario_nombre'],
            'nombre' => $info_producto['nombre'],
            'proveedor' => $info_producto['proveedor'],
            'descripcion' => $info_producto['descripcion'],
            'imagen' => $info_producto['imagen'],
            'fecha' => date('Y-m-d'),
            'opciones' => "",
            'cantidad' => $cantidad,
            'precio' => $precio,
            'size' => $info_producto['size'],
            'peso' => $info_producto['peso'],
            'color' => $_POST['color_producto']
        );

        print_r ($_params);
        $rpt = $producto_carrito->agregar($_params);

        if ($rpt) {

            //cuando se el registro se de de forma correcta se direccina a
            header("Location: producto.php?id=$id");
        } else {
            print 'Error al registrar un producto';
        }
    }
}


/*
if (isset($_REQUEST["accion"])) {

    //si ya existe el carrito
    if (isset($_SESSION['carrito'])) {

        $idcarrito = count($_SESSION['carrito']);

        $id = $_REQUEST['id_producto'];

        $producto = new ameri\Producto;
        $info_producto = $producto->mostrarPorId($id);

     //   print '<pre>';
       // print_r($_POST);

        $nombre = $_REQUEST['nombre_producto'];
        $descripcion = $_REQUEST['descripcion_producto'];
        $proveedor = $_REQUEST['proveedor_producto'];
        $opcion1 = $_REQUEST['selectOpciones1_producto'];
   
        $color = $_REQUEST['color_producto'];

        $_SESSION['carrito'][$idcarrito] = array(
            'imagen' => $info_producto['imagen'],
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'proveedor' => $proveedor,
            'color' => $color,
            'opcion1' => $opcion1,
            'size' => $info_producto['size'],
            'peso' => $info_producto['peso'],
        );


      //  print_r($_SESSION['carrito']);
        //print $cantidad_carrito;

        // if ($_SESSION['carrito'][$idcarrito]) {
        $idcarrito++;

    } else {
        $idcarrito = 0;


        $id = $_REQUEST['id_producto'];

        $producto = new ameri\Producto;
        $info_producto = $producto->mostrarPorId($id);

       // print '<pre>';
        //print_r($_POST);

        $nombre = $_REQUEST['nombre_producto'];
        $descripcion = $_REQUEST['descripcion_producto'];
        $proveedor = $_REQUEST['proveedor_producto'];
        $opcion1 = $_REQUEST['selectOpciones1_producto'];

        $color = $_REQUEST['color_producto'];

        $_SESSION['carrito'][$idcarrito] = array(
            'imagen' => $info_producto['imagen'],
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'proveedor' => $proveedor,
            'color' => $color,
            'opcion1' => $opcion1,
            'size' => $info_producto['size'],
            'peso' => $info_producto['peso'],
        );

        //print_r($_SESSION['carrito']);
       // print $cantidad_carrito;

        // if ($_SESSION['carrito'][$idcarrito]) {
        $idcarrito++;
    }

    // }
}
*/


/*
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $opcion2 = $_REQUEST['selectOpciones2_producto'];
        $opcion3 = $_REQUEST['selectOpciones3_producto'];
        $opcion4 = $_REQUEST['selectOpciones4_producto'];
        $opcion5 = $_REQUEST['selectOpciones5_producto'];
        $opcion6 = $_REQUEST['selectOpciones6_producto'];
        $opcion7 = $_REQUEST['selectOpciones7_producto'];
        $opcion8 = $_REQUEST['selectOpciones8_producto'];
        $opcion9 = $_REQUEST['selectOpciones9_producto'];
        $opcion10 = $_REQUEST['selectOpciones10_producto'];

        $color = $_REQUEST['color_producto'];


        $_SESSION['carrito'] = array(
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'proveedor' => $proveedor,
            'imagen' => $info_producto['imagen'],
            'opcion1' => $opcion1,
            'opcion2' => $opcion2,
            'opcion3' => $opcion3,
            'opcion4' => $opcion4,
            'opcion5' => $opcion5,
            'opcion6' => $opcion6,
            'opcion7' => $opcion7,
            'opcion8' => $opcion8,
            'opcion9' => $opcion9,
            'opcion10' => $opcion10,
            'size' => $info_producto['size'],
            'peso' => $info_producto['peso'],
            'color' => $color,
        );

        if ($_SESSION['carrito']) {
            print '<pre>';
            echo 'aqui deberia salir todos los session';
            print_r($_SESSION);
            echo 'este es el carrito';
            print_r($_SESSION['carrito']);
            die;
        }
    }
}
*/



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