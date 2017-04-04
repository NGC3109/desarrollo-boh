<?php
require_once('../connections/db-settings.php');
$db = pdoConnect();
$sqlVars=array();
$username=$_POST['username'];


$query="SELECT * FROM admin_bici WHERE mailBici = :username";
$stmt= $db->prepare($query);
$sqlVars[':username']=$username;
if(!$stmt->execute($sqlVars)){echo "error query 0";}
$user_data=$stmt->fetch(PDO::FETCH_ASSOC);

if($user_data['mailBici']==$username){
session_start();
$id=$user_data['id'];
$user=$user_data['userBici'];
$pass=$user_data['passBici'];
$mail=$user_data['mailBici'];

$to = $mail; // Replace with your email	
	$subject = 'Recuperación de Clave de Administración'; // Replace with your $subject
	$headers = 'From: administracion@boh.cl';	
	
	$message = 'Usuario: '. $user ."\n" .
	           'Clave: ' . $pass . "\n";
	
	if(mail($to, $subject, $message, $headers)){
    echo "<div class='alert alert-success'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
										El usuario y clave fue enviado correctamente.
									</div>";
	
	}
	else{  echo "<div class='alert alert-danger'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
										Hubo un problema enviando el mail. Por favor intenta de nuevo.
									</div>"; }
}
else{

echo "<div class='alert alert-danger'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
										<strong>Epa!</strong> El email no está registrado.
									</div>";	
	
	
}



?>



