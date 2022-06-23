<?php

namespace ameri;

class Kits
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
        $sql = "INSERT INTO `kits`(`nombre`, `descripcion`, `imagen`, `fecha`) VALUES (:nombre, :descripcion, :imagen, :fecha)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":fecha" => $_params['fecha'],
        );

        if ($resultado->execute($_array))
            return true;
        return false;
    }

    public function actualizar($_params)
    {
        $sql = "UPDATE `kits` SET `nombre`=:nombre,`descripcion`=:descripcion,`imagen`=:imagen,`fecha`=:fecha,`orden`=:orden  WHERE `id` =:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":fecha" => $_params['fecha'],
            ":id" => $_params['id'],
            ":orden" => $_params['orden']
        );

        if ($resultado->execute($_array))
            return true;
        return false;
    }

    public function eliminar($id)
    {


        $sql = "DELETE FROM  `kits` WHERE  `id`=:id";
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
        $sql = "SELECT * FROM kits";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarOrden()
    {
        $sql = "SELECT * FROM `kits` ORDER BY `orden` LIMIT 6";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id)
    {
        $sql = "SELECT * FROM `kits` WHERE `id` = :id";

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
        $sql = "SELECT * FROM `kits` WHERE `id` = :id ORDER BY `orden` LIMIT 6";

        $resultado = $this->cn->prepare($sql);


        $_array = array(
            ":id" => $id
        );
        if ($resultado->execute($_array))
            return $resultado->fetch();
        return false;
    }
}
