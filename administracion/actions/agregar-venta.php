<?php

session_start();
if($_SESSION['id']!="" && $_SESSION['id']!=NULL && $_SESSION['id']==1)
{
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO ventas (nombre_venta, idCliente, cotizacion, orden_compra, total) VALUES (:nombre_venta, :idCliente, :cotizacion, :orden_compra, :resultado)";
$querydt="INSERT INTO detalle_venta (idVenta, idProducto, cantidad, total_unitario) VALUES (:idVentaNew, :idProducto, :cantidad, :p_unit)";

$stmt=$db->prepare($query);
$stmtdt=$db->prepare($querydt);

$stmt->bindParam(':nombre_venta', $_POST['nombre_venta']);
$stmt->bindParam(':idCliente', $_POST['idCliente']);
$stmt->bindParam(':cotizacion', $_POST['cotizacion']);
$stmt->bindParam(':orden_compra', $_POST['orden_compra']);
$stmt->bindParam(':resultado', $_POST['resultado']);

$stmtdt->bindParam(':idVentaNew', $_POST['idVentaNew']);
$stmtdt->bindParam(':idProducto', $_POST['idProducto']);
$stmtdt->bindParam(':cantidad', $_POST['cantidad']);
$stmtdt->bindParam(':p_unit', $_POST['p_unit']);


if($stmt->execute() AND $stmtdt->execute()){echo '<script>
self.location = "../ventas.php"
</script>';}
}
else{
	header("Location:../signin.php");	
}

?>



