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

	D.id,
	D.idCategoria,
	D.idActividades,

	C.id,
	C.nombre AS NomCa,

	A.id,
	A.nombre AS NomActiv

	FROM detalle_act_cat AS D 

	INNER JOIN actividades AS A ON (A.id = D.idActividades)
	INNER JOIN categorias AS C ON (C.id = D.idCategoria)";
	$stmtdeta= $db->prepare($querydet);
	if(!$stmtdeta->execute()){echo "error queryr";}

	
?>