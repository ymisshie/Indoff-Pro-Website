<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['accion'] === 'login') {

        $user = $_POST['username'];
        $password = $_POST['user_password'];

        $user = new ameri\Usuario;

        $resultado = $user->login($user, $password);

        var_dump($resultado);

        die;
        if ($resultado) {
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
        } else {
            //header("Location: login.php?message=success");
            session_start();
            $_SESSION['message'] = 'Usuario, contraseña incorrecta o la cuenta no ha sido verificada';
            header("Location: index.php");
            exit(json_encode(array('estado' => FALSE, 'mensaje' => 'Error al iniciar sesión')));
        }
    }

    if ($_POST['accion'] === 'Volver a enviar') {

        $usuarios = new ameri\Usuario;
        $info_usuarios = $usuarios->mostrar();


        $vkey = $_POST['vkey'];
        $email_user = $_POST['email_user'];

        print $vkey;
        $email_subject = "Indoff Pro | Verificar cuenta";

        $email_body = "Gracias por su preferencia, para verificar su correo por favor de click al siguiente link: <a href='http://indoffpro.com/registration-verify.php?vkey=$vkey'> Confirmar Correo </a>";

        $to = $email_user;


        try {

            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'ecngx308.inmotionhosting.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'indoffpro@indoffpro.com';                     //SMTP username
            $mail->Password   = '9!IndoffPro12345';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('indoffpro@indoffpro.com', 'Indoff Pro');
            $mail->addAddress($to);     //Add a recipient
            $mail->addReplyTo('ana.gallegos@indoff.com', 'Contacto Indoff Pro');
            //$mail->addCC('cc@example.com');
            $mail->addBCC('indoffpro@indoff.com');
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $email_subject;
            $mail->Body    = $email_body;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
            header("Location: confirmation.php?to=$email_user,$vkey");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        header("Location: confirmation.php?to=$email_user,$vkey");
    }
}
