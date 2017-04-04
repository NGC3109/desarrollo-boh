<?php

$db = pdoConnect();
$sqlVars=array();


$query0="SELECT * FROM productos";
$stmt0= $db->prepare($query0);
if(!$stmt0->execute()){echo "error query 0";}


$stmt1= $db->prepare($query0);
$stmt5= $db->prepare($query0);
if(!$stmt1->execute()){echo "error query 0";}

if(isset($_GET['id'])){
	$queryco="SELECT * FROM productos WHERE id=:id";
    $stmtco= $db->prepare($queryco); 
	$stmtco->bindParam(':id', $_GET['id']);
    if(!$stmtco->execute()){echo "error query 0";}
	$productoE=$stmtco->fetch(PDO::FETCH_ASSOC);
	
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


$queryh="SELECT * FROM comuna";
$stmth= $db->prepare($queryh);
if(!$stmth->execute()){echo "error queryr";}






?>



