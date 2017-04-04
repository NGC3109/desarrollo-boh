<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO case_studies_testimonies (testimony, author) VALUES (:testimony, :author)";

$stmt=$db->prepare($query);

$stmt->bindParam(':testimony', $testimony);
$stmt->bindParam(':author', $author);



$testimony=$_POST['testimony'];
$author=$_POST['author'];

if($stmt->execute()){echo '<script>
self.location = "../case_studies.php"
</script>';}
else{echo '<script>
self.location = "../case_studies.php"
</script>';}

echo '<script>
self.location = "../case_studies.php"
</script>';

?>



