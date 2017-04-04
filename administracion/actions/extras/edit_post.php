<?php
require_once('../connections/db-settings.php');
$dia=date('Ymdhis');
$db = pdoConnect();

if($_POST['delete'])
{
$query2="DELETE FROM community WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt2->bindParam(':id', $id);
$id=$_POST['id'];
if($stmt2->execute()){echo '<script>
self.location = "../community.php"
</script>';}
}
else{
$query="UPDATE community SET titulo_en=:titulo_en, titulo_es=:titulo_es, bajada_en=:bajada_en, bajada_es=:bajada_es, contenido_en=:contenido_en, contenido_es=:contenido_es, tipo_en=:tipo_en, tipo_es=:tipo_es, fecha=:fecha, imagen=:imagen, shortlink_en=:shortlink_en, shortlink_es=:shortlink_es, publicar=:publicar WHERE id=:id";

$query2="UPDATE community SET titulo_en=:titulo_en, titulo_es=:titulo_es, bajada_en=:bajada_en, bajada_es=:bajada_es, contenido_en=:contenido_en, contenido_es=:contenido_es, tipo_en=:tipo_en, tipo_es=:tipo_es, fecha=:fecha, shortlink_en=:shortlink_en, shortlink_es=:shortlink_es, publicar=:publicar WHERE id=:id";
$stmt2=$db->prepare($query2);
$stmt=$db->prepare($query);

$stmt->bindParam(':id', $id);
$stmt->bindParam(':titulo_en', $titulo_en);
$stmt->bindParam(':titulo_es', $titulo_es);
$stmt->bindParam(':bajada_en', $bajada_en);
$stmt->bindParam(':bajada_es', $bajada_es);
$stmt->bindParam(':contenido_en', $contenido_en);
$stmt->bindParam(':contenido_es', $contenido_es);
$stmt->bindParam(':tipo_en', $tipo_en);
$stmt->bindParam(':tipo_es', $tipo_es);
$stmt->bindParam(':fecha', $fecha);
$stmt->bindParam(':imagen', $imagen);
$stmt->bindParam(':shortlink_en', $shortlink_en);
$stmt->bindParam(':shortlink_es', $shortlink_es);
$stmt->bindParam(':publicar', $publicar);

$stmt2->bindParam(':id', $id);
$stmt2->bindParam(':titulo_en', $titulo_en);
$stmt2->bindParam(':titulo_es', $titulo_es);
$stmt2->bindParam(':bajada_en', $bajada_es);
$stmt2->bindParam(':bajada_es', $bajada_es);
$stmt2->bindParam(':contenido_en', $contenido_en);
$stmt2->bindParam(':contenido_es', $contenido_es);
$stmt2->bindParam(':tipo_en', $tipo_en);
$stmt2->bindParam(':tipo_es', $tipo_es);
$stmt2->bindParam(':fecha', $fecha);
$stmt2->bindParam(':shortlink_en', $shortlink_en);
$stmt2->bindParam(':shortlink_es', $shortlink_es);
$stmt2->bindParam(':publicar', $publicar);


$id=$_POST['id'];
$titulo_en=$_POST['titulo_en'];
$titulo_es=$_POST['titulo_es'];
$bajada_en=$_POST['bajada_en'];
$bajada_es=$_POST['bajada_es'];
$contenido_en=$_POST['contenido_en'];
$contenido_es=$_POST['contenido_es'];
$tipo_en=$_POST['tipo_en'];
$tipo_es=$_POST['tipo_es'];
$fecha=$_POST['fecha'];
$shortlink_en=$_POST['shortlink_en'];
$shortlink_es=$_POST['shortlink_es'];
if($_POST['publicar']){$publicar=1;}else{$publicar=0;}
if($_FILES['imagen']['name']!="" && $_FILES['imagen']['name']!=NULL){
$dir_name = "../../img/blog/";
$nombre=$dia.$_FILES['imagen']['name'];
move_uploaded_file($_FILES['imagen']['tmp_name'],$dir_name.$nombre);
$imagen=$nombre;
if($stmt->execute()){echo '<script>
self.location = "../community.php"
</script>';}
}else{
if($stmt2->execute()){echo '<script>
self.location = "../community.php"
</script>';}
}
}


?>



