<?php

namespace ameri;

class Carrito
{

    private $config;
    private $cn = null;

    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . '/../config.ini');
        //print_r($this->config); 

        //almacenar la conexion
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'], array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));

        /*
        print '<pre>';
        print_r($this->config);
        */
    }

    public function agregar($_params)
    {
        $sql = "INSERT INTO `carrito`(`info_usuario`,`id_usuario`,`usuarios_id`, `nombre`, `proveedor`, `descripcion`, `imagen`, `fecha`, `cantidad`, `precio`, `size`, `impresion`, `color`, `categoria`) VALUES (:info_usuario, :id_usuario, :usuarios_id, :nombre, :proveedor, :descripcion, :imagen, :fecha, :cantidad, :precio, :size,:impresion, :color, :categoria)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":info_usuario" => $_params['info_usuario'],
            ":id_usuario" => $_params['id_usuario'],
            ":usuarios_id" => $_params['usuarios_id'],
            ":nombre" => $_params['nombre'],
            ":proveedor" => $_params['proveedor'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":fecha" => $_params['fecha'],
            ":cantidad" => $_params['cantidad'],
            ":precio" => $_params['precio'],
            ":size" => $_params['size'],
            ":impresion" => $_params['impresion'],
            ":color" => $_params['color'],
            ":categoria" => $_params['categoria'],
        );

        if ($resultado->execute($_array))
            return true;
        return false;
    }

    public function actualizar($_params)
    {
        $sql = "UPDATE `carrito` SET `info_usuario`=:info_usuario, `id_usuario`=:id_usuario, `usuarios_id`=:usuarios_id,`producto_id`=:producto_id,`nombre`=:nombre,`proveedor`=:proveedor,`descripcion`=:descripcion,`imagen`=:imagen,`fecha`=:fecha, `cantidad`=:cantidad,`precio`=:precio,`size`=:size, `impresion`=:impresion,`color`=:color, `categoria` =:categoria WHERE `id` =:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":info_usuario" => $_params['info_usuario'],
            ":id_usuario" => $_params['id_usuario'],
            ":usuarios_id" => $_params['usuarios_id'],
            ":producto_id" => $_params['producto_id'],
            ":nombre" => $_params['nombre'],
            ":proveedor" => $_params['proveedor'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":fecha" => $_params['fecha'],
            ":cantidad" => $_params['cantidad'],
            ":precio" => $_params['precio'],
            ":size" => $_params['size'],
            ":impresion" => $_params['impresion'],
            ":color" => $_params['color'],
            ":categoria" => $_params['categoria'],
            ":id" => $_params['id']
        );

        if ($resultado->execute($_array))
            return true;
        return false;
    }


    public function eliminarPorUsuario($id)
    {
        $sql = "DELETE FROM  `carrito` WHERE  `usuarios_id`=:nombre_login";
        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre_login" => $id
        );

        if ($resultado->execute($_array))
            return true;
        return false;
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM  `carrito` WHERE  `id`=:id";
        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":id" => $id
        );

        if ($resultado->execute($_array))
            return true;
        return false;
    }



    public function mostrar()
    {
        $sql = "SELECT carrito.info_usuario, carrito.id_usuario, carrito.id, producto_id, usuarios_id, nombre, proveedor, descripcion, carrito.imagen, carrito.fecha, cantidad, precio, size, impresion,color, categoria FROM carrito
        INNER JOIN usuarios
        ON carrito.usuarios_id = usuarios.nombre_login ORDER BY carrito.id ASC";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarPorId($id)
    {
        $sql = "SELECT * FROM `carrito` WHERE `usuarios_id` = :nombre_login";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre_login" => $id
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();
        return false;
    }
}
