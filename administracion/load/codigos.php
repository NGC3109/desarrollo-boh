<?php 
	$db = pdoConnect();

	$queryco="SELECT 
				COD.codigo,
				COD.idProducto,
				PRO.id,
				PRO.nombre
				FROM codigos AS COD
				INNER JOIN productos AS PRO ON (PRO.id = COD.idProducto)";


	$stmtco= $db->prepare($queryco);
	if(!$stmtco->execute()){echo "error queryr";}

	$querypr="SELECT * FROM productos";
	$stmtpr= $db->prepare($querypr);
	if(!$stmtpr->execute()){echo "error queryr";}

	$queryact="SELECT * FROM actividades";
	$stmtact= $db->prepare($queryact);
	if(!$stmtact->execute()){echo "error queryr";}


	if(isset($_GET['id'])){
		$queryco1="SELECT * FROM codigos WHERE id=:id";
	    $stmtco1= $db->prepare($queryco1); 
		$stmtco1->bindParam(':id', $_GET['id']);
	    if(!$stmtco1->execute()){echo "error query 0";}
		$codigosE=$stmtco1->fetch(PDO::FETCH_ASSOC);
	}

/* TEST */
	$querydet="SELECT 
	
	Q.idProducto,
	Q.id AS idDetalle,
	count(DISTINCT Q.idActividad) AS idActividad, 
	P.nombre AS NombProduc

	FROM paquetes AS Q

	INNER JOIN productos AS P ON (P.id = Q.idProducto)

	GROUP BY P.id";
	$stmtdeta= $db->prepare($querydet);
	if(!$stmtdeta->execute()){echo "error queryr";}
?>