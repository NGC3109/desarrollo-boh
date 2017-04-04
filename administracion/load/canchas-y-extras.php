<?php

$db = pdoConnect();
$sqlVars=array();


$query0="SELECT * FROM lugares";
$stmt0= $db->prepare($query0);
if(!$stmt0->execute($sqlVars)){echo "error query 0";}





?>



