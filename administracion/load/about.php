<?php

$db = pdoConnect();
$sqlVars=array();


$query0="SELECT * FROM about_us";
$stmt0= $db->prepare($query0);
if(!$stmt0->execute()){echo "error query 0";}

$stmt2= $db->prepare($query0);
if(!$stmt2->execute()){echo "error query 0";}


?>



