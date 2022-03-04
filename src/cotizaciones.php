<?php

namespace ameri;

class Cotizaciones
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

    public function registrar($_params)
    {
        $sql = "INSERT INTO `cotizaciones`(`usuarios_id`,`cotcat_id`, `nombre`, `proveedor`, `descripcion`, `imagen`, `fecha`, `opciones`, `cantidad`, `precio`, `size`, `peso`, `color`) VALUES (:usuarios_id, :cotcat_id, :nombre, :proveedor, :descripcion, :imagen, :fecha, :opciones, :cantidad, :precio, :size, :peso, :color)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":usuarios_id" => $_params['usuarios_id'],
            ":cotcat_id" => $_params['cotcat_id'],
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
        $sql = "UPDATE `cotizaciones` SET `usuarios_id`=:usuarios_id, `cotcat_id`=:cotcat_id,`producto_id`=:producto_id,`nombre`=:nombre,`proveedor`=:proveedor,`descripcion`=:descripcion,`imagen`=:imagen,`fecha`=:fecha,`opciones`=:opciones,`cantidad`=:cantidad,`precio`=:precio,`size`=:size,`peso`=:peso,`color`=:color WHERE `id` =:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":usuarios_id" => $_params['usuarios_id'],
            ":cotcat_id" => $_params['cotcat_id'],
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
        $sql = "DELETE FROM  `cotizaciones` WHERE  `usuarios_id`=:nombre_login";
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
        $sql = "DELETE FROM  `cotizaciones` WHERE  `id`=:id";
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
        $sql = "SELECT cotizaciones.id, cotizaciones.usuarios_id, cotcat_id, producto_id, nombre, proveedor, descripcion, cotizaciones.imagen, cotizaciones.fecha, opciones, cantidad, precio, size, peso, color FROM cotizaciones
        INNER JOIN cotcat
        ON cotizaciones.cotcat_id = cotcat.id ORDER BY cotizaciones.id ASC";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();
        return false;
    }

    public function mostrarPorId($id)
    {
        $sql = "SELECT * FROM `cotizaciones` WHERE `cotcat_id` = :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":id" => $id
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();
        return false;
    }
}
