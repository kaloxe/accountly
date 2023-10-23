<?php
class database
{
    public $conn; // conexion
    public $servidor;
    public $usuario;
    public $clave;
    public $basedatos;
    public $charset;
    public $pdo;
    public $sqli;

    function __construct()
    {
        date_default_timezone_set("America/Caracas");
        $this->servidor = "127.0.0.1:3366";
        $this->usuario = "root";
        $this->clave = "";
        $this->basedatos = "accountly";
        $this->charset  = 'utf8mb4';

        $this->sqli = new mysqli($this->servidor, $this->usuario, $this->clave, $this->basedatos);

        try {
            $this->conn = "mysql:host=" . $this->servidor . ";dbname=" . $this->basedatos . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $this->pdo = new PDO($this->conn, $this->usuario, $this->clave, $options);
            // print_r('conexion exitosa');
        } catch (PDOException $e) {
            print_r('Error connection: ' . $e->getMessage());
        }
    }

    public function open()
    {
        return $this->pdo;
    }

    public function openSQL()
    {
        return $this->sqli;
    }

    function cerrar()
    {
        try {
            // Ya se ha terminado; se cierra
            $this->pdo = null;
        } catch (Exception $e) {
            return 0;
        }
    }
}
