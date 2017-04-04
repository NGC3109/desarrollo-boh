<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();


$query="UPDATE about_us SET content1=:content1,content2=:content2 WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':content1', $content1);
$stmt->bindParam(':content2', $content2);

$id=$_POST['id'];
$content2=$_POST['content2'];

if($_FILES['content1']['name']!="" && $_FILES['content1']['name']!=NULL){
$dir_name = "../../images/about-us/";
move_uploaded_file($_FILES['content1']['tmp_name'],$dir_name.$_FILES['content1']['name']);
$content1=$_FILES['content1']['name'];
}else{
$content1=$row['content1_before'];	
}

if($stmt->execute()){
	echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';
}




?>



