<?php

$db = pdoConnect();
$sqlVars=array();

$query="SELECT * FROM slider ORDER BY orden ASC";
$stmt= $db->prepare($query);
$stmt2= $db->prepare($query);
if(!$stmt->execute()){return false;}
if(!$stmt2->execute()){return false;}



?>



