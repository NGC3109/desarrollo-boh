<?php

include 'conexion.php'; 

class wish extends conexion {
        
  private $fine; 
  private $user ; 
  private $password;
  private $consulta ;
  private $conexion;
  private $row, $pas1 , $pas2;
  private $penombre, $peapellido, $peusuario, $pepassword, $verificar ; 

  public function wish(){

  $conect = new conexion();
  $this->conexion = $conect -> conectar();

  }

  public  function login($usuario, $pass){
    $this->user = $usuario;
    $this->password= $pass;
    $this->consulta= mysqli_query($this->conexion, "SELECT correo__usu , idTipoUsuario, password__ FROM __usuario__ where correo__usu = '".$this->user."' and  password__ = '".$this->password."'"); 
                if($this->row = mysqli_fetch_array($this->consulta)){
                    session_start();
                    $this->consulta = mysqli_query($this->conexion, "SELECT * FROM __usuario__ where correo__usu = '".$this->user."' ");  
                    $this->row = mysqli_fetch_array($this->consulta);
                    //Id
                    $this->id = $this->row['id'];
                    $_SESSION['id'] = $this->id;
                    $this->ini = 1;
                    //Nombre
                    $this->id = $this->row['nombre__'];
                    $_SESSION['nombre__'] = $this->id;
                     //tipoUsuario
                    $this->id = $this->row['idTipoUsuario'];
                    $_SESSION['idTipoUsuario'] = $this->id;

                    if ($_SESSION["idTipoUsuario"] == 2) {
                      header("Location: ../colaboradores/index_colaboradores.php");
                    }
                    if ($_SESSION["idTipoUsuario"] == 1) {
                       header("Location: ../");
                    }
                     
                }else{
                        header("Location: ../signin.php");

                        
                }
                return $this->consulta ;
  }
        
        public function verificar($pass1 , $pass2){
            
            $this->fine = false;
            
            $this->pas1 = $pass1;
            $this->pas2 = $pass2;
            
            
            if($this->pas1 == $this->pas2){
                
                $this->fine = true ; 
                
                
            }
            
            
            return $this->fine ; 
        }


}

?>
