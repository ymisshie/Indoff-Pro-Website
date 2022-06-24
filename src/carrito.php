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
        $sql = "INSERT INTO `carrito`(`id_usuario`, `nombre`, `proveedor`, `descripcion`, `imagen`, `fecha`, `cantidad`, `precio`, `size`, `impresion`, `color`, `categoria`) VALUES (:id_usuario, :nombre, :proveedor, :descripcion, :imagen, :fecha, :cantidad, :precio, :size,:impresion, :color, :categoria)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(

            ":id_usuario" => $_params['id_usuario'],
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
        $sql = "UPDATE `carrito` SET `id_usuario`=:id_usuario,`producto_id`=:producto_id,`nombre`=:nombre,`proveedor`=:proveedor,`descripcion`=:descripcion,`imagen`=:imagen,`fecha`=:fecha, `cantidad`=:cantidad,`precio`=:precio,`size`=:size, `impresion`=:impresion,`color`=:color, `categoria` =:categoria WHERE `id` =:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":id_usuario" => $_params['id_usuario'],
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
        $sql = "DELETE FROM  `carrito` WHERE  `id_usuario`=:username";
        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":username" => $id
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
        $sql = "SELECT carrito.id_usuario, producto_id, nombre, proveedor, descripcion, carrito.imagen, carrito.fecha, cantidad, precio, size, impresion,color, categoria FROM carrito
        INNER JOIN usuarios
        ON carrito.id_usuario = usuarios.id ORDER BY carrito.id ASC";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarPorId($id)
    {
        $sql = "SELECT * FROM `carrito` WHERE `id_usuario` = :username";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":username" => $id
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();
        return false;
    }
}
