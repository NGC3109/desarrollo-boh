<?php
require_once('../connections/db-settings.php');
$dia=date('Ymdhis');
$db = pdoConnect();

$query="UPDATE offices_title SET titulo_en=:titulo_en, titulo_es=:titulo_es, imagen=:imagen WHERE id=:id";

$query2="UPDATE offices_title SET titulo_en=:titulo_en, titulo_es=:titulo_es WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':titulo_en', $titulo_en);
$stmt->bindParam(':titulo_es', $titulo_es);
$stmt->bindParam(':imagen', $imagen);

$stmt2->bindParam(':id', $id);
$stmt2->bindParam(':titulo_en', $titulo_en);
$stmt2->bindParam(':titulo_es', $titulo_es);


$id=1;
$titulo_en=$_POST['titulo_en'];
$titulo_es=$_POST['titulo_es'];

if($_FILES['imagen']['name']!="" && $_FILES['imagen']['name']!=NULL){
$dir_name = "../../img/";
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



?>



