<?php
class Conexion{
    private $host = 'localhost';
    private $usuario = 'root';
    private $password ='Nayef2002';
    private $base = 'bitacora_residencias';
    public $sentencia;
    private $rows = array();
    private $conexion;

    private function abrir_conexion(){
        $this->conexion = new mysqli($this->host,$this->usuario,$this->password,
        $this->base);    
    }

    private function cerrar_conexion(){
        $this->conexion->close();
    }
    public function ejecutar_sentencia(){
        $this->abrir_conexion();
        $bandera = $this->conexion->query($this->sentencia);
        $this->cerrar_conexion();
        return $bandera;
    }
}

$obj = new conexion();
$obj->sentencia = "INSERT INTO prueba('omar')";
$resultado = $obj->ejecutar_sentencia();
if($resultado){
    echo "DATOS INSERTADOS";
}

?>