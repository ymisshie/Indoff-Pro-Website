<?php
$title = "Producto";
$pagina = "productos";
?>

<?php
//include header.php file
include('header.php')
?>

<?php

require 'vendor/autoload.php';



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
        /*
    $opcion2 = $_REQUEST['selectOpciones2_producto'];
    $opcion3 = $_REQUEST['selectOpciones3_producto'];
    $opcion4 = $_REQUEST['selectOpciones4_producto'];
    $opcion5 = $_REQUEST['selectOpciones5_producto'];
    $opcion6 = $_REQUEST['selectOpciones6_producto'];
    $opcion7 = $_REQUEST['selectOpciones7_producto'];
    $opcion8 = $_REQUEST['selectOpciones8_producto'];
    $opcion9 = $_REQUEST['selectOpciones9_producto'];
    $opcion10 = $_REQUEST['selectOpciones10_producto'];
*/
        $color = $_REQUEST['color_producto'];

        /*
    $_SESSION["carrito"][$nombre]["id"] = $id;
    $_SESSION["carrito"][$nombre]["nombre"] = $info_producto['nombre'];
    $_SESSION["carrito"][$nombre]["proveedor"] = $info_producto['proveedor'];
    $_SESSION["carrito"][$nombre]["descripcion"] = $info_producto['descripcion'];
    $_SESSION["carrito"][$nombre]["imagen"] = $info_producto['imagen'];
    $_SESSION["carrito"][$nombre]["opcion1"] = $opcion1;
    $_SESSION["carrito"][$nombre]["opcion2"] = $opcion2;
    $_SESSION["carrito"][$nombre]["opcion3"] = $opcion3;
    $_SESSION["carrito"][$nombre]["opcion4"] = $opcion4;
    $_SESSION["carrito"][$nombre]["opcion5"] = $opcion5;
    $_SESSION["carrito"][$nombre]["opcion6"] = $opcion6;
    $_SESSION["carrito"][$nombre]["opcion7"] = $opcion7;
    $_SESSION["carrito"][$nombre]["opcion8"] = $opcion8;
    $_SESSION["carrito"][$nombre]["opcion9"] = $opcion9;
    $_SESSION["carrito"][$nombre]["opcion10"] = $opcion10;
    $_SESSION["carrito"][$nombre]["size"] = $info_producto['size'];
    $_SESSION["carrito"][$nombre]["peso"] = $info_producto['peso'];
    $_SESSION["carrito"][$nombre]["color"] = $color;

    */
        $_SESSION['carrito'][$idcarrito] = array(
            'imagen' => $info_producto['imagen'],
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'proveedor' => $proveedor,
            'color' => $color,
            'opcion1' => $opcion1,
            /*
        'opcion2' => $opcion2,
        'opcion3' => $opcion3,
        'opcion4' => $opcion4,
        'opcion5' => $opcion5,
        'opcion6' => $opcion6,
        'opcion7' => $opcion7,
        'opcion8' => $opcion8,
        'opcion9' => $opcion9,
        'opcion10' => $opcion10,
        */
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

?>


<?php
/*include producto-hero*/
include('Template/_producto-hero.php')
/*include producto-hero*/
?>

<?php
//include footer.php file
include('footer.php')
?>


