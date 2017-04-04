<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();


$query="UPDATE contact SET adress=:adress WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':adress', $adress);

$id=$_POST['id'];
$adress=$_POST['adress'];

if($stmt->execute()){
	echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';
}




?>



