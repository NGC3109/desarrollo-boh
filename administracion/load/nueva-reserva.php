<?php

$db = pdoConnect();
$sqlVars=array();


$query0="SELECT * FROM lugares";
$stmt0= $db->prepare($query0);
if(!$stmt0->execute()){echo "error query 0";}


$stmt1= $db->prepare($query0);
$stmt5= $db->prepare($query0);
if(!$stmt1->execute()){echo "error query 0";}



//$query2="SELECT * FROM horarios WHERE idLugar=:idLugar";
//$stmt2= $db->prepare($query2);
//$sqlVars[':idLugar']=0;
//if(!$stmt2->execute($sqlVars)){echo "error query 0";}
//
//
//$stmt3= $db->prepare($query2);
//$sqlVars[':idLugar']=1;
//if(!$stmt3->execute($sqlVars)){echo "error query 0";}



$variables=array();

$queryh="SELECT * FROM reservas ORDER BY fecha DESC";
$stmth= $db->prepare($queryh);
if(!$stmth->execute($variables)){echo "error queryr";}






?>



