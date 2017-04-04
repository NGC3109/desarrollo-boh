<?php

$db = pdoConnect();
$sqlVars=array();

$query="SELECT * FROM offices_title WHERE id = :id";
$stmt= $db->prepare($query);
$sqlVars[':id']=1;
if(!$stmt->execute($sqlVars)){return false;}
$offices_title=$stmt->fetch(PDO::FETCH_ASSOC);

$query1="SELECT * FROM offices_features ORDER by orden ASC";
$stmt1= $db->prepare($query1);
if(!$stmt1->execute()){return false;}


$query2="SELECT * FROM offices_images";
$stmt2= $db->prepare($query2);
if(!$stmt2->execute()){return false;}
$stmt3= $db->prepare($query2);
if(!$stmt3->execute()){return false;}




?>



