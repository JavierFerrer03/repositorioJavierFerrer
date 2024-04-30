<?php

class ConexionDB{
    private $conn;
    function __construct($user, $pass, $host, $database){
        $this->conn = new mysqli($host,$user,$pass,$database);
        if($this->conn->connect_error){
            die('Error al conectar con MySQL');
        }
    }

    function getConexion(){
        return $this->conn;
    }
}