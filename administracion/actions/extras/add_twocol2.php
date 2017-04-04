<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO services_twocol2 (page, content1, content2) VALUES (:page, :content1, :content2)";

$stmt=$db->prepare($query);

$stmt->bindParam(':page', $page);
$stmt->bindParam(':content1', $content1);
$stmt->bindParam(':content2', $content2);



$page=$_POST['page'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];

if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}



?>



