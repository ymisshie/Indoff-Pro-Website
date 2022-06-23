<?php
ob_clean();

use Dompdf\Dompdf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$mail = new PHPMailer(true);

$title = "Cotización | Indoff Pro";
$pagina = "cotizacion";

session_start();

if (!isset($_SESSION['admin_info']) or empty($_SESSION['admin_info'])) {
    header('Location: ../index.php');
} else {
    $root_logo = '../../assets/logo.png';
    $root_logo2 = '../../assets/logo2.png';
    $root_functions = '../../functions.php';
    $root_inicio = 'href="../dashboard.php"';
    $root_styles = '<link rel="stylesheet" href="../../style.css">';
    $root_categorias = 'href="../categorias/index.php"';
    $root_dashboard = 'href="../dashboard.php"';
    $root_productos = 'href="../productos/index.php"';
    $root_eventos = 'href="../eventos/index.php"';
    $root_eventos_productos = 'href="../productos-eventos/index.php"';
    $root_pedidos = 'href="index.php"';
    $root_logout = 'href="../index.php"';
    $root_vendor = '../../vendor/autoload.php';
    $root_productos_eventos_header = '../';
    $root_cerrar_sesion = '../cerrar-sesion.php';
    $root_indoffpro = 'href="../../index.php"';

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {

        $id = $_GET['id'];

        $info_usuario = new ameri\Usuario;
        $usuario = $info_usuario->mostrar();

        $info_productos = new ameri\Cotizaciones;
        $info_cotizacion = new ameri\Cotcat;

        $infocotcat = $info_cotizacion->mostrar();

        $dompdf = new Dompdf();
        /*
        print '<pre>';
        print_r($infocotcat);
        */

        foreach ($infocotcat as $item) {
            if ($item['id'] == $id) {
                $nombre_usuario = $item['info_usuario'];
                $fecha = $item['fecha'];
                $username = $item['usuarios_id'];
            }

            $pp = $info_productos->mostrar();

            //$cotizacion = $info_cotizacion->mostrarPorId();
        }


        $foreach = '';
        $imagen = '';
        $coloresc = '';
        $cantidadc = '';
        $precioc = '';
        $ifc = '';
        $p = '';

        $sizec = '';

        foreach ($pp as $producto) {
            $foreach = $foreach . '<tr>
        <td scope="col" style="font-weight:600">';

            $imagen = '<img src="' . '../../upload/Productos/' . $producto['imagen'] . '" width="100px">';

            $foreach = $foreach . $imagen;
            $foreach = $foreach . '
        </td>
        <td scope="col" style="font-weight:700; padding-top:1em; color:darkviolet;">' . $producto['nombre'] . '</span><br><span style="font-weight:600; color:black;">' . $producto['proveedor'] . '</span> <br><span style="font-weight:400; color:black;">' . $producto['descripcion'] . '</span></td>
        <td scope="col" style="font-weight:400; text-transform: capitalize;">
            <div>';

            $colores = $producto['color'];
            $separada = '';
            $separador = ",";
            $separada = explode($separador, $colores);

            $count_colores = count($separada);

            for ($u = 0; $u < $count_colores; $u++) {
                $coloresc = '<div style="border-radius:3em; padding:1em; width:0%; background-color:';
                $coloresc = $coloresc . $separada[$u];
                $coloresc = $coloresc . '"> </div>';
            }


            $coloresc = $coloresc . '</div>';

            $coloresc = $coloresc . $producto['color'] . '</td><td scope="col" style="font-weight:600;">';

            $foreach = $foreach . $coloresc;

            $cantidad = $producto['cantidad'];
            $separada_cantidad = '';
            $separada_costo = '';
            $separador = ",";
            $separada_cantidad = explode($separador, $cantidad);

            $count_cantidad = count($separada_cantidad);

            for ($ca = 0; $ca < $count_cantidad; $ca++) {
                $cantidadc = $cantidadc . '<div style="font-weight:700; color:darkviolet;">';

                $foreach = $foreach . $cantidadc;
                if ($separada_cantidad[$ca] == "") {
                } else {
                    $ifc = $separada_cantidad[$ca];

                    $ifc = $ifc . '<span style="font-weight:400; color:black;">';

                    if ($separada_cantidad[$ca] == 1) {
                        $ifc = $ifc . ' unidad';
                    } elseif ($separada_cantidad[$ca] > 1) {
                        $ifc = $ifc . ' unidades';
                    }

                    $foreach = $foreach . $ifc;
                    $foreach = $foreach . '                                       
                        </span>
                    <?php';
                }

                $foreach = $foreach . '
                </div>';
            }

            $foreach = $foreach . '
        </td>
        <td scope="col" style="font-weight:600; color:darkviolet;';


            $costo = $producto['precio'];
            $separada_costo = '';
            $separador = ",";
            $separada_costo = explode($separador, $costo);

            $count_costo = count($separada_costo);

            for ($pa = 0; $pa < $count_cantidad; $pa++) {
                $precioc = '
                <div style="font-weight:700;">';
                if ($separada_costo[$pa] == "") {
                } else {
                    if ($separada_costo[$pa] == 1) {
                        $precioc = $precioc . '$';
                    } elseif ($separada_costo[$pa] > 1) {
                        $precioc = $precioc . ' $';
                    }
                    $integer = (int)$separada_costo[$pa];
                    $integer = number_format($integer, 2, '.', '.');
                    $precioc = $precioc . $integer;
                }

                $foreach = $foreach . $precioc;
                $foreach = $foreach . '</div>';
            }


            $foreach = $foreach . '
        </td>

        <td scope="col" style="font-weight:500;">';

            if ($producto['size'] != '') {
                $sizec = $producto['size'];
            } else {
                $sizec = 'N/A';
            }
            $foreach = $foreach . $sizec;

            $foreach = $foreach . '
                                                    </td>

       
    </tr>';
        }

        $html = '<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cotización</title>
  </head>
  <body style="font-family: Arial, Helvetica, sans-serif !important; font-size:1em;">
  
<section style="font-family: Arial, Helvetica, sans-serif !important;"> 
    <div style="">
        <div style="">
            <div>
                <img src="' . $root_logo2 . '" width=100" alt="Logo Indoff Pro">
                <div>
                    <h3 style="font-weight:700; text-align:end;">Productos Promocionales e incentivos</h3>
                </div>
            </div>
        </div>

        <div style="font-family: Arial, Helvetica, sans-serif !important;">
        
                <h6 style="font-weight: 500; margin-bottom:0em; font-family: Arial, Helvetica, sans-serif !important;">FECHA: ' . $fecha . '</h6>
                <h6 style="font-weight: 500; margin-bottom:0em;">CLIENTE: ' . $nombre_usuario . '</h6>
                <h6 style="font-weight: 500; margin-bottom:0em;">Officina general: 11816 Lackland Road St. Louis, MO, USA 63146</h6>
                <h6 style="font-weight: 500; margin-bottom:0em;">TEL: (001-314) 997-1122
                </h6>
                <h6 style="font-weight: 500; margin-bottom:0em;">SUCURSAL TIJUANA: Privada Bugambilias #20209, Tijuana, BC, CP 22216
                </h6>
                <h6 style="font-weight: 500; margin-bottom:0em;">TEL: 664-6-25-1111, FAX: 664-6-25-1114
                </h6>

        </div>

        <div>
            <table style="width:100%;">
                <thead>
                    <tr style="border: 1px solid grey; ">
                        <th scope="col" style="padding: 2em 0em 1em 0em; font-weight:700;"></th>
                        <th scope="col" style=" font-weight:700;">Información del producto</th>
                        <th scope="col" style=" font-weight:700;">Color</th>
                        <th scope="col"style=" font-weight:700;">Cantidad</th>
                        <th scope="col"style=" font-weight:700;">Precio</th>
                        <th scope="col"style=" font-weight:700;">Tanaño</th>
                        <th scope="col"style=" font-weight:700;">Peso</th>

                    </tr>
                </thead>

                <tbody>' . $foreach . '
                </tbody>
            </table>
        </div>

        <div class="">
            <h6 style=" font-weight:700;">Términos y condicioness</h6>
            <ul>
                <li style="padding-bottom:0em;">
                    <h6>La orden de compra no requiere anticipo.</h6>
                </li>
                <li style="padding-bottom:0em;">
                   <h6>15 días para el pago.</h6>
                </li>
            </ul>

            <h6 style="font-style: italic; text-align:center;">Gracias por preferir Indoff, especialistas en promocionales e incentivos.</h6>
            <h6 style="text-align:center; font-weight:700;">Lic. Ana Gallegos</h6s>
            <h6 style="text-align:center;">Manager Communications</h6>
        </div>

    </div>
</section>

</body>
</html>
';

        foreach ($usuario as $user) {
            if ($user['nombre_login'] == $username) {
                $to = $user['email_user'];
            }
        }

        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->set_option('isRemoteEnabled', true);
        $pdf = $dompdf->stream("Cotizacion.pdf", array('Attachement' => '0'));

        /*
        //save the pdf file on the server
        $pdfroot  = dirname(dirname(__FILE__));
        $pdfroot .= '../../upload/Cotizaciones/';

        $pdf_string =   $dompdf->output();
        file_put_contents($pdfroot, $pdf_string);
*/
        /*
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


            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Cotización Indoff Pro | ';
            $mail->Body    = $html;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
          //  header("Location: thankyou-user.php?to=$email_user,$vkey");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        } else {
        print 'Error al registrar el usuario';
        }

        // $email_from = "alessandra.palacios@indoff.com";
        $email_subject = "Nueva cotizacion";

        $email_body = $html;

        $to = "michelle.gastelum@indoff.com";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // $headers = "From: $email_from \r\n";

        // $headers .= "Reply-To: $visitor_email \r\n";

        mail($to, $email_subject, $email_body, $headers);
        use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->load_html($html);
$dompdf->render();
$f;
$l;

$dompdf->stream("Cotizacion.pdf", array('Attachement' => '0'));
*/
    }
}
