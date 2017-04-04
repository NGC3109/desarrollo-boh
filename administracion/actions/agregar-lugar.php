<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO lugares (nombre, direccion, comuna, estado) VALUES (:nombre, :direccion, :comuna, :estado)";

$stmt=$db->prepare($query);

$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':direccion', $direccion);
$stmt->bindParam(':comuna', $comuna);
$stmt->bindParam(':estado', $estado);


$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$comuna=$_POST['comuna'];
$estado=$_POST['estado'];


if($stmt->execute()){echo '<script>
self.location = "../lugares.php"
</script>';}


?>



