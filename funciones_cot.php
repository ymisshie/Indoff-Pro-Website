<?php

require 'vendor/autoload.php';


//print $id;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $cotizacion = new ameri\Cotizaciones;
    $cotcat = new ameri\Cotcat;
    $info_carrito = new ameri\Carrito;

    $nombre = $_GET['id'];

    $carrito = $info_carrito->mostrar();
    $cantidad_carrito = 0;


    $_params = array(
        'fecha' => date('Y-m-d')
    );

    $rpt = $cotcat->registrar($_params);

    if ($rpt) {
     
        $cotcat_info=0;
        $cotcat_info = $cotcat->mostrar();
        $count= count($cotcat_info);

        $id_cotcat = $count;

        print $id_cotcat;
    
        foreach ($carrito as $producto) {
            if ($nombre == $producto['usuarios_id']) {
                $_params = array(
                    "usuarios_id" => $producto['usuarios_id'],
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

        if ($rpt) {
            //cuando se el registro se de de forma correcta se direccina a
            header('Location: cotizaciones.php');
        }
    }
}
