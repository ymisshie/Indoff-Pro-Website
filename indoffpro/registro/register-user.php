<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['accion'] === 'Registrar') {

        $name_user = $_POST['name_user'];
        $lastname_user = $_POST['lastname_user'];
        $username = $_POST['username'];
        $phone_user = $_POST['phone_user'];
        $password_user = $_POST['password_user'];
        $email_user = $_POST['email_user'];


        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $secretkey = '6Ld_7SEgAAAAAEEdN2TWW9RV6SO0gZXV5pRPfLUB';

        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

        $atributos = json_decode($response, true);


        if (!$atributos['success']) {
            $_SESSION['message'] = 'Por favor verifique el captcha';

            print $_SESSION['message'];

            header("Location: index.php");
        } else {
            $pwd_hash = password_hash($password_user, PASSWORD_DEFAULT);

            //Generar vkey
            $vkey = md5(time() . $username);

            $usuario = new ameri\Usuario;

            $_params = array(
                "nombre_login" => $username,
                "pwd_usuario_hash" => $pwd_hash,
                "nombre_usuario" => $name_user,
                "apellido_usuario" => $lastname_user,
                "email_user" => $email_user,
                "phone_user" => $phone_user,
                "estado" => 1,
                "verification_key" => $vkey,
            );

            $rpt_same_login_name = $usuario->mismo_nombre_login($_params);
            if ($rpt_same_login_name) {
                $message_same_name = "El nombre de usuario ya existe";
                header("Location: index.php?message=$message_same_name");
            }

            $rpt_same_email = $usuario->mismo_email($_params);
            if ($rpt_same_email) {
                $message_same_email = "El correo ya existe";
                header("Location: index.php?message=$message");
            }

            $rpt = $usuario->registrar($_params);

            if ($rpt) {

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
                    $mail->addAddress($to, $name_user);     //Add a recipient
                    $mail->addReplyTo('ana.gallegos@indoff.com', 'Contacto Indoff Pro');
                    //$mail->addCC('cc@example.com');
                    $mail->addBCC('indoffpro@indoff.com');

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
            } else {
                print 'Error al registrar el usuario';
            }
        }
    }
}
