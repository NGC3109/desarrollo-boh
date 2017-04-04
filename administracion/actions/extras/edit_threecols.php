<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();


$query="UPDATE threecols SET title=:title, description=:description, link=:link, image=:image WHERE id=:id";

$query2="UPDATE threecols SET title=:title, description=:description, link=:link WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':link', $link);
$stmt->bindParam(':image', $image);


$stmt2->bindParam(':id', $id);
$stmt2->bindParam(':title', $title);
$stmt2->bindParam(':description', $description);
$stmt2->bindParam(':link', $link);


$id=$_POST['id'];
$title=$_POST['title'];
$description=$_POST['description'];
$link=$_POST['link'];


if($_FILES['image']['name']!="" && $_FILES['image']['name']!=NULL){
$dir_name = "../../images/";
move_uploaded_file($_FILES['image']['tmp_name'],$dir_name.$_FILES['image']['name']);
$image=$_FILES['image']['name'];
if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}
}else{
if($stmt2->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}
}



?>



