<?php

require 'vendor/autoload.php';


//print $id;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $cotizacion = new ameri\Cotizaciones;
    $cotcat = new ameri\Cotcat;
    $info_carrito = new ameri\Carrito;

    $username = $_GET['id'];

    print($username);

    $carrito = $info_carrito->mostrar();
    $cantidad_carrito = 0;


    print '<pre>';
    print_r($carrito);



foreach($carrito as $info_carrito)
{
    $info_usuario=$info_carrito[0];
   // print $info_usuario;
    $id_usuario=$info_carrito[1];
   // print $id_usuario;
    $usuarios_id=$info_carrito[4];
   print $usuarios_id;
}

$_params = array(
    'info_usuario' =>$info_usuario,
    'id_usuario' =>$id_usuario,
    'usuarios_id' =>$usuarios_id,
    'fecha' => date('Y-m-d')
);
    $rpt = $cotcat->registrar($_params);

    if ($rpt) {

        $cotcat_info = 0;
        $cotcat_info = $cotcat->mostrar();

        print_r ($cotcat_info);

        $count = count($cotcat_info);

        $id_cotcat = $count;

        print $id_cotcat;

        foreach ($carrito as $producto) {
            if ($username == $producto['usuarios_id']) {
                $_params = array(
                    "info_usuario" => $info_usuario,
                    "id_usuario" => $id_usuario,
                    "usuarios_id" => $usuarios_id,
                    "cotcat_id" =>  $id_cotcat,
                    "nombre" => $producto['nombre'],
                    "proveedor" => $producto['proveedor'],
                    "descripcion" => $producto['descripcion'],
                    "imagen" => $producto['imagen'],
                    "fecha" => $producto['fecha'],
                    "opciones" => $producto['opciones'],
                    "cantidad" => $producto['cantidad'],
                    "precio" => $producto['precio'],
                    "size" => $producto['size'],
                    "peso" => $producto['peso'],
                    "color" => $producto['color'],
                );
                $rpt = $cotizacion->registrar($_params);
            }
        }

        $carrito = new ameri\Carrito;
        $rpt = $carrito->eliminarPorUsuario($username);

        if ($rpt) {
            //cuando se el registro se de de forma correcta se direccina a
            header('Location: cotizaciones.php');
        }
    }
}
