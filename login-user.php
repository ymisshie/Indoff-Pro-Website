<?php

// print '<pre>';
// print_r($_POST);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nombre_usuario = $_POST['nombre_usuario'];
    $clave_usuario = $_POST['clave_usuario'];

    require 'vendor/autoload.php';

    $user = new ameri\Usuario;

    $resultado = $user ->login($nombre_usuario, $clave_usuario);
    print($resultado);

    if ($resultado){
        session_start();
        
        $_SESSION['user_info'] = array(
            "id" => $resultado['id'],
            "nombre_usuario" => $resultado['nombre_usuario'],
            "apellido_usuario" => $resultado['apellido_usuario'],
            "nombre_login" => $resultado['nombre_login'],
            "email_user" => $resultado['email_user'],
            'estado' => 1
        );        
        header('Location: index.php');
    }
    else{
        //header("Location: login.php?message=success");
        session_start();
        $_SESSION['message'] = 'Usuario, contraseña incorrecta o la cuenta no ha sido verificada';
        header("Location: login.php");
        exit(json_encode(array('estado'=>FALSE, 'mensaje'=>'Error al iniciar sesión')));
    }

}

?>