<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();


$query="UPDATE services_tools SET content=:content,content1=:content1,content2=:content2,content3=:content3 WHERE id=:id";
$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':content1', $content1);
$stmt->bindParam(':content2', $content2);
$stmt->bindParam(':content3', $content3);


$id=$_POST['id'];
if($_POST['content']!=NULL){
$content=$_POST['content'];
}
else{
$content="";
}
$content1=$_POST['content1'];
$content2=$_POST['content2'];



if($_FILES['content3']['name']!="" && $_FILES['content3']['name']!=NULL){
$dir_name = "../../images/".$_POST['imagepath']."/";
move_uploaded_file($_FILES['content3']['tmp_name'],$dir_name.$_FILES['content3']['name']);
$content3=$_FILES['content3']['name'];
}else{
$content3=$_POST['content3_before'];	
}


if($stmt->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}





?>



