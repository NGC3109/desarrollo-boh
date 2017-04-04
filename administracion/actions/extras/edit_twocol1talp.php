<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['delete'])
{
$query2="DELETE FROM services_twocol1 WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}
}
else{
$query="UPDATE services_twocol1 SET content1=:content1, content2=:content2, content3=:content3 WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':content1', $content1);
$stmt->bindParam(':content2', $content2);
$stmt->bindParam(':content3', $content3);

$id=$_POST['id'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];
$content3=$_POST['content3'];

if($stmt->execute()){
	echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';
}

}


?>



