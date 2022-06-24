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
        /*
        print '<pre>';
        print_r($this->config);
        */
    }

    // public function login($username, $pwd_usuario_hash)
    // {
    //     $sql = "SELECT username FROM  `usuarios` WHERE  `username`=:username AND `pwd_usuario_hash`=:pwd_usuario_hash ";

    //     $resultado = $this->cn->prepare($sql);

    //     $_array = array(
    //         ":username" => $username,
    //         ":pwd_usuario_hash" => $pwd_usuario_hash
    //     );

    //     if ($resultado->execute($_array))
    //         return $resultado->fetch();

    //     return false;
    // }

    public function mismo_email($_params)
    {
        // Lectura de la ruta de la consulta
        $sql = "SELECT username FROM  `usuarios` WHERE  `email_user`=:email_user";

        // Preparar la consulta
        $resultado = $this->cn->prepare($sql);

        // Indicar los params
        $_array = array(
            ":email_user" => $_params['email_user'],
        );

        // Ejecutar la consulta
        if ($resultado->execute($_array)) {
            return $resultado->fetch();
        }
        return false;
    }

    public function mismo_nombre_login($_params)
    {
        // Lectura de la ruta de la consulta
        $sql = "SELECT username FROM  `usuarios` WHERE  `username`=:username";

        // Preparar la consulta
        $resultado = $this->cn->prepare($sql);

        // Indicar los params
        $_array = array(
            ":username" => $_params['username'],
        );

        // Ejecutar la consulta
        if ($resultado->execute($_array)) {
            return $resultado->fetch();
        }
        return false;
    }

    public function registrar($_params)
    {
        // Lectura de la ruta de la consulta
        $sql = "INSERT INTO `usuarios`(`username`, `pwd_usuario_hash`, `user_firstname`, `user_lastname`, `email_user`, `phone_user`, `estado`, `verification_key`) VALUES (:username, :pwd_usuario_hash, :user_firstname, :user_lastname, :email_user, :phone_user, :estado, :verification_key)";

        // Preparar la consulta
        $resultado = $this->cn->prepare($sql);

        // Indicar los params
        $_array = array(
            ":username" => $_params['username'],
            ":pwd_usuario_hash" => $_params['pwd_usuario_hash'],
            ":user_firstname" => $_params['user_firstname'],
            ":user_lastname" => $_params['user_lastname'],
            ":email_user" => $_params['email_user'],
            ":phone_user" => $_params['phone_user'],
            ":estado" => $_params['estado'],
            ":verification_key" => $_params['verification_key'],
        );

        // Ejecutar la consulta
        if ($resultado->execute($_array)) {
            return true;
        }
        return false;
    }

    public function login($username, $pwd_usuario_hash)
    {

        $pwd = "SELECT pwd_usuario_hash FROM `usuarios` WHERE  `username`=:username";
        $result_pwd = $this->cn->prepare($pwd);

        $_array_pwd = array(
            ":username" => $username,
        );


        if ($result_pwd->execute($_array_pwd)) {
            $resultado_array = $result_pwd->fetch();

            $password = $resultado_array['pwd_usuario_hash'];

            if (password_verify($pwd_usuario_hash, $password)) {
                $sql = "SELECT id, username, pwd_usuario_hash,user_firstname,user_lastname,email_user,phone_user,estado,verification_key,verificado FROM  `usuarios` WHERE  `username`=:username";
                $resultado = $this->cn->prepare($sql);

                $_array = array(
                    ":username" => $username,
                );

                if ($resultado->execute($_array)) {
                    return $resultado->fetch();
                }
                return false;
            }
            return false;
        }
        /*
        $pwd = "SELECT pwd_usuario_hash FROM  `usuarios` WHERE  `username`=:username";
        $resultado_pwd = $this->cn->prepare($pwd);

        return $resultado_pwd->fetch();

        print $resultado_pwd;
                
        $_array_pwd = array(
            ":username" => $username,
        );

        if ($resultado_pwd->execute($_array_pwd)) {
            $resultado_array = $resultado_pwd->fetch();
            $password = $resultado_array['pwd_usuario_hash'];
            if (password_verify($pwd_usuario_hash, $password)) {
                // print("A");
                $sql = "SELECT username, email_user, user_firstname,  user_lastname    FROM  `usuarios` WHERE  `username`=:username";
                $resultado = $this->cn->prepare($sql);

                $_array = array(
                    ":username" => $username,
                );

                if ($resultado->execute($_array))
                    return $resultado->fetch();

                return false;
            }
            return false;
            
        }
        */
    }


    public function mostrar()
    {
        $sql = "SELECT * FROM usuarios";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute()) {
            return $resultado->fetchAll();
        }

        return false;
    }

    public function mostrarPorId($id)
    {
        $sql = "SELECT * FROM `usuarios` WHERE `id` = :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":id" => $id
        );

        if ($resultado->execute($_array)) {
            return $resultado->fetch();
        }
        return false;
    }

    public function verificarVkeyUser($verification_key)
    {
        $vkey = "SELECT verification_key FROM  `usuarios` WHERE `verificado`= 0 AND `verification_key`=:verification_key LIMIT 1";
        $resultado_vkey = $this->cn->prepare($vkey);

        $_array_vkey = array(
            ":verification_key" => $verification_key,
        );


        if ($resultado_vkey->execute($_array_vkey)) {
            return $resultado_vkey->fetch();
        }

        return false;
    }
    public function updateVerificado($verification_key)
    {
        $vkey = "UPDATE `usuarios` SET `verificado` = 1 WHERE `verification_key`=:verification_key LIMIT 1";
        $resultado_vkey = $this->cn->prepare($vkey);

        $_array_vkey = array(
            ":verification_key" => $verification_key,
        );

        if ($resultado_vkey->execute($_array_vkey)) {
            return true;
        }

        return false;
    }
}
