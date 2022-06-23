<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$mail = new PHPMailer(true);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ini_set();
    $nombre = $_POST['name'];
    $visitor_email = $_POST['email'];
    $phone = $_POST['phone'];
    $mensaje = $_POST['message'];
    $captcha = $_POST['g-recaptcha-response'];
    $secret = "6LehDuMeAAAAAHjnSFp-eAXx4Fa5O3_q_fQu4RAI";

    if (!$captcha) {
        // session_start();
        // $_SESSION['message_crear_cuenta'] = 'Captcha inválido';
        $message = "Error al enviar mensaje";
        header("Location: index.php?message=$message");
    }
    $response_captcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
    $captcha_success = json_decode($response_captcha, true);


    if ($captcha_success['success']) {

        $email_subject = "Contacto | Nuevo Mensaje en Indoff Pro ";

        $email_body = "Se ha recibido un nuevo mensaje de parte de: $nombre.\n
                             El mensaje dice:\n $mensaje. \n
                             Su celular es:\n $phone. \n
                             Su correo es: $visitor_email. \n";

        $to = "michelle.gastelum@cetys.edu.mx";


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
            $mail->addAddress($to, $nombre_user);     //Add a recipient
            $mail->addReplyTo('ana.gallegos@indoff.com', 'Contacto Indoff Pro');
            //$mail->addCC('cc@example.com');
            $mail->addBCC('indoffpro@indoff.com');

            /*
            //Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
*/
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $email_subject;
            $mail->Body    = $email_body;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
            header("Location: index.php");
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        session_start();
        $_SESSION['contacto'] = 'Su mensaje ha sido envíado, pronto le contactaremos. Agradecemos su preferencia.';
        header("Location: index.php");
        exit(json_encode(array('estado' => false, 'mensaje' => 'Error al iniciar sesión')));
    }
}
