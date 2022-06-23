<?php


class DBController
{
    // Database Connection Properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = ''; //aLE4#721wN!o
    protected $database = "indoffpro";

    // connection property
    public $con = null;


    // call constructor
    public function __construct()
    {
     
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error) {
            echo "Fail " . $this->con->connect_error;
        }


/*

        print '<pre>';
        print_r($this->con);
        */

    }
    public function __destruct()
    {
        $this->closeConnection();
    }


    // for mysqli closing connection
    protected function closeConnection(){
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }
}
