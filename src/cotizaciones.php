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

        /*
        print '<pre>';
        print_r($this->config);
        */
    }

    public function registrar($_params)
    {
        $sql = "INSERT INTO `cotizaciones`(`info_usuario`,`id_usuario`,`usuarios_id`,`cotcat_id`, `nombre`, `proveedor`, `descripcion`, `imagen`, `fecha`, `cantidad`, `precio`, `size`, `impresion`,`color`, `categoria`) VALUES (:info_usuario, :id_usuario, :usuarios_id, :cotcat_id, :nombre, :proveedor, :descripcion, :imagen, :fecha, :cantidad, :precio, :size,:impresion, :color, :categoria)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":info_usuario" => $_params['info_usuario'],
            ":id_usuario" => $_params['id_usuario'],
            ":usuarios_id" => $_params['usuarios_id'],
            ":cotcat_id" => $_params['cotcat_id'],
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
        $sql = "UPDATE `cotizaciones` SET `info_usuario`=:info_usuario,`id_usuario`=:id_usuario,`usuarios_id`=:usuarios_id, `cotcat_id`=:cotcat_id,`producto_id`=:producto_id,`nombre`=:nombre,`proveedor`=:proveedor,`descripcion`=:descripcion,`imagen`=:imagen,`fecha`=:fecha,`cantidad`=:cantidad,`precio`=:precio,`size`=:size,`impresion`=:impresion,`color`=:color, `categoria`=:categoria WHERE `id` =:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":info_usuario" => $_params['info_usuario'],
            ":id_usuario" => $_params['id_usuario'],
            ":usuarios_id" => $_params['usuarios_id'],
            ":cotcat_id" => $_params['cotcat_id'],
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
        $sql = "SELECT cotizaciones.id, cotizaciones.info_usuario, cotizaciones.id_usuario, cotizaciones.usuarios_id, cotcat_id, producto_id, nombre, proveedor, descripcion, cotizaciones.imagen, cotizaciones.fecha, cantidad, precio, size, impresion,color, categoria FROM cotizaciones
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
