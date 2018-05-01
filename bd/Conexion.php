<?php

class Conexion {

    private $conexion;
    private static $instancia = null; //

    private function __construct() {
        $config = parse_ini_file('../configuracion/Conexion.ini');
        $this->conexion = new mysqli($config['server'], $config['username'], $config['password'], $config['dbname']);
        if (mysqli_connect_error()) {
            trigger_error("Errora de conexion: " . mysql_connect_error(), E_USER_ERROR);
        }
    }

    public static function obtenerInstancia() {
        if (!self::$instancia) {
            self::$instancia = new self();
        } return self::$instancia;
    }

    public function cerrar() {
        mysqli_close($this->conexion);
        self::$instancia = null;
    }

    public function obtenerConexion() {    //Conexion       
        return $this->conexion;
    }

}
