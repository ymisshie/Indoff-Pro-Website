<?php

//Admin Login
if ($page_name == 'admin-login') {
    $root_header = '../header.php';
    $root_logo = '../assets/logo.png';
    $root_functions = '../database/functions.php';
    $root_index = '../index.php';
    $root_styles = '<link rel="stylesheet" href="../style.css">';
    $root_categorias = '../indoffpro/categorias/productos/index.php';
    $root_eventos = '../indoffpro/eventos/index.php';
    $root_productos_eventos = '../indoffpro/eventos/productos-eventos/index.php';
    $root_carrito = '../indoffpro/carrito/index.php';
    $root_login = '../indoffpro/login/index.php';
    $root_logout = '../cerrar-sesion.php';
    $root_vendor = '../vendor/autoload.php';
    $root_blog = '../indoffpro/blog/index.php';
    $root_contacto = '../indoffpro/contacto/index.php';
    $root_nosotros = '../indoffpro/nosotros/index.php';
    $root_upload_categorias = '../upload/Categorias/';
    $root_upload_productos = '../upload/Productos/';
    $root_upload_kits = '../upload/Kits/';
    $root_register = '../indoffpro/registro/index.php';
    $root_cotizaciones = '../indoffpro/cotizaciones/index.php';
    $root_dashboard = 'dashboard.php';
    $root_productos_kits = '../indoffpro/categorias/productos/index.php';
    $root_logout_dashboard = 'cerrar-sesion.php';
}

//Dashboard
if ($page_name == 'dashboard') {
    $root_logo = '../assets/logo.png';
    $root_script = '../script.js';
    $root_functions = '../database/functions.php';
    $root_index = '../index.php';
    $root_styles = '<link rel="stylesheet" href="../style.css">';
    $root_categorias = 'categorias/index.php';
    $root_productos = 'categorias/productos/index.php';
    $root_eventos = 'eventos/index.php';
    $root_productos_eventos = 'eventos/productos/index.php';
    $root_kits = 'kits/index.php?id=1';
    $root_productos_kits = 'kits/productos/index.php?id=1';
    $root_cotizaciones = 'cotizaciones/index.php';
    $root_logout = 'cerrar-sesion.php';
    $root_vendor = '../vendor/autoload.php';
    $root_dashboard = 'dashboard.php';
}

//Categorias
if ($page_name == 'categorias') {
    $root_script = '../../script.js';
    $root_logo = '../../assets/logo.png';
    $root_functions = '../../database/functions.php';
    $root_index = '../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../style.css">';
    $root_categorias = 'index.php';
    $root_productos = 'productos/index.php';
    $root_eventos = '../eventos/index.php';
    $root_productos_eventos = '../eventos/productos/index.php';
    $root_kits = '../kits/productos/index.php?id=1';
    $root_productos_kits = '../kits/productos/index.php?id=1';
    $root_cotizaciones = '../cotizaciones/index.php';
    $root_logout = '../../cerrar-sesion.php';
    $root_vendor = '../../vendor/autoload.php';
    $root_dashboard = '../dashboard.php';
}

//Registro categorias
if ($page_name == 'registro-categorias') {
    $root_script = '../../script.js';
    $root_logo = '../../assets/logo.png';
    $root_functions = '../../database/functions.php';
    $root_index = '../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../style.css">';
    $root_categorias = 'index.php';
    $root_productos = 'productos/index.php';
    $root_eventos = '../eventos/index.php';
    $root_productos_eventos = '../eventos/productos/index.php';
    $root_kits = '../kits/productos/index.php?id=1';
    $root_productos_kits = '../kits/productos/index.php?id=1';
    $root_cotizaciones = '../cotizaciones/index.php';
    $root_logout = '../../cerrar-sesion.php';
    $root_vendor = '../../vendor/autoload.php';
    $root_dashboard = '../dashboard.php';
}

//Editar categorias
if ($page_name == 'editar-categorias') {
    $root_script = '../../../script.js';
    $root_logo = '../../assets/logo.png';
    $root_functions = '../../database/functions.php';
    $root_index = '../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../style.css">';
    $root_categorias = 'index.php';
    $root_productos = 'productos/index.php';
    $root_eventos = '../eventos/index.php';
    $root_productos_eventos = '../eventos/productos/index.php';
    $root_kits = '../kits/productos/index.php?id=1';
    $root_productos_kits = '../kits/productos/index.php?id=1';
    $root_cotizaciones = '../cotizaciones/index.php';
    $root_logout = '../../cerrar-sesion.php';
    $root_vendor = '../../vendor/autoload.php';
    $root_dashboard = '../dashboard.php';
}

//Eventos
if ($page_name == 'eventos') {
    $root_script = '../../script.js';
    $root_logo = '../../assets/logo.png';
    $root_functions = '../../database/functions.php';
    $root_index = '../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../style.css">';
    $root_categorias = '../categorias/index.php';
    $root_productos = '../categorias/productos/index.php';
    $root_eventos = 'index.php';
    $root_productos_eventos = 'productos/index.php';
    $root_kits = '../kits/productos/index.php?id=1';
    $root_productos_kits = '../kits/productos/index.php?id=1';
    $root_cotizaciones = '../cotizaciones/index.php';
    $root_logout = '../../cerrar-sesion.php';
    $root_vendor = '../../vendor/autoload.php';
    $root_dashboard = '../dashboard.php';
}

//Registro eventos
if ($page_name == 'registro-eventos') {
    $root_script = '../../script.js';
    $root_logo = '../../assets/logo.png';
    $root_functions = '../../database/functions.php';
    $root_index = '../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../style.css">';
    $root_categorias = '../categorias/index.php';
    $root_productos = '../categorias/productos/index.php';
    $root_eventos = 'index.php';
    $root_productos_eventos = 'productos/index.php';
    $root_kits = '../kits/productos/index.php?id=1';
    $root_productos_kits = '../kits/productos/index.php?id=1';
    $root_cotizaciones = '../cotizaciones/index.php';
    $root_logout = '../../cerrar-sesion.php';
    $root_vendor = '../../vendor/autoload.php';
    $root_dashboard = '../dashboard.php';
}

//Edtar eventos
if ($page_name == 'editar-eventos') {
    $root_script = '../../script.js';
    $root_logo = '../../assets/logo.png';
    $root_functions = '../../database/functions.php';
    $root_index = '../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../style.css">';
    $root_categorias = '../categorias/index.php';
    $root_productos = '../categorias/productos/index.php';
    $root_eventos = 'index.php';
    $root_productos_eventos = 'productos/index.php';
    $root_kits = '../kits/productos/index.php?id=1';
    $root_productos_kits = '../kits/productos/index.php?id=1';
    $root_cotizaciones = '../cotizaciones/index.php';
    $root_logout = '../../cerrar-sesion.php';
    $root_vendor = '../../vendor/autoload.php';
    $root_dashboard = '../dashboard.php';
}

//Productos eventos
if ($page_name == 'productos-eventos') {
    $root_script = '../../../script.js';
    $root_logo = '../../../assets/logo.png';
    $root_functions = '../../../database/functions.php';
    $root_index = '../../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../../style.css">';
    $root_categorias = '../../categorias/index.php';
    $root_productos = '../../categorias/productos/index.php';
    $root_eventos = '../index.php';
    $root_productos_eventos = 'index.php';
    $root_kits = '../../kits/productos/index.php?id=1';
    $root_productos_kits = '../../kits/productos/index.php?id=1';
    $root_cotizaciones = '../../cotizaciones/index.php';
    $root_logout = '../../../cerrar-sesion.php';
    $root_vendor = '../../../vendor/autoload.php';
    $root_dashboard = '../../dashboard.php';
}

//Kits
if ($page_name == 'kits') {
    $root_script = '../../script.js';
    $root_logo = '../../assets/logo.png';
    $root_functions = '../../database/functions.php';
    $root_index = '../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../style.css">';
    $root_categorias = '../categorias/index.php';
    $root_productos = '../categorias/productos/index.php';
    $root_eventos = '../eventos/index.php';
    $root_productos_eventos = '../eventos/productos/index.php';
    $root_kits = 'productos/index.php?id=1';
    $root_productos_kits = 'productos/index.php';
    $root_cotizaciones = '../cotizaciones/index.php';
    $root_logout = '../../cerrar-sesion.php';
    $root_vendor = '../../vendor/autoload.php';
    $root_dashboard = '../dashboard.php';
}

if ($page_name == 'editar-kits') {
    $root_script = '../../script.js';
    $root_logo = '../../assets/logo.png';
    $root_functions = '../../database/functions.php';
    $root_index = '../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../style.css">';
    $root_categorias = '../categorias/index.php';
    $root_productos = '../categorias/productos/index.php';
    $root_eventos = '../eventos/index.php';
    $root_productos_eventos = '../eventos/productos/index.php';
    $root_kits = 'productos/index.php?id=1';
    $root_productos_kits = 'productos/index.php';
    $root_cotizaciones = '../cotizaciones/index.php';
    $root_logout = '../../cerrar-sesion.php';
    $root_vendor = '../../vendor/autoload.php';
    $root_dashboard = '../dashboard.php';
}

//Productos Kits
if ($page_name == 'productos-kits') {
    $root_logo = '../../../assets/logo.png';
    $root_functions = '../../../database/functions.php';
    $root_index = '../../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../../style.css">';
    $root_categorias = '../../categorias/index.php';
    $root_productos = '../../categorias/productos/index.php';
    $root_eventos = '../../eventos/index.php';
    $root_productos_eventos = '../../eventos/productos/index.php';
    $root_kits = '../productos/index.php?id=1';
    $root_productos_kits = 'index.php?id=1';
    $root_cotizaciones = '../../cotizaciones/index.php';
    $root_logout = '../../../cerrar-sesion.php';
    $root_vendor = '../../../vendor/autoload.php';
    $root_dashboard = '../../dashboard.php';
}

if ($page_name == 'cotizaciones') {
    $root_logo = '../../assets/logo.png';
    $root_functions = '../../database/functions.php';
    $root_index = '../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../style.css">';
    $root_categorias = '../categorias/index.php';
    $root_productos = '../categorias/productos/index.php';
    $root_eventos = '../eventos/index.php';
    $root_productos_eventos = '../eventos/productos/index.php';
    $root_kits = '../kits/productos/index.php?id=1';
    $root_productos_kits = '../kits/productos/index.php';
    $root_cotizaciones = 'index.php';
    $root_logout = '../../cerrar-sesion.php';
    $root_vendor = '../../vendor/autoload.php';
    $root_dashboard = '../dashboard.php';
}

if ($page_name == 'cotizacion') {
    $root_logo = '../../assets/logo.png';
    $root_functions = '../../database/functions.php';
    $root_index = '../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../style.css">';
    $root_categorias = '../categorias/index.php';
    $root_productos = '../categorias/productos/index.php';
    $root_eventos = '../eventos/index.php';
    $root_productos_eventos = '../eventos/productos/index.php';
    $root_kits = '../kits/productos/index.php?id=1';
    $root_productos_kits = '../kits/productos/index.php';
    $root_cotizaciones = '../index.php';
    $root_logout = '../../cerrar-sesion.php';
    $root_vendor = '../../vendor/autoload.php';
    $root_dashboard = '../dashboard.php';
}

//Productos
if ($page_name == 'productos') {
    $root_script = '../../../script.js';
    $root_logo = '../../../assets/logo.png';
    $root_functions = '../../../database/functions.php';
    $root_index = '../../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../../style.css">';
    $root_categorias = '../index.php';
    $root_productos = 'index.php';
    $root_eventos = '../../eventos/index.php';
    $root_productos_eventos = '../../eventos/productos/index.php';
    $root_kits = '../../kits/productos/index.php?id=1';
    $root_productos_kits = '../../kits/productos/index.php?id=1';
    $root_cotizaciones = '../../cotizaciones/index.php';
    $root_logout = '../../../cerrar-sesion.php';
    $root_vendor = '../../../vendor/autoload.php';
    $root_dashboard = '../../dashboard.php';
}

//Registro productos
if ($page_name == 'registro-productos') {
    $root_logo = '../../../assets/logo.png';
    $root_functions = '../../../database/functions.php';
    $root_index = '../../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../../style.css">';
    $root_categorias = '../index.php';
    $root_productos = 'index.php';
    $root_eventos = '../../eventos/index.php';
    $root_productos_eventos = '../../eventos/productos/index.php';
    $root_kits = '../../kits/productos/index.php?id=1';
    $root_productos_kits = '../../kits/productos/index.php?id=1';
    $root_cotizaciones = '../../cotizaciones/index.php';
    $root_logout = '../../../cerrar-sesion.php';
    $root_vendor = '../../../vendor/autoload.php';
    $root_dashboard = '../../dashboard.php';
}

if ($page_name == 'editar-productos') {
    $root_logo = '../../../assets/logo.png';
    $root_functions = '../../../database/functions.php';
    $root_index = '../../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../../style.css">';
    $root_categorias = '../index.php';
    $root_productos = 'index.php';
    $root_eventos = '../../eventos/index.php';
    $root_productos_eventos = '../../eventos/productos/index.php';
    $root_kits = '../../kits/productos/index.php?id=1';
    $root_productos_kits = '../../kits/productos/index.php?id=1';
    $root_cotizaciones = '../../cotizaciones/index.php';
    $root_logout = '../../../cerrar-sesion.php';
    $root_vendor = '../../../vendor/autoload.php';
    $root_dashboard = '../../dashboard.php';
}

if ($page_name == 'registro-productos-kits') {
    $root_logo = '../../../assets/logo.png';
    $root_functions = '../../../database/functions.php';
    $root_index = '../../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../../style.css">';
    $root_categorias = '../../categorias/index.php';
    $root_productos = '../../categorias/productos/index.php';
    $root_eventos = '../../eventos/index.php';
    $root_productos_eventos = '../../eventos/productos/index.php';
    $root_kits = '../productos/index.php?id=1';
    $root_productos_kits = 'index.php';
    $root_cotizaciones = '../../cotizaciones/index.php';
    $root_logout = '../../../cerrar-sesion.php';
    $root_vendor = '../../../vendor/autoload.php';
    $root_dashboard = '../../dashboard.php';
}

if ($page_name == 'editar-productos-kits') {
    $root_logo = '../../../assets/logo.png';
    $root_functions = '../../../database/functions.php';
    $root_index = '../../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../../style.css">';
    $root_categorias = '../../categorias/index.php';
    $root_productos = '../../categorias/productos/index.php';
    $root_eventos = '../../eventos/index.php';
    $root_productos_eventos = '../../eventos/productos/index.php';
    $root_kits = '../productos/index.php?id=1';
    $root_productos_kits = 'index.php';
    $root_cotizaciones = '../../cotizaciones/index.php';
    $root_logout = '../../../cerrar-sesion.php';
    $root_vendor = '../../../vendor/autoload.php';
    $root_dashboard = '../../dashboard.php';
}

if ($page_name == 'registro-productos-eventos') {
    $root_logo = '../../../assets/logo.png';
    $root_functions = '../../../database/functions.php';
    $root_index = '../../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../../style.css">';
    $root_categorias = '../../categorias/index.php';
    $root_productos = '../../categorias/productos/index.php';
    $root_eventos = '../index.php';
    $root_productos_eventos = 'index.php';
    $root_kits = '../../kits/productos/index.php?id=1';
    $root_productos_kits = '../../kits/productos/index.php?id=1';
    $root_cotizaciones = '../../cotizaciones/index.php';
    $root_logout = '../../../cerrar-sesion.php';
    $root_vendor = '../../../vendor/autoload.php';
    $root_dashboard = '../../dashboard.php';
}

if ($page_name == 'editar-productos-eventos') {
    $root_logo = '../../../assets/logo.png';
    $root_functions = '../../../database/functions.php';
    $root_index = '../../../index.php';
    $root_styles = '<link rel="stylesheet" href="../../../style.css">';
    $root_categorias = '../../categorias/index.php';
    $root_productos = '../../categorias/productos/index.php';
    $root_eventos = '../index.php';
    $root_productos_eventos = 'index.php';
    $root_kits = '../../kits/productos/index.php?id=1';
    $root_productos_kits = '../../kits/productos/index.php?id=1';
    $root_cotizaciones = '../../cotizaciones/index.php';
    $root_logout = '../../../cerrar-sesion.php';
    $root_vendor = '../../../vendor/autoload.php';
    $root_dashboard = '../../dashboard.php';
}
