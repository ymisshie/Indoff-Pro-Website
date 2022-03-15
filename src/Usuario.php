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

    public function mismo_email($_params)
    {
        // Lectura de la ruta de la consulta
        $sql = "SELECT nombre_login FROM  `usuarios` WHERE  `email_user`=:email_user";

        // Preparar la consulta
        $resultado = $this->cn->prepare($sql);

        // Indicar los params
        $_array = array(
            ":email_user" => $_params['email_user'],
        );

        // Ejecutar la consulta 
        if ($resultado->execute($_array))
            return $resultado->fetch();
        return false;
    }
    public function mismo_nombre_login($_params)
    {
        // Lectura de la ruta de la consulta
        $sql = "SELECT nombre_login FROM  `usuarios` WHERE  `nombre_login`=:nombre_login";

        // Preparar la consulta
        $resultado = $this->cn->prepare($sql);

        // Indicar los params
        $_array = array(
            ":nombre_login" => $_params['nombre_login'],
        );

        // Ejecutar la consulta 
        if ($resultado->execute($_array))
            return $resultado->fetch();
        return false;
    }

    public function registrar($_params)
    {
        // Lectura de la ruta de la consulta
        $sql = "INSERT INTO `usuarios`(`nombre_login`, `pwd_usuario_hash`, `nombre_usuario`, `apellido_usuario`, `email_user`, `phone_user`, `estado`, `verification_key`) VALUES (:nombre_login, :pwd_usuario_hash, :nombre_usuario, :apellido_usuario, :email_user, :phone_user, :estado, :verification_key)";

        // Preparar la consulta
        $resultado = $this->cn->prepare($sql);

        // Indicar los params
        $_array = array(
            ":nombre_login" => $_params['nombre_login'],
            ":pwd_usuario_hash" => $_params['pwd_usuario_hash'],
            ":nombre_usuario" => $_params['nombre_usuario'],
            ":apellido_usuario" => $_params['apellido_usuario'],
            ":email_user" => $_params['email_user'],
            ":phone_user" => $_params['phone_user'],
            ":estado" => $_params['estado'],
            ":verification_key" => $_params['verification_key'],
        );

        // Ejecutar la consulta 
        if ($resultado->execute($_array))
            return true;
        return false;
    }

    public function login($nombre_login, $pwd_usuario_hash)
    {
        $pwd = "SELECT pwd_usuario_hash, verificado FROM  `usuarios` WHERE  `nombre_login`=:nombre_login";
        $resultado_pwd = $this->cn->prepare($pwd);

        $_array_pwd = array(
            ":nombre_login" => $nombre_login,
        );

        if ($resultado_pwd->execute($_array_pwd)) {
            $resultado_array = $resultado_pwd->fetch();
            $password = $resultado_array['pwd_usuario_hash'];
            if (password_verify($pwd_usuario_hash, $password) && $resultado_array['verificado'] == 1) {
                // print("A");
                $sql = "SELECT nombre_login, email_user, nombre_usuario,  apellido_usuario, id, phone_user  FROM  `usuarios` WHERE  `nombre_login`=:nombre_login";
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


    public function mostrar()
    {
        $sql = "SELECT * FROM usuarios";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function verificarVkeyUser($verification_key)
    {
        $vkey = "SELECT verification_key FROM  `usuarios` WHERE `verificado`= 0 AND `verification_key`=:verification_key LIMIT 1";
        $resultado_vkey = $this->cn->prepare($vkey);

        $_array_vkey = array(
            ":verification_key" => $verification_key,
        );


        if ($resultado_vkey->execute($_array_vkey))
            return $resultado_vkey->fetch();

        return false;
    }
    public function updateVerificado($verification_key)
    {
        $vkey = "UPDATE `usuarios` SET `verificado` = 1 WHERE `verification_key`=:verification_key LIMIT 1";
        $resultado_vkey = $this->cn->prepare($vkey);

        $_array_vkey = array(
            ":verification_key" => $verification_key,
        );

        if ($resultado_vkey->execute($_array_vkey))
            return true;

        return false;
    }
}
