<?php
require_once 'config.php';

class Conexion{
    
    private $conect;
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $basedatos = "accountly";
    private $charset  = 'utf8mb4';

    public function __construct(){
        $connectionString = "mysql:host=" . $this->servidor . ";dbname=" . $this->basedatos . ";charset=" . $this->charset;
        try{
            $this->conect = new PDO($connectionString, $this->usuario, $this->clave);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "conexión exitosa";
        }catch(PDOException $e){
            $this->conect = 'Error de conexión';
            echo "ERROR: " . $e->getMessage();
        }
    }

    public function conect(){
        return $this->conect;
    }
}



?>