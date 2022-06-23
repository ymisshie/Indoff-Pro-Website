<?php

namespace ameri;

class Productos_Kits
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
        $sql = "INSERT INTO `productos_kits` (`nombre`, `proveedor`,`descripcion`, `imagen`, `kits_id`, `fecha`, `cantidad`, `precio`, `size`, `impresion`,`color`) VALUES (:nombre, :proveedor, :descripcion, :imagen, :kits_id, :fecha, :cantidad, :precio, :size, :impresion,:color)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":proveedor" => $_params['proveedor'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":kits_id" => $_params['kits_id'],
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
        $sql = "UPDATE `productos_kits` SET `nombre`=:nombre,`proveedor`=:proveedor, `descripcion`=:descripcion,`imagen`=:imagen, `kits_id`=:kits_id,`fecha`=:fecha, `cantidad`=:cantidad,`precio`= :precio,`size`=:size,`impresion`=:impresion,`color`=:color, `orden`=:orden WHERE `id` =:id";

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
            ":kits_id" => $_params['kits_id'],
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
        $sql = "DELETE FROM  `productos_kits` WHERE  `id`=:id";
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


        $sql = "SELECT productos_kits.id, productos_kits.nombre, proveedor, productos_kits.descripcion, productos_kits.imagen, kits_id, productos_kits.fecha, cantidad, precio, size, impresion,color, productos_kits.orden FROM productos_kits
        INNER JOIN kits
        ON productos_kits.kits_id = kits.id ORDER BY productos_kits.id ASC";

        /*
        $sql ="SELECT productos.id, productos.nombre, productos.descripcion, productos.imagen, precio, productos.fecha, xs, s, m, l, xl, 2xl, 3xl FROM productos
        INNER JOIN categorias
        ON productos.categoria_id = categorias.id ORDER BY productos.id DESC";
        */

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarOrden()
    {


        $sql = "SELECT productos_kits.id, productos_kits.nombre, proveedor, productos_kits.descripcion, productos_kits.imagen, kits_id, productos_kits.fecha, cantidad, precio, size, impresion, color, productos_kits.orden FROM productos_kits
        INNER JOIN kits
        ON productos_kits.kits_id = kits.id ORDER BY productos_kits.orden ASC LIMIT 6";

        /*
        $sql ="SELECT productos.id, productos.nombre, productos.descripcion, productos.imagen, precio, productos.fecha, xs, s, m, l, xl, 2xl, 3xl FROM productos
        INNER JOIN categorias
        ON productos.categoria_id = categorias.id ORDER BY productos.id DESC";
        */

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }
    public function mostrarPorId($id)
    {
        $sql = "SELECT * FROM  `productos_kits` WHERE `id`=:id";

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
        $sql = "SELECT * FROM `productos_id` WHERE `id` = :id ORDER BY `orden` LIMIT 6";

        $resultado = $this->cn->prepare($sql);


        $_array = array(
            ":id" => $id
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();
        return false;
    }
}
