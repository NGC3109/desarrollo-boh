<?php

$db = pdoConnect();
$sqlVars=array();

$query="SELECT * FROM community ORDER BY fecha DESC";
$stmt= $db->prepare($query);
if(!$stmt->execute()){return false;}


$stmt6= $db->prepare($query);
if(!$stmt6->execute()){return false;}

$query1="SELECT * FROM community_supportes ORDER BY id ASC";
$stmt1= $db->prepare($query1);
if(!$stmt1->execute()){return false;}

$query2="SELECT * FROM community WHERE shortlink_en=:shortlink_en";
$stmt2= $db->prepare($query2);
$stmt2->bindParam(':shortlink_en', $shortlink_en);
if(!$stmt2->execute()){return false;}
$row2=$stmt2->fetch(PDO::FETCH_ASSOC);

$query3="SELECT * FROM community WHERE shortlink_es=:shortlink_es";
$stmt3= $db->prepare($query3);
$stmt3->bindParam(':shortlink_es', $shortlink_es);
if(!$stmt3->execute()){return false;}
$row3=$stmt3->fetch(PDO::FETCH_ASSOC);

?>



