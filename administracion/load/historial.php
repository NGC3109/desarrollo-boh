<?php

$db = pdoConnect();
$sqlVars=array();
$variables=array();


$query0="SELECT * FROM items WHERE tipo = :tipo";
$stmt0= $db->prepare($query0);
$sqlVars[':tipo']=0;
if(!$stmt0->execute($sqlVars)){echo "error query 0";}


$stmt1= $db->prepare($query0);
$stmt5= $db->prepare($query0);
$sqlVars[':tipo']=1;
if(!$stmt1->execute($sqlVars)){echo "error query 0";}



$query2="SELECT * FROM precios WHERE tipo=:tipo";
$stmt2= $db->prepare($query2);
$sqlVars[':tipo']=0;
if(!$stmt2->execute($sqlVars)){echo "error query 0";}


$stmt3= $db->prepare($query2);
$sqlVars[':tipo']=1;
if(!$stmt3->execute($sqlVars)){echo "error query 0";}


$query="SELECT * FROM reservas WHERE usuario=:tipo ORDER BY fecha_inicio ASC, hora_inicio ASC";
$stmt= $db->prepare($query);
$sqlVars[':tipo']=0;
if(!$stmt->execute($sqlVars)){echo "error query";}

$queryr="SELECT * FROM reservas WHERE fecha_inicio<:fecha ORDER BY fecha_inicio DESC, hora_inicio DESC";
$stmtr= $db->prepare($queryr);
$variables[':fecha']=date('Y-m-d');
if(!$stmtr->execute($variables)){echo "error queryr";}





?>



