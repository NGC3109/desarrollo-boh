<?php
require_once('../connections/db-settings.php');
$dia=date('Ymdhis');
$db = pdoConnect();

if($_POST['delete'])
{
$query2="DELETE FROM slider WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../index.php"
</script>';}
}
else{
$query="UPDATE slider SET titulo_en=:titulo_en, titulo_es=:titulo_es, frase_en=:frase_en, frase_es=:frase_es, link_es=:link_es, link_en=:link_en, imagen=:imagen, publicar=:publicar, orden=:orden WHERE id=:id";

$query2="UPDATE slider SET titulo_en=:titulo_en, titulo_es=:titulo_es, frase_en=:frase_en, frase_es=:frase_es, link_es=:link_es, link_en=:link_en, publicar=:publicar, orden=:orden WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':titulo_en', $titulo_en);
$stmt->bindParam(':titulo_es', $titulo_es);
$stmt->bindParam(':frase_en', $frase_en);
$stmt->bindParam(':frase_es', $frase_es);
$stmt->bindParam(':link_es', $link_es);
$stmt->bindParam(':link_en', $link_en);
$stmt->bindParam(':imagen', $imagen);
$stmt->bindParam(':publicar', $publicar);
$stmt->bindParam(':orden', $orden);

$stmt2->bindParam(':id', $id);
$stmt2->bindParam(':titulo_en', $titulo_en);
$stmt2->bindParam(':titulo_es', $titulo_es);
$stmt2->bindParam(':frase_en', $frase_es);
$stmt2->bindParam(':frase_es', $frase_es);
$stmt2->bindParam(':link_es', $link_es);
$stmt2->bindParam(':link_en', $link_en);
$stmt2->bindParam(':publicar', $publicar);
$stmt2->bindParam(':orden', $orden);


$id=$_POST['id'];
$titulo_en=$_POST['titulo_en'];
$titulo_es=$_POST['titulo_es'];
$frase_en=$_POST['frase_en'];
$frase_es=$_POST['frase_es'];
$link_en=$_POST['link_en'];
$link_es=$_POST['link_es'];
$orden=$_POST['orden'];
if($_POST['publicar']){$publicar=1;}else{$publicar=0;}
if($_FILES['imagen']['name']!="" && $_FILES['imagen']['name']!=NULL){
$dir_name = "../../img/slides/";
$nombre=$dia.$_FILES['imagen']['name'];
move_uploaded_file($_FILES['imagen']['tmp_name'],$dir_name.$nombre);
$imagen=$nombre;
if($stmt->execute()){echo '<script>
self.location = "../index.php"
</script>';}
}else{
if($stmt2->execute()){echo '<script>
self.location = "../index.php"
</script>';}
}
}


?>



