<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$mail = new PHPMailer(true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['accion'] === 'login') {

        $username = $_POST['username'];
        $password = $_POST['user_password'];

        $user = new ameri\Usuario;
        $result = $user->login($username, $password);

        print '<pre>';

        if ($result) {

            $_SESSION['user_info'] = array(
                "id" => $result['id'],
                "username" => $result['username'],
                "pwd_usuario_hash" => $result['pwd_usuario_hash'],
                "user_firstname" => $result['user_firstname'],
                "user_lastname" => $result['user_lastname'],
                "email_user" => $result['email_user'],
                "phone_user" => $result['phone_user'],
                "estado" => 1,
                "verification_key" => $result['verification_key'],
                "verificado" => $result['verificado']
            );
            print $result['verificado'];

            if ($result['verificado'] == '' || empty($result['verificado'])) {
                $message = 'La cuenta aún no ha sido verificada.';
                $email = $result['email_user'];
                $vkey = $result['verification_key'];
                header("Location: index.php?message=$message&to=$email&vkey=$vkey");
            } else {
                header('Location: ../../index.php');
            }
        } else {

            $message = 'Usuario o contraseña incorrectos';
            header("Location: index.php?message=$message");
        }
    }

    if ($_POST['accion'] === 'Volver a enviar') {

        $vkey = $_POST['vkey'];
        $to = $_POST['to'];

        $email_subject = "Indoff Pro | Verificar cuenta";

        $email_body = "Gracias por su preferencia, para verificar su correo por favor de click al siguiente link: <a href='http://indoffpro.com/registration-verify.php?vkey=$vkey'> Confirmar Correo </a>";
        try {

            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'michelle.gastelum@cetys.edu.mx';                     //SMTP username
            $mail->Password   = 'n5dnin76';                               //SMTP password
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

            $message = 'Un nuevo mensaje ha sido enviado';

            header("Location: confirmation.php?to=$to&vkey=$vkey&message=$message");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
