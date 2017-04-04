<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['delete'])
{
$query2="DELETE FROM clients WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}
}
else{
$query="UPDATE clients SET image=:image, name=:name WHERE id=:id";

$query2="UPDATE clients SET name=:name WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':image', $image);
$stmt->bindParam(':name', $name);


$stmt2->bindParam(':id', $id);
$stmt2->bindParam(':name', $name);


$id=$_POST['id'];
$name=$_POST['cname'];


if($_FILES['image']['name']!="" && $_FILES['image']['name']!=NULL){
$dir_name = "../../images/clients/";
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
}


?>



