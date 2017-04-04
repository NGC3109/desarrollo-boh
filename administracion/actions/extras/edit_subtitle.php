<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();


$query="UPDATE subtitle SET left1=:left1 , left2=:left2 , rightp=:rightp WHERE id=:id";

$stmt=$db->prepare($query);


$stmt->bindParam(':left1', $left1);
$stmt->bindParam(':left2', $left2);
$stmt->bindParam(':rightp', $rightp);
$stmt->bindParam(':id', $id);


$left1 = $_POST['left1'];
$left2 = $_POST['left2'];
$rightp = $_POST['rightp'];
$id = $_POST['id'];


if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['page'].'.php"
</script>';}
else{}



?>



