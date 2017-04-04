<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO community (titulo_en, titulo_es, bajada_en, bajada_es, contenido_en, contenido_es, tipo_en, tipo_es, fecha, imagen, shortlink_en, shortlink_es, publicar) VALUES (:titulo_en, :titulo_es, :bajada_en, :bajada_es, :contenido_en, :contenido_es, :tipo_en, :tipo_es, :fecha, :imagen, :shortlink_en, :shortlink_es, :publicar)";

$stmt=$db->prepare($query);

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
$tiempo=date('Ymdhis');
$nombre=$_FILES['imagen']['name'].$tiempo;
$dir_name = "../../img/blog/";
move_uploaded_file($_FILES['imagen']['tmp_name'],$dir_name.$nombre);
$imagen=$nombre;


if($stmt->execute()){echo '<script>
self.location = "../community.php"
</script>';}
else{echo '<script>
self.location = "../community.php"
</script>';}

echo '<script>
self.location = "../community.php"
</script>';

?>



