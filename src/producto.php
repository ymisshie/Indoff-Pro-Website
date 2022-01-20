<?php

namespace ameri;

class Producto{

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
        $sql="INSERT INTO `productos` (`nombre`, `proveedor`,`descripcion`, `imagen`, `categoria_id`, `fecha`, `op1`, `op2`,`op3`,`op4`,`op5`,`op6`,`op7`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `precio1`, `precio2`, `precio3`, `precio4`, `precio5`, `precio6`, `precio7`, `size`, `peso`, `color`) VALUES (:nombre, :proveedor, :descripcion, :imagen, :categoria_id, :fecha, :op1, :op2, :op3, :op4, :op5, :op6, :op7, :q1, :q2, :q3, :q4, :q5, :q6, :q7, :precio1, :precio2, :precio3, :precio4, :precio5, :precio6, :precio7, :size, :peso, :color)";

        $resultado=$this->cn->prepare($sql);

        $_array=array(
            ":nombre" => $_params['nombre'], 
            ":proveedor" => $_params['proveedor'], 
            ":descripcion" => $_params['descripcion'],   
            ":imagen" => $_params['imagen'], 
            ":categoria_id" => $_params['categoria_id'], 
            ":fecha" => $_params['fecha'],
            ":op1" => $_params['op1'],
            ":op2" => $_params['op2'],
            ":op3" => $_params['op3'],
            ":op4" => $_params['op4'],
            ":op5" => $_params['op5'],
            ":op6" => $_params['op6'],
            ":op7" => $_params['op7'],
            ":q1" => $_params['q1'],
            ":q2" => $_params['q2'],
            ":q3" => $_params['q3'],
            ":q4" => $_params['q4'],
            ":q5" => $_params['q5'],
            ":q6" => $_params['q6'],
            ":q7" => $_params['q7'],
            ":precio1" => $_params['precio1'], 
            ":precio2" => $_params['precio2'], 
            ":precio3" => $_params['precio3'], 
            ":precio4" => $_params['precio4'], 
            ":precio5" => $_params['precio5'], 
            ":precio6" => $_params['precio6'], 
            ":precio7" => $_params['precio7'],
            ":size" => $_params['size'], 
            ":peso" => $_params['peso'],
            ":color" => $_params['color'],

        );

        if($resultado->execute($_array))
        return true;
        return false;
    }

    public function actualizar($_params){
        $sql="UPDATE `productos` SET `nombre`=:nombre,`proveedor`=:proveedor, `descripcion`=:descripcion,`imagen`=:imagen, `categoria_id`=:categoria_id,`fecha`=:fecha, `op1`=:op1, `op2`=:op2, `op3`=:op3, `op4`=:op4, `op5`=:op5, `op6`=:op6, `op7`=:op7, `q1`=:q1, `q2`=:q2, `q3`=:q3, `q4`=:q4, `q5`=:q5, `q6`=:q6, `q7`=:q7, `precio1`=:precio1, `precio2`=:precio2, `precio3`=:precio3, `precio4`=:precio4, `precio5`=:precio5, `precio6`=:precio6,`precio7`=:precio7, `size`=:size, `peso`=:peso, `color`=:color WHERE `id` =:id";

        $resultado=$this->cn->prepare($sql);

        /*
        print '<pre>';
        print_r($_POST);

        print_r($_FILES);
        */
        
        $_array=array(
            ":nombre" => $_params['nombre'], 
            ":proveedor" => $_params['proveedor'],
            ":descripcion" => $_params['descripcion'],  
            ":imagen" => $_params['imagen'], 
            ":categoria_id" => $_params['categoria_id'], 
            ":fecha" => $_params['fecha'],
            ":op1" => $_params['op1'],
            ":op2" => $_params['op2'],
            ":op3" => $_params['op3'],
            ":op4" => $_params['op4'],
            ":op5" => $_params['op5'],
            ":op6" => $_params['op6'],
            ":op7" => $_params['op7'],
            ":q1" => $_params['q1'],
            ":q2" => $_params['q2'],
            ":q3" => $_params['q3'],
            ":q4" => $_params['q4'],
            ":q5" => $_params['q5'],
            ":q6" => $_params['q6'],
            ":q7" => $_params['q7'],
            ":precio1" => $_params['precio1'],
            ":precio2" => $_params['precio2'], 
            ":precio3" => $_params['precio3'], 
            ":precio4" => $_params['precio4'], 
            ":precio5" => $_params['precio5'], 
            ":precio6" => $_params['precio6'], 
            ":precio7" => $_params['precio7'], 
            ":size" => $_params['size'], 
            ":peso" => $_params['peso'],
            ":color" => $_params['color']

        );

        if($resultado->execute($_array))
        return true;
        return false;
    }

    public function eliminar($id){
        $sql ="DELETE FROM  `productos` WHERE  `id`=:id";
        $resultado=$this->cn->prepare($sql);
        
        $_array=array(
            ":id" =>$id
        );
        
        if($resultado->execute($_array))
        return true;
        return false;
            }
        

    public function mostrar(){


        $sql ="SELECT productos.id, productos.nombre, proveedor, productos.descripcion, productos.imagen, categorias.id, productos.fecha, op1, op2, op3, op4, op5, op6, op7, q1, q2, q3, q4, q5, q6, q7, precio1, precio2, precio3, precio4, precio5, precio6, precio7, size, peso, color FROM productos
        INNER JOIN categorias
        ON productos.categoria_id = categorias.id ORDER BY productos.id ASC";
    
        /*
        $sql ="SELECT productos.id, productos.nombre, productos.descripcion, productos.imagen, precio, productos.fecha, xs, s, m, l, xl, 2xl, 3xl FROM productos
        INNER JOIN categorias
        ON productos.categoria_id = categorias.id ORDER BY productos.id DESC";
        */

        $resultado=$this->cn->prepare($sql);
        
        if($resultado->execute())
        return $resultado->fetchAll();
        return false;
    }
    
    public function mostrarPorId($id){
        $sql ="SELECT * FROM `productos` WHERE `id` = :id";

        $resultado=$this->cn->prepare($sql);
        
        
$_array=array(
    ":id" => $id
);
      
        
        if($resultado->execute($_array))
        return $resultado->fetch();
        return false;

    }

}
