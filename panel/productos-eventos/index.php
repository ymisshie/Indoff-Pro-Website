<?php
$title = "Productos de Eventos - Indoff Pro";
$pagina ="eventos-productos";
session_start();

if(!isset($_SESSION['admin_info']) OR empty($_SESSION['admin_info']))
    header('Location: ../index.php');
?>

<?php
$root_logo = '../../assets/logo.png';

$root_functions = '../../functions.php';
$root_inicio = 'href="../dashboard.php"';
$root_styles = '<link rel="stylesheet" href="../../style.css">';
$root_categorias = 'href="../categorias/index.php"';
$root_dashboard = 'href="../dashboard.php"';
$root_productos = 'href="../productos/index.php"';
$root_eventos = 'href="../eventos/index.php"';
$root_eventos_productos = 'href="index.php"';
$root_pedidos = 'href="../pedidos/index.php"';
$root_logout = 'href="../index.php"';
$root_vendor = '../../vendor/autoload.php';
$root_productos_eventos_header = '../';
$root_cerrar_sesion = '../cerrar-sesion.php';
$root_indoffpro = 'href="../../index.php"';
?>

<?php
//include header.php file
include('../../Template/_header-admin.php')
?>

<?php
include('../../Template/_productos-eventos-editar.php')
?>


<?php
//include header.php file
include('../footer-admin.php')
?>  