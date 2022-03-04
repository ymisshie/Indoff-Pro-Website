<?php

print '<pre>';
print_r($_POST);


if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // ini_set();
    $nombre = $_POST['name'];
    $visitor_email = $_POST['email'];
    $phone = $_POST['phone'];
    $mensaje = $_POST['message'];

    // $email_from = "alessandra.palacios@indoff.com";
	$email_subject = "Nuevo Mensaje en Indoff Pro";

	$email_body = "Has recibido un nuevo mensaje de $nombre.\n
                             El mensaje es:\n $mensaje. \n
                             Su celular es:\n $phone. \n
                             Su correo es: $visitor_email. \n";

    
    $to = "alessandra.palacios@indoff.com";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // $headers = "From: $email_from \r\n";
    
    // $headers .= "Reply-To: $visitor_email \r\n";

    mail($to,$email_subject,$email_body,$headers);

    session_start();
    $_SESSION['contacto'] = 'Su mensaje ha sido envíado, pronto lo contactaremos. Agradecemos su preferencia.';
    header("Location: contacto.php");
    exit(json_encode(array('estado'=>FALSE, 'mensaje'=>'Error al iniciar sesión')));
}

?>