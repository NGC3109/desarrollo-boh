<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO about_us (type, content1, content2) VALUES (:type, :content1, :content2)";

$stmt=$db->prepare($query);

$stmt->bindParam(':type', $type);
$stmt->bindParam(':content1', $content1);
$stmt->bindParam(':content2', $content2);



$type=$_POST['type'];
$content1=$_POST['content1'];
$content2=$_POST['content2'];

if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}



?>



