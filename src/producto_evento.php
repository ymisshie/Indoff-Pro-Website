<?php

namespace ameri;

class Producto_Evento{

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
        $sql = "INSERT INTO `productos_eventos`(`nombre`, `proveedor`, `descripcion`, `imagen`, `evento_id`, `fecha`, `op1`, `op2`, `op3`, `op4`, `op5`, `op6`, `op7`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `precio1`, `precio2`, `precio3`, `precio4`, `precio5`, `precio6`, `precio7`, `size`, `peso`, `color`) VALUES (:nombre,:proveedor, :descripcion, :imagen, :evento_id, :fecha, :op1, :op2, :op3, :op4, :op5, :op6, :op7, :q1, :q2, :q3, :q4, :q5, :q6, :q7, :precio1, :precio2, :precio3, :precio4, :precio5, :precio6, :precio7, :size, :peso, :color)";
        
        // Preparar la consulta
        $resultado = $this->cn->prepare($sql);

        // Indicar los params
        $_array = array(
            ":nombre" =>$_params['nombre'],
            ":proveedor" =>$_params['proveedor'],
            ":descripcion" =>$_params['descripcion'],
            ":imagen" =>$_params['imagen'],
            ":evento_id"=>$_params['evento_id'],
            ":fecha"=> $_params['fecha'],
            ":op1"=> $_params['op1'],
            ":op2"=> $_params['op2'],
            ":op3"=> $_params['op3'],
            ":op4"=> $_params['op4'],
            ":op5"=> $_params['op5'],
            ":op6"=> $_params['op6'],
            ":op7"=> $_params['op7'],
            ":q1"=> $_params['q1'],
            ":q2"=> $_params['q2'],
            ":q3"=> $_params['q3'],
            ":q4"=> $_params['q4'],
            ":q5"=> $_params['q5'],
            ":q6"=> $_params['q6'],
            ":q7"=> $_params['q7'],
            ":precio1"=> $_params['precio1'],
            ":precio2"=> $_params['precio2'],
            ":precio3"=> $_params['precio3'],
            ":precio4"=> $_params['precio4'],
            ":precio5"=> $_params['precio5'],
            ":precio6"=> $_params['precio6'],
            ":precio7"=> $_params['precio7'],
            ":size"=> $_params['size'],
            ":peso"=> $_params['peso'],
            ":color"=> $_params['color'],
        );

        // Ejecutar la consulta 
        if($resultado->execute($_array))
            return true;
        return false;
    }

    public function actualizar($_params){
        $sql="UPDATE `productos_eventos` SET `nombre`=:nombre,`proveedor`=:proveedor, `descripcion`=:descripcion,`imagen`=:imagen, `evento_id`=:evento_id,`fecha`=:fecha, `op1`=:op1, `op2`=:op2, `op3`=:op3, `op4`=:op4, `op5`=:op5, `op6`=:op6, `op7`=:op7, `q1`=:q1, `q2`=:q2, `q3`=:q3, `q4`=:q4, `q5`=:q5, `q6`=:q6, `q7`=:q7, `precio1`=:precio1, `precio2`=:precio2, `precio3`=:precio3, `precio4`=:precio4, `precio5`=:precio5, `precio6`=:precio6,`precio7`=:precio7, `size`=:size, `peso`=:peso, `color`=:color WHERE `id` =:id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" =>$_params['nombre'],
            ":proveedor" =>$_params['proveedor'],
            ":descripcion" =>$_params['descripcion'],
            ":imagen" =>$_params['imagen'],
            ":evento_id"=>$_params['evento_id'],
            ":fecha"=> $_params['fecha'],
            ":op1"=> $_params['op1'],
            ":op2"=> $_params['op2'],
            ":op3"=> $_params['op3'],
            ":op4"=> $_params['op4'],
            ":op5"=> $_params['op5'],
            ":op6"=> $_params['op6'],
            ":op7"=> $_params['op7'],
            ":q1"=> $_params['q1'],
            ":q2"=> $_params['q2'],
            ":q3"=> $_params['q3'],
            ":q4"=> $_params['q4'],
            ":q5"=> $_params['q5'],
            ":q6"=> $_params['q6'],
            ":q7"=> $_params['q7'],
            ":precio1"=> $_params['precio1'],
            ":precio2"=> $_params['precio2'],
            ":precio3"=> $_params['precio3'],
            ":precio4"=> $_params['precio4'],
            ":precio5"=> $_params['precio5'],
            ":precio6"=> $_params['precio6'],
            ":precio7"=> $_params['precio7'],
            ":size"=> $_params['size'],
            ":peso"=> $_params['peso'],
            ":color"=> $_params['color'],
            ":id"=> $_params['id'],
        );
 
        if($resultado->execute($_array))
            return true;
        return false;
    }

    public function eliminar($id){
        $sql = "DELETE FROM `productos_eventos` WHERE `id`=:id";

        $resultado = $this->cn->prepare($sql);

        $_array=array(
            ":id" =>$id
        );

        if($resultado->execute($_array))
            return true;
        return false;
    }

    public function mostrar(){
        $sql = "SELECT productos_eventos.id, productos_eventos.nombre, productos_eventos.proveedor, productos_eventos.descripcion, productos_eventos.imagen, evento_id, productos_eventos.fecha, op1, op2, op3, op4, op5, op6, op7, q1, q2 ,q3, q4, q5, q6, q7, precio1, precio2, precio3, precio4, precio5, precio6, precio7, size, peso, color FROM `productos_eventos`
        
        INNER JOIN eventos
        ON productos_eventos.evento_id = eventos.id ORDER BY productos_eventos.id ASC
        ";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id){
        $sql = "SELECT * FROM  `productos_eventos` WHERE `id`=:id";
        
        $resultado = $this->cn->prepare($sql);

       $_array=array(
            ":id" =>$id
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }
}