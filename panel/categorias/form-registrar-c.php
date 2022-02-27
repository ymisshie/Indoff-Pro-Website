
<?php
$title = "Registro Categorias - Indoff Pro";
$pagina = "registro-categorias";
session_start();

if(!isset($_SESSION['admin_info']) OR empty($_SESSION['admin_info']))
    header('Location: ../index.php');
?>

<?php
$root_functions = '../../functions.php';
$root_inicio = 'href="../dashboard.php"';
$root_styles = '<link rel="stylesheet" href="../../style.css">';
$root_categorias = 'href="index.php"';
$root_dashboard = 'href="../dashboard.php"';
$root_productos = 'href="../productos/index.php"';
$root_eventos = 'href="../eventos/index.php"';
$root_eventos_productos = 'href="../productos-eventos/index.php"';
$root_pedidos = 'href="../pedidos/index.php"';
$root_logout = 'href="../index.php"';
$root_vendor = '../../vendor/autoload.php';
$root_cerrar_sesion = '../cerrar-sesion.php';
$root_productos_eventos_header = '../';
?>

<?php
//include header.php file
include('../../Template/_header-admin.php')
?>

<?php
//include header.php file
include('../../Template/_form-registrar-c.php')
?>
