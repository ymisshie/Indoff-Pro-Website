<?php

namespace ameri;

class Usuario
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
  

    // public function login($nombre_login, $pwd_usuario_hash)
    // {
    //     $sql = "SELECT nombre_login FROM  `usuarios` WHERE  `nombre_login`=:nombre_login AND `pwd_usuario_hash`=:pwd_usuario_hash ";

    //     $resultado = $this->cn->prepare($sql);

    //     $_array = array(
    //         ":nombre_login" => $nombre_login,
    //         ":pwd_usuario_hash" => $pwd_usuario_hash
    //     );

    //     if ($resultado->execute($_array))
    //         return $resultado->fetch();

    //     return false;
    // }

    public function registrar($_params){
        // Lectura de la ruta de la consulta
        $sql = "INSERT INTO `usuarios`(`nombre_login`, `pwd_usuario_hash`, `nombre_usuario`, `apellido_usuario`, `email_user`, `estado`) VALUES (:nombre_login, :pwd_usuario_hash, :nombre_usuario, :apellido_usuario, :email_user, :estado)";
        
        // Preparar la consulta
        $resultado = $this->cn->prepare($sql);

        // Indicar los params
        $_array = array(
            ":nombre_login" =>$_params['nombre_login'],
            ":pwd_usuario_hash" =>$_params['pwd_usuario_hash'],
            ":nombre_usuario" =>$_params['nombre_usuario'],
            ":apellido_usuario" =>$_params['apellido_usuario'],
            ":email_user" =>$_params['email_user'],
            ":estado" =>$_params['estado'],
        );

        // Ejecutar la consulta 
        if($resultado->execute($_array))
            return true;
        return false;
    }

    public function login($nombre_login, $pwd_usuario_hash)
    {   
        $pwd = "SELECT pwd_usuario_hash FROM  `usuarios` WHERE  `nombre_login`=:nombre_login";
        $resultado_pwd = $this->cn->prepare($pwd);

        $_array_pwd = array(
            ":nombre_login" => $nombre_login,
        );

        if ($resultado_pwd->execute($_array_pwd)){
            $resultado_array = $resultado_pwd->fetch();
            $password = $resultado_array['pwd_usuario_hash'];
            if (password_verify($pwd_usuario_hash, $password)){
                // print("A");
                $sql = "SELECT nombre_login, email_user FROM  `usuarios` WHERE  `nombre_login`=:nombre_login";
                $resultado = $this->cn->prepare($sql);

                $_array = array(
                    ":nombre_login" => $nombre_login,
                );

                if ($resultado->execute($_array))
                    return $resultado->fetch();

                return false;
            
            }
        return false;
            
        }
    }

}
