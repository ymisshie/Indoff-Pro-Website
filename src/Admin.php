<?php

namespace ameri;

class Admin
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


    public function login($admin_user, $pwd_admin_hash)
    {
        $pwd = "SELECT pwd_admin_hash FROM `admins` WHERE  `admin_user`=:admin_user";
        $result_pwd = $this->cn->prepare($pwd);

        $_array_pwd = array(
            ":admin_user" => $admin_user,
        );

        if ($result_pwd->execute($_array_pwd)) {

            $resultado_array = $result_pwd->fetch();

            $password = $resultado_array['pwd_admin_hash'];

            if (password_verify($pwd_admin_hash, $password)) {

                $sql = "SELECT admin_user, admin_name, admin_last_name  FROM  `admins` WHERE  `admin_user`=:admin_user";
                $resultado = $this->cn->prepare($sql);

                $_array = array(
                    ":admin_user" => $admin_user,
                );

                if ($resultado->execute($_array))
                    return $resultado->fetch();


                return false;
            }
            return false;
        }
    }
}
