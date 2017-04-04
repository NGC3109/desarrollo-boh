<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();


$query2="DELETE FROM reservas WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '';}



?>



