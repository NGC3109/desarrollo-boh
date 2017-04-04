<?php
require_once('../connections/db-settings.php');
$dia=date('Ymdhis');
$db = pdoConnect();

if($_POST['delete'])
{
$query2="DELETE FROM offices_images WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../the-offices.php"
</script>';}
}
else{
$query="UPDATE offices_images SET contenido_en=:contenido_en, contenido_es=:contenido_es, imagen=:imagen, publicar=:publicar WHERE id=:id";

$query2="UPDATE offices_images SET contenido_en=:contenido_en, contenido_es=:contenido_es, publicar=:publicar WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':contenido_en', $contenido_en);
$stmt->bindParam(':contenido_es', $contenido_es);
$stmt->bindParam(':imagen', $imagen);
$stmt->bindParam(':publicar', $publicar);

$stmt2->bindParam(':id', $id);
$stmt2->bindParam(':contenido_en', $contenido_en);
$stmt2->bindParam(':contenido_es', $contenido_es);
$stmt2->bindParam(':publicar', $publicar);


$id=$_POST['id'];
$contenido_en=$_POST['contenido_en'];
$contenido_es=$_POST['contenido_es'];
if($_POST['publicar']){$publicar=1;}else{$publicar=0;}
if($_FILES['imagen']['name']!="" && $_FILES['imagen']['name']!=NULL){
$dir_name = "../../img/the-offices/";
$nombre=$dia.$_FILES['imagen']['name'];
move_uploaded_file($_FILES['imagen']['tmp_name'],$dir_name.$nombre);
$imagen=$nombre;
if($stmt->execute()){echo '<script>
self.location = "../the-offices.php"
</script>';}
}else{
if($stmt2->execute()){echo '<script>
self.location = "../the-offices.php"
</script>';}
}
}


?>



