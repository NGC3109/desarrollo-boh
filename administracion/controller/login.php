<?php

include ("../model/usuarios.php");

$user = $_POST['usuario'];
$encrypt = sha1($_POST['pass']);
$pass = $encrypt;

$wish = new wish(); 
$wish -> login($user , $pass); 
 


?>