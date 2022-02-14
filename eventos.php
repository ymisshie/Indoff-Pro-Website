<?php

$title = "Producto de Eventos";
$pagina ="productos_eventos";


$title = "Eventos";
$pagina ="eventos";
?>

<?php
//include header.php file
include('header.php')
?>

<?php
/*include producto-hero*/
include('Template/_producto-hero.php')
/*include producto-hero*/
?>

<?php
/*include hero-categorias*/
include('Template/_hero-eventos.php')
/*include hero-categorias*/
?>

<?php
/*include filtros-categorias*/
include('Template/_eventos-categorias.php')
/*include filtros-categorias*/
?>


<?php
//include footer.php file
include('footer.php')
?>