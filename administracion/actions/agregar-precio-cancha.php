<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

$query="INSERT INTO precios (nombre, precio, hora_inicio, hora_fin, dia) VALUES (:nombre, :precio, :hora_inicio, :hora_fin, :dia)";

$stmt=$db->prepare($query);

$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':precio', $precio);
$stmt->bindParam(':hora_inicio', $hora_inicio);
$stmt->bindParam(':hora_fin', $hora_fin);
$stmt->bindParam(':dia', $dia);


$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$hora_inicio=$_POST['hora_inicio'];
$hora_fin=$_POST['hora_fin'];
$dia=$_POST['dia'];


if($stmt->execute()){echo '<script>
self.location = "../precios.php"
</script>';}


?>



