<?php
require_once('../connections/db-settings.php');
$db = pdoConnect();
$sqlVars=array();
$username=$_POST['username'];
$pwd=$_POST['pwd'];


$query="SELECT * FROM admin_getaway WHERE userGetaway = :username AND passGetaway = :pwd";
$stmt= $db->prepare($query);
$sqlVars[':username']=$username;
$sqlVars[':pwd']=$pwd;
if(!$stmt->execute($sqlVars)){echo "error query 0";}
$user_data=$stmt->fetch(PDO::FETCH_ASSOC);

if($user_data['userGetaway']==$username && $user_data['passGetaway']){
	session_start();
	$_SESSION['id']=$user_data['id'];
	$_SESSION['user']=$user_data['userGetaway'];
	$_SESSION['mail']=$user_data['mailGetaway'];
	$_SESSION['idTipoUsuario'] = $user_data['idTipoUsuario'];

	if($_SESSION['id']==1){
		echo "<script>window.location='index.php'</script>";
	}
	
}else{

echo "<div class='alert alert-danger'>
		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
		<strong>Epa!</strong> Hubo un error al ingresar. Intenta de nuevo.
	</div>";	
	
}



?>



