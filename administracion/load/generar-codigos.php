<?php

$db = pdoConnect();
$sqlVars=array();
/* START CARGAR TODO */

$query0 = "SELECT

			CODIGO.id,
			CODIGO.codigo,
			CODIGO.idProducto,
			CODIGO.idCliente,
			CODIGO.idUsuario,
			CODIGO.idVenta,
			CODIGO.fechaCreacion,
			CODIGO.fechaActivacion,
			CODIGO.fechaVencimiento,
			CODIGO.fechaCobro,
			CODIGO.estado,

			PRODUCTO.nombre AS PRODUCTO_NOM,

			CLIENTE.nombre AS CLIENTE_NOM

			FROM codigos AS CODIGO

			INNER JOIN productos AS PRODUCTO ON (PRODUCTO.id = CODIGO.idProducto)
			INNER JOIN clientes AS CLIENTE ON (CLIENTE.id = CODIGO.idCliente)";	

$stmt0= $db->prepare($query0);
if(!$stmt0->execute()){echo "error query 0";}


$stmt1= $db->prepare($query0);
$stmt5= $db->prepare($query0);
if(!$stmt1->execute()){echo "error query 0";}

/* END CARGA TODO */

/* START CARGA PARA EDITAR */

if(isset($_GET['id'])){

	$queryco = "SELECT

				CODIGO.id,
				CODIGO.codigo,
				CODIGO.idProducto,
				CODIGO.idCliente,
				CODIGO.idUsuario,
				CODIGO.idVenta,
				CODIGO.fechaCreacion,
				CODIGO.fechaActivacion,
				CODIGO.fechaVencimiento,
				CODIGO.fechaCobro,
				CODIGO.estado,

				PRODUCTO.nombre AS PRODUCTO_NOM,

				CLIENTE.nombre AS CLIENTE_NOM

			FROM codigos AS CODIGO

			INNER JOIN productos AS PRODUCTO ON (PRODUCTO.id = CODIGO.idProducto)
			INNER JOIN clientes AS CLIENTE ON (CLIENTE.id = CODIGO.idCliente)

			WHERE id=:id";

    $stmtco= $db->prepare($queryco); 
	$stmtco->bindParam(':id', $_GET['id']);

    if(!$stmtco->execute()){echo "error query 0";}

	$codigoE=$stmtco->fetch(PDO::FETCH_ASSOC);
	
}

/* END CARGA PARA EDITAR */

/* START CARGA PRODUCTO */

$query1="SELECT * FROM productos";
$stmt1= $db->prepare($query1);
if(!$stmt1->execute()){echo "error query 0";}

/*END CARGA PRODUCTO*/

/* START CARGA CLIENTE */

$query2="SELECT * FROM clientes";
$stmt2= $db->prepare($query2);
if(!$stmt2->execute()){echo "error query 0";}

/* END CARGA CLIENTE */

?>



