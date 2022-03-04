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
    }

    public function agregar($_params)
    {
        $sql = "INSERT INTO `carrito`(`usuarios_id`, `nombre`, `proveedor`, `descripcion`, `imagen`, `fecha`, `opciones`, `cantidad`, `precio`, `size`, `peso`, `color`) VALUES (:usuarios_id, :nombre, :proveedor, :descripcion, :imagen, :fecha, :opciones, :cantidad, :precio, :size, :peso, :color)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":usuarios_id" => $_params['usuarios_id'],
            ":nombre" => $_params['nombre'],
            ":proveedor" => $_params['proveedor'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":fecha" => $_params['fecha'],
            ":opciones" => $_params['opciones'],
            ":cantidad" => $_params['cantidad'],
            ":precio" => $_params['precio'],
            ":size" => $_params['size'],
            ":peso" => $_params['peso'],
            ":color" => $_params['color'],
        );

        if ($resultado->execute($_array))
            return true;
        return false;
    }

    public function actualizar($_params)
    {
        $sql = "UPDATE `carrito` SET `producto_id`=:producto_id,`usuarios_id`=:usuarios_id,`nombre`=:nombre,`proveedor`=:proveedor,`descripcion`=:descripcion,`imagen`=:imagen,`fecha`=:fecha,`opciones`=:opciones,`cantidad`=:cantidad,`precio`=:precio,`size`=:size,`peso`=:peso,`color`=:color WHERE `id` =:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":usuarios_id" => $_params['usuarios_id'],
            ":producto_id" => $_params['producto_id'],
            ":nombre" => $_params['nombre'],
            ":proveedor" => $_params['proveedor'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":fecha" => $_params['fecha'],
            ":opciones" => $_params['opciones'],
            ":cantidad" => $_params['cantidad'],
            ":precio" => $_params['precio'],
            ":size" => $_params['size'],
            ":peso" => $_params['peso'],
            ":color" => $_params['color'],
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
        $sql ="SELECT carrito.id, producto_id, usuarios_id, nombre, proveedor, descripcion, carrito.imagen, carrito.fecha, opciones, cantidad, precio, size, peso, color FROM carrito
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
