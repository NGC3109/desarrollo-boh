<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO about_us (titulo_en, titulo_es, contenido_en, contenido_es, imagen, ancho, offset, publicar) VALUES (:titulo_en, :titulo_es, :contenido_en, :contenido_es, :imagen, :ancho, :offset, :publicar)";

$stmt=$db->prepare($query);

$stmt->bindParam(':titulo_en', $titulo_en);
$stmt->bindParam(':titulo_es', $titulo_es);
$stmt->bindParam(':contenido_en', $contenido_en);
$stmt->bindParam(':contenido_es', $contenido_es);
$stmt->bindParam(':imagen', $imagen);
$stmt->bindParam(':ancho', $ancho);
$stmt->bindParam(':offset', $offset);
$stmt->bindParam(':publicar', $publicar);


$titulo_en=$_POST['titulo_en'];
$titulo_es=$_POST['titulo_es'];
$contenido_en=$_POST['contenido_en'];
$contenido_es=$_POST['contenido_es'];
$ancho=$_POST['ancho'];
$offset=$_POST['offset'];
if($_POST['publicar']){$publicar=1;}else{$publicar=0;}
$tiempo=date('Ymdhis');
$nombre=$tiempo.$_FILES['imagen']['name'];
$dir_name = "../../img/about-us/";
move_uploaded_file($_FILES['imagen']['tmp_name'],$dir_name.$nombre);
$imagen=$nombre;


if($stmt->execute()){echo '<script>
self.location = "../about-us.php"
</script>';}
else{echo '<script>
self.location = "../about-us.php"
</script>';}

echo '<script>
self.location = "../about-us.php"
</script>';

?>



