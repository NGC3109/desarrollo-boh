<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO clients (image, name) VALUES (:image, :name)";

$stmt=$db->prepare($query);

$stmt->bindParam(':image', $image);
$stmt->bindParam(':name', $cname);





$cname=$_POST['cname'];


$dir_name = "../../images/clients/";
move_uploaded_file($_FILES['image']['tmp_name'],$dir_name.$_FILES['image']['name']);
$image=$_FILES['image']['name'];


if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}


?>



