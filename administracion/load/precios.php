<?php

$db = pdoConnect();
$sqlVars=array();


$query0="SELECT * FROM horarios ORDER BY idLugar, hora, tipo";
$stmt0= $db->prepare($query0);
if(!$stmt0->execute()){echo "error query 0";}


$stmt1= $db->prepare($query0);
if(!$stmt1->execute()){echo "error query 0";}


$query1="SELECT * FROM lugares";
$stmt2= $db->prepare($query1);
if(!$stmt2->execute()){echo "error query 1";}





?>



