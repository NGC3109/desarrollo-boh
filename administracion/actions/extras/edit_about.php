<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();


$query="UPDATE about_us SET content1=:content1 WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':content1', $content1);

$id=$_POST['id'];
$content1=$_POST['content1'];

if($stmt->execute()){
	echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';
}




?>



