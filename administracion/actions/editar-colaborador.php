<?php

session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('../connections/db-settings.php');

$db = pdoConnect();

if(isset($_POST['borrar'])){
	
	$query1="DELETE FROM actividades WHERE idColaborador=:id";
	$stmt1=$db->prepare($query1);
	$stmt1->bindParam(':id', $_POST['idc']);
	$stmt1->execute();
	
	$query="DELETE FROM colaboradores WHERE id=:id";
	$stmt=$db->prepare($query);
	$stmt->bindParam(':id', $_POST['idc']);
	if($stmt->execute()){echo '<script>
self.location = "../colaboradores.php"
</script>';}
}
else{
$query="UPDATE colaboradores SET nombre=:nombre, rut=:rut, razonSocial=:razonSocial, encargado=:encargado, banco=:banco, cuenta=:cuenta, tipoCuenta=:tipoCuenta, email=:email, telefono=:telefono, direccion=:direccion, comuna=:comuna, estado=:estado WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':nombre', $_POST['nombre']);
$stmt->bindParam(':rut', $_POST['rut']);
$stmt->bindParam(':razonSocial', $_POST['razonSocial']);
$stmt->bindParam(':encargado', $_POST['encargado']);
$stmt->bindParam(':banco', $_POST['banco']);
$stmt->bindParam(':cuenta', $_POST['cuenta']);
$stmt->bindParam(':tipoCuenta', $_POST['tipoCuenta']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':telefono', $_POST['telefono']);
$stmt->bindParam(':direccion', $_POST['direccion']);
$stmt->bindParam(':comuna', $_POST['comuna']);
$stmt->bindParam(':estado', $_POST['estado']);
$stmt->bindParam(':id', $_POST['idc']);


if($stmt->execute()){echo '<script>
self.location = "../editar-colaborador.php?id='.$_POST['idc'].'"
</script>';}
}
}
else{
	header("Location:../signin.php");	
}

?>



