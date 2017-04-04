<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['delete'])
{
$query2="DELETE FROM case_studies_testimonies WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../case_studies.php"
</script>';}
}
else{
$query="UPDATE case_studies_testimonies SET testimony=:testimony, author=:author WHERE id=:id";

$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':testimony', $testimony);
$stmt->bindParam(':author', $author);

$id=$_POST['id'];
$testimony=$_POST['testimony'];
$author=$_POST['author'];

if($stmt->execute()){
	echo '<script>
self.location = "../case_studies.php"
</script>';
}

}


?>



