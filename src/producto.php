<?php

namespace ameri;

class Producto
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

    public function registrar($_params)
    {
        $sql = "INSERT INTO `productos` (`nombre`, `proveedor`,`descripcion`, `imagen`, `categoria_id`, `fecha`, `cantidad`, `precio`, `size`, `impresion`,`color`) VALUES (:nombre, :proveedor, :descripcion, :imagen, :categoria_id, :fecha, :cantidad, :precio, :size,:impresion, :color)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":proveedor" => $_params['proveedor'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":categoria_id" => $_params['categoria_id'],
            ":fecha" => $_params['fecha'],
            ":cantidad" => $_params['cantidad'],
            ":precio" => $_params['precio'],
            ":size" => $_params['size'],
            ":impresion" => $_params['impresion'],
            ":color" => $_params['color'],
        );

        if ($resultado->execute($_array))
            return true;
        return false;
    }

    public function actualizar($_params)
    {
        $sql = "UPDATE `productos` SET `nombre`=:nombre,`proveedor`=:proveedor, `descripcion`=:descripcion,`imagen`=:imagen, `categoria_id`=:categoria_id,`fecha`=:fecha, `cantidad`=:cantidad,`precio`= :precio,`size`=:size, `impresion`=:impresion, `color`=:color, `orden`=:orden WHERE `id` =:id";

        $resultado = $this->cn->prepare($sql);

        /*
        print '<pre>';
        print_r($_POST);

        print_r($_FILES);
        */

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":proveedor" => $_params['proveedor'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":categoria_id" => $_params['categoria_id'],
            ":fecha" => $_params['fecha'],
            ":cantidad" => $_params['cantidad'],
            ":precio" => $_params['precio'],
            ":size" => $_params['size'],
            ":impresion" => $_params['impresion'],
            ":color" => $_params['color'],
            ":id" => $_params['id'],
            ":orden" => $_params['orden']

        );

        if ($resultado->execute($_array))
            return true;
        return false;
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM  `productos` WHERE  `id`=:id";
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
        $sql = "SELECT productos.id, productos.nombre, proveedor, productos.descripcion, productos.imagen, categoria_id, productos.fecha, cantidad, precio, size, impresion,color, productos.orden FROM productos
        INNER JOIN categorias
        ON productos.categoria_id = categorias.id ORDER BY productos.id ASC";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarOrden()
    {

        $sql = "SELECT productos.id, productos.nombre, proveedor, productos.descripcion, productos.imagen, categoria_id, productos.fecha, cantidad, precio, size,impresion, color, productos.orden FROM productos
        INNER JOIN categorias
        ON productos.categoria_id = categorias.id ORDER BY productos.orden ASC LIMIT 6";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarPorId($id)
    {
        $sql = "SELECT * FROM  `productos` WHERE `id`=:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":id" => $id
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }


    public function mostrarPorIdOrden($id)
    {
        $sql = "SELECT * FROM `productos` WHERE `id` = :id ORDER BY `orden` LIMIT 6";

        $resultado = $this->cn->prepare($sql);


        $_array = array(
            ":id" => $id
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();
        return false;
    }
}
