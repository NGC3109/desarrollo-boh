<?php
session_start();
$db = pdoConnect();
$sqlVars=array();

$query="SELECT * FROM admin_cc WHERE id = :id";
$stmt= $db->prepare($query);

$sqlVars[':id']=$_SESSION['id'];
if(!$stmt->execute($sqlVars)){return false;}
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>



