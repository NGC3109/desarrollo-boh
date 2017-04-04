<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO slider (titulo_en, titulo_es, frase_en, frase_es, link_en, link_es, imagen, publicar) VALUES (:titulo_en, :titulo_es, :frase_en, :frase_es, :link_en, :link_es, :imagen, :publicar)";

$stmt=$db->prepare($query);

$stmt->bindParam(':titulo_en', $titulo_en);
$stmt->bindParam(':titulo_es', $titulo_es);
$stmt->bindParam(':frase_en', $frase_en);
$stmt->bindParam(':frase_es', $frase_es);
$stmt->bindParam(':link_en', $link_en);
$stmt->bindParam(':link_es', $link_es);
$stmt->bindParam(':imagen', $imagen);
$stmt->bindParam(':publicar', $publicar);


$titulo_en=$_POST['titulo_en'];
$titulo_es=$_POST['titulo_es'];
$frase_en=$_POST['frase_en'];
$frase_es=$_POST['frase_es'];
$link_en=$_POST['link_en'];
$link_es=$_POST['link_es'];
if($_POST['publicar']){$publicar=1;}else{$publicar=0;}
$tiempo=date('Ymdhis');
$nombre=$tiempo.$_FILES['imagen']['name'];
$dir_name = "../../img/slides/";
move_uploaded_file($_FILES['imagen']['tmp_name'],$dir_name.$nombre);
$imagen=$nombre;


if($stmt->execute()){echo '<script>
self.location = "../index.php"
</script>';}
else{echo '<script>
self.location = "../index.php"
</script>';}

echo '<script>
self.location = "../index.php"
</script>';

?>



