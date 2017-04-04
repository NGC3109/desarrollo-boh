<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO services_twocol1 (page, content1, content2, content3) VALUES (:page, :content1, :content2, :content3)";

$stmt=$db->prepare($query);

$stmt->bindParam(':page', $page);
$stmt->bindParam(':content1', $content1);
$stmt->bindParam(':content2', $content2);
$stmt->bindParam(':content3', $content3);



$page=$_POST['page'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];
$content3=$_POST['content3'];

if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}



?>



