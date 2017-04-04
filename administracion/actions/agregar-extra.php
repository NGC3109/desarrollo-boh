<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO items (tipo, nombre, hora_apertura, hora_cierre) VALUES (:tipo, :nombre, :hora_apertura, :hora_cierre)";

$stmt=$db->prepare($query);

$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':hora_apertura', $hora_apertura);
$stmt->bindParam(':hora_cierre', $hora_cierre);
$stmt->bindParam(':tipo', $tipo);


$nombre=$_POST['nombre'];
$hora_apertura=$_POST['hora_apertura'];
$hora_cierre=$_POST['hora_cierre'];
$tipo=1;


if($stmt->execute()){echo '<script>
self.location = "../canchas-y-extras.php"
</script>';}


?>



