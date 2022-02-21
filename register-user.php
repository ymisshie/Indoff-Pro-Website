<?php
// session_start();

// if(!isset($_SESSION['admin_info']) OR empty($_SESSION['admin_info']))
//     header('Location: index.php');
print '<pre>';
print_r($_POST);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // $pepper = getConfigVariable("IDGDIMEC");
    //$pepper = getConfigVariable("idgdimec");
    $nombre_admin = $_POST['first_name_user'];
    $apellido_admin = $_POST['last_name_user'];
    $nombre_login = $_POST['nombre_login'];
    $email_user = $_POST['email_user'];
    $clave_admin = $_POST['pwd_user'];
    $clave_admin2 = $_POST['pwd2_user'];
    //$pwd_peppered = hash_hmac("sha256", $clave_admin, $pepper);
    //$pwd_hash = password_hash($clave_admin, PASSWORD_DEFAULT); 
    // print_r($pwd_hash);
    require 'vendor/autoload.php';

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

?>