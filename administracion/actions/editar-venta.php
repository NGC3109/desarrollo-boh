<?php

session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('../connections/db-settings.php');

$db = pdoConnect();

if(isset($_POST['borrar'])){
	
	$query="DELETE FROM ventas WHERE id=:id";
	$stmt=$db->prepare($query);
	$stmt->bindParam(':id', $_POST['ida']);
	if($stmt->execute()){echo '<script>
self.location = "../ventas.php"
</script>';}
}
else{
$query="UPDATE ventas SET nombre_venta=:nombre_venta, idCliente=:idCliente, cotizacion=:cotizacion, orden_compra=:orden_compra WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $_POST['ida']);
$stmt->bindParam(':nombre_venta', $_POST['nombre_venta']);
$stmt->bindParam(':idCliente', $_POST['idCliente']);
$stmt->bindParam(':cotizacion', $_POST['cotizacion']);
$stmt->bindParam(':orden_compra', $_POST['orden_compra']);

if($stmt->execute()){
	echo '<script>
		self.location = "../editar-venta.php?id='.$_POST['ida'].'"
		</script>';
	}
}
}
else{
	header("Location:../signin.php");	
}

?>



