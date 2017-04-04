<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['delete'])
{
$query2="DELETE FROM case_studies WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../case_studies.php"
</script>';}
}
else{
$query="UPDATE case_studies SET title=:title, description=:description, content=:content, image=:image, shortlink=:shortlink WHERE id=:id";

$query2="UPDATE case_studies SET title=:title, description=:description, content=:content, shortlink=:shortlink WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':image', $image);
$stmt->bindParam(':shortlink', $shortlink);

$stmt2->bindParam(':id', $id);
$stmt2->bindParam(':title', $title);
$stmt2->bindParam(':description', $description);
$stmt2->bindParam(':content', $content);
$stmt2->bindParam(':shortlink', $shortlink);


$id=$_POST['id'];
$title=$_POST['title'];
$description=$_POST['description'];
$content=$_POST['content'];
$shortlink=$_POST['shortlink'];
if($_FILES['image']['name']!="" && $_FILES['image']['name']!=NULL){
$dir_name = "../../images/case-studies/";
move_uploaded_file($_FILES['image']['tmp_name'],$dir_name.$_FILES['image']['name']);
$image=$_FILES['image']['name'];
if($stmt->execute()){echo '<script>
self.location = "../case_studies.php"
</script>';}
}else{
if($stmt2->execute()){echo '<script>
self.location = "../case_studies.php"
</script>';}
}
}


?>



