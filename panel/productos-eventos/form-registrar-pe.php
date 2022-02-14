
<?php
$title = "Registro Eventos - Indoff Pro";
$pagina ="eventos";
?>

<?php
$root_functions = '../../functions.php';
$root_inicio = 'href="../dashboard.php"';
$root_styles = '<link rel="stylesheet" href="../../style6.css">';
$root_categorias = 'href="../categorias/index.php"';
$root_dashboard = 'href="../dashboard.php"';
$root_productos = 'href="../productos/index.php"';
$root_eventos = 'href="../eventos/index.php"';
$root_eventos_productos = 'href="index.php"';
$root_pedidos = 'href="../pedidos/index.php"';
$root_logout = 'href="../index.php"';
$root_vendor = '../../vendor/autoload.php';
$root_productos_eventos_header = '../';
?>

<?php
//include header.php file
include('../../Template/_header-admin.php')
?>

<?php
//include header.php file
include('../../Template/_form-registrar-pe.php')
?>


<?php
//include header.php file
include('../../footer.php')
?>