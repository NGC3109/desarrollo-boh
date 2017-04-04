<?php

session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO clientes (nombre, rut, razonSocial, email, telefono, direccion, comuna) VALUES (:nombre, :rut, :razonSocial, :email, :telefono, :direccion, :comuna)";

$stmt=$db->prepare($query);

$stmt->bindParam(':nombre', $_POST['nombre']);
$stmt->bindParam(':rut', $_POST['rut']);
$stmt->bindParam(':razonSocial', $_POST['razonSocial']);
$stmt->bindParam(':email', $_POST['email']);
$stmt->bindParam(':telefono', $_POST['telefono']);
$stmt->bindParam(':direccion', $_POST['direccion']);
$stmt->bindParam(':comuna', $_POST['comuna']);


if($stmt->execute()){echo '<script>
self.location = "../clientes.php"
</script>';}
}
else{
	header("Location:../signin.php");	
}


?>



