<?php

session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('../connections/db-settings.php');

$db = pdoConnect();

if(isset($_POST['borrar'])){
	
	$query="DELETE FROM clientes WHERE id=:id";
	$stmt=$db->prepare($query);
	$stmt->bindParam(':id', $_POST['idc']);
	if($stmt->execute()){echo '<script>
self.location = "../clientes.php"
</script>';}
}
else{
$query="UPDATE clientes SET nombre=:nombre, rut=:rut, razonSocial=:razonSocial, email=:email, telefono=:telefono, direccion=:direccion, comuna=:comuna WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':nombre', $_POST['nombre']);
$stmt->bindParam(':rut', $_POST['rut']);
$stmt->bindParam(':razonSocial', $_POST['razonSocial']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':telefono', $_POST['telefono']);
$stmt->bindParam(':direccion', $_POST['direccion']);
$stmt->bindParam(':comuna', $_POST['comuna']);
$stmt->bindParam(':id', $_POST['idc']);


if($stmt->execute()){echo '<script>
self.location = "../editar-cliente.php?id='.$_POST['idc'].'"
</script>';}
}
}
else{
	header("Location:../signin.php");	
}

?>



