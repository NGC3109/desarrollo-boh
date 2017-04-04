<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();


$query="UPDATE services_brochure SET brochure=:brochure WHERE id=:id";


$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':brochure', $brochure);




$id=$_POST['id'];


if($_FILES['brochure']['name']!="" && $_FILES['brochure']['name']!=NULL){
$dir_name = "../../brochures/".$_POST['brochurepath']."/";
move_uploaded_file($_FILES['brochure']['tmp_name'],$dir_name.$_FILES['brochure']['name']);
$brochure=$_FILES['brochure']['name'];
if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}
}
else{echo '<script>
alert("Please add a brochure next time. =)")
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}



?>



