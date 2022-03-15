<?php
print '<pre>';
print_r($_POST);
// print_r($_FILES);

require '../vendor/autoload.php';

$evento = new ameri\Evento;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['accion'] === 'Registrar') {


        
        if(empty($_POST['nombre_evento']))
            exit('Completar titulo');
        if(empty($_POST['descripcion_evento']))
            exit('Completar descripción');

            
        $_params = array(
            'nombre' => $_POST['nombre_evento'],
            'descripcion' => $_POST['descripcion_evento'],
            'imagen' => subirFoto(),
            // 'fecha'=>$_POST['fecha'],
            'fecha' => date('Y-m-d')
        );
        $rpt = $evento->registrar($_params);


        if ($rpt)
            header('Location: eventos/index.php');
        else
            print 'Error al registrar una película';
    }
    if ($_POST['accion'] === 'Actualizar') {

        
        if (empty($_POST['nombre_evento']))
            exit('Completar nombre');
        if (empty($_POST['descripcion_evento']))
            exit('Completar descripción');


        $_params = array(
            'nombre' => $_POST['nombre_evento'],
            'descripcion' => $_POST['descripcion_evento'],
            // 'fecha'=>$_POST['fecha'],
            'fecha' => date('Y-m-d'),
            'id' => $_POST['id'],
            'orden' => $_POST['orden_eventos'],
        );

        if (!empty($_POST['imagen_temp']))
            $_params['imagen'] = $_POST['imagen_temp'];

        if (!empty($_FILES['imagen']['name']))
            $_params['imagen'] = subirFoto();

        $rpt = $evento->actualizar($_params);

        if ($rpt)
            header('Location: eventos/index.php');
        else
            print 'Error al editar una película';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id = $_GET['id'];
    $rpt = $evento->eliminar($id);


    if ($rpt)
        header('Location: eventos/index.php');
    else
        print 'Error al eliminar una película';
}

function subirFoto()
{
    // Dir devuelve la ruta del proyecto donde está almacenado
    $carpeta = __DIR__ . '/../upload/Eventos/';
    $archivo = $carpeta . $_FILES['imagen']['name'];

    move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo);

    return $_FILES['imagen']['name'];
}
