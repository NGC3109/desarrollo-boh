<?php

session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO colaboradores (nombre, rut, razonSocial, encargado, banco, cuenta, tipoCuenta, email, telefono, direccion, comuna, estado) VALUES (:nombre, :rut, :razonSocial, :encargado, :banco, :cuenta, :tipoCuenta, :email, :telefono, :direccion, :comuna, :estado)";

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


if($stmt->execute()){echo '<script>
self.location = "../colaboradores.php"
</script>';}
}
else{
	header("Location:../signin.php");	
}


?>



