<?php
// session_start();

// if(!isset($_SESSION['admin_info']) OR empty($_SESSION['admin_info']))
//     header('Location: index.php');
// print '<pre>';
// print_r($_POST);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // $pepper = getConfigVariable("IDGDIMEC");
    //$pepper = getConfigVariable("idgdimec");
    $nombre_user = $_POST['first_name_user'];
    $apellido_user = $_POST['last_name_user'];
    $nombre_login = $_POST['nombre_login'];
    $email_user = $_POST['email_user'];
    $clave_admin = $_POST['pwd_user'];
    $clave_admin2 = $_POST['pwd2_user'];
    //$pwd_peppered = hash_hmac("sha256", $clave_admin, $pepper);
    $pwd_hash = password_hash($clave_admin, PASSWORD_DEFAULT); 
    require 'vendor/autoload.php';

    $usuario = new ameri\Usuario;

    if ($_POST['accion'] === 'Registrar'){

        //Revisar si el usuario ya existe
        // if(empty($_POST['nombre_evento']))
        //     exit('Completar titulo');
        // if(empty($_POST['descripcion_evento']))
        //     exit('Completar descripción');

        $_params = array(
            "nombre_login" =>$nombre_login,
            "pwd_usuario_hash" =>$pwd_hash,
            "nombre_usuario" =>$nombre_user,
            "apellido_usuario" =>$apellido_user,
            "email_user" =>$email_user,
            "estado" => 1,
        );

        $rpt = $usuario->registrar($_params);
        
        if($rpt)
            header('Location: index.php');
        else
            print 'Error al registrar el usuario';
    }

    //$admin = new ameri\Admin;
    // $resultado = $admin ->login($nombre_admin, $clave_admin);
    // print($resultado);
    // if ($resultado){
    //     session_start();
        
    //     $_SESSION['admin_info'] = array(
    //         "nombre_login" => $resultado['nombre_login'],
    //         'estado' => 1
    //     );        
    //     header('Location: dashboard.php');
    // }
    // else{
    //     header("Location: index.php?message=success");
    //     session_start();
    //     $_SESSION['message'] = 'Usuario o contraseña incorrecto';
    //     header("Location: index.php");
    //     exit(json_encode(array('estado'=>FALSE, 'mensaje'=>'Error al iniciar sesión')));
    // }

}

//a12345A3!
// 9!a5BPwq4H8!L


?>