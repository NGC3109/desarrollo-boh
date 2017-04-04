<?php

$db = pdoConnect();
$sqlVars=array();


$query0="SELECT * FROM actividades";
$stmt0= $db->prepare($query0);
if(!$stmt0->execute()){echo "error query 0";}


$stmt1= $db->prepare($query0);
$stmt5= $db->prepare($query0);
if(!$stmt1->execute()){echo "error query 0";}

if(isset($_GET['id'])){
	$queryco="SELECT * FROM actividades WHERE id=:id";
    $stmtco= $db->prepare($queryco); 
	$stmtco->bindParam(':id', $_GET['id']);
    if(!$stmtco->execute()){echo "error query 0";}
	$actividadE=$stmtco->fetch(PDO::FETCH_ASSOC);
	
}



//$query2="SELECT * FROM horarios WHERE idLugar=:idLugar";
//$stmt2= $db->prepare($query2);
//$sqlVars[':idLugar']=0;
//if(!$stmt2->execute($sqlVars)){echo "error query 0";}
//
//
//$stmt3= $db->prepare($query2);
//$sqlVars[':idLugar']=1;
//if(!$stmt3->execute($sqlVars)){echo "error query 0";}


$queryh =
"SELECT 

	COMUNA.COMUNA_ID,
	COMUNA.COMUNA_NOMBRE,
	COMUNA.COMUNA_PROVINCIA_ID,

	PROVINCIA.PROVINCIA_ID,
	PROVINCIA.PROVINCIA_NOMBRE

	FROM comuna AS COMUNA

	INNER JOIN provincia AS PROVINCIA ON (COMUNA.COMUNA_PROVINCIA_ID = PROVINCIA.PROVINCIA_ID)";

$stmth= $db->prepare($queryh);

if(!$stmth->execute()){
	echo "error queryr";
}

$querycol="SELECT * FROM colaboradores";
$stmtcol= $db->prepare($querycol);
if(!$stmtcol->execute()){echo "error querycol";}

$querypr="SELECT * FROM productos";
$stmtpr= $db->prepare($querypr);
if(!$stmtpr->execute()){echo "error queryr";}






?>



