<?php
$title = "Carrito";
$pagina ="carrito";

session_start();
require 'funciones.php';
?>


<?php
//include header.php file
include('header.php')
?>


<?php
/*include carrito-section*/
include('Template/_carrito-section.php')
/*include carrito-section*/
?>


<?php
//include footer.php file
include('footer.php')
?>
