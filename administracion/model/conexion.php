<?php

class conexion {
    
    private $db;
    private $usuario;
    private $servidor ;
    private $password ; 
    private $conect;
    private $encad; 
 
    public function conexion (){

    $this->db = "getaway";
    $this->usuario = "root";
    $this->servidor = "localhost";
    $this->password = ""; 
    }
    
    
    public  function conectar(){
        
        $this->conect = mysqli_connect($this->servidor, $this->usuario, $this->password,$this->db ) or die ("problemas con tratar de conectar con el servidor");
        return $this->conect; 
    }
  
}

?>
