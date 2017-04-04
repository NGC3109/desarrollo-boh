<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['delete']){ 
$query2="DELETE FROM slider_quotes WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';}
}
else{
$query="UPDATE slider_quotes SET author=:author, quote=:quote WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':author', $author);
$stmt->bindParam(':quote', $quote);

$id=$_POST['id'];
$author=$_POST['author'];
$quote=$_POST['quote'];

if($stmt->execute()){
	echo '<script>
self.location = "../'.$_POST['pagelink'].'.php"
</script>';
}
}



?>



