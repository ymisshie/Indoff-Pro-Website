<?php
session_start();

$_SESSION['user_info'] = array();  

session_destroy();

header('Location: index.php');
?>
