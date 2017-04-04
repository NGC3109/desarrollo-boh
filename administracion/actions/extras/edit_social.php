<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();


$query="UPDATE links SET link=:link WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':link', $link);

$id=$_POST['id'];
$link=$_POST['link'];

if($stmt->execute()){
	echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';
}




?>



