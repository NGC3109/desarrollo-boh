<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO case_studies (title, description, content, image, shortlink) VALUES (:title, :description, :content, :image, :shortlink)";

$stmt=$db->prepare($query);

$stmt->bindParam(':title', $title);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':content', $content);
$stmt->bindParam(':image', $image);
$stmt->bindParam(':shortlink', $shortlink);



$title=$_POST['title'];
$description=$_POST['description'];
$content=$_POST['content'];
$shortlink=$_POST['shortlink'];

$dir_name = "../../images/case-studies/";
move_uploaded_file($_FILES['image']['tmp_name'],$dir_name.$_FILES['image']['name']);
$image=$_FILES['image']['name'];


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



