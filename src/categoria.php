<?php

namespace ameri;

class Categoria{


    private $config;
    private $cn = null;

    public function __construct(){
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        //print_r($this->config); 

        //almacenar la conexion
        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    public function registrar($_params){
        $sql="INSERT INTO `categorias`(`nombre`, `descripcion`, `imagen`, `fecha`) VALUES (:nombre, :descripcion, :imagen, :fecha)";

        $resultado=$this->cn->prepare($sql);

        $_array=array(
            ":nombre" => $_params['nombre'], 
            ":descripcion" => $_params['descripcion'],  
            ":imagen" => $_params['imagen'], 
            ":fecha" => $_params['fecha'],
        );

        if($resultado->execute($_array))
        return true;
        return false;
    }

    public function actualizar($_params){
        $sql="UPDATE `categorias` SET `nombre`=:nombre,`descripcion`=:descripcion,`imagen`=:imagen,`fecha`=:fecha WHERE `id` =:id";

        $resultado=$this->cn->prepare($sql);

        $_array=array(
            ":nombre" => $_params['nombre'], 
            ":descripcion" => $_params['descripcion'],  
            ":imagen" => $_params['imagen'], 
            ":fecha" => $_params['fecha'],
            ":id" => $_params['id']
        );

        if($resultado->execute($_array))
        return true;
        return false;
    }

    public function eliminar($id){
$sql ="DELETE FROM  `categorias` WHERE  `id`=:id";
$resultado=$this->cn->prepare($sql);

$_array=array(
    ":id" =>$id
);

if($resultado->execute($_array))
return true;
return false;
    }


    public function mostrar(){
        $sql = "SELECT * FROM categorias";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id){
        $sql ="SELECT * FROM `categorias` WHERE `id` = :id";

        $resultado=$this->cn->prepare($sql);
        
        
$_array=array(
    ":id" => $id
);      
        if($resultado->execute($_array))
        return $resultado->fetch();
        return false;

    }


}