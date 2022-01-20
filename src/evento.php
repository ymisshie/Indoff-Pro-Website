<?php

namespace ameri;

class Evento{

    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini');

        // Ruta de la conexión a base de datos utilizando PDO
        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' 
        ));
        // print '<pre>';
        // print_r($this->config);
    }

    public function registrar($_params){
        // Lectura de la ruta de la consulta
        $sql = "INSERT INTO `eventos`(`nombre`, `descripcion`, `imagen`, `fecha`) VALUES (:nombre, :descripcion, :imagen, :fecha)";
        
        // Preparar la consulta
        $resultado = $this->cn->prepare($sql);

        // Indicar los params
        $array = array(
            ":nombre" =>$_params['nombre'],
            ":descripcion" =>$_params['descripcion'],
            ":imagen" =>$_params['imagen'],
            ":fecha" =>$_params['fecha']
        );

        // Ejecutar la consulta 
        if(resultado->execute($_array))
            return true;
        return false;
    }

    public function actualizar($_params){
        $sql = "UPDATE `eventos` SET `nombre`=:nombre,`descripcion`=:descripcion,`imagen`=':imagen,`fecha`=:fecha WHERE `id`=:id";

        $resultado = $this->cn->prepare($sql);

        $array = array(
            ":nombre" => $_params['nombre'],
            ":descripcion" => $_params['descripcion'],
            ":imagen" => $_params['imagen'],
            ":fecha" => $_params['fecha'],
            ":id" => $_params['id']
        );
 
        if(resultado->execute($_array))
            return true;
        return false;
    }

    public function eliminar($id){
        $sql = "DELETE FROM `eventos` WHERE `id`=:id";

        $resultado = $this->cn->prepare($sql);

        $array = array(
            ":id" => $_params['id']
        );

        if(resultado->execute($_array))
            return true;
        return false;
    }

    public function mostrar(){
        $sql = "SELECT nombre, descripcion, imagen, fecha FROM `eventos`";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId(){
        
    }
}