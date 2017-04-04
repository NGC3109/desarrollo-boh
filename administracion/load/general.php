<?php

$db = pdoConnect();
$sqlVars=array();


$query_gs="SELECT * FROM general_settings WHERE id=:id";
$stmt_gs= $db->prepare($query_gs);
$sqlVars[':id']=1;
if(!$stmt_gs->execute($sqlVars)){echo "error query GS";}
$gs=$stmt_gs->fetch(PDO::FETCH_ASSOC);

$query_gs2="SELECT * FROM general_settings WHERE id=:id";
$stmt_gs2= $db->prepare($query_gs2);
$sqlVars[':id']=2;
if(!$stmt_gs2->execute($sqlVars)){echo "error query GS";}
$gs2=$stmt_gs2->fetch(PDO::FETCH_ASSOC);

$query_gs3="SELECT * FROM general_settings WHERE id=:id";
$stmt_gs3= $db->prepare($query_gs3);
$sqlVars[':id']=3;
if(!$stmt_gs3->execute($sqlVars)){echo "error query GS";}
$gs3=$stmt_gs3->fetch(PDO::FETCH_ASSOC);



?>



