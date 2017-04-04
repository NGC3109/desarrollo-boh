<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="UPDATE services_title SET title=:title, subtitle=:subtitle WHERE id=:id";
$stmt=$db->prepare($query);

$stmt->bindParam(':title', $title);
$stmt->bindParam(':subtitle', $subtitle);
$stmt->bindParam(':id', $id);

$id=$_POST['id'];
$title=$_POST['title'];
$subtitle=$_POST['subtitle'];
if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['page'].'.php"
</script>';}
else{}



?>



