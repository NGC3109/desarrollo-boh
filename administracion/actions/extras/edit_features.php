<?php
require_once('../connections/db-settings.php');
$dia=date('Ymdhis');
$db = pdoConnect();

$query2="UPDATE offices_features SET contenido_en=:contenido_en, contenido_es=:contenido_es, orden=:orden WHERE id=:id";
$stmt2=$db->prepare($query2);

$stmt2->bindParam(':id', $id);
$stmt2->bindParam(':contenido_en', $contenido_en);
$stmt2->bindParam(':contenido_es', $contenido_es);
$stmt2->bindParam(':orden', $orden);


$id=$_POST['id'];
$contenido_en=$_POST['contenido_en'];
$contenido_es=$_POST['contenido_es'];
$orden=$_POST['orden'];



if($stmt2->execute()){echo '<script>
self.location = "../the-offices.php"
</script>';}




?>



