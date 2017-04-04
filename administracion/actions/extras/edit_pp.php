<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['delete'])
{
$query2="DELETE FROM services_threecol WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}
}
else{
$query="UPDATE services_threecol SET title=:title, description=:description, brochure=:brochure, date1=:date1, date2=:date2, location=:location, image=:image WHERE id=:id";
$stmt=$db->prepare($query);

$query2="SELECT * FROM services_threecol WHERE id = :id";
$stmt2= $db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if(!$stmt2->execute()){echo "error query 2";}
$row=$stmt2->fetch(PDO::FETCH_ASSOC);


$stmt->bindParam(':id', $id);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':brochure', $brochure);
$stmt->bindParam(':date1', $date1);
$stmt->bindParam(':date2', $date2);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':image', $image);





$id=$_POST['id'];
$title=$_POST['title'];
$description=$_POST['description'];
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$location=$_POST['location'];

if($_FILES['brochure']['name']!="" && $_FILES['brochure']['name']!=NULL){
$dir_name = "../../brochure/".$_POST['brochurepath']."/";
move_uploaded_file($_FILES['brochure']['tmp_name'],$dir_name.$_FILES['brochure']['name']);
$brochure=$_FILES['brochure']['name'];
}else{
$brochure=$row['brochure'];	
}
if($_FILES['image']['name']!="" && $_FILES['image']['name']!=NULL){
$dir_name = "../../images/public-programs/";
move_uploaded_file($_FILES['image']['tmp_name'],$dir_name.$_FILES['image']['name']);
$image=$_FILES['image']['name'];
}else{
$image=$row['image'];	
}


if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}


}


?>



