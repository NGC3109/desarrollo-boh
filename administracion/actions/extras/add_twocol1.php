<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO services_twocol1 (page, content1) VALUES (:page, :content1)";

$stmt=$db->prepare($query);

$stmt->bindParam(':page', $page);
$stmt->bindParam(':content1', $content1);



$page=$_POST['page'];
$content1=$_POST['content'];

if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}



?>



