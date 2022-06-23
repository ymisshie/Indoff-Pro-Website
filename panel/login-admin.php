<?php
session_start();

require '../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_user = $_POST['admin_user'];
    $admin_password = $_POST['admin_password'];

    $ip = $_SERVER['REMOTE_ADDR'];
    $captcha = $_POST['g-recaptcha-response'];
    $secretkey = '6Ld_7SEgAAAAAEEdN2TWW9RV6SO0gZXV5pRPfLUB';

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");

    $atributos = json_decode($response, true);

    print '<pre>';
    print_r($_POST);

    /*
    if (!$atributos['success']) {
        $_SESSION['captcha_validation']['message'] = 'Por favor verifique el captcha';
        $_SESSION['captcha_validation']['class'] = 'text-red mb-2 fw-500';
        $_SESSION['captcha_validation']['icon'] = 'text-red me-2 fas fa-multiply';

        print $_SESSION['message'];

        header("Location: index.php?admin_user=$admin_user&admin_password=$admin_password");
    } else {
*/
    $admin = new ameri\Admin;
    $result = $admin->login($admin_user, $admin_password);

    if ($result) {
        $_SESSION['admin_info'] = array(
            "admin_user" => $result['admin_user'],
            'estado' => 1
        );

        print '<pre>';
        print_r($_SESSION['admin_info']);

        header('Location: dashboard.php');
    } else {

        $_SESSION['message'] = 'Usuario o contraseña incorrectos';

        header("Location: index.php?admin_user=$admin_user&admin_password=$admin_password&message=si");
        // exit(json_encode(array('estado' => false, 'mensaje' => 'Error al iniciar sesión')));
    }


    // }
}
