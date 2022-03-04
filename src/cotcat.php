<?php

namespace ameri;

class Cotcat{


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
        $sql="INSERT INTO `cotcat`(`info_usuario`,`id_usuario`,`usuarios_id`,`fecha`) VALUES (:info_usuario,:id_usuario,:usuarios_id, :fecha)";

        $resultado=$this->cn->prepare($sql);

        $_array=array( 
            ":info_usuario" => $_params['info_usuario'],
            ":id_usuario" => $_params['id_usuario'],
            ":usuarios_id" => $_params['usuarios_id'],
            ":fecha" => $_params['fecha'],
        );

        if($resultado->execute($_array))
        return true;
        return false;
    }

    public function actualizar($_params){
        $sql="UPDATE `cotcat` SET `info_usuario`=:info_usuario,`id_usuario`=:id_usuario,`usuarios_id`=:usuarios_id, `fecha`=:fecha  WHERE `id` =:id";

        $resultado=$this->cn->prepare($sql);

        $_array=array(
            ":info_usuario" => $_params['info_usuario'],
            ":id_usuario" => $_params['id_usuario'],
            ":usuarios_id" => $_params['usuarios_id'],
            ":id" => $_params['id'],
        );

        if($resultado->execute($_array))
        return true;
        return false;
    }

    public function eliminar($id){
        $sql ="DELETE FROM  `cotcat` WHERE  `id`=:id";
        $resultado=$this->cn->prepare($sql);

        $_array=array(
            ":id" =>$id
        );

        if($resultado->execute($_array))
        return true;
        return false;
    }


    public function mostrar(){
        $sql = "SELECT * FROM cotcat";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id){
        $sql ="SELECT * FROM `cotcat` WHERE `id` = :id";

        $resultado=$this->cn->prepare($sql);
        
        
        $_array=array(
            ":id" => $id
        );      
                if($resultado->execute($_array))
                return $resultado->fetch();
                return false;

    }


}