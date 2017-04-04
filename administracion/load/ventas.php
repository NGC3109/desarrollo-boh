<?php

$db = pdoConnect();
$sqlVars=array();


$query0="SELECT 
			V.id AS idVenta,
			V.nombre_venta,
			V.idCliente,
			V.cotizacion,
			V.orden_compra,
			C.id,
			C.nombre AS nom_cliente

			FROM ventas AS V

			INNER JOIN clientes AS C ON (C.id = V.idCliente)
			ORDER BY idVenta DESC";

$stmt0= $db->prepare($query0);
if(!$stmt0->execute()){echo "error query 0";}

$query1="SELECT 
			V.id AS idVenta
			FROM ventas AS V
			ORDER BY idVenta DESC";

$stmt1= $db->prepare($query1);
if(!$stmt1->execute()){echo "error query 0";}




$query2="SELECT
			VD.id AS idVentaV,
			VD.idVenta,
			VD.idProducto,
			VD.cantidad,
			VD.total_unitario,

			C.id,
			C.nombre AS nom_cliente,

			P.id,
			P.nombre AS nom_producto,

			V.id AS idVentaD,
			V.nombre_venta,
			V.idCliente,
			V.cotizacion,
			V.orden_compra,
			V.total

			FROM ventas AS V

			INNER JOIN detalle_venta AS VD ON (VD.id = V.id)
			INNER JOIN clientes AS C ON (C.id = V.idCliente)
			INNER JOIN productos AS P ON (P.id = VD.idProducto)";
$stmt2= $db->prepare($query2);
if(!$stmt2->execute()){echo "error query 0";}





if(isset($_GET['id'])){
	$queryco="SELECT * FROM ventas WHERE id=:id";
    $stmtco= $db->prepare($queryco); 
	$stmtco->bindParam(':id', $_GET['id']);
    if(!$stmtco->execute()){echo "error query 0";}
	$ventasE=$stmtco->fetch(PDO::FETCH_ASSOC);
	
}

$querycl="SELECT * FROM clientes";
$stmtcl= $db->prepare($querycl);
if(!$stmtcl->execute()){echo "error queryr";}

$querypr="SELECT * FROM productos";
$stmtpr= $db->prepare($querypr);
if(!$stmtpr->execute()){echo "error queryr";}






?>



