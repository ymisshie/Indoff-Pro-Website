<?php
// session_start();

// if(!isset($_SESSION['admin_info']) OR empty($_SESSION['admin_info']))
//     header('Location: index.php');
print '<pre>';
print_r($_POST);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // $pepper = getConfigVariable("IDGDIMEC");
    //$pepper = getConfigVariable("idgdimec");
    $nombre_user = $_POST['first_name_user'];
    $apellido_user = $_POST['last_name_user'];
    $nombre_login = $_POST['nombre_login'];
    $email_user = $_POST['email_user'];
    $clave_admin = $_POST['pwd_user'];
    $clave_admin2 = $_POST['pwd2_user'];
    $phone_user = $_POST['phone_user'];
    $captcha = $_POST['g-recaptcha-response'];
    $secret = "6LcpJ7MeAAAAAE6pd-nIeeMl0PbFPYX9nUpDWm9d";
    //$pwd_peppered = hash_hmac("sha256", $clave_admin, $pepper);
    $pwd_hash = password_hash($clave_admin, PASSWORD_DEFAULT); 
    require 'vendor/autoload.php';

    //Generar vkey
    $vkey = md5(time().$nombre_login);

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
            "phone_user" =>$phone_user,
            "estado" => 1,
            "verification_key" => $vkey,
        );

        if (!$captcha){
            // session_start();
            // $_SESSION['message_crear_cuenta'] = 'Captcha inválido';
            $message = "Error al crear sesión";
            header("Location: form-register.php?message=$message");
            exit(json_encode(array('estado'=>FALSE, 'mensaje'=>'Error al crear sesión')));
        }
        $response_captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
        $captcha_success = json_decode($response_captcha, TRUE);

        if ($captcha_success['success']){

            $rpt_same_login_name = $usuario->mismo_nombre_login($_params);
            if ($rpt_same_login_name){
                $message_same_name = "El nombre de usuario ya existe";
                header("Location: form-register.php?same_login_name=$message_same_name");
            }

            $rpt_same_email = $usuario->mismo_email($_params);
            if ($rpt_same_email){
                $message_same_email = "El correo ya existe";
                header("Location: form-register.php?same_email=$message_same_email");
            }

            $rpt = $usuario->registrar($_params);
            if($rpt){
                $email_subject = "Verificación de Correo";

                $email_body = "Gracias por su preferencia, para verificar su correo de click al siguiente link: <a href='http://localhost/Indoff-Pro-Website/registration-verify.php?vkey=$vkey'> Confirmar Correo </a>";
            
                $to = $email_user;
            
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                // $headers = "From: $email_from \r\n";
                
                // $headers .= "Reply-To: $visitor_email \r\n";
            
                mail($to,$email_subject,$email_body,$headers);
                header('Location: thankyou-user.php');
            }
            
                else{
                print 'Error al registrar el usuario';}
        }
        else{
            $message = "Error al crear sesión";
            header("Location: form-register.php?message=$message");
            exit(json_encode(array('estado'=>FALSE, 'mensaje'=>'Error al crear sesión')));
        }

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