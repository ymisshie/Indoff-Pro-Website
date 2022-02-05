<?php

namespace ameri;

class Producto_Evento
{

    private $config;
    private $cn = null;

    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__ . '/../config.ini');

        // Ruta de la conexión a base de datos utilizando PDO
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'], array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        // print '<pre>';
        // print_r($this->config);
    }

    public function registrar($_params)
    {
        // Lectura de la ruta de la consulta
        $sql = "INSERT INTO `productos_eventos`(`nombre`, `proveedor`,`descripcion`, `imagen`, `evento_id`, `fecha`, `opciones`, `cantidad`, `precio`, `size`, `peso`, `color`) VALUES (:nombre, :proveedor, :descripcion, :imagen, :evento_id, :fecha, :opciones, :cantidad, :precio, :size, :peso, :color)";

        // Preparar la consulta
        $resultado = $this->cn->prepare($sql);

        // Indicar los params
        $_array = array(
            ":nombre" => $_params['nombre'],
            ":proveedor" => $_params['proveedor'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":evento_id" => $_params['evento_id'],
            ":fecha" => $_params['fecha'],
            ":opciones" => $_params['opciones'],
            ":cantidad" => $_params['cantidad'],
            ":precio" => $_params['precio'],
            ":size" => $_params['size'],
            ":peso" => $_params['peso'],
            ":color" => $_params['color'],
        );

        // Ejecutar la consulta 
        if ($resultado->execute($_array))
            return true;
        return false;
    }

    public function actualizar($_params)
    {
        $sql = "UPDATE `productos` SET `nombre`=:nombre,`proveedor`=:proveedor, `descripcion`=:descripcion,`imagen`=:imagen, `evento_id`=:evento_id,`fecha`=:fecha, `opciones`=:opciones, `cantidad`=:cantidad,`precio`= :precio,`size`=:size, `peso`=:peso, `color`=:color WHERE `id` =:id";


        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":proveedor" => $_params['proveedor'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":evento_id" => $_params['evento_id'],
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

    public function eliminar($id)
    {
        $sql = "DELETE FROM `productos_eventos` WHERE `id`=:id";

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

        $sql = "SELECT productos_eventos.id, productos_eventos.nombre, proveedor, productos_eventos.descripcion, productos_eventos.imagen, eventos.id, productos_eventos.fecha, opciones, cantidad, precio, size, peso, color FROM productos_eventos
        INNER JOIN eventos
        ON productos_eventos.evento_id = eventos.id ORDER BY productos_eventos.id ASC";


        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id)
    {
        $sql = "SELECT * FROM  `productos_eventos` WHERE `id`=:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":id" => $id
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }
}
