<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO services_threecol (page, title, description, brochure, date1, date2, location, image) VALUES (:page, :title, :description, :brochure, :date1, :date2, :location, :image)";

$stmt=$db->prepare($query);

$stmt->bindParam(':page', $page);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':brochure', $brochure);
$stmt->bindParam(':date1', $date1);
$stmt->bindParam(':date2', $date2);
$stmt->bindParam(':location', $location);
$stmt->bindParam(':image', $image);



$page=$_POST['page'];
$title=$_POST['title'];
$description=$_POST['description'];
$date1=$_POST['date1'];
$date2=$_POST['date2'];
$location=$_POST['location'];


$dir_name = "../../brochures/".$_POST['brochurepath']."/";
move_uploaded_file($_FILES['brochure']['tmp_name'],$dir_name.$_FILES['brochure']['name']);
$brochure=$_FILES['brochure']['name'];

$dir_name = "../../images/public-programs/";
move_uploaded_file($_FILES['image']['tmp_name'],$dir_name.$_FILES['image']['name']);
$image=$_FILES['image']['name'];


if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}


?>



