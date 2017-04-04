<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO offices_images (contenido_en, contenido_es, imagen, publicar) VALUES (:contenido_en, :contenido_es, :imagen, :publicar)";

$stmt=$db->prepare($query);

$stmt->bindParam(':contenido_en', $contenido_en);
$stmt->bindParam(':contenido_es', $contenido_es);
$stmt->bindParam(':imagen', $imagen);
$stmt->bindParam(':publicar', $publicar);

$contenido_en=$_POST['contenido_en'];
$contenido_es=$_POST['contenido_es'];
if($_POST['publicar']){$publicar=1;}else{$publicar=0;}
$tiempo=date('Ymdhis');
$nombre=$tiempo.$_FILES['imagen']['name'];
$dir_name = "../../img/the-offices/";
move_uploaded_file($_FILES['imagen']['tmp_name'],$dir_name.$nombre);
$imagen=$nombre;


if($stmt->execute()){echo '<script>
self.location = "../the-offices.php"
</script>';}
else{echo '<script>
self.location = "../the-offices.php"
</script>';}

echo '<script>
self.location = "../the-offices.php"
</script>';

?>



