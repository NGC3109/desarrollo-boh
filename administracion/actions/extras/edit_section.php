<?php
require_once('../connections/db-settings.php');
$dia=date('Ymdhis');
$db = pdoConnect();

if($_POST['delete'])
{
$query2="DELETE FROM about_us WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../about-us.php"
</script>';}
}
else{
$query="UPDATE about_us SET titulo_en=:titulo_en, titulo_es=:titulo_es, contenido_en=:contenido_en, contenido_es=:contenido_es, imagen=:imagen, ancho=:ancho, offset=:offset, publicar=:publicar WHERE id=:id";

$query2="UPDATE about_us SET titulo_en=:titulo_en, titulo_es=:titulo_es, contenido_en=:contenido_en, contenido_es=:contenido_es, ancho=:ancho, offset=:offset, publicar=:publicar WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':titulo_en', $titulo_en);
$stmt->bindParam(':titulo_es', $titulo_es);
$stmt->bindParam(':contenido_en', $contenido_en);
$stmt->bindParam(':contenido_es', $contenido_es);
$stmt->bindParam(':imagen', $imagen);
$stmt->bindParam(':ancho', $ancho);
$stmt->bindParam(':offset', $offset);
$stmt->bindParam(':publicar', $publicar);

$stmt2->bindParam(':id', $id);
$stmt2->bindParam(':titulo_en', $titulo_en);
$stmt2->bindParam(':titulo_es', $titulo_es);
$stmt2->bindParam(':contenido_en', $contenido_en);
$stmt2->bindParam(':contenido_es', $contenido_es);
$stmt2->bindParam(':ancho', $ancho);
$stmt2->bindParam(':offset', $offset);
$stmt2->bindParam(':publicar', $publicar);


$id=$_POST['id'];
$titulo_en=$_POST['titulo_en'];
$titulo_es=$_POST['titulo_es'];
$contenido_en=$_POST['contenido_en'];
$contenido_es=$_POST['contenido_es'];
$ancho=$_POST['ancho'];
$offset=$_POST['offset'];
if($_POST['publicar']){$publicar=1;}else{$publicar=0;}
if($_FILES['imagen']['name']!="" && $_FILES['imagen']['name']!=NULL){
$dir_name = "../../img/about-us/";
$nombre=$dia.$_FILES['imagen']['name'];
move_uploaded_file($_FILES['imagen']['tmp_name'],$dir_name.$nombre);
$imagen=$nombre;
if($stmt->execute()){echo '<script>
self.location = "../about-us.php"
</script>';}
}else{
if($stmt2->execute()){echo '<script>
self.location = "../about-us.php"
</script>';}
}
}


?>



