
<?php
$title = "Registro Productos - Indoff Pro";
$pagina ="registro-productos";
?>

<?php
$root_functions = '../../functions.php';
$root_inicio = 'href="../dashboard.php"';
$root_styles = '<link rel="stylesheet" href="../../style.css">';
$root_categorias = 'href="../categorias/index.php"';
$root_dashboard = 'href="../dashboard.php"';
$root_productos = 'href="index.php"';
$root_eventos = 'href="../eventos/index.php"';
$root_eventos_productos = 'href="../productos-eventos/index.php"';
$root_pedidos = 'href="../pedidos/index.php"';
$root_logout = 'href="../index.php"';
?>


<?php
//include header.php file
include('../../Template/_header-admin.php')
?>

<?php
//include header.php file
include('../../Template/_productos-actualizar.php')
?>

<?php
    //include footer.php file
    include('../../footer.php')
?>
