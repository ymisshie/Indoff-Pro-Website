<?php

require '../../vendor/autoload.php';

$categoria = new ameri\Evento;
print '<pre>';
print_r($_POST);
print_r($_FILES);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['accion'] === 'Registrar') {

        if (empty($_POST['nombre_categoria']))
            exit('Completar titulo');

        if (empty($_POST['descripcion_categoria']))
            exit('Completar titulo');

        $_params = array(
            'nombre' => $_POST['nombre_categoria'],
            'descripcion' => $_POST['descripcion_categoria'],
            'imagen' => subirFoto(),
            'fecha' => date('Y-m-d')
        );

        $rpt = $categoria->registrar($_params);

        if ($rpt) {
            $message = "Se ha añadido un evento satisfactoriamente.";
            $estado = "alert-success";
            header("Location: index.php?message=" . $message . "&estado=" . $estado);
        } else {
            $message = "Se ha producido un error al registrar el evento.";
            $estado = "alert-warning";
            header("Location: index.php?message=" . $message . "&estado=" . $estado);
        }
    }


    if ($_POST['accion'] === 'Actualizar') {
        print '<pre>';
        print_r($_POST);

        if (empty($_POST['nombre_categoria'])) {
            exit('Completar titulo');
        }

        if (empty($_POST['descripcion_categoria'])) {
            exit('Completar descripcion');
        }

        $_params = array(
            'nombre' => $_POST['nombre_categoria'],
            'descripcion' => $_POST['descripcion_categoria'],
            'fecha' => date('Y-m-d'),
            'id' => $_POST['id'],
            'orden' => $_POST['orden_categorias'],
        );

        if (!empty($_POST['imagen_temp'])) {
            $_params['imagen'] = $_POST['imagen_temp'];
            print_r($_POST['imagen_temp']);
        }

        if (!empty($_FILES['imagen']['name'])) {
            print_r($_FILES);
            $_params['imagen'] = subirFoto();
        }

        $rpt = $categoria->actualizar($_params);

        print $rqt;

        if ($rpt) {
            $message = "Se ha actualizado un evento satisfactoriamente.";
            $estado = "alert-success";

            header("Location: index.php?message=" . $message . "&estado=" . $estado);
        } else {
            $message = "Se ha producido un error al actualizar el evento.";
            $estado = "alert-danger";

            header("Location: index.php?message=" . $message . "&estado=" . $estado);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $id = $_GET['id'];

    $rpt = $categoria->eliminar($id);

    if ($rpt) {
        $message = "Se ha eliminado un evento satisfactoriamente.";
        $estado = "alert-success";

        header("Location: index.php?message=" . $message . "&estado=" . $estado);
    } else {
        $message = "Se ha producido un error al eliminar el evento.";
        $estado = "alert-danger";

        header("Location: index.php?message=" . $message . "&estado=" . $estado);
    }
}



function subirFoto()
{
    $carpeta = __DIR__ . '../../../upload/Eventos/';

    $archivo = $carpeta . $_FILES['imagen']['name'];

    move_uploaded_file($_FILES['imagen']['tmp_name'], $archivo);

    return $_FILES['imagen']['name'];
}
